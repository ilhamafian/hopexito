<div
    {{ $attributes->merge(['class' => 'lg:w-[900px] w-full p-5 my-5 border-2 border-indigo-500 shadow-xl bg-black/50 shadow-rose-500/20 rounded-2xl']) }}>
    <x-jet-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-jet-section-title>
    {{ $content }}
</div>
