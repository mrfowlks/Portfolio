package assign1;

import org.junit.jupiter.api.Assertions;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;
import static org.junit.jupiter.api.Assertions.*;

interface PerfectNumberTest {
  boolean isPerfect(int number);

  @Test
  default void canary() { assertTrue(true); }

  @Test
  default void someNumbersThatArePerfect() {
    assertAll(
      () -> assertTrue(isPerfect(6)),
      () -> assertTrue(isPerfect(28)),
      () -> assertTrue(isPerfect(496))
    );
  }

  @Test
  default void someNumbersThatAreNotPerfect() {
    assertAll (
      () -> assertFalse(isPerfect(-1)),
      () -> assertFalse(isPerfect(1)),
      () -> assertFalse(isPerfect(5)),
      () -> assertFalse(isPerfect(7)),
      () -> assertFalse(isPerfect(27)),
      () -> assertFalse(isPerfect(29))
    );
  }
}

class PerfectNumberImperativeTest implements PerfectNumberTest {

  @Override
  public boolean isPerfect(int number) {
    return PerfectNumber.isPerfect(number);
  }
}

class PerfectNumberFunctionalTest implements PerfectNumberTest {

  @Override
  public boolean isPerfect(int number) {
    return PerfectNumber.isPerfectFunctional(number);
  }
}