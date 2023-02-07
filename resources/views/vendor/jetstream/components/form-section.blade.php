@props(['submit'])
<div
    {{ $attributes->merge(['class' => 'lg:w-[900px] w-full p-5 my-5 border-2 border-indigo-500 shadow-xl bg-black/50 shadow-pink-500/20 md:col-span-2 rounded-2xl']) }}>

    <x-jet-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description" class="">{{ $description }}</x-slot>
    </x-jet-section-title>
    <form wire:submit.prevent="{{ $submit }}" enctype="multipart/form-data">
        <div class="md:px-5 py-5 {{ isset($actions) }}">
            <div class="grid grid-cols-6 gap-6">
                {{ $form }}
            </div>
        </div>
        @if (isset($actions))
            <div class="flex justify-end py-2 md:px-6">
                {{ $actions }}
            </div>
        @endif
    </form>
</div>
