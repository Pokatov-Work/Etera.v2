<?php

namespace App\Admin\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class AdminRouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @internal param Router $router
     */
    public function boot()
    {
        Route::middlewareGroup('admin', [

        ]);
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        /*
         * Application
         */
        if (file_exists(base_path('routes/admin.php'))) {
            Route::domain((string) config('admin.domain'))
                ->middleware(config('admin.middleware.private'))
                ->group(base_path('routes/admin.php'));
        }
    }
}
