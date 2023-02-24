<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Mixpanel;

class MixpanelService
{
    private Mixpanel $mixpanel;

    public function __construct()
    {
        $this->mixpanel = Mixpanel::getInstance(config('services.mixpanel.token'),[
            'host'=>'api.mixpanel.com',
        ]);
    }


    public function addUser(Authenticatable $user): void
    {
        $this->mixpanel->people->set($user->id,[
            '$first_name' => $user->name,
            '$email' => $user->email,
        ], $ip = 0);

        $this->mixpanel->track('user_registered',[
            'user_id' => $user->id,
            'email' => $user->email,
        ]);


    }

    public function userLogin(Authenticatable $user): void
    {
        $this->mixpanel->identify($user->id);
        $this->mixpanel->track('user_login',[
            'user_id' => $user->id,
            'email' => $user->email,
        ]);
    }

    public function purchaseComplete(Order $order): void
    {
        $this->mixpanel->identify(Auth::user()->id);
        $this->mixpanel->track('purchase_completed',[
            'amount' => $order->amount,
        ]);
    }

    public function userCheckout($cart): void
    {
        $this->mixpanel->identify(Auth::user()->id);
        $this->mixpanel->track('user_checkout',[
            'price' => $cart->price,


        ]);
    }

    public function cartAdded($cart): void
    {
        $this->mixpanel->identify(Auth::user()->id);
        $this->mixpanel->track('added_to_cart',[

            'product_title' => $cart->name,
            'product_price' =>$cart->price,
//            'product_color' =>$cart->options['color'],
//            'product_size' =>$cart->options['size'],

        ]);
    }

}
