<?php

namespace App\Enums\Game;

enum AccountSexEnum: string
{
    case Male = 'M';
    case Female = 'F';

    public function getLabel(): string
    {
        return match($this) {
            self::Male => 'Male',
            self::Female => 'Female',
        };
    }
}
