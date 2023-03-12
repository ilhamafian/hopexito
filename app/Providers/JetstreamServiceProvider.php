<?php

namespace App\Providers;
use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Blade;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerComponent('button-utility');
        $this->registerComponent('button-custom');
        $this->registerComponent('searchbar');
        $this->registerComponent('footer');
        $this->registerComponent('admin-sidebar');
        $this->registerComponent('session-message');
        $this->registerComponent('admin-card');
        $this->registerComponent('admin-layout');
        $this->registerComponent('modal-custom');
        $this->registerComponent('modal-custom-2');
        $this->registerComponent('modal-custom-3');
        $this->registerComponent('admin-nav');
        $this->registerComponent('header');
        $this->registerComponent('carousel');
        $this->registerComponent('wallet-card');
        $this->registerComponent('lightning');
        $this->registerComponent('gradient-card');
        $this->registerComponent('title');
        $this->registerComponent('admin-header');
    }
    protected function registerComponent(string $component)
    {
        Blade::component('jetstream::components.'.$component, 'jet-'.$component);
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);
    }
    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
