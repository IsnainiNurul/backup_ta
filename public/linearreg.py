from sklearn.metrics import mean_squared_error
import numpy as np
from sklearn.linear_model import LinearRegression
import pandas as pd
import pandas as pd
import pymysql
from sqlalchemy import create_engine
import sys
from math import sqrt
kota = sys.argv[1]
tetangga = sys.argv[2]
tanggal_mulai = sys.argv[3]
tanggal_selesai = sys.argv[4]

engine = create_engine("mysql+pymysql://pmauser:password_here@localhost:3306/tacovid")
df = pd.read_sql_query("SELECT * FROM mytable where tanggal >'"+tanggal_mulai+"' and tanggal <'"+tanggal_selesai+"'", engine)
#print(df)

df = df[df['Kabupaten']==kota]
df = df[df['Tetangga']==tetangga]
#df = df[df['tanggal']>tanggal_mulai]
#df = df[df['tanggal']<tanggal_selesai]

df = df.reset_index()
X = []
y = []
for x in range(len(df)):
  X.append([df['confirm'][x]])
  y.append(df['Confirm_tetangga'][x])
#  print(x)
x = np.array(X)

y= np.array(y)
#print(df)
#xxx=X[-batas:]
batas = (len(x)*20)/100
batas = int(batas)
x_train =x[:-batas]
y_train =y[:-batas]

x_test =x[-batas:]
y_test =y[-batas:]
model = LinearRegression()
model.fit(x_train, y_train)
r_sq = model.score(x_test, y_test)
y_pred = model.predict(x_test)

mse = mean_squared_error(model.predict(x_test),y_test)
print(y_pred)

print('%%'+str(sqrt(mse)))
print('%%'+str(df.tail(batas).reset_index()['tanggal'][0]))
print('%%')
print(y_test)
print('%%')
arey = []
for x in range(len(x_test)):
    arey.append(int(x_test[x][0]))
print(arey)
#print(df)
