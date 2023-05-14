@extends('user_template.layouts.template')
@section('main-content')
<div class="row g-3" style="margin: 40px">
    <h3>Final step to place your order</h3>
    <div class="col-sm-6">
        <h4>Product Will Sent At-</h4>
        <p>Address: {{ $shipping_address->address }}</p>
        <p>Postal Code: {{ $shipping_address->postal_code }}</p>
        <p>Phone Number: {{ $shipping_address->phone_number }}</p>
    </div>
    <div class="col-sm">
        <h4>Your Final Product Are-</h4>
        <table width="100%" class="table" >
            <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Subtotal</th>
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
    </div>
    <div id="subtotal" style="margin-left:700px;margin-top:100px;">
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
        <table>
            <h5>Action</h5>
            <tr>
                <td><form action="{{ route('placeorder') }}" method="POST">
                    @csrf
                    <input type="submit" class="btn btn-primary" value="Order">
                </form></td>
                <td><form action="" method="POST">
                    @csrf
                    <input type="submit" class="btn btn-danger" value="Cancel">
                </form></td>
            </tr>
        </table>
    </div>
  </div>
@endsection