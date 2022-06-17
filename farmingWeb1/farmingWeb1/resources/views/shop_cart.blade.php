@extends('layouts.site')
@section('main')
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Sản phẩm</th>
                                <th>Price</th>
                                <th>Quantity </th>
                                <th>Total</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartss ->items as $key => $value)
                            @if(is_numeric($key))
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="{{url('public/Uploads')}}/{{$value['image']}}" style="width: 120px; height: 120px;" alt="">
                                    <h5>{{$value['name']}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                {{round($value['price'] - $value['price'] * $value['sale'])}}
                                </td>
                                <form method="get" action="{{route('cart.update', ['id'=> $value['id']])}}">
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="{{$value['quantity']}}" name="quantity">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                    {{round(($value['price'] - $value['price'] * $value['sale']) * $value['quantity'])}}
                                    </td>
                                    <td class="shoping__cart__item__update">
                                        <input type="submit" value="Upload" >
                                    </td>
                                </form>
                                <td class="shoping__cart__item__close">
                                    <a href="{{route('cart.remove', ['id'=> $value['id']])}}"><span class="icon_close"></span></a>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="col-6 ">
                <div class="shoping__checkout">
                    <h5>Tổng tiền giỏ hàng</h5>
                    <ul>
                        <li>Chưa Phí<span class="subtotal">{{round($cartss->total_price_sale)}}</span></li>
                        <li>Tổng tiền<span class="total">{{round($cartss->total_price_sale)}}</span></li>
                    </ul>
                    @if(Auth::check())
                    <form method = "get" action = "{{route('order_shop')}}">
                        <button type="submit" class="primary-btn processTotal" style="margin-top: -2rem; cursor: pointer; margin-left: 10rem;"> Thanh toán</button>
                    </form>
                    @else
                    <form method = "get" action = "{{route('login')}}">
                        <button type="submit" class="primary-btn processTotal" style="margin-top: -2rem; cursor: pointer; margin-left: 10rem;"> Thanh toán</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </form>
</section>
<!-- Shoping Cart Section End -->

<script>
    var amount = document.querySelectorAll('.shoping__cart__quantity input');
    var price = document.querySelectorAll('.shoping__cart__price');
    var elementTotal = document.querySelectorAll('.shoping__cart__total');
    var allElement = document.querySelectorAll('.shoping__cart__quantity .quantity');

    function total() {
        allElement.forEach((item, index) => {
            item.addEventListener('click', function() {
                elementTotal[index].innerHTML = Number(price[index].innerText) * Number(amount[index].value);
                var subtotal = 0;
                elementTotal.forEach(item => subtotal += Number(item.innerText));
                document.querySelector('.subtotal').innerHTML = subtotal;
                document.querySelector('.total').innerHTML = subtotal;
            });
        });
    }
    document.querySelector('.processTotal').addEventListener('click', function() {
        var total = 0;
        elementTotal.forEach(item => total += Number(item.innerText));
        document.querySelector('.subtotal').innerHTML = total;
        document.querySelector('.total').innerHTML = total;
    });
    total();
</script>
@stop()