<?php

declare(strict_types=1);

namespace Sandulat\LaravelDashboardTemplate;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

final class LaravelDashboardTemplateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->registerRoutes();

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-dashboard-template');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-dashboard-template'),
            ], 'laravel-dashboard-template-views');

            $this->publishes([
                __DIR__.'/../public' => public_path('vendor/laravel-dashboard-template'),
            ], 'laravel-dashboard-template-assets');

            $this->publishes([
                __DIR__.'/../stubs/LaravelDashboardTemplateServiceProvider.stub' => app_path('Providers/DashboardServiceProvider.php'),
            ], 'laravel-dashboard-template-provider');
        }
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->commands([
            Console\InstallCommand::class,
            Console\PublishCommand::class,
        ]);

        $this->app->singleton('laravel-dashboard-template', function () {
            return new LaravelDashboardTemplate;
        });
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    private function registerRoutes(): void
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/Http/routes.php');
        });
    }

    /**
     * Get the main route group configuration array.
     *
     * @return array
     */
    private function routeConfiguration(): array
    {
        return [
            'namespace' => 'Sandulat\LaravelDashboardTemplate\Http\Controllers',
            'prefix' => 'laravel-dashboard-template',
            'middleware' => 'web',
        ];
    }
}
