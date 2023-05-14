@extends('user_template.layouts.template')
@section('main-content')
<section id="hero">
    <h4>Trade-in-offer</h4>
    <h2>Super value deals</h2>
    <h1>On all products</h1>
    <p>Save more with coupons & up to 70% off!</p>
    <button>Shop Now</button>
</section>

<section id="feature" class="section-p1">
    <div class="fe-box">
        <img src="{{ asset('home/img/features/f1.png') }}" alt="">
        <h6>Free Shipping</h6>
    </div>
    <div class="fe-box">
        <img src="{{ asset('home/img/features/f2.png') }}" alt="">
        <h6>Online Order</h6>
    </div>
    <div class="fe-box">
        <img src="{{ asset('home/img/features/f3.png') }}" alt="">
        <h6>Save Money</h6>
    </div>
    <div class="fe-box">
        <img src="{{ asset('home/img/features/f4.png') }}" alt="">
        <h6>Promotions</h6>
    </div>
    <div class="fe-box">
        <img src="{{ asset('home/img/features/f5.png') }}" alt="">
        <h6>Happy Sell</h6>
    </div>
    <div class="fe-box">
        <img src="{{ asset('home/img/features/f6.png') }}" alt="">
        <h6>F24/7 Support</h6>
    </div>
</section>

<section id="product1" class="section-p1">
    <h2>Feature Products</h2>
    <p>Summer Collection New Morden Design</p>
    <div class="pro-container">
        @foreach ($products as $product)
        <div class="pro" onclick="window.location.href=
        '{{ route('singleproduct',[$product->id,$product->slug])}}';">
            <img src="{{ asset( $product->product_img ) }}" alt="">
            <div class="des">
                <h5>{{ $product->product_name }}</h5>
                <h4>{{ $product->product_price }} VND</h4>
            </div>
            <a href="{{ route('singleproduct',[$product->id,$product->slug]) }}"><i class="fa-solid fa-cart-plus cart"></i></a>
        </div>
        @endforeach
    </div>
</section>

<section id="banner" class="section-m1">
    <h4>Repair Services</h4>
    <h2>Up to <span>70% Off</span> - All t-Shirts & Accessories </h2>
    <button class="normal">Explore More</button>
</section>

{{-- <section id="product1" class="section-p1">
    <h2>New Arrivals</h2>
    <p>Summer Collection New Morden Design</p>
    <div class="pro-container">
        <div class="pro">
            <img src="{{ asset('home/img/products/n1.jpg') }}" alt="">
            <div class="des">
                <span>adidas</span>
                <h5>Cartoon Astronaut T-Shirts</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>$74</h4>
            </div>
            <a href="#"><i class="fa-solid fa-cart-plus cart"></i></a>
        </div>
    </div>
</section> --}}

<section id="sm-banner" class="section-p1">
    <div class="banner-box">
        <h4>crazy deals</h4>
        <h2>buy 1 get 1 free</h2>
        <span>The best classic dress is on sale at cara</span>
        <button class="white">Learn More</button>
    </div>
    <div class="banner-box banner-box2">
        <h4>spring/summer</h4>
        <h2>upcoming season</h2>
        <span>The best classic dress is on sale at cara</span>
        <button class="white">Collection</button>
    </div>
</section>

<section id="banner3" class="section-p1">
    <div class="banner-box">
        <h2>SEASONAL SALE</h2>
        <h3>Winter Collection -50% OFF</h3>
    </div>
    <div class="banner-box banner-box2">
        <h2>NEW FOOTWEAR COLLECTION</h2>
        <h3>Spring/Summer 2022</h3>
    </div>
    <div class="banner-box banner-box3">
        <h2>T-SHIRTS</h2>
        <h3>New Trendy Prints</h3>
    </div>
</section>
@endsection