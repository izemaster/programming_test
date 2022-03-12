<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/login.css">
    </head>
    <body>
        <div class="flex-center position-ref full-height">


            <div class="content">
                <form action="{{route('authenticate')}}" method="post">
                    @csrf
                    <input type="text" name="email" placeholder="email">
                    <input type="password" name="password" placeholder="password">

                    <button type="submit">Login</button>
                    <div id="register-link">
                        <a href="{{route('register')}}">Register</a>
                    </div>
                </form>
                @if ($errors->any())
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </body>
</html>
