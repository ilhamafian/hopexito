@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 text-sm py-2 text-white border-l-4 border-indigo-500 font-medium bg-indigo-500 transition text-center'
            : 'block pl-3 pr-4 text-sm py-2 border-l-4 border-transparent font-medium transition text-center';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
