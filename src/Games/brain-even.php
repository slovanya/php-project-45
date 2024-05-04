<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function start_even(int $rounds): bool
{
    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($i = 0; $i < $rounds; $i++) {
        $x = rand(1, 100);
        if ($res = $x % 2 === 1) {
            $res = 'no';
        } else {
            $res = 'yes';
        }
        line("Question: {$x}");
        $answer = prompt("Your answer");

        if ($res === $answer) {
            line('Correct!');
        } else {
            return false;
        }
    }
    return true;
}
