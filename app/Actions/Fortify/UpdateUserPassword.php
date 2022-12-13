<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class UpdateUserPassword implements UpdatesUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and update the user's password.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        /* If no password exist */
        if (!is_null(Auth::user()->password)) {
            Validator::make($input, [
                'current_password' => ['required', 'string', 'current_password:web'],
                'password' => $this->passwordRules(),
            ], [
                'current_password.current_password' => __('The provided password does not match your current password.'),
            ])->validateWithBag('updatePassword');

            $user->forceFill([
                'password' => Hash::make($input['password']),
            ])->save();
        }
        else {
            Validator::make($input,['password'=> $this->passwordRules()])->validateWithBag('updatePassword');
            $user->forceFill([
                'password' => Hash::make($input['password']),
            ])->save();
        }
    }
}
