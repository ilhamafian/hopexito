<div>
    <x-jet-form-section submit="storeLinks">
        <x-slot name="title">
            {{ __('Link to other sites') }}
        </x-slot>
        <x-slot name="description">
            {{ __('Fill in your account details for other sites you use and we will display them on your profile.') }}
        </x-slot>
        <x-slot name="form">
            <div class="col-span-6">
                <input type="file" id="cover-image" name="cover_image" wire:model="cover_image">
            </div>
            <div class="col-span-3">
                <x-jet-label for="facebook" value="{{ __('Facebook') }}" />
                <x-jet-input id="facebook" type="text" class="block w-full mt-1" wire:model.defer="facebook" />
            </div>
            <div class="col-span-3">
                <x-jet-label for="twitter" value="{{ __('Twitter') }}" />
                <x-jet-input id="twitter" type="text" class="block w-full mt-1" wire:model.defer="twitter" />
            </div>
            <div class="col-span-3">
                <x-jet-label for="instagram" value="{{ __('Instagram') }}" />
                <x-jet-input id="instagram" type="text" class="block w-full mt-1" wire:model.defer="instagram" />
            </div>
            <div class="col-span-3">
                <x-jet-label for="dribble" value="{{ __('Dribbble') }}" />
                <x-jet-input id="dribble" type="text" class="block w-full mt-1" wire:model.defer="dribble" />
            </div>
            <div class="col-span-3">
                <x-jet-label for="behance" value="{{ __('Behance') }}" />
                <x-jet-input id="behance" type="text" class="block w-full mt-1" wire:model.defer="behance" />
            </div>
            <div class="col-span-3">
                <x-jet-label for="pinterest" value="{{ __('Pinterest') }}" />
                <x-jet-input id="pinterest" type="text" class="block w-full mt-1" wire:model.defer="pinterest" />
            </div>
            <div class="col-span-3">
                <x-jet-label for="deviantart" value="{{ __('DeviantArt') }}" />
                <x-jet-input id="deviantart" type="text" class="block w-full mt-1" wire:model.defer="deviantart" />
            </div>
            <div class="col-span-3">
                <x-jet-label for="tiktok" value="{{ __('Tiktok') }}" />
                <x-jet-input id="tiktok" type="text" class="block w-full mt-1" wire:model.defer="tiktok" />
            </div>
        </x-slot>
        <x-slot name="actions">
            <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)" x-transition.duration.1000>
                @if (session()->has('message'))
                    <div class="text-lime-400 mr-3 text-sm">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>

    </x-jet-form-section>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            FilePond.registerPlugin(FilePondPluginImagePreview);
        });
        const fileInput = document.querySelector('input[id="cover-image"]');
        const pond = FilePond.create(fileInput);
    </script>

</div>
