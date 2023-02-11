<x-app-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-left">
            {{ __('Please confirm your email by clicking the send verification email.  If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 text-xs text-lime-400">
                {{ __('A verification link has been sent to the email address you provided in your profile settings.') }}
            </div>
        @endif

        <div class="mx-auto mt-4">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <x-jet-button type="submit">
                    {{ __('Resend Verification Email') }}
                </x-jet-button>
            </form>
        </div>
    </x-jet-authentication-card>
</x-app-layout>
