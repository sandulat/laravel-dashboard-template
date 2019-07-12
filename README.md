<p align="center"><img src="https://coltorapps.com/images/ldt-screenshot.png" width="80%"></p>
<h1 align="center">Laravel Dashboard Template</h1>
<p align="center">
💫Basic Dashboard Template as a Package.💫
</p>
<p align="center">
<img src="https://img.shields.io/packagist/vpre/sandulat/laratron.svg">
<img src="https://img.shields.io/github/license/sandulat/laratron.svg">
<a href="https://twitter.com/intent/follow?screen_name=sandulat">
  <img src="https://img.shields.io/twitter/follow/sandulat.svg?style=social">
</a>
<p>

> Note: Not suitable for single page applications as it's built in `Blade`, however you can use Vue/React/etc. components on all pages.

## Installation

```bash
composer require sandulat/laravel-dashboard-template
php artisan laravel-dashboard-template:install
```

> Note: to re-publish the front-end assets when updating the package use: `php artisan laravel-dashboard-template:publish`

The `install` command will publish the front-end assets and will create a new service provider `App\Providers\DashboardServiceProvider`. This is basically the main config of the template, but first let's see how to display the dashboard in the next section.

## Layout

Create a route and a controller that will return a view. Inside the view place the following code:

`my_view.blade.php:`
```blade
@extends('laravel-dashboard-template::page')

@section('ldt-content')
    Some content
@endsection
```

> Note: `ldt` stands for `laravel-dashboard-template`.

As you can see `laravel-dashboard-template::page` is just a layout. Besides `ldt-content` the layout provides more additional slots:
- `ldt-head` - Head section for CSS, meta, etc.
- `ldt-scripts` - Scripts section to include JS files.
- `ldt-topbar-left` - Left section of topbar.
- `ldt-topbar-right` - Right section of topbar, next to profile dropdown.
- `ldt-sidebar-footer` - Footer section of sidebar.

To avoid duplication of these slots, it would be better to create your own layout that will extend the package's layout.

`my_layout.blade.php:`
```blade
@extends('laravel-dashboard-template::page')

@section('ldt-topbar-right')
    Language Select
@endsection
```

So now in your views you can do:

`my_view.blade.php:`
```blade
@extends('my_layout')

@section('ldt-content')
    Some content
@endsection
```

## Card

Besides layout, the package provides a card component:

```blade
@component('laravel-dashboard-template::components.card')
    @slot('title')
        Dahboard
    @endslot

    Content
@endcomponent
```

The result can be seen in the screenshot at the top of the documentation.

## Alerts

Out of the box the package will display 2 types of alerts above the `content` section of the layout. They will be displayed when you redirect with `success` and `error` flash data:

```php
return back()->with('success', 'My success message.');
```

```php
return back()->with('error', 'My error message.');
```

## Configuration

You can configure the dashboard inside the installed provider: `App\Providers\DashboardServiceProvider`. By default it's empty because everything is already configured so you can start building instantly, however you can add the following methods to start customizing the dashboard:

```php
/**
 * Topbar user name resolver.
 *
 * @return string
 */
public function userName(): string
{
    return Auth::check() ? Auth::user()->name : 'Guest';
}
```
```php
/**
 * Topbar user avatar resolver.
 *
 * @return string
 */
public function userAvatar(): string
{
    if (Auth::check() && Auth::user()->avatar) {
        return Auth::user()->avatar;
    }

    return URL::asset('/vendor/laravel-dashboard-template/images/avatar.svg')
}
```
```php
/**
 * Sidebar links.
 *
 * @return array
 */
public function sidebarLinks(): array
{
    return [
        'Menu' => [
            [
                'label' => 'Users',
                'url' => route('users'),
                'children' => [
                    [
                        'label' => 'Active Users',
                        'url' => route('users.active'),
                    ],
                ],
            ],
        ],
    ];
}
```
```php
/**
 * Profile dropdown links.
 *
 * @return array
 */
public function profileDropdownLinks(): array
{
    return [
        [
            'label' => 'Edit Profile',
            'url' => route('profile'),
        ],
    ];
}
```
```php
/**
 * Logout the user.
 *
 * @param \Illuminate\Http\Request $request
 * @return void
 */
public function logout(Request $request): void
{
    Auth::guard()->logout();

    $request->session()->invalidate();
}
```
```php
/**
 * Action to be performed after logout.
 *
 * @return void
 */
public function loggedOut(): void
{
    //
}
```
```php
/**
 * Redirect after logout.
 *
 * @return \Illuminate\Http\RedirectResponse
 */
public function logoutRedirect(): RedirectResponse
{
    return redirect('/');
}
```

> Note: Each method from this service provider has dependency injection available.

## Customization

I've tried to split the template into as many components & partials as possible. Just create inside your project the folder: `resources/views/vendor/laravel-dashboard-template` and now you can copy the files from the package and customize them. Here is the list:
- partials/alert.blade.php
- partials/alert_error.blade.php
- partials/alert_success.blade.php
- partials/sidebar.blade.php
- partials/sidebar_link.blade.php
- partials/sidebar_logo.blade.php
- partials/topbar_profile_dropdown.blade.php

---

- components/card.blade.php
- components/dropdown.blade.php
- components/dropdown_item.blade.php
- components/topbar.blade.php

## Using Vue/React/etc. components

The main div that wraps the dashboard has an `app` id. You can load your front-end framework onto this id and start using your components on all pages.

```jsx
// Vue
new Vue({
    el: '#app',
});

//React
ReactDOM.render(<App />, document.getElementById('app'));
```

After you'll compile your front-end assets you can include them like this:
```blade
@section('ldt-head')
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
@endsection
@section('ldt-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
```

> Note: If you don't have [front-end assets versioning](https://laravel.com/docs/5.8/mix#versioning-and-cache-busting) you might want to use the `asset()` method instead of `mix()`.

## Credits

Created by [Stratulat Alexandru](https://twitter.com/sandulat).

<a href="https://coltorapps.com/">
  <img src="https://coltorapps.com/images/logo_transparent.png" width="150px">
</a>

