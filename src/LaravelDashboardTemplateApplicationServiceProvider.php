<?php

declare(strict_types=1);

namespace Sandulat\LaravelDashboardTemplate;

use Illuminate\Support\ServiceProvider;

/**
 * @method string userName() User name resolver.
 * @method string userAvatar() User avatar resolver.
 * @method string sidebarLinks() Sidebar links.
 * @method array profileDropdownLinks() Profile dropdown links.
 * @method \Illuminate\Http\RedirectResponse logoutRedirect() Redirect after logout.
 * @method void loggedOut() Take action after logout.
 * @method void logout() Logout the user.
 */
class LaravelDashboardTemplateApplicationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        foreach ([
            'userName',
            'userAvatar',
            'sidebarLinks',
            'profileDropdownLinks',
            'logoutRedirect',
            'loggedOut',
            'logout',
        ] as $method) {
            if (method_exists($this, $method)) {
                LaravelDashboardTemplate::{'set'.ucfirst($method)}(function () use ($method) {
                    return $this->app->call([$this, $method]);
                });
            }
        }
    }
}
