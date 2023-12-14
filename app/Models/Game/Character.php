<?php

namespace App\Models\Game;

use App\Enums\Game\JobEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Character extends Model
{
    protected $table = 'char';

    protected $primaryKey = 'char_id';

    protected $fillable = [
        'name',
        'class',
        'account_id',
        'base_level',
        'job_level',
        'zeny',
        'guild_id',
        'online',
        'last_login',
    ];

    protected $casts = [
        'class' => JobEnum::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'account_id', 'account_id');
    }
}
