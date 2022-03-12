<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Styles -->
        <!-- Styles -->

        <link rel="stylesheet" href="/css/app.css">

    </head>
    <body>

        <div class="flex-top position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('logout') }}">Logout</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <header class="header">
                <div class="title m-b-md">
                    Car Shop
                </div>
                <div class="header-bottom"></div>

            </header>
            <div class="content">
                <div class="registration-wrapper">
                    <h2>Register</h2>
                    <form action="{{route('registration')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="input-group">
                            <label for="">Name: </label><input name="name" type="text" placeholder="John Doe">
                        </div>
                        <div class="input-group">
                            <label for="">E-mail: </label><input name="email" type="text" placeholder="email@domain.com">
                        </div>
                        <div class="input-group">
                            <label for="">Password: </label><input name="password" type="password" placeholder="******">
                        </div>
                        <div class="input-group">
                            <label for="">Repeat Password: </label><input name="re_password" type="password" placeholder="******">
                        </div>
                        <div class="input-group">
                            <label for="">Address: </label><input name="address" type="text" placeholder="221B Baker Street">
                        </div>
                        @if ($errors->any())
                        <div class="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <button type="submit">Register</button>
                    </form>

                </div>

            </div>


        </div>
    </body>
    <script>
        // Close menu
        $("#close-menu").click(function(e) {
            e.preventDefault();
            $("#sidebar-wrapper").toggleClass("active");
        });
        // Open menu
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#sidebar-wrapper").toggleClass("active");
        });
</script>
</html>
