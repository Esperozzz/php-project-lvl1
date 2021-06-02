<?php

namespace Brain\Games\Even;

use function cli\line;
use function Brain\Message\win;
use function Brain\Message\getPlayerAnswer;
use function Brain\Message\askAQuestion;

define('RANDOM_MIN_NUM', 1);
define('RANDOM_MAX_NUM', 100);
define('ANSWERS_TO_WIN', 3);

/**
 * Начать новую игру
 */
function startEvenGame(string $playerName): void
{
    gameRules();

    for ($correctAnswer = 0; $correctAnswer < ANSWERS_TO_WIN;) {
        //Задать игроку вопрос
        $number = generateNumber();
        askAQuestion($number);

        //Получить от игрока ответ
        $playerAnswer = getPlayerAnswer();

        //Проверить корректность ответа
        if (!answerIsCorrect($playerAnswer, $number)) {
            lose($playerName);
        }
        line('Correct!');
        $correctAnswer++;
    }

    win($playerName);
}

/**
 * Сообщение о поражении
 */
function lose(string $name): void
{
    line('"yes" is wrong answer ;(.');
    line('Correct answer was "no". Let\'s try again, %s!', $name);
    exit();
}

/**
 * Выводим правила игры
 */
function gameRules(): void
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
}

/**
 * Генерирует случайное число
 */
function generateNumber(): int
{
    return mt_rand(RANDOM_MIN_NUM, RANDOM_MAX_NUM);
}

/**
 * Проверить корректность ответа
 */
function answerIsCorrect(string $answer, int $num): bool
{
    return ($answer === 'yes' && isEven($num)) ||
           ($answer === 'no' && !isEven($num));
}

/**
 * Проверяет число на четность
 */
function isEven(int $number): bool
{
    return $number % 2 === 0;
}
