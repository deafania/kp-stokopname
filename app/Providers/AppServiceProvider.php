<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

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
        Blade::if('hasrole', function ($expression) {
            $roles = explode('|', $expression);

            if (Auth::user()) {
                if (in_array(Auth::user()->role, $roles)) {
                    // if (Auth::user()->role == 'staf' && Auth::user()->input_surat == 'tidak') {
                        // return false;
                    // } else {
                        return true;
                    // }
                }
            }
            return false;
        });
    }
}
