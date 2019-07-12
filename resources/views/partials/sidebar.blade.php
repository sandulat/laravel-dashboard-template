<nav class="ldt-bg-gray-800 lg:ldt-h-full lg:ldt-min-h-screen ldt-max-h-screen ldt-overflow-y-auto ldt-p-5 ldt-fixed ldt-w-full ldt-z-10 lg:ldt-sticky lg:ldt-mt-0 ldt-top-0 lg:ldt-min-w-56 lg:ldt-max-w-56 lg:ldt-px-6 lg:ldt-py-4 ldt-overflow-y-auto">
    <div class="ldt-flex ldt-justify-between ldt-items-center">
        @include('laravel-dashboard-template::partials.sidebar_logo')
        <button onClick="event.preventDefault();document.getElementById('sidebarLinks').classList.toggle('ldt-hidden')" class="ldt-text-gray-500 ldt-p-2 ldt-rounded ldt-border ldt-border-gray-500 lg:ldt-hidden">
            <svg class="ldt-fill-current ldt-h-3 ldt-w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
        </button>
    </div>
    <div id="sidebarLinks" class="ldt-hidden lg:ldt-block ldt-mt-10">
        @foreach($template->sidebarLinks() as $section => $links)
            <p class="ldt-text-gray-600 ldt-uppercase ldt-font-medium ldt-tracking-widest ldt-text-xs ldt-mb-2">{{ $section }}</p>
            <ul class="ldt-text-gray-400 ldt-mb-5 lg:ldt-mb-10">
                @foreach($links as $link)
                    @include('laravel-dashboard-template::partials.sidebar_link', ['link' => $link])
                @endforeach
            </ul>
        @endforeach
    </div>
</nav>