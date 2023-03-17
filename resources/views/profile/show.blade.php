@section('title', 'Account Details | HopeXito')
<x-app-layout>
    <x-jet-session-message />
    <div x-data="{ nav: 1 }" class="flex flex-col mx-auto mb-20 lg:flex-row max-w-7xl">
        <div class="lg:static mx-auto lg:min-h-screen h-72">
            <x-jet-gradient-card>
                <ul class="relative flex flex-col px-12 py-8 text-white bg-black rounded-xl ">
                    <a href="#updateInformation">
                        <p class="p-2 hover:bg-indigo-500/50 rounded-md">
                            Account Information
                        </p>
                    </a>
                    <a href="#updatePassword">
                        <p class="p-2 hover:bg-indigo-500/50 rounded-md">
                            Update Password
                        </p>
                    </a>
                    @if (Auth::user()->role_id == 2)
                        <a href="#personalization">
                            <p class="p-2 hover:bg-indigo-500/50 rounded-md">
                                Profile Personalization
                            </p>
                        </a>
                        <a href="#social-links">
                            <p class="p-2 hover:bg-indigo-500/50 rounded-md">
                                Link to other sites
                            </p>
                        </a>
                        <a href="#wallet">
                            <p class="p-2 hover:bg-indigo-500/50 rounded-md">
                                Payment Details
                            </p>
                        </a>
                    @endif
                    {{-- <button x-on:click="nav = 2" class="flex items-center gap-2 hover:text-indigo-500"
                        :class="nav == 2 ? 'text-indigo-400' : ''">
                        <svg x-cloak x-show="nav == 2" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="absolute w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <p class="pl-8">
                            Advance Settings
                        </p>
                    </button> --}}
                </ul>
            </x-jet-gradient-card>
        </div>
        <div class="ml-auto">
            <div id="updateInformation"x-transition.opacity x-transition:enter.duration.500ms x-transition:leave.duration.100ms>
                @if (Laravel\Fortify\Features::canUpdateProfileInformation() &&
                        Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    @livewire('profile.update-profile-information-form')
                    <x-jet-section-border />
                    <span id="updatePassword">
                        @livewire('profile.update-password-form')
                    </span>
                    <x-jet-section-border />
                @endif
            </div>
            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication() &&
                    Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures() &&
                    !is_null($user->password))
                <div x-cloak x-show="nav == 2" x-transition.opacity x-transition:enter.duration.500ms
                    x-transition:leave.duration.100ms>
                    @livewire('profile.two-factor-authentication-form')
                    <x-jet-section-border />
                    @livewire('profile.logout-other-browser-sessions-form')
                </div>
            @endif
            @if (Auth::user()->role_id == 2)
                <div x-transition.opacity x-transition:enter.duration.500ms x-transition:leave.duration.100ms>
                    <span id="personalization">
                        @livewire('cover-image-bio')
                    </span>
                    <x-jet-section-border />
                    <span id="social-links">
                        @livewire('social-links')
                    </span>
                    <x-jet-section-border />
                </div>
                <div id="wallet" class="lg:w-[900px] w-full" x-transition.opacity x-transition:enter.duration.500ms
                    x-transition:leave.duration.100ms>
                    @livewire('wallet')
                    <x-jet-section-border />
                    <x-jet-wallet-card>
                        <div class="p-5 text-white">
                            <h2 class="text-xl font-medium tracking wider">User Agreement</h2>
                            <p class="mt-3">
                                When a product is sold through the website the sale is between you and the customer —
                                HopeXito
                                acts as your agent in this process. In order to act as your agent, we need your explicit
                                permission.
                            </p>
                            <div class="flex gap-3 mt-3">
                                <x-jet-checkbox checked disabled />
                                <p>Yes I agree to the HopeXito User Agreement</p>
                            </div>
                        </div>
                    </x-jet-wallet-card>
                </div>
        </div>
        @endif
    </div>
    </div>
    </div>
</x-app-layout>
