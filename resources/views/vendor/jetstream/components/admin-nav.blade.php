@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center justify-start px-4 py-2 m-2 text-gray-200 transition rounded-xl bg-gradient-to-r from-purple-900 to-indigo-500 focus:ring focus:ring-indigo-500'
            : 'flex items-center justify-start px-4 py-2 m-2 text-gray-200 transition rounded-xl hover:bg-gradient-to-r from-purple-900 to-indigo-500 focus:ring focus:ring-indigo-500';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
