<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

define('RANDOM_MIN_NUM', 1);
define('RANDOM_MAX_NUM', 100);
define('ANSWERS_TO_WIN', 3);

/**
 * Начать новую игру
 */
function startEvenGame(string $playerName): void
{
    reportGameRules();
    
    for($correctAnswer = 0; $correctAnswer < ANSWERS_TO_WIN; ) {
        $answerIsCorrect = askQuestion(generateNumber());
        if (!$answerIsCorrect) {
            lose($playerName);
            exit();
        }
        $correctAnswer++;
    }
    ifWin($playerName);
}

/**
 * Выводим правила игры
 */
function reportGameRules(): void
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
}

/**
 * Задать вопрос
 */
function askQuestion(int $num): bool
{
    line('Question : %u', $num);
    $answer = prompt('Your answer');
    $result = answerIsCorrect($answer, $num);
    if ($result) {
        line('Correct!');
    }
    return $result;
}

/**
 * Сообщение о поражении
 */
function lose(string $name): void
{
    line('"yes" is wrong answer ;(.');
    line('Correct answer was "no". Let\'s try again, %s!', $name);
}

/**
 * Сообщение о победе
 */
function ifWin(string $name): void
{
    line('Congratulations, %s!', $name);
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
