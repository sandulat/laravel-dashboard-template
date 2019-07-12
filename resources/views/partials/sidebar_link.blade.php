<li class="ldt-py-1">
    <a href="{{ $link['url'] }}" class="hover:ldt-text-white ldt-tracking-wide">
        {{ $link['label'] }}
    </a>
    @isset($link['children'])
        <ul class="ldt-ml-5 ldt-text-gray-600 ldt-text-sm">
            @foreach($link['children'] as $childLink)
                @include('laravel-dashboard-template::partials.sidebar_link', ['link' => $childLink])
            @endforeach
        </ul>
    @endisset
</li>