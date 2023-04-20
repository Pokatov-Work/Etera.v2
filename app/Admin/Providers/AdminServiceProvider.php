<?php

namespace App\Admin\Providers;

use App\Admin\Composers\AdminLayoutComposer;
use App\Admin\View\AdminPanel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Настройка доступов
     *
     * @var array
     */
    protected $policies = [

    ];

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [
            AdminRouteServiceProvider::class,
        ];
    }

    /**
     * Регистрация привязки в контейнере.
     *
     * @return void
     */
    public function register()
    {
        parent::register();

        $this->registerProviders();

        $this->app->singleton(AdminPanel::class, static function () {
            return new AdminPanel();
        });
    }

    /**
     * Register provider.
     *
     * @return $this
     */
    public function registerProviders(): self
    {
        foreach ($this->provides() as $provide) {
            $this->app->register($provide);
        }

        return $this;
    }

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        View::composer('admin.index', AdminLayoutComposer::class);
    }
}
