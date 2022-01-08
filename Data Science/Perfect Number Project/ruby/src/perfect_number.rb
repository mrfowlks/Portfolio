def is_perfect_imperative(number)
  sum = 0 #Feedback: a blank line after this line, please
  for i in 1...number
    sum += i  if number % i == 0
  end #Feedback: a blank line after this line, please
  sum == number
end 

def is_perfect_functional(number)
  number == (1...number).select {|i| number % i == 0}.inject(:+)
end 
