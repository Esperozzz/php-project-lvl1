<?php

namespace Brain\Message;

use function cli\line;
use function cli\prompt;

function getAnswer(): string
{
    return prompt('Your answer');
}

function win(string $name): void
{
    line('Congratulations, %s!', $name);
}

function lose(string $userName, string $coorect, string $notCorrect): void
{
    line("\"{$correct}\" is wrong answer ;(. Correct answer was \"{$notCorrect}\". ");
    line('Let\'s try again, %s!', $userName);
}

function question(string $text)
{
    line('Question : %s', $text);
}
