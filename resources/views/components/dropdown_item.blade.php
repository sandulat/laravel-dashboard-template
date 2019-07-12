<a href="{{ $url ?? '#' }}" @isset($id) id="{{ $id }}" @endisset @isset($onClick) onClick="{{ $onClick }}" @endisset class="ldt-px-4 ldt-py-2 ldt-block ldt-text-black hover:ldt-bg-gray-200 ldt-text-sm">
    {{ $slot }}
</a>