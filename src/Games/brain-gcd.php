<?php

namespace BrainGames\Gcd;

use function cli\line;
use function cli\prompt;

function generateNumbers(): array
{
    $firstNumber = rand(1, 100);
    $secondNumber = rand(1, 100);
    return [$firstNumber, $secondNumber];
}

function calculateGcd(array $numbers): string
{
    $gcd = 1;
    for ($i = 1; $i <= min($numbers); $i++) {
        if ($numbers[0] % $i === 0 && $numbers[1] % $i === 0) {
            $gcd = $i;
        }
    }
    return (string) $gcd;
}

function start_gcd(int $rounds): bool
{
    line('Find the greatest common divisor of given numbers.');
    for ($i = 0; $i < $rounds; $i++) {
        $numbers = generateNumbers();
        $res = calculateGcd($numbers);
        line("Question: {$numbers[0]} {$numbers[1]}");
        $answer = prompt("Your answer");
        if ($res === $answer) {
            line('Correct!');
        } else {
            return false;
        }
    }
    return true;
}