<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

/**
 * @return void
 */
function greetingByName(): void
{
    line('Welcome to the Brain Game!');
    $playerName = prompt('May I have your name?');
    line("Hello, %s!", $playerName);
}
