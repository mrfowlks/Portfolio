require 'minitest/autorun'
require './src/perfect_number'

class Test < MiniTest::Test
  def test_canary
    assert true
  end
  
  def test_6_is_perfect
    assert is_perfect_imperative(6)
    assert is_perfect_functional(6)
  end
  def test_28_is_perfect
    assert is_perfect_imperative(28)
    assert is_perfect_functional(28)
  end
  def test_496_is_perfect
    assert is_perfect_imperative(496)
    assert is_perfect_functional(496)
  end

  def test_minus_1_is_not_perfect
    assert !is_perfect_imperative(-1)
    assert !is_perfect_functional(-1)
  end
  def test_27_is_not_perfect
    assert !is_perfect_imperative(27)
    assert !is_perfect_functional(27)
  end
  def test_7_is_not_perfect
    assert !is_perfect_imperative(7)
    assert !is_perfect_functional(7)
  end
  def test_5_is_not_perfect
    assert !is_perfect_imperative(5)
    assert !is_perfect_functional(5)
  end
end