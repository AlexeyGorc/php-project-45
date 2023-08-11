<?php
namespace BrainGames\Prime;

use function BrainGames\Engine\run;

use const BrainGames\Engine\ROUNDS;

const RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $num): bool
{
    if ($num < 2 || ($num % 2 === 0 && $num !== 2)) {
        return false;
    }
    for ($div = 2; $div <= ceil($num / 2); $div += 1) {
        if ($num % $div === 0 && $num !== $div) {
            return false;
        }
    }
    return true;
}

function gamePrime(): void
{
    $gameData = function () {
        $question = random_int(1, 100);
        $correctAnswer = isPrime($question) ? 'yes' : 'no';

        return [$question, $correctAnswer];
    };

    run(RULES, $gameData);
}
