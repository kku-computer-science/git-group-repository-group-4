<?php

namespace App\Providers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();
        view()->composer(
            'layouts.layout', 
            function ($view) {
                $view->with('dn', \App\Models\Program::where('degree_id', '=', 1)->get());
            }
        );
        $locale = Session::get('locale', 'en'); // 'en' เป็นภาษาปริยาย
        App::setLocale($locale);
    }
}
