<?php

namespace App\Events;

use App\Models\Cart;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserHasCheckout
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Cart $cart;
    public function __construct($cart)
    {
        $this->cart = $cart;
    }


    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
