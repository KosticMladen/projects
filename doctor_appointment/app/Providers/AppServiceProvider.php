<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Booking;

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
        $today_booking = Booking::where('date', date('Y-m-d'))->get();

        view()->share('global_today_booking', $today_booking);
    }
}
