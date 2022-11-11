@props(['value'])

<label {{ $attributes->merge(['class' => 'float-left font-medium text-sm text-white pb-2']) }}>
    {{ $value ?? $slot }}
</label>
