<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS = 3;

function run(string $rule, callable $newRound): void
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, {$name}");
    line($rule);

    for ($i = 0; $i < ROUNDS; $i += 1) {
        [$question, $correctAnswer] = $newRound();

        line("Question: {$question}");
        $userAnswer = prompt("Your answer");

        if ($userAnswer == $correctAnswer) {
            line("Correct!");
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}!");
}
