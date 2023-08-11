<?php

namespace BrainGames\Progression;

use function BrainGames\Engine\run;

use const BrainGames\Engine\ROUNDS;

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

function gameProgression(): void
{
    /**
     * @throws \Exception
     */
    $gameData = function () {
        $length = random_int(5, 10);
        $firstNum = random_int(1, 30);
        $step = random_int(1, 10);
        $progression = progression($length, $firstNum, $step);
        $maxHiddenIndex = count($progression) - 1;
        $hiddenIndex = random_int(0, $maxHiddenIndex);
        $correctAnswer = $progression[$hiddenIndex];
        $progression[$hiddenIndex] = '...';
        $question = implode(' ', $progression);

        return [$question, $correctAnswer];
    };

    run(RULES, $gameData);
}
