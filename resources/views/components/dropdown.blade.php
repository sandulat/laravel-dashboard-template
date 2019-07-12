<div class="ldt-relative group ldt-inline-block {{ $class ?? '' }}">
    <button class="ldt-flex ldt-items-center ldt-cursor-pointer ldt-text-sm">
        {{ $activator }}
        @if (trim($slot))
            <svg class="ldt-fill-current ldt-h-4 ldt-w-4 ldt-ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        @endif
    </button>

    @if (trim($slot))
        <div class="ldt-min-w-32 ldt-right-0 ldt-items-center ldt-absolute ldt-border ldt-border-gray-400 ldt-rounded ldt-bg-white ldt-invisible group-hover:ldt-visible ldt-w-full">
            {{ $slot }}
        </div>
    @endif
</div>