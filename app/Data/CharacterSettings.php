<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class CharacterSettings extends Data
{
    public function __construct(
        public bool $showCharacterOnline,
        public bool $showCharacterMap,
        public bool $showCharacterPage,
        public bool $showCharacterEquipments,
    )
    {
    }

    public static function default(): self
    {
        return new self(
            showCharacterOnline: false,
            showCharacterMap: false,
            showCharacterPage: false,
            showCharacterEquipments: false
        );
    }

    public static function fromRequest(array $requestPayload): self
    {
        return new self(
            showCharacterOnline: $requestPayload['showCharacterOnline'] ?? false,
            showCharacterMap: $requestPayload['showCharacterMap'] ?? false,
            showCharacterPage: $requestPayload['showCharacterPage'] ?? false,
            showCharacterEquipments: $requestPayload['showCharacterEquipments'] ?? false,
        );
    }
}
