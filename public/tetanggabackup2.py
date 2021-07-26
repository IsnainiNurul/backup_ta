import statsmodels.api as sm
import numpy as np
import matplotlib.pyplot as plt
import pandas as pd
import sys

import numpy as np
import pandas as pd
import seaborn as sns
from scipy import stats
import matplotlib.pyplot as plt
import matplotlib.transforms as transforms


def daily_increase(data):
    d = [] 
    for i in range(len(data)):
        if i == 0:
            d.append(data[0])
        else:
            d.append(data[i]-data[i-1])
    return d 



def plot_blandaltman(x, y, agreement=1.96, confidence=.95, figsize=(5, 4),
                     dpi=100, ax=None):
    # Safety check
    x = np.asarray(x)
    y = np.asarray(y)
    assert x.ndim == 1 and y.ndim == 1
    assert x.size == y.size
    n = x.size
    mean = np.vstack((x, y)).mean(0)
    diff = x - y
    md = diff.mean()
    sd = diff.std(axis=0, ddof=1)
    if confidence is not None:
        assert 0 < confidence < 1
        ci = dict()
        ci['mean'] = stats.norm.interval(confidence, loc=md,
                                         scale=sd / np.sqrt(n))
        seLoA = ((1 / n) + (agreement**2 / (2 * (n - 1)))) * (sd**2)
        loARange = np.sqrt(seLoA) * stats.t.ppf((1 - confidence) / 2, n - 1)
        ci['upperLoA'] = ((md + agreement * sd) + loARange,
                          (md + agreement * sd) - loARange)
        ci['lowerLoA'] = ((md - agreement * sd) + loARange,
                          (md - agreement * sd) - loARange)
    # Start the plot
    if ax is None:
        fig, ax = plt.subplots(1, 1, figsize=figsize, dpi=dpi)
    # Plot the mean diff, limits of agreement and scatter
    ax.axhline(md, color='#6495ED', linestyle='--')
    ax.axhline(md + agreement * sd, color='coral', linestyle='--')
    ax.axhline(md - agreement * sd, color='coral', linestyle='--')
    ax.scatter(mean, diff, alpha=0.5)
    loa_range = (md + (agreement * sd)) - (md - agreement * sd)
    offset = (loa_range / 100.0) * 1.5
    trans = transforms.blended_transform_factory(ax.transAxes, ax.transData)
    ax.text(0.98, md + offset, 'Mean', ha="right", va="bottom",
            transform=trans)
    ax.text(0.98, md - offset, '%.2f' % md, ha="right", va="top",
            transform=trans)
    ax.text(0.98, md + (agreement * sd) + offset, '+%.2f SD' % agreement,
            ha="right", va="bottom", transform=trans)
    ax.text(0.98, md + (agreement * sd) - offset,
            '%.2f' % (md + agreement * sd), ha="right", va="top",
            transform=trans)
    ax.text(0.98, md - (agreement * sd) - offset, '-%.2f SD' % agreement,
            ha="right", va="top", transform=trans)
    ax.text(0.98, md - (agreement * sd) + offset,
            '%.2f' % (md - agreement * sd), ha="right", va="bottom",
            transform=trans)
    if confidence is not None:
        ax.axhspan(ci['mean'][0], ci['mean'][1],
                   facecolor='#6495ED', alpha=0.2)
        ax.axhspan(ci['upperLoA'][0], ci['upperLoA'][1],
                   facecolor='coral', alpha=0.2)
        ax.axhspan(ci['lowerLoA'][0], ci['lowerLoA'][1],
                   facecolor='coral', alpha=0.2)
    # Labels and title
    ax.set_ylabel('Difference between methods')
    ax.set_xlabel('Mean of methods')
    ax.set_title('Bland-Altman plot')
    # Despine and trim
    sns.despine(trim=True, ax=ax)
    return ax
def plot_blandaltman_mean(x, y, agreement=1.96, confidence=.95, figsize=(5, 4),
                     dpi=100, ax=None):
    x = np.asarray(x)
    y = np.asarray(y)
    assert x.ndim == 1 and y.ndim == 1
    assert x.size == y.size
    n = x.size
    mean = np.vstack((x, y)).mean(0)
    diff = x - y
    md = diff.mean()
    sd = diff.std(axis=0, ddof=1)
    if confidence is not None:
        assert 0 < confidence < 1
        ci = dict()
        ci['mean'] = stats.norm.interval(confidence, loc=md,
                                         scale=sd / np.sqrt(n))
        return (ci['mean'][0]+ci['mean'][1])/2



