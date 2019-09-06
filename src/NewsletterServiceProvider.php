<?php

namespace Agpretto\Newsletter;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class NewsletterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();
        $this->registerResources();
        $this->registerMigrations();
        $this->registerPublishing();
    }

    /**
     * Register package routes
     * 
     * @return void
     */
    protected function registerRoutes()
    {
        Route::group([
            'prefix' => 'newsletter',
            'namespace' => 'Agpretto\Newsletter\Http\Controllers',
            'as' => 'newsletter.',
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }

    /**
     * Register the package resources
     * 
     * @return void
     */
    protected function registerResources()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'newsletter');
    }

    /**
     * Register the package migrations
     * 
     * @return void
     */
    protected function registerMigrations()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }
    }

    /**
     * Register the package's publishable resources
     * 
     * @return void
     */
    protected function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../database/migrations' => $this->app->databasePath('migrations'),
            ], 'newsletter-migrations');

            $this->publishes([
                __DIR__.'/../resources/views' => $this->app->resourcePath('views/vendor/newsletter'),
            ], 'newsletter-views');
        }
    }
}
