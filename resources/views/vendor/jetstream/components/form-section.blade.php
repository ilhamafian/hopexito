@props(['submit'])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    <x-jet-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-jet-section-title>

    <div class="mt-5 border-2 border-indigo-500 shadow-md bg-black/50 shadow-rose-500 md:col-span-2 rounded-2xl">
        <form wire:submit.prevent="{{ $submit }}"  enctype="multipart/form-data">
            <div class="px-4 py-5 sm:p-6 rounded-2xl {{ isset($actions) }}">
                <div class="grid grid-cols-6 gap-6">
                    {{ $form }}
                </div>
            </div>
            
            @if (isset($actions))
                <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
