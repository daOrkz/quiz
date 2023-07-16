<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
</head>
<body>
    <div class="content-wrap">
        <div class="content">    
            <div class="ctatistic">
                <p>Добро пжаловать на сервис тестов</p>
                <p> Всего пользователей: {{ $users }} </p>
                <p> Всего тестов: {{ $questions }} </p>
            </div>
            <div class="auth">
                @if (Route::has('login'))
                    <div class="auth-btn">
                        @auth
                            <a href="{{ url('/home') }}" class="inner-btn">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="inner-btn">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inner-btn">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </div>
    
</body>