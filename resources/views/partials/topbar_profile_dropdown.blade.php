@component('laravel-dashboard-template::components.dropdown', ['class' => $class ?? ''])
    @slot('activator')
        <div style="background-image: url({{ $template->userAvatar() }})" class="ldt-inline-block ldt-bg-center ldt-bg-cover ldt-rounded-full ldt-mr-2 ldt-w-6 ldt-h-6 ldt-shadow-inner"></div>
        {{ $template->userName() }}
    @endslot

    @foreach($template->profileDropdownLinks() as $link)
        @component('laravel-dashboard-template::components.dropdown_item', $link)
            {{ $link['label'] }}
        @endcomponent
    @endforeach

    @if(auth()->check())
        @component('laravel-dashboard-template::components.dropdown_item', ['onClick' => 'event.preventDefault(); document.getElementById("logout-form").submit();'])
            Logout
        @endcomponent

        <form id="logout-form" action="{{ route('laravel-dashboard-template.logout') }}" method="POST" class="ldt-hidden">
            @csrf
        </form>
    @endif
@endcomponent