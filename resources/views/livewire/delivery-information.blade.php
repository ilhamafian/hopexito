<div class="max-w-2xl min-h-screen mx-auto">
    <x-jet-session-message/>
    <x-jet-gradient-card>
        <div class="p-8 space-y-2 bg-black rounded-xl">
            <x-jet-header>Delivery Information</x-jet-header>
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="block w-full mt-1" wire:model.lazy="name" />
            @error('name')
                <div class="text-red-500">Please provide your name.</div>
            @enderror
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="text" class="block w-full mt-1" wire:model.lazy="email" />
            @error('email')
                <div class="text-red-500">Please provide your email.</div>
            @enderror
            <div class="flex flex-col">
                <x-jet-label for="phone" value="{{ __('Phone Number') }}" />
                <div class="flex gap-2">
                    <x-jet-input type="text" class="w-16 mt-1" readonly value="+60" />
                    <x-jet-input id="phone" type="text" class="block w-full mt-1" wire:model.lazy="phone" />
                </div>
                @error('phone')
                    <div class="text-red-500">Please provide your mobile phone number.</div>
                @enderror
            </div>
            <x-jet-label for="address" value="{{ __('Address') }}" />
            <x-jet-input id="address" type="text" class="block w-full mt-1" wire:model.lazy="address" />
            @error('address')
                <div class="text-red-500">Please provide your address.</div>
            @enderror
            <x-jet-label for="postcode" value="{{ __('Postcode') }}" />
            <x-jet-input id="postcode" type="text" class="block w-full mt-1" wire:model.lazy="postcode" />
            @error('postcode')
                <div class="text-red-500">Please provide the postcode.</div>
            @enderror
            <x-jet-label for="state" value="{{ __('State') }}" />
            <select id="state" wire:model.lazy="state"
                class="text-white block w-full p-2.5 bg-neutral-800 border border-neutral-500 rounded-md focus:ring-indigo-500">
                <option selected class="">Choose a state</option>
                <option value="Johor">Johor</option>
                <option value="Kedah">Kedah</option>
                <option value="Kelantan">Kelantan</option>
                <option value="Melaka">Melaka</option>
                <option value="Negeri Sembilan">Negeri Sembilan</option>
                <option value="Pahang">Pahang</option>
                <option value="Perak">Perak</option>
                <option value="Perlis">Perlis</option>
                <option value="Pulau Pinang">Pulau Pinang</option>
                <option value="Selangor">Selangor</option>
                <option value="Terengganu">Terengganu</option>
                <option value="Kuala Lumpur">Kuala Lumpur</option>
                <option value="Putrajaya">Putrajaya</option>
                <option value="Sarawak">Sarawak</option>
                <option value="Sabah">Sabah</option>
                <option value="Labuan">Labuan</option>
            </select>
            @error('state')
                <div class="text-red-500">Please provide the state.</div>
            @enderror
            <div class="pt-3">
                <x-jet-button type="button" wire:click="storeDeliveryInfo">
                    Proceed to Payment
                </x-jet-button>
            </div>
        </div>
    </x-jet-gradient-card>
</div>
