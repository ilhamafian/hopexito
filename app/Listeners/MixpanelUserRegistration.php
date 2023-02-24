<?php

namespace App\Listeners;

use App\Services\MixpanelService;
use Illuminate\Auth\Events\Registered;

class MixpanelUserRegistration
{

    public function __construct(
        private MixpanelService $mixpanelService
    ){}

    public function handle(Registered $event): void
    {
        $this->mixpanelService->addUser($event->user);

    }
}
