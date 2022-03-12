<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                refreshCart();
            })
            $(document).on("click",".ajaxSubmit",function(e){
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                let carId = this.dataset.id;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ url('/basket/add') }}" + "/" +carId,
                    method: 'post',
                    data: {
                        name: jQuery('#name').val(),
                        type: jQuery('#type').val(),
                        price: jQuery('#price').val()
                    },
                    success: function(result){
                        //console.log(result);
                        refreshCart();
                    }});
                });

            $(document).on("click",".ajaxDelete",function(e){
                let carId = this.dataset.id;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ url('/basket/delete') }}" + "/" +carId,
                    method: 'post',
                    data: {
                        name: jQuery('#name').val(),
                        type: jQuery('#type').val(),
                        price: jQuery('#price').val()
                    },
                    success: function(result){
                        console.log(result);
                        refreshCart();
                    }});
            });

            $(document).on("change",".quantity",function(e){
                let carId = this.dataset.id;
                let qty = this.value;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ url('/basket/update') }}" + "/" +carId,
                    method: 'post',
                    data: {
                        quantity: qty
                    },
                    success: function(result){
                        console.log(result);
                        refreshCart();
                    }});
            });


            function refreshCart() {

                //$('div.items-container').remove();
                $('div.items-container').load('ajax/basket');
                }
        </script>
        <!-- Styles -->

        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <div class="wl">

                <nav id="sidebar-wrapper">
                    <div class="sidebar-nav">
                        <div id="header-buttons">
                            <a id="close-menu" href="#" class="pull-right toggle square"><img src="{{asset("storage/images/5402366_delete_remove_cross_cancel_close_icon.png")}}" alt=""></a>
                        </div>

                        <div id="basket-header">Bakset</div>
                        @include('basket')

                    </div>

                </nav>
        </div>
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
                <div class="search-container">
                    <form action="" method="GET">
                        @method('get')
                        @csrf
                        <input type="text" name="q" placeholder="Make, model, engine size"><button type="submit"><img src="storage/images/search_icon.png" alt=""></button>

                    </form>
                    <a id="menu-toggle" href="#" class="toggle"><img src="storage/images/2703080_cart_basket_ecommerce_shop_icon.png" alt=""></a>
                </div>
                <div class="header-bottom"></div>

            </header>
            <div class="container">
                @foreach($cars as $car)
                <div class="car-item">
                    <div class="car-image">
                        <img src="{{asset('storage/'.$car->image)}}" alt="">
                    </div>

                    <div class="car-title"><h2>{{$car->model}}</h2></div>
                    <div class="car-description">
                        <p>Make: {{$car->make}}</p>
                        <p>Model: {{$car->model}}</p>
                        <p>Reg.: {{$car->registration}}</p>
                        <p>Engine size: {{$car->engine_size}}</p>
                    </div>
                    <div id="car-tags">
                        @foreach($car->car_tags as $tag)
                        <div class="tag">
                            {{$tag->value}}
                        </div>
                        @endforeach
                    </div>
                    <div class="car-price">USD {{$car->price}}</div>
                    <form action="#" method="post">
                        @method('post')
                        @csrf
                        <button type="submit" class="ajaxSubmit" data-id="{{$car->id}}">Add to cart</button>
                    </form>
                </div>
                @endforeach

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
