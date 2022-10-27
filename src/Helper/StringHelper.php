<?php

declare(strict_types=1);

namespace App\Helper;

use Doctrine\Common\Collections\Collection;

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


    /**
     * @param Collection $numbers
     * @return string
     */
    public static function displayNumbers(Collection $numbers): string
    {
        $array = $numbers->toArray();
        sort($array);
        return implode(' ', $array);
    }
}
