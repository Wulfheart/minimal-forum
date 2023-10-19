<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body hx-boost="true" class="text-gray-900">
    <header>
        <nav>
            <a href="{{ route('overview') }}">home</a>
            <a href="/posts">posts</a>
            <a href="/login">login</a>
            <a href="/register">register</a>

        </nav>
    </header>
    {{ $slot }}
</body>

</html>
