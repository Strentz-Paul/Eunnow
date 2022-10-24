<?php

declare(strict_types=1);

namespace App\Helper;

final class StringHelper
{
    /**
     * @param string $needle
     * @param string $string
     * @return string
     */
    public static function removeTextFromString(string $needle, string $string): string
    {
        return str_replace($needle, "", $string);
    }
}