import pandas as pd
import pymysql
from sqlalchemy import create_engine

engine = create_engine("mysql+pymysql://pmauser:password_here@localhost:3306/tacovid")
df = pd.read_sql_query("SELECT * FROM mytable", engine)
df.tanggal = df.astype('string').tanggal
minimum = sys.argv[1]
maksimal = sys.argv[2]

print('min------------------->'+str(minimum))
df = df[df['tanggal']>=str(minimum)]
df = df[df['tanggal']<=str(maksimal)]
diambil = df[df['tanggal']==str(maksimal)] #ngambil 1 tanggal
# print(diambil)
kabupaten = diambil[diambil.duplicated(subset=['Kabupaten'])==False]['Kabupaten'].values
import math
array = []
for x in kabupaten:
    kabupaten_sekarang = x
    print("kabupaten  : "+kabupaten_sekarang)
   # break
    list_tetangga_kabupaten = diambil[diambil['Kabupaten']==kabupaten_sekarang]['Tetangga'].values
    for y in list_tetangga_kabupaten:
        try:
            list_tetangga_sekarang = y
    #         if y=='nan':
    #             continue
            print('Tetangga --------> '+list_tetangga_sekarang)
            #break
            temp = df[df['Kabupaten']==kabupaten_sekarang].sort_values(by = 'tanggal')
            temp2 = temp[temp['Tetangga'] == list_tetangga_sekarang]
            m1 = temp2['confirm'].values
            m1[np.argwhere(np.isnan(m1))]=m1[np.argwhere(np.isnan(m1))-1]
            m2 = temp2['Confirm_tetangga'].values
            m2[np.argwhere(np.isnan(m2))]=m2[np.argwhere(np.isnan(m2))-1]
            rata = plot_blandaltman_mean(m1,m2)
#             print(rata)
#             if list_tetangga_sekarang=='LAMONGAN':
#                 break
            dict_index = { 
                "Kabupaten":kabupaten_sekarang,
                "Tetangga":list_tetangga_sekarang,
                "Mean":rata

            }
            array.append(dict_index)
        except:
            pass
#     if kabupaten_sekarang =='GRESIK':
#         break
    #break
def plot_blandaltman_all(x, y, agreement=1.96, confidence=.95, figsize=(5, 4),
                     dpi=100, ax=None):
    # Safety check
    x = np.asarray(x)
    y = np.asarray(y)
    assert x.ndim == 1 and y.ndim == 1
    assert x.size == y.size
    n = x.size
    mean = np.vstack((x, y)).mean(0)
    diff = x - y
    md = diff.mean()
    sd = diff.std(axis=0, ddof=1)

    # Confidence intervals--
    # Interval Kepercayaan
    if confidence is not None:
        assert 0 < confidence < 1
        ci = dict()
        ci['mean'] = stats.norm.interval(confidence, loc=md,
                                         scale=sd / np.sqrt(n))
        seLoA = ((1 / n) + (agreement**2 / (2 * (n - 1)))) * (sd**2)
        loARange = np.sqrt(seLoA) * stats.t.ppf((1 - confidence) / 2, n - 1)
        ci['upperLoA'] = ((md + agreement * sd) + loARange,
                          (md + agreement * sd) - loARange)
        ci['lowerLoA'] = ((md - agreement * sd) + loARange,
                          (md - agreement * sd) - loARange)

    # Start the plot
    if ax is None:
        fig, ax = plt.subplots(1, 1, figsize=figsize, dpi=dpi)

    # Plot the mean diff, limits of agreement and scatter
    ax.axhline(md, color='#6495ED', linestyle='--')
    ax.axhline(md + agreement * sd, color='coral', linestyle='--')
    ax.axhline(md - agreement * sd, color='coral', linestyle='--')
    ax.scatter(mean, diff, alpha=0.5)

    return [md,md + agreement * sd,md - agreement * sd,mean,diff]
            #md =mean, aggrement=batas kesepakatan, sd = standar deviasi
