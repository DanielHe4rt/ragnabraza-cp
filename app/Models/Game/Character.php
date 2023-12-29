<?php

namespace App\Models\Game;

use App\Data\CharacterSettings;
use App\Enums\Game\JobEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property CharacterSettings $settings
 */
class Character extends Model
{
    protected $table = 'char';

    protected $primaryKey = 'char_id';

    public $timestamps = false;

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
        'settings'
    ];

    protected $casts = [
        'class' => JobEnum::class,
        'settings' => CharacterSettings::class,
    ];

    protected function settings(): Attribute
    {
        $getter = $this->attributes['settings']
            ? CharacterSettings::from($this->attributes['settings'])
            : CharacterSettings::default();

        return Attribute::make(
            get: fn() => $getter
        );
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'account_id', 'account_id');
    }
}
