@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-neutral-900 border-2 border-zinc-500 focus:ring focus:ring-indigo-500 focus:border-none rounded-md text-white']) !!}>
