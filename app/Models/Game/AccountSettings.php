<?php

namespace App\Models\Game;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccountSettings extends Model
{
    protected $fillable = [
        'account_id',
        'key',
        'index',
        'value'
    ];

    public $timestamps = false;
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'account_id', 'account_id');
    }
}
