@section('title', __('Register Page'))

<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-1">
            <x-jet-label
                for="name"
                value="{{ __('Name') }}"
            />
            <x-jet-input
                id="name"
                type="text"
                placeholder="{{ __('Name') }}"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
            />
        </div>

        <div class="mb-1">
            <x-jet-label
                for="email"
                value="{{ __('Email') }}"
            />
            <x-jet-input
                id="email"
                type="email"
                placeholder="{{ __('Email') }}"
                name="email"
                :value="old('email')"
                required
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
                placeholder="{{ __('Password') }}"
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
                placeholder="{{ __('Comfirm password') }}"
                name="password_confirmation"
                required
                autocomplete="new-password"
            />
        </div>

        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-jet-label for="terms">
                    <div class="flex items-center">
                        <x-jet-checkbox name="terms" id="terms"/>

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-jet-label>
            </div>
        @endif

        <x-jet-button class="btn-primary w-100" tabindex="4">
            {{ __('Register') }}
        </x-jet-button>
    </form>

    <p class="text-center mt-2">
        <span>{{ __('Already registered?') }}</span>
        <a href="{{ route('login') }}">
            <span>{{ __('Sign in instead') }}</span>
        </a>
    </p>
</x-guest-layout>
