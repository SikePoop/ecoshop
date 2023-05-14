@extends('user_template.layouts.template')
@section('main-content')
{{-- <section id="about-head" class="section-p1">
    <img src="{{ asset('home/img/banner/b21.jpg') }}" width="100%" alt="">
    <div>
        <h2>Who We Are?</h2>
        <h3>Levents® - Popular Streetwear brand</h3>
        <h4>Chúng tôi là thương hiệu thời trang Đường phố nổi tiếng với định hướng
            cung cấp sản phẩm có chất lượng cao, sành điệu với giá thành hợp lý.
            </h4>
        <br><br>
    </div>
</section> --}}


    <div class="container" style="margin-top:30px;">
        <div class="row" style="margin-top:100px;margin-bottom:100px">
            <div class="col-6" style="display:flex;
            justify-content:center;align-items:center">
                <h3>Levents® - Popular Streetwear brand</h3>
            </div>
            <div class="col-6">
                <p>Chúng tôi là thương hiệu thời trang Đường phố nổi tiếng với định hướng
                    cung cấp sản phẩm có chất lượng cao, sành điệu với giá thành hợp lý.
                </div>
        </div>
        <div class="row">
            <img src="{{ asset('home/img/banner/b21.jpg') }}" width="100%" alt="">
        </div>
        <div class="row" style="margin-top:100px;margin-bottom:100px">
            <div class="col-6" style="display:flex;
            justify-content:center;align-items:center">
                <h3>Chúng tôi là ai?</h3>
            </div>
            <div class="col-6">
                <p>Levents® là lựa chọn hàng đầu dành cho các tín đồ thời trang Đường phố sành điệu. Sứ mệnh của Levents® là trao quyền cho thế hệ trẻ toàn thế giới tự do thể hiện phong cách thông qua thời trang, thương hiệu vượt qua ranh giới của thời trang đường phố
                    bằng cách không ngừng sáng tạo các trang phục với các bộ sưu tập độc đáo.</p>
            </div>
        </div>
        <div class="row" style="margin-top: 30px">
            <img src="{{ asset('home/img/about/a7.jpg') }}" alt="">
        </div>
        <div class="row" style="margin-top:100px;margin-bottom:100px">
            <div class="col-6" style="display:flex;
            justify-content:center;align-items:center">
                <h3>Chất lượng trải nghiệm vượt trội</h3>
            </div>
            <div class="col-6">
                <p>
                    Chúng tôi không ngừng nỗ lực, tập trung vào chất lượng sản phẩm và trải nghiệm mua sắm vượt trội nhất chưa từng có trước đây, các cửa hàng vật lý của chúng tôi, tối ưu hóa trải nghiệm, giúp người dùng mua sắm một sản phẩm cao cấp thật sự.
Mua sắm trực tuyến dễ dàng, đa nền tảng trải nghiệm tuyệt vời. Giá thành hợp lý.
Điều này đã giải quyết bài toán để bạn vừa cân đối khả năng tài chính, vừa đáp ứng hoàn hảo cho nhu cầu thời trang của bạn và xu hướng nhanh của thời đại.
                </p>
         </div>
        </div>
    </div>

<section id="about-app" class="section-p1">
    <h1>Download Our <a href="#">App</a></h1>
    <div class="video">
        <video autoplay muted loop src="{{ asset('home/img/about/1.mp4') }}"></video>
    </div>
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

@endsection