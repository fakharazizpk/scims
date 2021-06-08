<?php

namespace App\Providers;
use App\Models\School;
use App\Models\User;
use Illuminate\Support\Facades\Session;
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
        view()->composer('include.header', function ($view)
        {
            $view->with('profieData', User::where('id',Session::get('userData')['id'])->first());
            $view->with('school', School::all());
        });
    }
}
