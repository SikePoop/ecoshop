@extends('user_template.layouts.template')
@section('main-content')
<section id="prodetails" class="section-p1">
    <div class="single-pro-image">
        <img src="{{ asset($product->product_img) }}" width="100%" id="MainImg" alt="">
    </div>
    <div class="single-pro-details">
        <h6>Product Details</h6>
        <ul style="list-style: none;">
            <li>Product Name: {{ $product->product_name }}</li>
            <li>Product Price: {{ $product->product_price }}</li>
            <li>Product size: {{ $product->product_size }}</li>
            <li>Product Available: {{ $product->quantity }}</li>         
        </ul>
        <p>Description: {{ $product->product_long_des }}</p>
        
        <div class="btn_main">
            <form action="{{ route('addtocart') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $product->id }}" name="product_id">
                <input type="hidden" value="{{ $product->product_price }}" name="product_price">
                <div class="form-group">
                    <label for="quantity">Số lượng:</label>
                    <input class="form-control" type="number" min="1" placeholder="1" name="quantity">
                </div>
                <input type="submit" class="btn btn-primary"
                style="width: 110px;margin-top: 10px;font-weight:530"
                value="Add To Cart">
            </form>
        </div>
    </div>
</section>

<section id="product1" class="section-p1">
    <h2>Related Products</h2>
    <div class="pro-container">
        @foreach ($productFs as $productF)
        <div class="pro">
            <img src="{{ asset($productF->product_img) }}" alt="">
            <div class="des">
                <h5>{{ $productF->product_name }}</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>{{ $productF->product_price }}</h4>
            </div>
            
            <a href="#"><i class="fa-solid fa-cart-plus cart"></i></a>
        </div>
        @endforeach
    </div>
</section>
@endsection