<?php

namespace BrainGames\Prime;

use function cli\line;
use function cli\prompt;

function isPrime(int $number): string
{
    if ($number === 1 || $number === 2) {
        return 'yes';
    }
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            return 'no';
        }
    }
    return 'yes';
}

function start_Prime(int $rounds): bool
{
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    for ($i = 0; $i < $rounds; $i++) {
        $number = rand(1, 100);
        $res = isPrime($number);
        line("Question: {$number}");
        $answer = prompt("Your answer");
        if ($res === $answer) {
            line('Correct!');
        } else {
            return false;
        }
    }
    return true;
}
