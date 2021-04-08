#try :
import pandas as pd
import numpy as np
import datetime
import requests
import warnings
import sys
#	import matplotlib.pyplot as plt
import pickle
hari = int(sys.argv[1])
with open('fbprophet.sav', 'rb') as pkl:
  	pickle_preds = pickle.load(pkl)
future = pickle_preds.make_future_dataframe(periods= int(hari))
prop_forecast = pickle_preds.predict(future)
forecast = prop_forecast[293:].trend.values
print(forecast)

#except Exception as e:
#	print(e)
