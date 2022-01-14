def functional_perf(number):
    return number == sum(i for i in range(1, number) if number % i == 0)

def imperative_perf(number):
    sum = 0;
    for i in range(1, number):
        if number % i == 0:
            sum += i
    return sum == number