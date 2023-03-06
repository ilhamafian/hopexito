<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>
    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>
    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden" wire:model="photo" x-ref="photo"
                    x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview"">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                        class="object-cover w-20 h-20 rounded-full">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block w-20 h-20 bg-center bg-no-repeat bg-cover rounded-full"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>
                {{-- Delete Existing Profile Photo --}}
                <div class="flex mt-4">
                    <x-jet-button-utility class="mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Change Avatar') }}
                    </x-jet-button-utility>
                    @if ($this->user->profile_photo_path)
                        <div type="button"
                            class="inline-flex items-center p-2 rounded-md cursor-pointer hover:bg-rose-500 text-rose-500 hover:text-white"
                            wire:click="deleteProfilePhoto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </div>
                    @endif
                </div>
                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="block w-full mt-1" wire:model.defer="state.name"
                autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="block w-full mt-1 cursor-no-drop"
                wire:model.defer="state.email" disabled />
            <x-jet-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                $this->user->hasVerifiedEmail())
                <p class="inline-flex mt-2 text-sm text-lime-400">
                    {{ __('Your email address is verified.') }}
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </p>
            @else
                <p class="mt-2 text-sm text-rose-500">
                    {{ __('Your email address is unverified.') }}
                    <button type="button" class="text-sm text-indigo-500 hover:text-indigo-400 hover:underline"
                        wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to send the verification email.') }}
                    </button>
                </p>
                @if ($this->verificationLinkSent)
                    <p v-show="verificationLinkSent" class="mt-1 text-sm font-medium text-lime-400">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="phone" value="{{ __('Phone Number') }}" />
            <x-jet-input id="phone" type="text" class="block w-full mt-1" wire:model.defer="state.phone"
                autocomplete="phone" />
            <x-jet-input-error for="phone" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="address" value="{{ __('Address') }}" />
            <x-jet-input id="address" type="text" class="block w-full mt-1" wire:model.defer="state.address"
                autocomplete="address" />
            <x-jet-input-error for="address" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="postcode" value="{{ __('Postcode') }}" />
            <x-jet-input id="postcode" type="text" class="block w-full mt-1" wire:model.defer="state.postcode" />
            <x-jet-input-error for="postcode" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="state" value="{{ __('State') }}" />
            <select id="state" wire:model.defer="state.state" class="text-white block w-full p-2.5 bg-neutral-800 border border-neutral-500 rounded-md focus:ring-indigo-500" >
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
            <x-jet-input-error for="state" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <div class="flex items-center">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>
    
            <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                {{ __('Save') }}
            </x-jet-button>
        </div>
    </x-slot>
</x-jet-form-section>
