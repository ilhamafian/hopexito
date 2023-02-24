<?php

namespace App\Events;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PurchaseCompleted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public Order $order;
    public function __construct($order)
    {
        $this->order = $order;
    }


    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
