<?php

namespace App\Models\Game;

use App\Models\User;
use App\ValueObjects\Game\ItemCards;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Storage extends Model
{
    protected $table = 'storage';

    protected $fillable = [
        'account_id',
        'nameid', // itemid
        'amount',
        'refine',
        'identify',
        'card0',
        'card1',
        'card2',
        'card3',
    ];

    protected $casts = [
        'refine' => 'int',
        'amount' => 'int',
        'identify' => 'bool',
    ];

    protected $appends = [
        'hasCards',
    ];

    public function getHasCardsAttribute(): bool
    {
        return $this->attributes['card0']
            || $this->attributes['card1']
            || $this->attributes['card2']
            || $this->attributes['card3'];
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'nameid');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'account_id', 'account_id');
    }

    public function cards(): ItemCards
    {
        $cards = array_filter([
            $this->attributes['card0'],
            $this->attributes['card1'],
            $this->attributes['card2'],
            $this->attributes['card3'],
        ], fn ($item) => $item !== 0);

        $items = Item::query()
            ->whereIn('id', $cards)
            ->get()
            ->toArray();

        return new ItemCards($cards, $items);
    }
}
