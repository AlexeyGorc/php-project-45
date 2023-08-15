<?php

namespace BrainGames\Calc;

use function BrainGames\Engine\run;

use const BrainGames\Engine\ROUNDS;

const RULES = "What is the result of the expression?";

function getCalc(int $num1, int $num2, string $operation): int|string
{
    return match ($operation) {
        "+" => $num1 + $num2,
        "-" => $num1 - $num2,
        "*" => $num1 * $num2,
        default => "Incorrect",
    };
}

function runCalc(): void
{
    $gameData = function () {
        $operators = ['+', '-', '*'];
        $num1 = random_int(1, 50);
        $num2 = random_int(1, 50);
        $operator = $operators[array_rand($operators, 1)];
        $correctAnswer = getCalc($num1, $num2, $operator);
        $question = ("{$num1} {$operator} {$num2}");
        return [$question, $correctAnswer];
    };
    run(RULES, $gameData);
}
