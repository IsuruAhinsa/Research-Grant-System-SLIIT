@props(['active', 'count'])

@php
    $classes = ($active ?? false)
            ? 'border-indigo-500 text-indigo-600 hover:text-indigo-700 hover:border-indigo-200 whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm'
            : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200 whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm';

    $badgeClasses = ($active ?? false)
    ? 'bg-indigo-100 text-indigo-600 hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block'
    : 'bg-gray-100 text-gray-900 hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} >
    {{ $slot }}

    <span class="{{ $badgeClasses }}">{{ $count }}</span>
</a>
