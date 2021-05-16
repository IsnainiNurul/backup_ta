import pickle
import pandas as pd
import nltk
from nltk.corpus import stopwords
from nltk.tokenize import punkt
from nltk.corpus.reader import wordnet
from nltk.stem import WordNetLemmatizer
from sklearn.feature_extraction.text import TfidfVectorizer
import sys

path_models = "C:/Users/asus-pc/Documents/PBA/Tugas Akhir/04. Model Training/Models/"

# SVM
path_svm = path_models + 'best_lrc.pickle'
with open(path_svm, 'rb') as  data:
    svc_model = pickle.load(data)

path_tfidf = "C:/Users/asus-pc/Documents/PBA/Tugas Akhir/03. Feature Engineering/Pickles_title/tfidf.pickle"
with open(path_tfidf, 'rb') as data:
    tfidf = pickle.load(data)

label_codes = {
    'notification of information': 0,
    'donation': 1,
    'criticisms': 2,
    'hoax': 3,
}

punctuation_signs = list("?:!.,;")
STOPWORDS= stopwords.words('Indonesian')
STOPWORDS.extend(['covid','covid-19','covid-19,','korona','2020','corona', 'corona,','2021','0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','ribu','juta','-'])
stop_words = list(STOPWORDS) #membuang kata yang tidak digunakan
def create_features_from_text(text):
    
    # Dataframe creation
    lemmatized_text_list = []
    df = pd.DataFrame(columns=['title'])
    df.loc[0] = text
    df['title_parsed_1'] = df['title'].str.replace("\r", " ")
    df['title_parsed_1'] = df['title_parsed_1'].str.replace("\n", " ")
    df['title_parsed_1'] = df['title_parsed_1'].str.replace("    ", " ")
    df['title_parsed_1'] = df['title_parsed_1'].str.replace('"', '')
    df['title_parsed_2'] = df['title_parsed_1'].str.lower()
    df['title_parsed_3'] = df['title_parsed_2']
    for punct_sign in punctuation_signs:
        df['title_parsed_3'] = df['title_parsed_3'].str.replace(punct_sign, '')
    df['title_parsed_4'] = df['title_parsed_3'].str.replace("'s", "")
    wordnet_lemmatizer = WordNetLemmatizer()
    lemmatized_list = []
    text = df.loc[0]['title_parsed_4']
    text_words = text.split(" ")
    for word in text_words:
        lemmatized_list.append(wordnet_lemmatizer.lemmatize(word, pos="v"))
    lemmatized_text = " ".join(lemmatized_list)    
    lemmatized_text_list.append(lemmatized_text)
    df['title_parsed_5'] = lemmatized_text_list
    df['title_parsed_6'] = df['title_parsed_5']
    for stop_word in stop_words:
        regex_stopword = r"\b" + stop_word + r"\b"
        df['title_parsed_6'] = df['title_parsed_6'].str.replace(regex_stopword, '')
    df = df.rename(columns={'title_parsed_6': 'title_parsed'})
    df = df['title_parsed']
    #df = df.rename(columns={'title_parsed_6': 'title_parsed'})

    # TF-IDF
    features = tfidf.transform(df).toarray()
    
    return features

def get_category_name(category_id):
    for category, id_ in label_codes.items():    
        if id_ == category_id:
            return category

def predict_from_text(text):
    
    # Predict using the input model
    prediction_svc = svc_model.predict(create_features_from_text(text))[0]
    prediction_svc_proba = svc_model.predict_proba(create_features_from_text(text))[0]
    
    # Return result
    category_svc = get_category_name(prediction_svc)
    
    return category_svc,prediction_svc_proba.max()*100

text=""
for x in range(1,len(sys.argv)):
    if(x>1):
        text=text+" "
    text = text+sys.argv[x]

tes1,tes2=predict_from_text(text)
print(tes1,tes2)