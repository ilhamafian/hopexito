<x-app-layout>
    <x-jet-authentication-card>
        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block w-full mt-1" type="text" name="email" :value="old('email')" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block w-full mt-1" type="password" name="password"
                    autocomplete="current-password" />
            </div>
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-lime-500">{{ __('Remember me') }}</span>
                </label>
            </div>
            <x-jet-validation-errors class="my-4" />
            <div class="flex items-center justify-end mt-6">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-400 underline hover:text-gray-100"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <x-jet-button class="ml-4">
                    <svg wire:loading class="mr-2" width="16" height="16" viewBox="0 0 38 38"
                        xmlns="http://www.w3.org/2000/svg" stroke="#fff">
                        <g fill="none" fill-rule="evenodd">
                            <g transform="translate(1 1)" stroke-width="4">
                                <circle stroke-opacity=".5" cx="18" cy="18" r="18" />
                                <path d="M36 18c0-9.94-8.06-18-18-18">
                                    <animateTransform attributeName="transform" type="rotate" from="0 18 18"
                                        to="360 18 18" dur="1s" repeatCount="indefinite" />
                                </path>
                            </g>
                        </g>
                    </svg>
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
        <div class="mt-6 grid grid-cols-3 items-center text-zinc-500">
            <hr class="border-zinc-500">
            <p class="text-center text-sm">OR</p>
            <hr class="border-zinc-500">
        </div>
        <a href="{{ route('google-auth') }}"
            class="cursor-pointer bg-transparent border-2 border-zinc-500 py-2 w-full mx-auto rounded-lg mt-5 flex justify-center items-center text-sm text-white hover:bg-neutral-600 hover:border-neutral-600 transition duration-500">
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
            Login with Google
        </a>

    </x-jet-authentication-card>
</x-app-layout>
