@props(['active'])

@php
$classes = ($active ?? false)
            ? 'relative px-4 py-2 text-indigo-300 border-b-2 border-indigo-500 '
            : 'relative px-4 py-2 text-white hover:text-indigo-300 rounded-full ';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
