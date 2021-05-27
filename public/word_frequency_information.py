# Python program to generate WordCloud
  
# importing all necessery modules
import nltk
from nltk.corpus import stopwords
import matplotlib.pyplot as plt
import pandas as pd
import numpy as np
import matplotlib.pyplot as plt 
import collections
import sys
import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="pmauser",
  password="password_here",
  database="tacovid"
)

mycursor = mydb.cursor()
if(sys.argv[3]=="semua"):
    query = "Select * from news where date between '"+str(sys.argv[1])+"' and '"+str(sys.argv[2])+"' and label='notification of information';"
else:
    text=""
    for x in range(3,len(sys.argv)):
        if(x>1):
            text=text+" "
        text = text+sys.argv[x]

    query = "Select * from news where date between '"+str(sys.argv[1])+"' AND '"+str(sys.argv[2])+"' and area= '"+str(sys.argv[3])+"' and label='notification of information';"

# Reads 'Youtube04-Eminem.csv' file 
df = pd.read_sql(query,mydb)

STOPWORDS= stopwords.words('indonesian')
STOPWORDS.extend(['covid','covid-19','covid-19,','korona','2020','corona','2021','0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','ribu','juta','indonesia'])
stop_words = set(STOPWORDS) #membuang kata yang tidak digunakan

comment_words = ''
for val in df.title:
      
    # typecaste each val to string
    val = str(val)
    punctuation_signs = list("?:!.,;&")
    for punct_sign in punctuation_signs:
        val = val.replace(punct_sign, '')
    
  
    # split the value
    tokens = val.split()
    
    # Converts each token into lowercase and remove stopwords
    tokens2=[]
    for i in range(len(tokens)):
        tokens[i] = tokens[i].lower()
        if(tokens[i] not in stop_words):
            tokens2.append(tokens[i])
    
    comment_words += " ".join(tokens2)+" "

from collections import Counter
split_it = comment_words.split()
  
# Pass the split_it list to instance of Counter class.
Counter = Counter(split_it)
  
# most_common() produces k frequently encountered
# input values and their respective counts.
most_occur = Counter.most_common(100)

cek=str(most_occur)

punctuation_signs = list("[(',)]")
for punct_sign in punctuation_signs:
    cek = cek.replace(punct_sign, '')

print(cek)

