<?php

namespace App\Providers;

use App\Models\completedOrder;
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
        view()->share('totalMessageAdmin',completedOrder::where('status','pending')->orWhere('status','updated')->get()->count());
        view()->share('totalMessageProduction',completedOrder::where('status','rejected')->get()->count());
    }
}
