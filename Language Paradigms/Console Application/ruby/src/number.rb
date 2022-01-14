class Screen
  
  def cls
    puts ("\n" * 24)
    puts "\a"
  end

  def pause
    STDIN.gets
  end
end

class GuessingGame
  def initialize(target)
    @target = target
  end

  def display_greeting

    Console_Screen.cls
    print "\t\t  Welcome!" +"\n\nPress Enter to " +
               "continue."

    Console_Screen.pause
  end

  def is_guess_correct?(guess)
    [:WIN, :aim_higher, :aim_lower][@target <=> guess]
  end

  def evaluate_guess(guess, attempts)
    return [is_guess_correct?(guess), attempts + 1]
  end

  def guess(read_guess, report_progress)
    report_progress.call(evaluate_guess(read_guess.call(), 0))[1]
  end
end

#Console = Screen.new
#SQ = GuessingGame.new
#SQ.display_greeting