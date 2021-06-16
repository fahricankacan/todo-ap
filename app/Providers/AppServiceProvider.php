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
     


        $this->app->singleton(\App\Bussiness\Abstract\IProjeService::class,function(){
            return new \App\Bussiness\Concrate\ProjeManager();
        });


        $this->app->singleton(\App\Bussiness\Abstract\IMusteriService::class,function(){
            return new \App\Bussiness\Concrate\MusteriManager();
        });


        $this->app->singleton(\App\Bussiness\Abstract\IPersonelService::class,function(){
            return new \App\Bussiness\Concrate\PersonelManager();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
