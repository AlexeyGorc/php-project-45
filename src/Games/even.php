<?php
namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\getName;

const ROUND = 3;
function isEven(): bool
{
    $name = getName();
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");
    for ($i = 0; $i < ROUND; $i++) {
        $randomNumber = rand(1, 100);
        $isEven = $randomNumber % 2 === 0;
        $correctAnswer = $isEven ? 'yes' : 'no';
        line("Question: {$randomNumber}");
        $userAnswer = trim(prompt("Your answer"));

        if ($userAnswer !== $correctAnswer) {
            line("{$userAnswer} is wrong answer ;(. Correct answer was {$correctAnswer}.");
            line("Let's try again, {$name}!");
            return false;
        } else {
            line("Correct!");
        }
    }
    line("Congratulations, {$name}!");
    return true;
}
