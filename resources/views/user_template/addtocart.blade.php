@extends('user_template.layouts.template')
@section('main-content')
<section id="page-header" class="about-header">
    <h2>#Cart</h2>
    <p>Imformation about us </p>
</section>
@if (session()->has('message'))
              <div class="alert alert-success">
                {{ session()->get('message') }}
              </div>
            @endif
<section id="cart" class="section-p1">
    <table width="100%">
        <thead>
            <tr>
                <td>Remove</td>
                <td>Image</td>
                <td>Product</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Subtotal</td>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
            @foreach ($cart_items as $cart_item)
            <tr>
                @php
                    $product_name = App\Models\Product::
                    where('id',$cart_item->product_id)->value('product_name');
                    $product_img = App\Models\Product::
                    where('id',$cart_item->product_id)->value('product_img');
                    $product_price = App\Models\Product::
                    where('id',$cart_item->product_id)->value('product_price');
                @endphp
                <td><a href="{{ route('removecartitem',$cart_item->id) }}"><i class="far fa-times-circle"></i></a></td>
                <td>
                    <img src="{{ asset($product_img) }}" alt="">
                </td>
                <td>
                    {{ $product_name }}
                </td>
                <td>
                    {{ $product_price }}VND
                </td>
                <td>{{ $cart_item->quantity }}</td>
                <td>{{ $cart_item->price }}VND</td>
            </tr>
            @php
                $total = $total + $cart_item->price;
            @endphp
            @endforeach
        </tbody>
    </table>
</section>

<section id="cart-add" class="section-p1">
    <div id="coupon">
        <h3>Apply Coupon</h3>
        <div>
            <input type="text" placeholder="Enter Your Coupon">
            <a href="" class="btn btn-success">Apply</a>
        </div>
    </div>

    <div id="subtotal">
        <h3>Cart Totals</h3>
        <table>
            <tr>
                <td>Cart subtotal</td>
                <td>{{ $total }} VND</td>
            </tr>
            <tr>
                <td>Shipping</td>
                <td>Free</td>
            </tr>
            <tr>
                <td><strong>Total</strong></td>
                <td><strong>{{ $total }} VND</strong></td>
            </tr>
        </table>
        @if ($total==0)
            <a href="" class="btn btn-success disabled">Process to checkout</a>
        @else
            <a href="{{ route('shippingaddress') }}" class="btn btn-success">Process to checkout</a>
        @endif
    </div>
</section>

@endsection