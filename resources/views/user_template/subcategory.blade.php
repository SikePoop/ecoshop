@extends('user_template.layouts.template')
@section('main-content')
<section id="page-header">
    <h2>#stay home</h2>
    <p>Save more with coupons & up to 70% off!</p>
</section>

<section id="product1" class="section-p1">
    <div class="pro-container">
        @foreach ($products as $product)
        <div class="pro" onclick="window.location.href=
        '{{ route('singleproduct',[$product->id,$product->slug])}}';">
            <img src="{{ asset($product->product_img) }}" alt="">
            <div class="des">
                <h5>{{ $product->product_name }}</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>{{ $product->product_price }} VND</h4>
            </div>
            <a href="#"><i class="fa-solid fa-cart-plus cart"></i></a>
        </div>
        @endforeach
    </div>
</section>

{{-- <section id="pagination" class="section-p1">
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#"><i class="fa fa-long-arrow-alt-right"></i></a> --}}


@endsection