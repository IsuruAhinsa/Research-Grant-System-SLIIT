@props(['route', 'title'])

<a href="{{ $route }}" {!! $attributes->merge(['class' => 'text-white hover:bg-primary-600 group flex items-center px-2 py-2 text-sm font-medium rounded-md']) !!}>
    {{ $slot }}
    @isset($title) {{ $title }} @endisset
</a>
