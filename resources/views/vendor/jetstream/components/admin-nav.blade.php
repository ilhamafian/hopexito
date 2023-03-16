@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center justify-start px-4 py-2 m-2 text-gray-200 transition rounded-xl bg-gradient-to-r from-rose-400/50 via-fuchsia-500/50 to-indigo-500/50 focus:ring focus:ring-indigo-500'
            : 'flex items-center justify-start px-4 py-2 m-2 text-gray-200 transition rounded-xl hover:bg-gradient-to-r from-rose-400/50 via-fuchsia-500/50 to-indigo-500/50 focus:ring focus:ring-indigo-500';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
