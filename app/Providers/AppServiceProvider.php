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
        //$adminprofile = User::where('id',Session::get('userData')['id'])->first();
        //view()->share('adminprofile', User::all());
        view()->composer('*', function ($view)
        {
            $view->with('adminprofile', User::where('id',Session::get('userData')['id'])->first());
            $view->with('school', School::all());
        });
    }
}
