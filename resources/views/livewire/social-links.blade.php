<x-jet-form-section submit="store">
    <x-slot name="title">
        {{ __('Link to other sites') }}
    </x-slot>
    <x-slot name="description">
        {{ __('Fill in links to your other sites to display and share it on your profile.') }}
    </x-slot>
    <x-slot name="form">
        <div class="col-span-6 md:col-span-3">
            <x-jet-label for="facebook" value="{{ __('Facebook') }}" />
            <x-jet-input id="facebook" type="text" class="block w-full mt-1" wire:model.defer="facebook" />
        </div>
        <div class="col-span-6 md:col-span-3">
            <x-jet-label for="twitter" value="{{ __('Twitter') }}" />
            <x-jet-input id="twitter" type="text" class="block w-full mt-1" wire:model.defer="twitter" />
        </div>
           <div class="col-span-6 md:col-span-3">
            <x-jet-label for="instagram" value="{{ __('Instagram') }}" />
            <x-jet-input id="instagram" type="text" class="block w-full mt-1" wire:model.defer="instagram" />
        </div>
           <div class="col-span-6 md:col-span-3">
            <x-jet-label for="dribble" value="{{ __('Dribbble') }}" />
            <x-jet-input id="dribble" type="text" class="block w-full mt-1" wire:model.defer="dribble" />
        </div>
           <div class="col-span-6 md:col-span-3">
            <x-jet-label for="behance" value="{{ __('Behance') }}" />
            <x-jet-input id="behance" type="text" class="block w-full mt-1" wire:model.defer="behance" />
        </div>
           <div class="col-span-6 md:col-span-3">
            <x-jet-label for="pinterest" value="{{ __('Pinterest') }}" />
            <x-jet-input id="pinterest" type="text" class="block w-full mt-1" wire:model.defer="pinterest" />
        </div>
           <div class="col-span-6 md:col-span-3">
            <x-jet-label for="deviantart" value="{{ __('DeviantArt') }}" />
            <x-jet-input id="deviantart" type="text" class="block w-full mt-1" wire:model.defer="deviantart" />
        </div>
           <div class="col-span-6 md:col-span-3">
            <x-jet-label for="tiktok" value="{{ __('Tiktok') }}" />
            <x-jet-input id="tiktok" type="text" class="block w-full mt-1" wire:model.defer="tiktok" />
        </div>
    </x-slot>
    <x-slot name="actions">
        <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)" x-transition.duration.1000>
            @if (session()->has('message'))
                <div class="mr-3 text-sm text-lime-400">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>

</x-jet-form-section>
