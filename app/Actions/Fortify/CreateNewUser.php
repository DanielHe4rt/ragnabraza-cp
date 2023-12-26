<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        $validated = Validator::make($input, [
            'userid' => ['required', 'string', 'max:25', 'unique:login'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:login'],
            'user_pass' => $this->passwordRules(),
            'birthdate' => ['required', 'date', 'date_format:Y-m-d'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // ragnarok eu te odeio
        $validated['user_pass'] = md5($validated['user_pass']);

        return User::create($validated);
    }
}
