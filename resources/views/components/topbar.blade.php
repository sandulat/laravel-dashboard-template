<div class="ldt-flex ldt-flex-col lg:ldt-flex-row lg:ldt-items-center ldt-items-end ldt-justify-end @if(trim($left)) lg:ldt-justify-between @endif ldt-py-4 ldt-bg-white ldt-relative ldt-shadow ldt-border-gray-400 ldt-px-5 lg:ldt-px-10 ldt-flex ldt-justify-end lg:ldt-sticky lg:ldt-top-0 ldt-mt-18 lg:ldt-mt-0">
    @if(trim($left))
        <div class="ldt-flex ldt-items-center">
            {{ $left }}
        </div>
    @endif
    <div class="ldt-flex ldt-items-center">
        {{ $right }}
        @include('laravel-dashboard-template::partials.topbar_profile_dropdown', ['class' => trim($right) ? 'ldt-ml-5 ' : ''])
    </div>
</div>