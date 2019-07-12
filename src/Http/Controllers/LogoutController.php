<?php

declare(strict_types=1);

namespace Sandulat\LaravelDashboardTemplate\Http\Controllers;

use Illuminate\Routing\Controller;
use Sandulat\LaravelDashboardTemplate\LaravelDashboardTemplate;

final class LogoutController extends Controller
{
    /**
     * Logout the user.
     *
     * @param \Sandulat\Larabels\Larabels $larabels
     */
    public function __invoke(LaravelDashboardTemplate $template)
    {
        return $template->logout();
    }
}
