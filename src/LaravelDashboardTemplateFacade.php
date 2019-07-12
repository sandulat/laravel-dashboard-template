<?php

declare(strict_types=1);

namespace Sandulat\LaravelDashboardTemplate;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sandulat\LaravelDashboardTemplate\Skeleton\SkeletonClass
 */
final class LaravelDashboardTemplateFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-dashboard-template';
    }
}
