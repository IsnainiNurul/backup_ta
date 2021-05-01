
import sys
import numpy as np
import math
import scipy
# from scipy import stats
#	import matplotlib.pyplot as plt
	# import pickle
# from sklearn.metrics import r2_score
# def get_r2_python(x_list, y_list):
#     n = len(x_list)
#     x_bar = sum(x_list)/n
#     y_bar = sum(y_list)/n
#     x_std = math.sqrt(sum([(xi-x_bar)**2 for xi in x_list])/(n-1))
#     y_std = math.sqrt(sum([(yi-y_bar)**2 for yi in y_list])/(n-1))
#     zx = [(xi-x_bar)/x_std for xi in x_list]
#     zy = [(yi-y_bar)/y_std for yi in y_list]
#     r = sum(zxi*zyi for zxi, zyi in zip(zx, zy))/(n-1)
#     return r**2

# # def get_r2_scipy(x, y):
# #     _, _, r_value, _, _ = stats.linregress(x, y)
# #     return r_value**2
# def rsquared(x, y):
#     """ Return R^2 where x and y are array-like."""

#     slope, intercept, r_value, p_value, std_err = scipy.stats.linregress(x, y)
#     return r_value**2




x = (sys.argv[1]).split(';')[1:]
y = (sys.argv[2]).split(';')[1:]
# print(y)
x = list(map(int, x))
y = list(map(float, y))

# # print(x)
# print(y)
# x_new = []
# for xx in x:
#     x_new.append([xx])
# print(x_new)
correlation_matrix = np.corrcoef(x, y)
correlation_xy = correlation_matrix[0,1]
r_squared = correlation_xy**2

print(r_squared)
	# hari = int(sys.argv[1])
	# with open('arima.sav', 'rb') as pkl:
 	#    pickle_preds = pickle.load(pkl)
	# forecast = pickle_preds.forecast(steps= int(hari))
	# print(list(forecast[0]))
# except Exception as e:
# 	print(e)
