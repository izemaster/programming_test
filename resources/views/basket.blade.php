<div class="items-container">
    @if(!empty($basket))
        @foreach($basket as $id=>$item)
        <div class="item">
            <img src="{{asset('storage/'.$item['image'])}}" alt="">
            <div class="item-details">
                <span>{{$item['model']}}</span>
                <span>Make: {{$item['make']}}</span>
                <span>Unit Price: {{$item['price']}}</span>
                <span>Qty : <input type="number" class="quantity" value="{{$item['quantity']}}" data-id="{{$id}}"></span>
                <div class="delete-button">
                    <button class="ajaxDelete" data-id="{{$id}}"><img src="storage/images/2849797_trash_basket_multimedia_icon.png" alt=""></button>
                </div>
            </div>
            <div class="item-subtotal">
                <span>{{$item['price']*$item['quantity']}}</span>
            </div>
        </div>
        @endforeach
    @else
        <div class="basket-msg">
            <span>
                Basket is empty.
            </span>
        </span>
    @endif
    @if(!empty($basket))
    <div class="checkout">
        <form action="{{route('checkout.basket')}}" method="post">
            @csrf
            @method('post')
            <button type="submit">Proceed to Checkout</button>
        </form>
    </div>
    @endif
</div>
