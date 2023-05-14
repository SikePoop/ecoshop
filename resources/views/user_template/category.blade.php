@php
    $categories = App\Models\Category::latest()->get();
    $subcategories = App\Models\SubCategory::latest()->get();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTLWeb</title>
    <link rel="stylesheet" href="{{ asset('home/./style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
</head>
<body>

    <section id="header">
        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="{{ route('Home') }}"><img src="{{ asset('home/img/logo.png') }}" class="logo" alt=""></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('Home') }}">Home</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Shop
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      @foreach ($categories as $category)
                      @if ($category->id == $category_id->id)
                      <li>
                        <div class="dropright">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">Danh mục phụ</button>
                            <div class="dropdown-menu">
                              @foreach ($subcategories as $subcategory)
                              @if ($subcategory->category_id == $category->id)
                              <a class="dropdown-item" href="{{ route('subcategory',[$subcategory->id,$subcategory->slug]) }}">{{ $subcategory->subcategory_name }}</a>
                              @endif
                              @endforeach
                            </div>
                          </div>
                      </li>
                      @endif
                        @endforeach
                      <li><hr class="dropdown-divider"></li>
                      @foreach ($categories as $category)
                      <li><a class="dropdown-item" href="{{ route('category',[$category->id,$category->slug]) }}">
                        {{ $category->category_name }}</a></li>
                      @endforeach
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('showcart') }}">Cart</a>
                  </li>
                  @if (Auth::user())
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Hello {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('userprofile') }}">User Profile</a></li>
                      <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                  </li>
                  @else
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Login & Register
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                      <li><a class="dropdown-item" href="/register">Register</a></li>
                    </ul>
                  </li>
                  @endif
                </ul>
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
              </div>
            </div>
          </nav>
    </section>
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
                <h4>{{ $product->product_price }}</h4>
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


    <section id="newsletter" class="section-p1 section-m1">
        <div class="newsletter">
            <h4>Sign Up For newsletter</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers.</span>
            </p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your Email Address">
            <button class="normal">Sign Up</button>
        </div>
    </section>

    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="{{ asset('home/img/logo.png') }}" alt="">
            <h4>Contact</h4>
            <p><strong>Address: </strong>Hà Nội</p>
            <p><strong>Phone: </strong>015531485225</p>
            <p><strong>Hours: </strong>10:00 - 18:00, Mon - Sat</p>
            <div class="follow">
                <h4>Follow us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="#">About us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact Us</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>

        <div class="col install">
            <h4>Install App</h4>
            <p>From App Store or Google Play</p>
            <div class="row">
                <img src="{{ asset('home/img/pay/app.jpg') }}" alt="">
                <img src="{{ asset('home/img/pay/play.jpg') }}" alt="">
            </div>
            <p>Secured Payment Gateways </p>
            <img src="{{ asset('home/img/pay/pay.png') }}" alt="">
        </div>

        <div class="copyright">
            <p>@ 2022, LMFAO</p>
        </div>
    </footer>

    <script src="{{ asset('home/./script.js') }}"></script>
</body>
</html>