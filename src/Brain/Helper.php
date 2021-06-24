<?php

namespace Brain\Helper;

define('RANDOM_MIN_NUM', 1);
define('RANDOM_MAX_NUM', 200);

/**
 * Генерирует случайное число
 */
function generateNumber(): int
{
    return mt_rand(RANDOM_MIN_NUM, RANDOM_MAX_NUM);
}
