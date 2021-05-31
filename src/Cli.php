<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

/**
 * Приветствуем пользователя по имени
 */
function greetingByName(): string
{
    line('Welcome to the Brain Game!');
    $playerName = prompt('May I have your name?');
    line("Hello, %s!", $playerName);
    return $playerName;
}
