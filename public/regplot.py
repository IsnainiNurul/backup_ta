
import pandas as pd
import pymysql
import sys
from sqlalchemy import create_engine
# import pandas as pd
import numpy as np
import seaborn as sns
from scipy import stats
import matplotlib.pyplot as plt

id = sys.argv[1]
# print(id)
engine = create_engine("mysql+pymysql://pmauser:password_here@localhost:3306/tacovid")
df = pd.read_sql_query("SELECT * FROM output_jan_maret where id="+id, engine)

m1=df['m1'][0].replace("[","").replace("]","").split(',')
m1 = np.array(m1).astype(int)

m2=df['m2'][0].replace("[","").replace("]","").split(',')
m2 = np.array(m2).astype(int)

res = stats.linregress(m1,m2)
print(res.slope)
print('%%')
print(res.intercept)

diff = m1-m2
mean = (m1+m2)/2
persen = diff/mean
persen=persen*100
average = np.mean(persen)

deviasi = np.std(persen)
batas_atas = average+(deviasi*1.96)
batas_bawah = average-(deviasi*1.96)

average_asli = np.mean(diff)
deviasi_asli = np.std(diff)
max_asli = average_asli+(deviasi_asli*1.96)
min_asli = average_asli-(deviasi_asli*1.96)

titik_diluar_max = diff[diff>max_asli]
titik_diluar_min = diff[diff<min_asli]

titik = len(titik_diluar_max) + len(titik_diluar_min)

agreement=1.96
confidence=.95
n = m1.size
dof = n - 1
diff = m1 - m2
mean_diff = np.mean(diff)
std_diff = np.std(diff, ddof=1)
mean_diff_se = np.sqrt(std_diff**2 / n)
    # Limits of agreements
high = mean_diff + agreement * std_diff
low = mean_diff - agreement * std_diff
high_low_se = np.sqrt(3 * std_diff**2 / n)
# ci = dict()
cimean = stats.t.interval(
            confidence, dof, loc=mean_diff, scale=mean_diff_se)
cihigh = stats.t.interval(
            confidence, dof, loc=high, scale=high_low_se)
cilow = stats.t.interval(
            confidence, dof, loc=low, scale=high_low_se)



print('%%')
print(round(batas_atas,2))
print('%%')
print(round(batas_bawah,2))
print('%%')
print(titik)
print('%%')
print(round(max_asli,2))
print('%%')
print(round(min_asli,2))
print('%%')
print(round(cimean[0],2))
print('%%')
print(round(cimean[1],2))
print('%%')
print(round(cihigh[0],2))
print('%%')
print(round(cihigh[1],2))
print('%%')
print(round(cilow[0],2))
print('%%')
print(round(cilow[1],2))
