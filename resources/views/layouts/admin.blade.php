<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

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
                background: #CCC;
                text-align: center;
                width: 100%;
                display: block
            }

            .title {
                font-size: 40px;
            }
            .container{
                display: flex;
                flex-direction: row;

            }

            .container .content{
                padding: 20px;
                width:100%;
                display: flex;
                flex-direction: column;
                align-items: center;

            }
            aside{
                width: 20%;
                height: 100vh;
                display: flex;
                flex-direction: column;
            }
            aside ul {
               margin: 0;
               padding: 10px 0;
               height: 100vh;
               list-style-type: none;
               background: #333;
            }
            aside ul li{
                width: 100%;
                box-sizing: border-box;
                color: #FFF;
                padding: 5px 20px;
                display: inline-block;
            }
            aside ul li:hover{
                background: #575757;
                transition: 0.5s
            }
            aside ul li a{
                color: white;
                text-decoration: none;
            }
            aside ul li a:hover{
                text-decoration: underline;
            }
            .m-b-md {
                margin-bottom: 30px;
            }


        </style>
        @yield('styles')
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
                    Administrator Dashboard
                </div>
            </header>
            <div class="container">
                <aside>
                    <ul>
                        <li><a href="{{route("cars.index")}}">Car List</a></li>
                        <li><a href="{{route('logout')}}">Logout</a></li>

                    </ul>
                </aside>
                <div class="content">
                    @yield('content')
                </div>
            </div>



        </div>
    </body>
</html>
