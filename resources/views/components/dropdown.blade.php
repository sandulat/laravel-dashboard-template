<div class="ldt-relative group ldt-inline-block {{ $class ?? '' }}">
    <button class="ldt-flex ldt-items-center ldt-cursor-pointer ldt-text-sm">
        {{ $activator }}
        @if (trim($slot))
            @include('laravel-dashboard-template::partials.dropdown_arrow')
        @endif
    </button>

    @if (trim($slot))
        <div class="ldt-min-w-32 ldt-right-0 ldt-items-center ldt-absolute ldt-border ldt-border-gray-400 ldt-rounded ldt-bg-white ldt-invisible group-hover:ldt-visible ldt-w-full">
            {{ $slot }}
        </div>
    @endif
</div>