<?php

namespace App\Hashing;

use App\Models\User;
use Illuminate\Hashing\BcryptHasher;

class RagnarokPasswordHasher extends BcryptHasher
{
    public function check($value, $hashedValue, array $options = []): bool
    {
        $value = match (ServerHashesEnum::from(config('ragnarok.password_encryption'))) {
            ServerHashesEnum::PLAINTEXT => $value,
            ServerHashesEnum::MD5 => md5($value)
        };

        return User::query()
            ->where('user_pass', $value)
            ->exists();
    }
}
