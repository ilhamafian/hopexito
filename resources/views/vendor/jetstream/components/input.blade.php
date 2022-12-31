@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'caret-teal-500 bg-neutral-800 border border-neutral-500 focus:ring-indigo-500 rounded-md text-white']) !!}>
