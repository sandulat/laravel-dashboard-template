<nav class="ldt-flex ldt-flex-col ldt-justify-between ldt-bg-gray-800 lg:ldt-h-full lg:ldt-min-h-screen ldt-max-h-screen ldt-overflow-y-auto ldt-p-5 ldt-fixed ldt-w-full ldt-z-10 lg:ldt-sticky lg:ldt-mt-0 ldt-top-0 lg:ldt-min-w-56 lg:ldt-max-w-56 lg:ldt-px-6 lg:ldt-py-4 ldt-overflow-y-auto">
    <div>
        <div class="ldt-flex ldt-justify-between ldt-items-center">
            @include('laravel-dashboard-template::partials.sidebar_logo')
            @include('laravel-dashboard-template::partials.menu_toggle')
        </div>
        <div class="ldt-menu-toggle-target ldt-hidden lg:ldt-block ldt-mt-10">
            @foreach($template->sidebarLinks() as $section => $links)
                <p class="ldt-text-gray-600 ldt-uppercase ldt-font-medium ldt-tracking-widest ldt-text-xs ldt-mb-2">{{ $section }}</p>
                <ul class="ldt-text-gray-400 ldt-mb-5 lg:ldt-mb-10">
                    @foreach($links as $link)
                        @include('laravel-dashboard-template::partials.sidebar_link', ['link' => $link])
                    @endforeach
                </ul>
            @endforeach
        </div>
    </div>
    <div class="ldt-menu-toggle-target ldt-hidden lg:ldt-block">
        @yield('ldt-sidebar-footer')
    </div>
</nav>