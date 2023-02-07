<x-app-layout>
    <x-jet-authentication-card>
        <div class="mb-4 text-sm text-left text-gray-400">
            <p class="mb-2 font-bold text-gray-300">Forgot your password?</p>
            Don't panic, it happens to us all the time. Let us know your email address and we will send you a
            password reset link that will allow you to create a new one.
        </div>
        <x-jet-validation-errors class="mb-4" />
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                    required />
            </div>
            @if (session('status'))
                <div class="mt-4 text-sm font-medium text-lime-500">
                    {{ session('status') }}
                </div>
            @endif
            <div class="flex items-center justify-end mt-6">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-app-layout>
