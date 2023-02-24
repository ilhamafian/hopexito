<?php

namespace App\Providers;

use App\Events\AddedToCart;
use App\Events\PurchaseCompleted;
use App\Events\UserHasCheckout;
use App\Listeners\MixpanelAddToCart;
use App\Listeners\MixpanelCompletePurchase;
use App\Listeners\MixpanelLogin;
use App\Listeners\MixpanelUserCheckout;
use App\Listeners\MixpanelUserRegistration;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            MixpanelUserRegistration::class,
        ],
        Login::class => [
            MixpanelLogin::class,
        ],
        PurchaseCompleted::class => [
            MixpanelCompletePurchase::class,
        ],
        UserHasCheckout::class => [
            MixpanelUserCheckout::class,
        ],
        AddedToCart::class => [
            MixpanelAddToCart::class,
        ]

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
