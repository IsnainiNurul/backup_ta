import pickle
import pandas as pd
import re
import nltk
from nltk.corpus import stopwords
from nltk.stem import WordNetLemmatizer
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.model_selection import train_test_split
from sklearn.feature_selection import chi2
import numpy as np
import matplotlib.pyplot as plt 
import pandas as pd 
import collections
import time
import sys

import mysql.connector
mydb = mysql.connector.connect(
  host="localhost",
  user="pmauser",
  password="password_here",
  database="tacovid"
)

mycursor = mydb.cursor()
query= "Select * from news";
# if(sys.argv[3]=="semua"):
#     query = "Select * from news where date between '"+str(sys.argv[1])+"' and '"+str(sys.argv[2])+"';"
# else:
#     query = "Select * from news where date between '"+str(sys.argv[1])+"' AND '"+str(sys.argv[2])+"' and area= '"+str(sys.argv[3])+"';"
df = pd.read_sql(query,mydb)

# \r and \n
df['title_parsed_1'] = df['title'].str.replace("\r", " ")
df['title_parsed_1'] = df['title_parsed_1'].str.replace("\n", " ")
df['title_parsed_1'] = df['title_parsed_1'].str.replace("    ", " ")

# " when quoting text
df['title_parsed_1'] = df['title_parsed_1'].str.replace('"', '')
# Lowercasing the text
df['title_parsed_2'] = df['title_parsed_1'].str.lower()
punctuation_signs = list("?:!.,;")
df['title_parsed_3'] = df['title_parsed_2']

for punct_sign in punctuation_signs:
    df['title_parsed_3'] = df['title_parsed_3'].str.replace(punct_sign, '')
df['title_parsed_4'] = df['title_parsed_3'].str.replace("'s", "")
# Downloading punkt and wordnet from NLTK
nltk.download('punkt')
print("------------------------------------------------------------")
nltk.download('wordnet')
# Saving the lemmatizer into an object
wordnet_lemmatizer = WordNetLemmatizer()
nrows = len(df)
lemmatized_text_list = []

for row in range(0, nrows):
    
    # Create an empty list containing lemmatized words
    lemmatized_list = []
    
    # Save the text and its words into an object
    text = df.loc[row]['title_parsed_4']
    text_words = text.split(" ")

    # Iterate through every word to lemmatize
    for word in text_words:
        lemmatized_list.append(wordnet_lemmatizer.lemmatize(word, pos="v"))
        
    # Join the list
    lemmatized_text = " ".join(lemmatized_list)
    
    # Append to the list containing the texts
    lemmatized_text_list.append(lemmatized_text)
df['title_parsed_5'] = lemmatized_text_list

# Downloading the stop words list
nltk.download('stopwords')
STOPWORDS= stopwords.words('indonesian')
STOPWORDS.extend(['covid','covid-19','covid-19,','korona','2020','corona', 'corona,','2021','0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','ribu','juta','-'])
stop_words = list(STOPWORDS) #membuang kata yang tidak digunakan
df['title_parsed_6'] = df['title_parsed_5']

for stop_word in stop_words:

    regex_stopword = r"\b" + stop_word + r"\b"
    df['title_parsed_6'] = df['title_parsed_6'].str.replace(regex_stopword, '')
    
df['title_parsed_6'] = df['title_parsed_6'].str.replace('-', '')

mycursor = mydb.cursor()
query = "Select * from news;"
df = pd.read_sql(query,mydb)


mycursor = mydb.cursor()
query = "Select * from news;"
result_dataFrame = pd.read_sql(query,mydb)
list_columns = ["title","title_parsed_6", "news_portal", "url", "img_url", "date","content","tag","area","kota","label"]
df2 = df[list_columns]

df2 = df2.rename(columns={'title_parsed_6': 'title_parsed'})
label_codes = {
    'notification of information': 0,
    'donation': 1,
    'criticism': 2,
    'hoax': 3,
}
# Category mapping
df2['label_code'] = df2['label']
df2 = df2.replace({'label_code':label_codes})

X_train, X_test, y_train, y_test = train_test_split(df2['title_parsed'], 
                                                    df2['label_code'], 
                                                    test_size=0.15, 
                                                    random_state=8)
# Parameter election
ngram_range = (1,2)
min_df = 10
max_df = 1.
max_features = 300

tfidf = TfidfVectorizer(encoding='utf-8',
                        ngram_range=ngram_range,
                        stop_words=None,
                        lowercase=False,
                        max_df=max_df,
                        min_df=min_df,
                        max_features=max_features,
                        norm='l2',
                        sublinear_tf=True)
                        
features_train = tfidf.fit_transform(X_train).toarray()
labels_train = y_train
print(features_train.shape)

features_test = tfidf.transform(X_test).toarray()
labels_test = y_test
print(features_test.shape)

from sklearn.feature_selection import chi2
import numpy as np

for Product, label_id in sorted(label_codes.items()):
    features_chi2 = chi2(features_train, labels_train == label_id)
    indices = np.argsort(features_chi2[0])
    feature_names = np.array(tfidf.get_feature_names())[indices]
    unigrams = [v for v in feature_names if len(v.split(' ')) == 1]
    bigrams = [v for v in feature_names if len(v.split(' ')) == 2]
    print(unigrams[-5:])

