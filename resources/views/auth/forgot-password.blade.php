@section('title', __('Forgot your password page'))

<x-guest-layout>

    <h4 class="card-title mb-1">{{ __('Forgot Password?') }} 🔒</h4>

    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-1">
            <x-jet-label
                for="email"
                value="{{ __('Email') }}"
            />
            <x-jet-input
                id="email"
                type="email"
                placeholder="john@mail.com"
                name="email"
                :value="old('email')"
                required
                autofocus
            />
        </div>

        <x-jet-button class="btn-primary w-100" tabindex="4">
            {{ __('Email Password Reset Link') }}
        </x-jet-button>
    </form>
</x-guest-layout>
