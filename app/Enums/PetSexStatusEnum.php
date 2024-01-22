<?php

namespace App\Enums;

enum PetSexStatusEnum
{
    const MALE = 'male';
    const FEMALE = 'female';
    const UNKNOWN = 'unknown';
    const CASTRATED = 'castrated';
    const STERILIZED = 'sterilized';

    const STATUSES = [
        self::MALE => 'Самец',
        self::FEMALE => 'Самка',
        self::UNKNOWN => 'Не известен',
        self::CASTRATED => 'Кастрирован',
        self::STERILIZED => 'Стерилизована',
    ];
    static function all(): array
    {
        return [...self::STATUSES];
    }

    static function getStatus($selector): string
    {
        return self::STATUSES[$selector];
    }
}
