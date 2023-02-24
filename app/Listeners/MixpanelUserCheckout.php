<?php

namespace App\Listeners;

use App\Events\UserHasCheckout;
use App\Services\MixpanelService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MixpanelUserCheckout
{

    public function __construct(
        private MixpanelService $mixpanelService,
    )
    {}


    public function handle(UserHasCheckout $event): void
    {
        $this->mixpanelService->userCheckout($event->cart);
    }
}
