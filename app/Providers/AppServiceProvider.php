<?php

namespace App\Providers;

use App\Car;
use App\Observers\CarObserver;
use Illuminate\Support\ServiceProvider;
use Elasticsearch\ClientBuilder;
use Elasticsearch\Client;
use App\SearchRepo;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Client::class,function($app){
            return ClientBuilder::create()->setHosts([config('app.search_host')])->build();
        });
        $this->app->bind(SearchRepo::class,function($app){
            return new SearchRepo($app->make(Client::class));
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Car::observe(CarObserver::class);
    }
}
