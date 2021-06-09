# import pandas as pd

from sklearn.metrics import r2_score
import sys
import numpy as np
import matplotlib.pyplot as plt
import sys
from sklearn import svm
from mpl_toolkits.mplot3d import axes3d, Axes3D
import pandas as pd
import pickle
from sklearn.metrics import mean_squared_error
from sklearn.metrics import r2_score
# str = sys.argv[1]
# print(str)
# str = sys.argv[2]
# print(str)
# print('INI SVRPSO')

def daily_increase(data):
    d = [] 
    for i in range(len(data)):
        if i == 0:
            d.append(data[0])
        else:
            d.append(data[i]-data[i-1])
    return d 


confirmed_df = pd.read_csv('https://raw.githubusercontent.com/CSSEGISandData/COVID-19/master/csse_covid_19_data/csse_covid_19_time_series/time_series_covid19_confirmed_global.csv')
confirmed_df = confirmed_df[confirmed_df['Country/Region']=='Indonesia']


cols = confirmed_df.keys()

confirmed = confirmed_df.loc[:, cols[4]:cols[-1]]
dates = confirmed.keys()
world_cases = []

for i in dates:
    confirmed_sum = confirmed[i].sum()
    world_cases.append(confirmed_sum)
days_since_1_22 = np.array([i for i in range(len(dates))]).reshape(-1, 1) # hari ke index
world_cases = np.array(world_cases).reshape(-1, 1)
arr = []
for x in range(len(world_cases)):
    dict_ = {'x':world_cases[x][0]}
    arr.append(dict_)
    # print(world_cases[x])
data = pd.DataFrame(arr)

start = int(sys.argv[2])
end = sys.argv[1]
tipe = sys.argv[3]
# print(start)
# print(start)
# print(end)
# print(tipe)
model_name='psosvrakumulasi_windows.sav'
if tipe=='harian':
    model_name ='psosvrharian_windows.sav'
    data['x'] = daily_increase(data['x'])

data = data['x'][int(start):int(end)].reset_index()['x']
data_n = data.copy()
data_n = (data - 0)/(data.max() - 0)
dimensions = 12
data_cn = pd.concat([data_n.shift(i) for i in range(0 + dimensions + 1)], axis = 1)
y=data_cn.iloc[12:,0]
x = data_cn.iloc[12:,1:]
loaded_model = pickle.load(open(model_name, 'rb'))
predict = loaded_model.predict(data_cn.iloc[12:,1:])

y = data_cn.iloc[12:,0]
print(predict*data.to_numpy().max())
print('%%'+str(r2_score(y*data.to_numpy().max(),predict*data.to_numpy().max())))