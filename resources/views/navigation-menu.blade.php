<nav x-data="{ open: false, active: 'text-rose-500' }" class="justify-between text-gray-400 bg-black body-font">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-24">
            <!-- Logo -->
            <div class="flex items-center shrink-0">
                <a href="/">
                    <x-jet-application-logo class="block w-auto h-9" />
                </a>
            </div>

            <!-- Settings Dropdown -->
            <div class="flex flex-wrap items-center justify-center text-base md:ml-auto">
                @if (Route::has('login'))
                    @auth
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-2 py-2 mx-4 text-sm font-medium leading-4 text-white transition bg-transparent rounded-full focus:ring focus: ring-rose-500 focus:text-rose-500">
                                            <img class="w-10 h-10 rounded-full object-cover"
                                                src="{{ Auth::user()->profile_photo_url }}"
                                                alt="{{ Auth::user()->name }}" />
                                        </button>
                                    </span>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-2 py-2 mx-4 text-sm font-medium leading-4 text-white transition bg-transparent rounded-full hover:text-rose-500 hover:bg-slate-900 focus:ring focus: ring-rose-500 focus:text-rose-500">
                                            <span><svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg></span>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>
                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="">
                                    <div class="block px-4 py-2 text-lg text-center text-white bg-neutral-800 rounded-t-xl">
                                        {{ Auth::user()->name }}
                                    </div>
                                    <x-jet-dropdown-link href="{{ route('dashboard') }}">
                                        {{ __('Dashboard') }}
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Account Settings') }}
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('product.create') }}">
                                        {{ __('Add New Work') }}
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('product.index') }}">
                                        {{ __('Manage Portfolio') }}
                                    </x-jet-dropdown-link>

                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                            {{ __('API Tokens') }}
                                        </x-jet-dropdown-link>
                                    @endif

                                    <div class="border-t border-indigo-500 border-1"></div>

                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf
                                        <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();"
                                            class="text-rose-500 rounded-b-xl">
                                            {{ __('Log Out') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                        <a href="{{ route('profile.show') }}"
                            class="py-2 transition rounded-full hover:bg-slate-900 focus:ring focus: ring-rose-500 focus:text-rose-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mx-2 text-white hover:text-rose-500"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('login') }}" x-bind:class="{{ 'login' == request()->path() ? 'active' : '' }}"
                            class="px-4 py-2 text-white transition">Log in</a>
                        <a href="{{ route('register') }}"
                            x-bind:class="{{ 'register' == request()->path() ? 'active' : '' }}"
                            class="px-4 py-2 text-white transition">Sign Up</a>
                        <div class="relative group">
                            <div
                                class="absolute -inset-1.5 group-hover:-inset-2.5 mx-6 bg-gradient-to-r from-rose-500 to-indigo-500 rounded-full blur opacity-50 group-hover:opacity-100 transition ">
                            </div>
                            <a href="{{ url('/sellyourart') }}" x-bind:class="{{ 'sellyourart' == request()->path() ? 'active' : '' }}"
                                class="relative px-4 py-2 mx-6 text-base text-white bg-black rounded-full group-hover:text-indigo-400 transition">Sell
                                Your
                                Art</a>
                        </div>
                        <a href="{{ route('login') }}"
                            class="py-2 transition rounded-full hover:bg-slate-900 focus:ring focus: ring-rose-500 focus:text-rose-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mx-2 text-white hover:text-rose-500"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </a>
                    @endauth
                @endif
            </div>
        </div>

        <!-- Hamburger -->
        <div class="flex items-center -mr-2 sm:hidden">
            <button @click="open = ! open"
                class="inline-flex items-center justify-center p-2 text-gray-400 transition rounded-md hover:text-white hover:bg-rose-500 focus:outline-none focus:bg-rose-500 focus:white">
                <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t-2 border-cyan-500">
            @if (Route::has('login'))
                @auth
                    <div class="flex items-center px-4">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <span class="inline-flex rounded-md">
                                <button type="button"
                                    class="inline-flex items-center px-2 py-2 mx-4 text-sm font-medium leading-4 text-white transition bg-transparent rounded-full focus:ring focus: ring-rose-500 focus:text-rose-500">
                                    <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                                        alt="{{ Auth::user()->name }}" />
                                </button>
                            </span>
                        @else
                            <span class="inline-flex rounded-md">
                                <button type="button"
                                    class="inline-flex items-center px-2 py-2 mx-4 text-sm font-medium leading-4 text-white transition bg-transparent rounded-full hover:text-rose-500 hover:bg-slate-900 focus:ring focus: ring-rose-500 focus:text-rose-500">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg></span>
                                </button>
                            </span>
                        @endif
                        <div>
                            <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <!-- Account Management -->
                        <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            {{ __('Profile') }}
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link href="{{ route('product.create') }}" :active="request()->routeIs('product.create')">
                            {{ __('Add New Work') }}
                        </x-jet-responsive-nav-link>


                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                {{ __('API Tokens') }}
                            </x-jet-responsive-nav-link>
                        @endif

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <x-jet-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-jet-responsive-nav-link>
                        </form>
                    @else
                        <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                            {{ __('Login') }}
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                            {{ __('Register') }}
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link href="{{ url('/sellyourart') }}" :active="request()->routeIs('register')">
                            {{ __('Sell Your Art') }}
                        </x-jet-responsive-nav-link>
                    @endauth
            @endif
        </div>
    </div>
    </div>
</nav>
