<?php

namespace App\Listeners;

use App\Services\MixpanelService;
use Illuminate\Auth\Events\Login;

class MixpanelLogin
{
    public function __construct(
        private MixpanelService $mixpanelService
    ){}

    public function handle(Login $event): void
    {

        $this->mixpanelService->userLogin($event->user);

    }
}
