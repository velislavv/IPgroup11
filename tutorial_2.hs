


------------------------- Arithmetic expressions


data Aexp = Num Integer 
		   | Var Variable
           | Aexp :+: Aexp
           | Aexp :*: Aexp
           | Aexp :-: Aexp
             deriving (Eq,Show)

eval :: Aexp -> Integer
eval (Num n)   = n
eval (a :+: b) = eval a + eval b
eval (a :*: b) = eval a * eval b
eval (a :-: b) = eval a - eval b


------------------------- Exercise 1

n1 = Num 4 :*: Num (-6)

n2 = Num 0 :-: (Num 0 :-: Num 10)

n3 = Num 3 :*: (Num 4 :+: Num 5)


------------------------- Exercise 2

natural :: Aexp -> Integer
natural (Num n)  | n>=0 =n
				 | otherwise =0
natural (a :+: b) = natural a + natural b
natural (a :*: b) = natural a * natural b
natural (a :-: b) | (natural a - natural b)<0 =0
				  | otherwise =natural a - natural b


------------------------- State as a list

type Variable = String

type State = [(Variable,Integer)]


st :: State
st = [("x",3), ("y",5), ("z",0)]


------------------------- Exercise 3

empty :: State
empty = []

get :: Variable -> State -> Integer
get v [] = 0
get v ((x,i):xs) | v==x =i
				 | otherwise = get v xs

remove :: Variable -> State -> State
remove v ((x,i):xs) | v==x =xs
					| otherwise =(x,i):remove v xs

set :: Variable -> Integer -> State -> State
set v val ((x,i):xs) | get v ((x,i):xs) == 0 =error "No such variable in state"
					 | v==x =((x, val):xs)
					 | otherwise = (x,i):set v val xs


------------------------- Exercise 4

n4 :: Aexp
n4 = (Var "x" :+: Num 6) :*: Var "y"

variables :: Aexp -> [Variable]
variables (Num n)   = []
variables (Var n) 	= [n]
variables (a :+: b) = variables a : variables b
variables (a :*: b) = variables a : variables b
variables (a :-: b) = variables a : variables b

evaluate :: Aexp -> State -> Integer
evaluate = undefined


------------------------- State as a function

type ST = Variable -> Integer


------------------------- Exercise 5

nil :: ST
nil v = undefined

one :: ST
one v = undefined

two :: ST
two v = undefined

putThree :: ST -> ST
putThree st v = undefined

three :: ST
three = putThree two

put :: Variable -> Integer -> ST -> ST
put = undefined

evalST :: Aexp -> ST -> Integer
evalST = undefined



