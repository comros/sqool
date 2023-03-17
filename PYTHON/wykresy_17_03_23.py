import matplotlib.pyplot as pl
import random

def funkcja_kwadratowa(a, b, c, X):
    Y = []
    for x in X:
        y = a*x*x + b*x+c
        Y.append(y)
    return Y

X = list(range(-100,100))

a = random.randint(-100,100)
b = random.randint(-100,100)
c = random.randint(-100,100)

Y = funkcja_kwadratowa(a,b,c,X)

pl.plot(X, Y)
pl.grid(True)
pl.show()
