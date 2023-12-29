<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\Game\AccountSexEnum;
use App\Models\Game\Character;
use App\Models\Game\Storage;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property-read string $userid
 * @property AccountSexEnum $sex
 * @property Carbon $lastlogin
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $table = 'login';

    protected $primaryKey = 'account_id';

    protected $fillable = [
        'userid',
        'user_pass',
        'email',
        'birthdate',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'sex' => AccountSexEnum::class,
        'lastlogin' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
        'isOnline',
    ];

    public function getAuthPassword()
    {
        return $this->user_pass;
    }

    public function isOnline(): bool
    {
        // TODO: 1 minute caching (?)
        return $this->characters()
            ->where('online', '=', true)
            ->exists();
    }

    public function characters(): HasMany
    {
        return $this->hasMany(Character::class, 'account_id', 'account_id');
    }

    public function storageItems(): HasMany
    {
        return $this->hasMany(Storage::class, 'account_id', 'account_id');
    }

    public function getCashPoints(): int
    {
        return DB::table('acc_reg_num')
            ->where('account_id', '=', $this->attributes['account_id'])
            ->where('key', '=', '#CASHPOINTS')
            ->first()
            ?->value ?? 0;
   }

}
