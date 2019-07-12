<?php

declare(strict_types=1);

namespace Sandulat\LaravelDashboardTemplate;

use Closure;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

final class LaravelDashboardTemplate
{
    /**
     * User name callback.
     *
     * @var Closure
     */
    private static $userName;

    /**
     * User avatar callback.
     *
     * @var Closure
     */
    private static $userAvatar;

    /**
     * Sidebar links callback.
     *
     * @var Closure
     */
    private static $sidebarLinks;

    /**
     * Profile dropdown links callback.
     *
     * @var Closure
     */
    private static $profileDropdownLinks;

    /**
     * Logout callback.
     *
     * @var Closure
     */
    private static $logout;

    /**
     * Logged out callback.
     *
     * @var Closure
     */
    private static $loggedOut;

    /**
     * Logout redirect callback.
     *
     * @var Closure
     */
    private static $logoutRedirect;

    /**
     * Set the user name callback.
     *
     * @param \Closure $callback
     * @return void
     */
    public static function setUserName(Closure $callback): void
    {
        static::$userName = $callback;
    }

    /**
     * Set the user avatar callback.
     *
     * @param \Closure $callback
     * @return void
     */
    public static function setUserAvatar(Closure $callback): void
    {
        static::$userAvatar = $callback;
    }

    /**
     * Set the sidebar links callback.
     *
     * @param \Closure $callback
     * @return void
     */
    public static function setSidebarLinks(Closure $callback): void
    {
        static::$sidebarLinks = $callback;
    }

    /**
     * Set the profile dropdown links callback.
     *
     * @param \Closure $callback
     * @return void
     */
    public static function setProfileDropdownLinks(Closure $callback): void
    {
        static::$profileDropdownLinks = $callback;
    }

    /**
     * Set the logout callback.
     *
     * @param \Closure $callback
     * @return void
     */
    public static function setLogout(Closure $callback): void
    {
        static::$logout = $callback;
    }

    /**
     * Set the logged out callback.
     *
     * @param \Closure $callback
     * @return void
     */
    public static function setLoggedOut(Closure $callback): void
    {
        static::$loggedOut = $callback;
    }

    /**
     * Set the logout redirect callback.
     *
     * @param \Closure $callback
     * @return void
     */
    public static function setLogoutRedirect(Closure $callback): void
    {
        static::$logoutRedirect = $callback;
    }

    /**
     * Get the user name.
     *
     * @return string
     */
    public function userName(): string
    {
        return (static::$userName ?? function () {
            return Auth::check() ? Auth::user()->name : 'Guest';
        })();
    }

    /**
     * Get the user avatar.
     *
     * @return string
     */
    public function userAvatar(): string
    {
        return (static::$userAvatar ?? function () {
            return URL::asset('/vendor/laravel-dashboard-template/images/avatar.svg');
        })();
    }

    /**
     * Get the sidebar links.
     *
     * @return array
     */
    public function sidebarLinks(): array
    {
        return (static::$sidebarLinks ?? function () {
            return [
                'Menu' => [
                    [
                        'label' => 'Home',
                        'url' => '/',
                    ],
                ],
            ];
        })();
    }

    /**
     * Get the profile dropdown links.
     *
     * @return array
     */
    public function profileDropdownLinks(): array
    {
        return (static::$profileDropdownLinks ?? function () {
            return [];
        })();
    }

    /**
     * Logout the user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        (static::$logout ?? function () {
            Auth::guard()->logout();

            request()->session()->invalidate();
        })();

        $this->loggedOut();

        return $this->logoutRedirect();
    }

    /**
     * The user has logged out of the application.
     *
     * @return void
     */
    public function loggedOut(): void
    {
        (static::$loggedOut ?? function () {
            //
        })();
    }

    /**
     * Redirect after logout.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logoutRedirect(): RedirectResponse
    {
        return (static::$logoutRedirect ?? function () {
            return redirect('/');
        })();
    }
}
