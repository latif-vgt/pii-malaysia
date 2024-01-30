<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Response::macro('api', function ($success = true, $message = '', $data = [], $httpCode = 200) {
            return response()->json([
                'success' => $success,
                'message' => $message,
                'data' => $data
            ], $httpCode);
        });

        // helper

        $this->app->bind(
            'error.helper',
            \App\Helpers\ErrorHelper::class
        );

        $this->app->bind(
            'string.helper',
            \App\Helpers\StringHelper::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }

        Paginator::useBootstrapFive();
    }
}
