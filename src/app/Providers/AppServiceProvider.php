<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(RegisterResponse::class, function () {
        return new class implements RegisterResponse {
            public function toResponse($request)
            {
                return redirect()->route('verification.message');
            }
        };
    });
    }
}
