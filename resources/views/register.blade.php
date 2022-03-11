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
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
                width: 100%;
            }

            .flex-top {

                display: flex;
                flex-direction: column;
                justify-content: top;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .header {
                text-align: center;
                width: 100%;
                display: block
            }

            .title {
                font-size: 84px;
            }

            ul {
               list-style-type: none;
               background: #333;
            }
            ul li{
                min-width: 200px;
                color: #FFF;
                display: inline-block;
            }
            .m-b-md {
                margin-bottom: 30px;
            }

        </style>
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
                <ul>
                    <li>Cars</li>
                    <li>Basket</li>
                    <li>Login</li>
                    <li>Register</li>
                </ul>

            </header>
            <div class="content">
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
                    <button type="submit">Register</button>
                </form>

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
