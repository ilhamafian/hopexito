<x-app-layout>
    <div x-data="{ nav: 1 }">
        <div class="flex justify-center gap-3 mt-4">
            <button type="button" x-on:click="nav = 1" class="relative inline-block px-4 py-2 font-medium w-42 group">
                <span :class="nav == 1 ? '-translate-x-0 -translate-y-0 rotate-3 scale-105' : ''"
                    class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-gradient-to-r from-pink-300 via-purple-300 to-indigo-400 group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                <span :class="nav == 1 ? 'bg-black' : ''"
                    class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                <span :class="nav == 1 ? 'text-white' : 'text-black'" class="relative group-hover:text-white">Account
                    Information</span>
            </button>
            <button type="button" x-on:click="nav = 3" class="relative inline-block px-4 py-2 font-medium w-42 group">
                <span :class="nav == 3 ? '-translate-x-0 -translate-y-0 rotate-3 scale-105' : ''"
                    class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-gradient-to-r from-pink-300 via-purple-300 to-indigo-400 group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                <span :class="nav == 3 ? 'bg-black' : ''"
                    class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                <span :class="nav == 3 ? 'text-white' : 'text-black'"
                    class="relative group-hover:text-white">Personalization</span>
            </button>
            <button type="button" x-on:click="nav = 2" class="relative inline-block px-4 py-2 font-medium w-42 group">
                <span :class="nav == 2 ? '-translate-x-0 -translate-y-0 rotate-3 scale-105' : ''"
                    class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-gradient-to-r from-pink-300 via-purple-300 to-indigo-400 group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                <span :class="nav == 2 ? 'bg-black' : ''"
                    class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                <span :class="nav == 2 ? 'text-white' : 'text-black'" class="relative group-hover:text-white">Advance
                    Settings</span>
            </button>
        </div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div x-cloak x-show="nav == 1" x-transition.opacity x-transition:enter.duration.500ms
                x-transition:leave.duration.100ms>
                @if (Laravel\Fortify\Features::canUpdateProfileInformation() &&
                    Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    @livewire('profile.update-profile-information-form')
                    <x-jet-section-border></x-jet-section-border>
                    @livewire('profile.update-password-form')
                @endif
            </div>
            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication() &&
                Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures() &&
                !is_null($user->password))
                <div x-cloak x-show="nav == 2" x-transition.opacity x-transition:enter.duration.500ms
                    x-transition:leave.duration.100ms>
                    @livewire('profile.two-factor-authentication-form')
                    <x-jet-section-border></x-jet-section-border>
                    @livewire('profile.logout-other-browser-sessions-form')
                    <x-jet-section-border></x-jet-section-border>
                    @livewire('profile.delete-user-form')
                </div>
            @endif
            @if (Auth::user()->role_id == 2)
                <div x-cloak x-show="nav == 3" x-transition.opacity x-transition:enter.duration.500ms
                    x-transition:leave.duration.100ms>
                    @livewire('social-links')
                    <x-jet-section-border></x-jet-section-border>
                    @livewire('cover-image-bio')
                </div>
            @endif

        </div>
    </div>
    </div>
</x-app-layout>
