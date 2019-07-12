@inject('template', 'Sandulat\LaravelDashboardTemplate\LaravelDashboardTemplate')

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('/vendor/laravel-dashboard-template/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset(mix('laravel-dashboard-template.css', 'vendor/laravel-dashboard-template')) }}">
    @yield('ldt-head')
</head>
<body class="ldt-bg-gray-200 ldt-font-sans ldt-h-full ldt-overflow-x-hidden ldt-w-full ldt-h-full">
    <div id="app" class="ldt-flex ldt-flex-col lg:ldt-flex-row ldt-relative ldt-w-full">
        @include('laravel-dashboard-template::partials.sidebar')
        <main class="ldt-w-full ldt-min-h-screen">
            @component('laravel-dashboard-template::components.topbar', ['template' => $template])
                @slot('left')
                    @yield('ldt-topbar-left')
                @endslot
                @slot('right')
                    @yield('ldt-topbar-right')
                @endslot
            @endcomponent
            <div class="ldt-p-5 lg:ldt-p-10 ldt-w-full">
                @if (session()->has('success'))
                    @include('laravel-dashboard-template::partials.alert_success', ['message' => session()->get('success')])
                @endif
                @if (session()->has('error'))
                    @include('laravel-dashboard-template::partials.alert_error', ['message' => session()->get('error')])
                @endif
                @yield('ldt-content')
            </div>
        </main>
    </div>
    @yield('ldt-scripts')
</body>
</html>
