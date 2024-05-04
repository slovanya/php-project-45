<?php

namespace BrainGames\Calc;

use function cli\line;
use function cli\prompt;

function calculate(string $expr): string
{
    $tokens = explode(' ', $expr);
    switch ($tokens[1]) {
        case '+':
            return (string) ((int) $tokens[0] + (int) $tokens[2]);
        case '-':
            return (string) ((int) $tokens[0] - (int) $tokens[2]);
        case '*':
            return (string) ((int) $tokens[0] * (int) $tokens[2]);
        default:
            return '';
    }
}

function generateExpr(): string
{
    $firstNumber = rand(1, 100);
    $secondNumber = rand(1, 100);
    $operands = ['+', '-', '*'];
    $operand = $operands[array_rand($operands)];
    return "{$firstNumber} {$operand} {$secondNumber}";
}

function start_calc(int $rounds): bool
{
    line('What is the result of the expression?');
    for ($i = 0; $i < $rounds; $i++) {
        $expr = generateExpr();
        $res = calculate($expr);
        line("Question: {$expr}");
        $answer = prompt("Your answer");
        if ($res === $answer) {
            line('Correct!');
        } else {
            return false;
        }
    }
    return true;
}
