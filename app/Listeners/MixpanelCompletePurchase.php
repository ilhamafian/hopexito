<?php

namespace App\Listeners;

use App\Events\PurchaseCompleted;
use App\Services\MixpanelService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MixpanelCompletePurchase
{

    public function __construct(
        private MixpanelService $mixpanelService,
    )
    {}



    public function handle(PurchaseCompleted $event): void
    {
        $this->mixpanelService->purchaseComplete($event->order);
    }
}
