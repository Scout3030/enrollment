@component('mail::message')

# {{ __('Your user has been created') }}

## {{ __('Log in by resetting your password at the following link:') }}
<p>
    <a href="{{ route('password.reset', $remember_token) }}?email={{ $email }}">{{ __('Reset password') }}</a>
</p>
@endcomponent
