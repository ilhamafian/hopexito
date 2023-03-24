<x-jet-session-message/>
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
            <x-jet-input id="facebook" type="text" class="block w-full mt-1" wire:model.defer="facebook" placeholder="facebook.com/" />
        </div>
        <div class="col-span-6 md:col-span-3">
            <x-jet-label for="twitter" value="{{ __('Twitter') }}" />
            <x-jet-input id="twitter" type="text" class="block w-full mt-1" wire:model.defer="twitter" placeholder="twitter.com/"/>
        </div>
        <div class="col-span-6 md:col-span-3">
            <x-jet-label for="instagram" value="{{ __('Instagram') }}" />
            <x-jet-input id="instagram" type="text" class="block w-full mt-1" wire:model.defer="instagram" placeholder="instagram.com/" />
        </div>
        <div class="col-span-6 md:col-span-3">
            <x-jet-label for="dribble" value="{{ __('Dribbble') }}" />
            <x-jet-input id="dribble" type="text" class="block w-full mt-1" wire:model.defer="dribble" placeholder="dribbble.com/" />
        </div>
        <div class="col-span-6 md:col-span-3">
            <x-jet-label for="behance" value="{{ __('Behance') }}" />
            <x-jet-input id="behance" type="text" class="block w-full mt-1" wire:model.defer="behance" placeholder="behance.net/" />
        </div>
        <div class="col-span-6 md:col-span-3">
            <x-jet-label for="pinterest" value="{{ __('Pinterest') }}" />
            <x-jet-input id="pinterest" type="text" class="block w-full mt-1" wire:model.defer="pinterest" placeholder="pinterest.com/" />
        </div>
        <div class="col-span-6 md:col-span-3">
            <x-jet-label for="deviantart" value="{{ __('DeviantArt') }}" />
            <x-jet-input id="deviantart" type="text" class="block w-full mt-1" wire:model.defer="deviantart" placeholder="deviantart.com/" />
        </div>
        <div class="col-span-6 md:col-span-3">
            <x-jet-label for="tiktok" value="{{ __('Tiktok') }}" />
            <x-jet-input id="tiktok" type="text" class="block w-full mt-1" wire:model.defer="tiktok" placeholder="tiktok.com/"/>
        </div>

        <div class="col-span-6 md:col-span-3">
            <x-jet-label for="website" value="{{ __('Personal Website') }}" />
            <x-jet-input id="website" type="text" class="block w-full mt-1" wire:model.defer="website"/>
        </div>
    </x-slot>
    <x-slot name="actions">
        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
   
</x-jet-form-section>
