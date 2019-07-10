<?php

namespace Sandulat\LaravelDashboardTemplate;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sandulat\LaravelDashboardTemplate\Skeleton\SkeletonClass
 */
class LaravelDashboardTemplateFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-dashboard-template';
    }
}