array = []
for x in kabupaten:
    kabupaten_sekarang = x
    print("kabupaten  : "+kabupaten_sekarang)
   # break
    list_tetangga_kabupaten = diambil[diambil['Kabupaten']==kabupaten_sekarang]['Tetangga'].values
    for y in list_tetangga_kabupaten:
        try:
            list_tetangga_sekarang = y
    #         if y=='nan':
    #             continue
            print('Tetangga --------> '+list_tetangga_sekarang)
            #break
            temp = df[df['Kabupaten']==kabupaten_sekarang].sort_values(by = 'tanggal')
            temp2 = temp[temp['Tetangga'] == list_tetangga_sekarang]
            m1 = temp2['confirm'].values
            m1[np.argwhere(np.isnan(m1))]=m1[np.argwhere(np.isnan(m1))-1]
            m2 = temp2['Confirm_tetangga'].values
            m2[np.argwhere(np.isnan(m2))]=m2[np.argwhere(np.isnan(m2))-1]
            m1 = daily_increase(m1)[1:]
 
            m2 = daily_increase(m2)[1:]
            rata = plot_blandaltman_all(m1,m2)
#             print(rata)
#             if list_tetangga_sekarang=='LAMONGAN':
#                 break
            dict_index = { 
                "Kabupaten":kabupaten_sekarang,
                "Tetangga":list_tetangga_sekarang,
                "Mean":rata[0],
                "Min":rata[2],
                "Max":rata[1],
                "x":rata[3],
                "y":rata[4],
		"m1":m1,
		"m2":m2
            }
            array.append(dict_index)
        except:
            pass
#     if kabupaten_sekarang =='GRESIK':
#         break
    #break
df_output = pd.DataFrame(array)
#print(array)
#print(df_output)
#print(df_output['x'][0].values)
engine.execute("TRUNCATE output_jan_maret")
def listToString(s): 
    
    # initialize an empty string
    str1 = "" 
    
    # traverse in the string  
    for ele in s: 
        str1 += ele  
    
    # return string  
    return str1 
        

for xx in range(len(df_output)):
  id= xx
  kabupaten = df_output['Kabupaten'][xx]
  tetangga  = df_output['Tetangga'][xx]
  mean= df_output['Mean'][xx]
  min  = df_output['Min'][xx]
  max  = df_output['Max'][xx]
  print(str(pd.DataFrame(array)['m1'][xx])) 
  x = str(pd.DataFrame(array)['x'][xx].astype('str')).replace("\'",'').replace('\n','').replace(' ',',')
  y = str(pd.DataFrame(array)['y'][xx].astype('str')).replace("\'",'').replace('\n','').replace(' ',',') 
  #print(str(pd.DataFrame(array)['x'][xx].astype('str')).replace("\'",'').replace('\n','').replace(' ',','))
  #print(str(pd.DataFrame(array)['y'][xx].astype('str')).replace("\'",'').replace('\n','').replace(' ',','))
  #print(str(pd.DataFrame(array)['m1'][xx].astype('str')).replace("\'",'').replace('\n','').replace(' ',','))
  #print(str(pd.DataFrame(array)['m2'][xx].astype('str')).replace("\'",'').replace('\n','').replace(' ',','))
  m1 = str(pd.DataFrame(array)['m1'][xx]).replace("\'",'').replace('\n','').replace(' ','')
  m2 = str(pd.DataFrame(array)['m2'][xx]).replace("\'",'').replace('\n','').replace(' ','')

  #break
#  x  = str(df_output['x'][xx].astype('str'))
#  y  = str(df_output['y'][xx].astype('str'))
  print("Iterasi Ke "+str(id))
#  engine.execute("INSERT INTO output_jan_maret (id, kabupaten, max,mean,min,no,tetangga,x,y) VALUES ("+id+",'"+kabupaten+"',"+max+","+mean+","+min+","+id+",'"+tetangga+"','"+x+"','"+y+"')")
  engine.execute("INSERT INTO `output_jan_maret` (`id`, `no`, `kabupaten`, `tetangga`, `mean`, `min`, `max`, `x`, `y`,`m1`,`m2`) VALUES (NULL, '"+str(id)+"', '"+str(kabupaten)+"', '"+str(tetangga)+"', '"+str(mean)+"', '"+str(min)+"', '"+str(max)+"', '"+str(x)+"', '"+str(y)+"', '"+str(m1)+"', '"+str(m2)+"');")
#  engine.execute("INSERT INTO output_jan_maret (id, kabupaten, max,mean,min,no,tetangga,x,y) VALUES ("+id+",'2',2,2,2,2,'2','2','2')")
#  print(x)
#  break

print('sukses')

