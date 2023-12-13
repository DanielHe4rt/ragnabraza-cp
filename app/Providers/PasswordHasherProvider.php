<?php

namespace App\Providers;

use App\Hashing\RagnarokPasswordHasher;
use Illuminate\Support\ServiceProvider;

class PasswordHasherProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->extend('hash', function () {
            return new RagnarokPasswordHasher();
        });
    }
}
