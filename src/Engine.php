<?php

namespace BrainGames\Engine;

use function cli\line;

function result(bool $res, string $name): void
{
    if ($res === true) {
        line('Congratulations, %s!', $name);
    } elseif ($res === false) {
        line('Let\'s try again, %s!', $name);
    }
}