<x-app-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-left">
            {{ __('We\'ve sent you an email to confirm your email address. Please check your inbox and click on the confirmation link to complete the process. If you didn\'t receive the email, don\'t worry - we\'ll be happy to send you another one.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 text-xs text-lime-400">
                {{ __('A verification link has been sent to the email address you provided in your profile settings.') }}
            </div>
        @endif

        <div class="mx-auto mt-10">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <x-jet-button type="submit">
                    {{ __('Resend Verification Email') }}
                </x-jet-button>
            </form>
        </div>
    </x-jet-authentication-card>
</x-app-layout>
