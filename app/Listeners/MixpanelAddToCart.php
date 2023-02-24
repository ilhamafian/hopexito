<?php

namespace App\Listeners;

use App\Events\AddedToCart;
use App\Services\MixpanelService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MixpanelAddToCart
{

    public function __construct(
        private MixpanelService $mixpanelService
    )
    {}


    public function handle(AddedToCart $event): void
    {
        $this->mixpanelService->cartAdded($event->cart);
    }
}
