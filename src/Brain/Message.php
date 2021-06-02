<?php

namespace Brain\Message;

use function cli\line;
use function cli\prompt;

/**
 * Задать вопрос игроку
 */
function askAQuestion(string $text)
{
    line('Question : %s', $text);
}

/**
 * Получить ответ от игрока
 */
function getPlayerAnswer(): string
{
    return prompt('Your answer');
}

/**
 * Вывести в консоль сообщение о победе
 */
function win(string $name): void
{
    line('Congratulations, %s!', $name);
    exit();
}

/**
 * Вывести в консоль сообщение о поражении
 */
function lose(string $userName, string $coorect, string $notCorrect): void
{
    line("\"{$correct}\" is wrong answer ;(. Correct answer was \"{$notCorrect}\". ");
    line('Let\'s try again, %s!', $userName);
    exit();
}
