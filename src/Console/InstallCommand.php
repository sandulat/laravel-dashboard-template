<?php

declare(strict_types=1);

namespace Sandulat\LaravelDashboardTemplate\Console;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Console\DetectsApplicationNamespace;

/**
 * Credits: laravel/telescope.
 */
class InstallCommand extends Command
{
    use DetectsApplicationNamespace;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravel-dashboard-template:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install all of the dashboard resources';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->comment('Publishing Dashboard Service Provider...');
        $this->callSilent('vendor:publish', ['--tag' => 'laravel-dashboard-template-provider']);

        $this->comment('Publishing Dashboard Assets...');
        $this->callSilent('vendor:publish', ['--tag' => 'laravel-dashboard-template-assets']);
        $this->registerDashboardServiceProvider();

        $this->info('Dashboard scaffolding installed successfully.');
    }

    /**
     * Register the dashboard service provider in the application configuration file.
     *
     * @return void
     */
    protected function registerDashboardServiceProvider(): void
    {
        $namespace = str_replace_last('\\', '', $this->getAppNamespace());

        $appConfig = file_get_contents(config_path('app.php'));

        if (Str::contains($appConfig, $namespace.'\\Providers\\DashboardServiceProvider::class')) {
            return;
        }

        $lineEndingCount = [
            "\r\n" => substr_count($appConfig, "\r\n"),
            "\r" => substr_count($appConfig, "\r"),
            "\n" => substr_count($appConfig, "\n"),
        ];

        $eol = array_keys($lineEndingCount, max($lineEndingCount))[0];

        file_put_contents(config_path('app.php'), str_replace(
            "{$namespace}\\Providers\EventServiceProvider::class,".$eol,
            "{$namespace}\\Providers\EventServiceProvider::class,".$eol."        {$namespace}\Providers\DashboardServiceProvider::class,".$eol,
            $appConfig
        ));

        file_put_contents(app_path('Providers/DashboardServiceProvider.php'), str_replace(
            "namespace App\Providers;",
            "namespace {$namespace}\Providers;",
            file_get_contents(app_path('Providers/DashboardServiceProvider.php'))
        ));
    }
}
