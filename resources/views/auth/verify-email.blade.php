@section('title', __('Verify your email page'))

<x-guest-layout>

    <h4 class="card-title mb-1">{{ __('Verify your email') }} ✉️</h4>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-jet-button class="btn-primary w-100" tabindex="4">
            {{ __('Log Out') }}
        </x-jet-button>
    </form>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <p class="text-center mt-2">
            <span>{{ __('Didn\'t receive an email?') }} </span>
            <x-jet-button type="submit">
                <span>&nbsp;{{ __('Resend Verification Email') }}</span>
            </x-jet-button>
        </p>
    </form>
</x-guest-layout>
