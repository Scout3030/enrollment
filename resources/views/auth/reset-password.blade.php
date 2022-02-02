@section('title', __('Reset your password page'))

<x-guest-layout>

    <h4 class="card-title mb-1">{{ __('Reset Password ') }}🔒</h4>
    <p class="card-text mb-2">{{ __('Your new password must be different from previously used passwords') }}</p>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="mb-1">
            <x-jet-label
                for="email"
                value="{{ __('Email') }}"
            />
            <x-jet-input
                id="email"
                type="email"
                name="email"
                :value="old('email', $request->email)"
                required
                autofocus
            />
        </div>

        <div class="mb-1">
            <x-jet-label
                for="password"
                value="{{ __('Password') }}"
            />
            <x-jet-input
                id="password"
                type="password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                name="password"
                required
                autocomplete="new-password"
            />
        </div>

        <div class="mb-1">
            <x-jet-label
                for="password_confirmation"
                value="{{ __('Confirm Password') }}"
            />
            <x-jet-input
                id="password_confirmation"
                type="password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                name="password_confirmation"
                required
                autocomplete="new-password"
            />
        </div>

        <x-jet-button class="btn-primary w-100" tabindex="4">
            {{ __('Reset Password') }}
        </x-jet-button>
    </form>

    <p class="text-center mt-2">
        <a href="{{ route('login') }}"> <i data-feather="chevron-left"></i>{{__('Back to login') }}</a>
    </p>
</x-guest-layout>
