<?php

namespace OpenStrong\StrongAdmin;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class StrongAdminServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        if (! config('strongadmin.enabled')) {
            return;
        }
        Route::middlewareGroup('strongadmin', config('strongadmin.middleware', []));
        $this->registerRoutes();
        $this->registerMigrations();
        $this->registerPublishing();
        $this->loadViewsFrom(
                resource_path('views/strongadmin'), 'strongadmin'
        );
        $this->loadViewsFrom(
                __DIR__ . '/../resources/views', 'strongadmin'
        );
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');
        });
    }

    /**
     * Get the Telescope route group configuration array.
     *
     * @return array
     */
    private function routeConfiguration()
    {
        return [
            'domain' => config('strongadmin.domain', null),
            'namespace' => 'OpenStrong\StrongAdmin\Http\Controllers',
            'prefix' => config('strongadmin.path'),
            'middleware' => 'strongadmin',
        ];
    }

    /**
     * Register the package's migrations.
     *
     * @return void
     */
    private function registerMigrations()
    {
        if ($this->app->runningInConsole())
        {
            $this->loadMigrationsFrom(__DIR__ . '/Storage/migrations');
        }
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    private function registerPublishing()
    {
        if ($this->app->runningInConsole())
        {
            $this->publishes([
                __DIR__ . '/Storage/migrations' => database_path('migrations'),
                    ], 'strongadmin-migrations');

            $this->publishes([
                __DIR__ . '/../public' => public_path('vendor/strongadmin'),
                    ], 'strongadmin-assets');

            $this->publishes([
                __DIR__ . '/../config/strongadmin.php' => config_path('strongadmin.php'),
                    ], 'strongadmin-config');

            $this->publishes([
                __DIR__ . '/../stubs/StrongAdminServiceProvider.stub' => app_path('Providers/StrongAdminServiceProvider.php'),
                    ], 'strongadmin-provider');
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
                __DIR__ . '/../config/strongadmin.php', 'strongadmin'
        );

        $this->commands([
            Console\InstallCommand::class,
            Console\PublishCommand::class,
            Console\UpdateURLCommand::class,
        ]);
    }

}
