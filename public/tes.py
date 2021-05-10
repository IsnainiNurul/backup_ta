import sys

if(len(sys.argv) ==4):
		query = "Select * from news;"

if(len(sys.argv)==3):
		query = "Select * from news1;"

if(len(sys.argv)==2):
		query = "Select * from news2;"

if(len(sys.argv)==1):
		query = "Select * from news3;"

print(query)