<?php

namespace BrainGames\Progression;

use function cli\line;
use function cli\prompt;

function generateProgression(int $firstNumber, int $increment, int $length): array
{
    $row = [];
    for ($i = $firstNumber; $i < $firstNumber + $increment * $length; $i += $increment) {
        $row[] = $i;
    }
    return $row;
}

function getPokedProgression(array $row, int $place): string
{
    $row[$place] = '..';
    return implode(' ', $row);
}

function start_Progression(int $rounds): bool
{
    line('What number is missing in the progression?');
    for ($i = 0; $i < $rounds; $i++) {
        $firstNumber = rand(1, 100);
        $length = rand(5, 10);
        $increment = rand(1, 5);
        $row = generateProgression($firstNumber, $increment, $length);
        $place = rand(0, $length);
        $pokedNumber = $firstNumber + $increment * $place;
        $res = (string) $pokedNumber;
        $pokedRow = getPokedProgression($row, $place);
        line("Question: {$pokedRow}");
        $answer = prompt("Your answer");
        if ($res === $answer) {
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $res);
            return false;
        }
    }
    return true;
}
