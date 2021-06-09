import pandas as pd
from sqlalchemy import create_engine
import pymysql
df = pd.read_csv('https://raw.githubusercontent.com/CSSEGISandData/COVID-19/master/csse_covid_19_data/csse_covid_19_time_series/time_series_covid19_confirmed_global.csv')
k = df[df['Country/Region']=='Indonesia'].loc[:,'1/22/20':]
dates = list(df.columns[4:])
dates = list(pd.to_datetime(dates))
india_confirmed = k.values.tolist()[0] 
data = pd.DataFrame(columns = ['ds','y'])
data['Date'] = dates
data['Confirmed'] = india_confirmed
dtf = data[['Date','Confirmed']]
dtf =dtf[294:]
dtf = dtf.reset_index()
dtf = dtf.rename(columns={"index": "id", "Date": "x", "Confirmed": "y"})

def to_db(df, tablename):
#     engine = create_engine('mysql+pymysql://root@localhost:3306/bmkg')
    engine = create_engine('mysql+pymysql://pmauser:password_here@localhost:3306/tacovid')
    df.to_sql(tablename, engine, index=False, if_exists='replace' )

to_db(dtf,'real_case')
print('update done')
