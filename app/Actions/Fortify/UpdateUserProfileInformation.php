<?php

namespace App\Actions\Fortify;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCollection;
use App\Models\Wallet;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:10000'],
            'phone' => ['nullable', 'numeric', 'min:10'],
            'address',
            'postcode' =>['numeric'],
            'state'
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if (isset($input['name'])){
            Product::where('shopname', Auth::user()->name)->update(['shopname' => $input['name']]);
            Cart::where('shopname', Auth::user()->name)->update(['shopname' => $input['name']]);
            Order::where('name', Auth::user()->name)->update(['name' => $input['name']]);
            ProductCollection::where('name', Auth::user()->name)->update(['name' => $input['name']]);
            Wallet::where('name', Auth::user()->name)->update(['name' => $input['name']]);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'address' => $input['address'],
                'postcode' => $input['postcode'],
                'state' => $input['state']
            ])->save();
        }
    }
    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
