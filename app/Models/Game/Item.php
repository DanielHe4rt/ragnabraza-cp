<?php

namespace App\Models\Game;

use App\Enums\Game\ItemTypeEnum;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item_db';

    protected $fillable = [
        'id',
        'name_english',
        'type',
    ];

    protected $casts = [
        'type' => ItemTypeEnum::class,
    ];
}
