<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Blade;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Features;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\VerifyEmailResponse;
use Laravel\Fortify\Contracts\VerifyEmailViewResponse;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(RegisterResponse::class, function () {
        return new class implements RegisterResponse {
            public function toResponse($request)
            {
                return redirect()->route('verification.message');
            }
        };
    });

    $this->app->singleton(LoginResponse::class, function () {
        return new class implements LoginResponse {
    public function toResponse($request) {
        return redirect('/products');
        }};
    });

    $this->app->singleton(VerifyEmailResponse::class, function () {
        return new class implements VerifyEmailResponse {
    public function toResponse($request) {
        return redirect('/products');
        }};
    });

    $this->app->singleton(VerifyEmailViewResponse::class, function () {
        return new class implements VerifyEmailViewResponse {
    public function toResponse($request) {
        return view('auth.verify-email');
        }};
    });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);

        Fortify::registerView(function () {
            return view('auth.register');
    });

        Fortify::loginView(function () {
            return view('auth.login');
    });

        Fortify::verifyEmailView(function () {
            return view('auth.verify-email');
    });

    RateLimiter::for('login', function (Request $request) {
        $email = (string) $request->email;
        return Limit::perMinute(10)->by($email . $request->ip());
    });

    // $this->app->singleton(RegisterResponse::class, function () {
    //     return new class implements RegisterResponse {
    // public function toResponse($request) {
    //     return redirect('/email/verify-message');
    //     }};
    // });

    // app()->singleton(\Laravel\Fortify\Contracts\RegisterResponse::class,function () {
    //     return new class implements \Laravel\Fortify\Contracts\RegisterResponse{
    // public function toResponse($request) {
    //     return redirect('verification.notice');
    //     }};
    // });
    }
}
