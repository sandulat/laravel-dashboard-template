<?php

declare(strict_types=1);

namespace Sandulat\LaravelDashboardTemplate\Console;

use Illuminate\Console\Command;

/**
 * Credits: laravel/telescope.
 */
final class PublishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravel-dashboard-template:publish {--force : Overwrite any existing files}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish all of the dashboard resources';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->call('vendor:publish', [
            '--tag' => 'laravel-dashboard-template-assets',
            '--force' => true,
        ]);
    }
}
