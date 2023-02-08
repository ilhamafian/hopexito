@section('title', 'Sign Up | HopeXito')
<x-app-layout>
    <x-jet-authentication-card>
        <form method="POST" action="{{ route('register') }}" x-data="{ role_id: 2 }">
            @csrf
            <div class="h-12 ">
                <span x-data="{ texts: ['Join HopeXito', 'Get Started'] }" x-typewriter.4s="texts"
                    class="text-xl tracking-wider text-transparent bg-clip-text bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500"></span>
            </div>
            {{-- Select Role --}}
            <div class="flex flex-row gap-5">
                <div class="relative w-1/2 h-20">
                    <input type="radio" name="role_id" x-model="role_id" x-on:click="role_id = 2" value="2"
                        id="seller_radio" class="hidden" />
                    <label for="seller_radio"
                        :class="role_id == 2 ? 'border-indigo-500' :
                            'border-gray-900 bg-black'"
                        class="grid p-6 text-white transition border-2 cursor-pointer md:p-8 md:text-sm place-items-center rounded-xl hover:border-indigo-500">Artist
                        Signup
                    </label>
                </div>
                <div class="relative w-1/2 h-20">
                    <input type="radio" name="role_id" x-model="role_id" x-on:click="role_id = 3" value="3"
                        id="user_radio" class="hidden" />
                    <label x-cloak for="user_radio"
                        :class="role_id == 3 ? 'border-indigo-500' :
                            'border-gray-900 bg-black'"
                        class="grid px-3 py-6 text-white transition border-2 cursor-pointer md:p-8 md:text-sm place-items-center rounded-xl hover:border-indigo-500">Customer
                        Signup</label>
                </div>
            </div>
            {{-- Name --}}
            <div class="mt-4 lg:mt-8">
                <x-jet-label x-show="role_id == 2" for="name" value="{{ __('Shop Name') }}" />
                <x-jet-label x-show="role_id == 3" for="name" value="{{ __('Username') }}" x-cloak />
                <x-jet-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')"
                    autocomplete="name" />
            </div>
            {{-- Email --}}
            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block w-full mt-1" type="text" name="email" :value="old('email')" />
            </div>
            {{-- Password --}}
            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <div class="relative" x-data="{ showpassword: false }">
                    <x-jet-input id="password" class="block w-full mt-1"
                        x-bind:type="showpassword ? 'text' : 'password'" name="password" autocomplete="new-password" />
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        x-on:click=" showpassword = !showpassword" x-show="showpassword == false" stroke="#f43f5e"
                        class="absolute w-5 h-5 cursor-pointer right-4 bottom-3">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#6366f1" x-on:click=" showpassword = !showpassword" x-show="showpassword == true"
                        class="absolute w-5 h-5 cursor-pointer right-4 bottom-3">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
            </div>
            {{-- Confirm Password --}}
            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <div class="relative" x-data="{ showpassword: false }">
                    <x-jet-input id="password_confirmation" class="block w-full mt-1"
                        x-bind:type="showpassword ? 'text' : 'password'" name="password_confirmation"
                        autocomplete="new-password" />
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        x-on:click=" showpassword = !showpassword" x-show="showpassword == false" stroke="#f43f5e"
                        class="absolute w-5 h-5 cursor-pointer right-4 bottom-3">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#6366f1" x-on:click=" showpassword = !showpassword" x-show="showpassword == true"
                        class="absolute w-5 h-5 cursor-pointer right-4 bottom-3">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>

                </div>
            </div>
            <x-jet-validation-errors class="mt-6 text-xs" />
            <div class="flex items-center justify-end mt-6">
                <a class="text-xs text-gray-300 underline hover:text-indigo-400" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <x-jet-button class="ml-4">
                    {{ __('Sign Up') }}
                </x-jet-button>
            </div>
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-6">
                    <x-jet-label for="terms">
                        <div class="flex items-center text-xs">
                            <x-jet-checkbox name="terms" id="terms" class="hidden" checked />
                            <div class="ml-2">
                                {!! __('By signing up, you agree to our :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="text-gray-300 underline hover:text-indigo-400">' .
                                        __('Terms of Service') .
                                        '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="text-gray-300 underline hover:text-indigo-400">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif
            <br>
            {{-- Google Auth --}}
            {{-- <div class="grid items-center grid-cols-3 mt-6 text-zinc-500">
                <hr class="border-zinc-500">
                <p class="text-sm text-center">OR</p>
                <hr class="border-zinc-500">
            </div>
            <a href="{{ route('google-auth') }}"
                class="flex items-center justify-center w-full py-2 mx-auto mt-5 text-sm text-white transition duration-500 bg-transparent border-2 rounded-lg cursor-pointer border-zinc-500 hover:bg-neutral-900 hover:border-neutral-600">
                <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="25px">
                    <path fill="#FFC107"
                        d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z" />
                    <path fill="#FF3D00"
                        d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z" />
                    <path fill="#4CAF50"
                        d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z" />
                    <path fill="#1976D2"
                        d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z" />
                </svg>
                Sign Up with Google
            </a> --}}
        </form>
    </x-jet-authentication-card>
</x-app-layout>
