#print('tesss')

import os
from pathlib import Path
import sys

import pickle
#import pandas as pd
try:
    import pandas as pd
    import numpy as np
    pilihan = int(sys.argv[3])
    loaded_model = pickle.load(open("svr_sample_"+str(pilihan)+"bulan.sav",'rb'))
#except Exception as e:
#    print(e)
#import numpy as np 
#import pandas
#print('halo')

#loaded_model = pickle.load(open("SVR.sav", 'rb'))
    akhir = int(sys.argv[1])
    mulai = int(sys.argv[2])
    
#    print('test')

    selisih = akhir - mulai
    array=np.arange(start=mulai+1, stop=akhir+1)
    array = np.reshape(array, (-1, 1))
    print(loaded_model.predict(array))
except Exception as e:
    print(e)
# print(loaded_model.predict([[100],[101]]))
