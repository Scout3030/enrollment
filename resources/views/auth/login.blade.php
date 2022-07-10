@section('title', __('Login Page'))

<x-guest-layout>
    <div class="alert alert-warning mt-2" role="alert">
        <h4 class="alert-heading">Aviso</h4>
        <div class="alert-body">
            Si tienes problemas para acceder, haz clic en “¿Olvidaste tu contraseña?”
        </div>
    </div>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-1">
            <x-jet-label
                for="email"
                value="{{ __('Email or DNI') }}"
            />
            <x-jet-input
                id="email"
                type="text"
                name="email"
                placeholder="alumno@iesleopoldoalasclarin.com / 34343434G"
                :value="old('email')"
                autofocus
            />
        </div>

        <div class="mb-1">
            <div class="d-flex justify-content-between">
                <x-jet-label
                    for="login-password"
                    value="{{ __('Password') }}"
                />
                <a href="{{ route('password.request') }}">
                    <small>{{ __('Forgot Password?') }}</small>
                </a>
            </div>
            <div class="input-group input-group-merge form-password-toggle">
                <x-jet-input
                    type="password"
                    class="form-control-merge"
                    id="password"
                    name="password"
                    tabindex="2"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="login-password"
                />
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
            </div>
        </div>
        <div class="mb-1">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me" tabindex="3" />
                <label class="form-check-label" for="remember-me">{{ __('Remember me') }}</label>
            </div>
        </div>
        <x-jet-button class="btn-primary w-100" tabindex="4">
            {{ __('Log in') }}
        </x-jet-button>
    </form>

</x-guest-layout>
