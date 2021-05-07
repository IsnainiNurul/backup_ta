# User inputs the string and it gets stored in variable str
import sys
str = sys.argv[1]
print(str)
# counter variable to count the character in a string
counter = 0
for s in str:
      counter = counter+1
print("Length of the input string is:", counter)