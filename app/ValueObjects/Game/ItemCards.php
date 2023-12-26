<?php

namespace App\ValueObjects\Game;

class ItemCards
{
    public function __construct(
        private array $cardSlots,
        private array $equipedCards
    ) {
    }

    public function getEquipedCards(): array
    {
        $equipedCards = [];
        foreach ($this->equipedCards as $equipedCard) {
            $equipedCards[] = [
                'name' => $equipedCard['name_english'],
                'amount' => $this->getAmountOfSpecificCard($equipedCard['id']),
            ];
        }

        return $equipedCards;
    }

    public function getEquipedCardsCount(): int
    {
        return count($this->cardSlots);
    }

    private function getAmountOfSpecificCard(int $cardId): int
    {
        return count(array_filter($this->cardSlots, fn ($slot) => $slot == $cardId));
    }
}
