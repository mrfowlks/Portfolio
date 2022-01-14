package assign1;

import java.util.stream.IntStream;

public class PerfectNumber {
  public static boolean isPerfect(int number) {
    var sum = 0;

    for(var i = 1; i <= number; i++) {
      if(number % i == 0) {
        sum += i;
      }
    }

    return sum == 2 * number;
  }

  public static boolean isPerfectFunctional(int number) {
    return IntStream.rangeClosed(1, number)
      .filter(i -> number % i == 0)
      .sum() == 2 * number;
  }
}