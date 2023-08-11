<?php

namespace BrainGames\Progression;

use function BrainGames\Engine\run;

const RULES = "What number is missing in the progression?";

function progression(int $length, int $firstNum, int $step): array
{
    $progression = [];

    for ($i = 0; $i <= $length; $i += 1) {
        $nextNum = $firstNum + ($step * $i);
        $progression[] = $nextNum;
    }
    return $progression;
}

function gameProgression()
{

    $gameData = function () {
        $length = random_int(5, 10);
        $firstNum = random_int(1, 20);
        $step = random_int(1, 10);
        $progression = progression($length, $firstNum, $step);
        $hiddenIndex = rand(0, count($progression) - 1);
        $correctAnswer = $progression[$hiddenIndex];
        $progression[$hiddenIndex] = '..';
        $question = implode(' ', $progression);

        return [$question, $correctAnswer];
    };

    run(RULES, $gameData);
}
