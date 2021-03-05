import os
from pathlib import Path

import sys
import pickle
import pandas as pd
import numpy as np 


loaded_model = pickle.load(open("SVR.sav", 'rb'))
akhir = int(sys.argv[1])
mulai = int(sys.argv[2])
selisih = akhir - mulai
array=np.arange(start=mulai+1, stop=akhir+1)
array = np.reshape(array, (-1, 1))
print(loaded_model.predict(array))
# print(loaded_model.predict([[100],[101]]))