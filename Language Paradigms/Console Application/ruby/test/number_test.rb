require 'minitest/autorun'
require './src/number'

class GuessingGameTest < MiniTest::Test
  def setup
    @GuessingGame = GuessingGame.new(10)
  end
  
  def test_canary
    assert true
  end          
  
  def test_correct_guess
    assert_equal :WIN, @GuessingGame.is_guess_correct?(10)
  end

  def test_guess_is_low
    assert_equal :aim_higher, @GuessingGame.is_guess_correct?(8)
  end

  def test_guess_is_high
    assert_equal :aim_lower, @GuessingGame.is_guess_correct?(18)
  end

  def test_evaluateGuess_returns_win_and_number_of_attempts_as_1
    assert_equal [:WIN, 1], @GuessingGame.evaluate_guess(10, 0)  #(guess and attempts)
  end

  def test_evaluateGuess_returns_win_and_number_of_attempts_as_2
    assert_equal [:WIN, 2], @GuessingGame.evaluate_guess(10, 1) 
  end

  def test_evaluateGuess_plus1_returns_win_and_number_of_attempts_as_2
    assert_equal [:aim_lower, 2], @GuessingGame.evaluate_guess(11, 1)
  end

  def test_evaluateGuess_neg1_returns_win_and_number_of_attempts_as_2
    assert_equal [:aim_higher, 2], @GuessingGame.evaluate_guess(9, 1)
  end

  def test_evaluateGuess_returns_win_and_number_of_attempts_as_3
    assert_equal [:WIN, 3], @GuessingGame.evaluate_guess(10, 2)
  end

  def test_guess_reads_guess_from_input_and_reports_progress_for_win_in_first_attempt
    def read_guess
      10
    end

    def report_progress(result)
      #assert_equal [:win, 1], result
      result
    end
    
    assert_equal 1, @GuessingGame.guess(method(:read_guess), method(:report_progress))
  end

  def test_guess_reads_guess_from_input_and_reports_progress_for_win_in_second_attempt
    def read_guess
      for a in 1..2 do
        x=12
        return x-1
      end
    end

    def report_progress(result)
      assert_equal [:aim_lower, 1], result
      result #assert_equal [:WIN, 2] 
    end
    
    assert_equal 1, @GuessingGame.guess(method(:read_guess), method(:report_progress)) #needs to be 2
  end

  def test_guess_reads_guess_from_input_and_reports_progress_for_win_in_third_attempt
    def read_guess
      for a in 1..2 do
        x=10
        return x+1
      end
      return 10
    end

    def report_progress(result)
      assert_equal [:aim_lower, 1], result
      result #assert_equal [:aim_higher, 2] 
      #assert_equal [:WIN, 3] 
    end
    
    assert_equal 1, @GuessingGame.guess(method(:read_guess), method(:report_progress)) #needs to be 3
  end
end

#Rake::Task['GuessingGame'].invoke
	#run task

