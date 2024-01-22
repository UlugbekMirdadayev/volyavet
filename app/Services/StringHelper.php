<?php

declare(strict_types=1);

namespace App\Services;

class StringHelper
{

    private static function separationFirst(string $string): string
    {
        return mb_substr($string, 0, 1);
    }

    public static function transformFIO(string $lastName, string $firstName, string $middleName): string
    {
        return $lastName . ' ' . self::separationFirst($firstName) . '. ' . self::separationFirst($middleName) . '.';
    }

}
