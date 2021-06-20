
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
