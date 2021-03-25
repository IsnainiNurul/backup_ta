try :
	import pandas as pd
	import numpy as np
	import datetime
	import requests
	import warnings

	import sys
#	import matplotlib.pyplot as plt
	import pickle
	hari = int(sys.argv[1])
	with open('arima.sav', 'rb') as pkl:
 	   pickle_preds = pickle.load(pkl)
	forecast = pickle_preds.forecast(steps= int(hari))
	print(list(forecast[0]))
except Exception as e:
	print(e)
