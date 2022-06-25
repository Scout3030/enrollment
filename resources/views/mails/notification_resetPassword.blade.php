<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>{{ __('Reset password') }}</title>
</head>
<body>
    <a href="{{ config('app.url') }}" style="display: inline-block;">
        <img src="{{ asset('https://iesleopoldoalasclarin.com/wp-content/uploads/2020/01/layout_set_logo.jpg') }}" class="logo" alt="{{ config('app.name') }}">
    </a>
    <p>{{ __('Your user has been created, log in by resetting your password at the following link:') }}</p>
    <p>
        <a href="{{ route('password.reset', $remember_token) }}?email={{ $email }}">{{ __('Reset password') }}</a>
    </p>
</body>
</html>
