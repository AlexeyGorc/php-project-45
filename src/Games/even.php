<?php
namespace BrainGames\Even;

use function BrainGames\Engine\run;

use const BrainGames\Engine\ROUNDS;

const RULES = "Answer \"yes\" if the number is even, otherwise answer \"no\".";

function isEven(int $num): int
{
    return $num % 2 === 0;
}

function gameEven(): void
{
    /**
     * @throws \Exception
     */
    $gameData = function () {
            $question = random_int(1, 100);
            $correctAnswer = isEven($question) ? 'yes' : 'no';

            return [$question, $correctAnswer];
    };

        run(RULES, $gameData);
}
