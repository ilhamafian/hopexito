@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-neutral-800 border-2 border-neutral-500 focus:ring focus:ring-indigo-500 focus:border-none rounded-md text-white']) !!}>
