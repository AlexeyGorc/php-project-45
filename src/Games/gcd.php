<?php

namespace BrainGames\Gcd;

use function BrainGames\Engine\run;

use const BrainGames\Engine\ROUNDS;

const RULES = "Find the greatest common divisor of given numbers.";

function findGreatestDivisor(int $num1, int $num2)
{
    $min = min($num1, $num2);
    for ($divisor = $min; $divisor > 0; $divisor -= 1) {
        if ($num1 % $divisor === 0 && $num2 % $divisor === 0) {
            return $divisor;
        }
    }
    return true;
}

/**
 * @throws \Exception
 */
function runGcd()
{
    $gameData = function () {
        $num1 = random_int(1, 100);
        $num2 = random_int(1, 100);

        $question = "{$num1} {$num2}";
        $correctAnswer = findGreatestDivisor($num1, $num2);

        return [$question, $correctAnswer];
    };

    run(RULES, $gameData);
}
