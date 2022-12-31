<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Spatie\Permission\Models\Role;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        if ($input['role_id'] == 2) 
        {
            $artist =  User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'role_id' => $input['role_id'],
                'password' => Hash::make($input['password']),
            ]);
            return $artist->assignRole('artist');
        }
        else
        {
            $customer =  User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'role_id' => $input['role_id'],
                'password' => Hash::make($input['password']),
            ]);
            return $customer->assignRole('customer');
        }
    }
}
