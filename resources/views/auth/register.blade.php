<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <title>Регистрация</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/bulkapp/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/bulkapp/vendors/linericon/style.css')}}">
    <link rel="stylesheet" href="{{asset('/bulkapp/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/bulkapp/vendors/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('/bulkapp/vendors/lightbox/simpleLightbox.css')}}">
    <link rel="stylesheet" href="{{asset('/bulkapp/vendors/nice-select/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('/bulkapp/vendors/animate-css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('/bulkapp/vendors/popup/magnific-popup.css')}}">
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('/bulkapp/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/bulkapp/css/responsive.css')}}">
</head>
<body data-spy="scroll" data-target="#mainNav" data-offset="70">

<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu" id="mainNav">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="/"><strong style="color: white; font-size: 30px;">SmsBulks</strong></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="/">Главная</a></li>
                        @if (Route::has('login'))

                            @auth
                                <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Кабинет</a></li>
                            @else
                                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Войти</a></li>
                                @if (Route::has('register'))
                                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Регистрация</a></li>
                                @endif
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================Header Menu Area =================-->

<!--================Home Banner Area =================-->
<section class="home_banner_area" id="home">
    <div class="banner_inner">
        <div class="container">
            <div class="row banner_content">

            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Feature Area =================-->
<section class="feature_area p_120" id="feature">
    <div class="container">
        <div class="main_title">
            <h2>Регистрация</h2>
        </div>
        <div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Логин</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Почта</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Подтвердить пароль</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Регистрация
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--================End Feature Area =================-->

<!--================Interior Area =================-->
<footer class="footer-area p_120">
    <div class="container">
        <div class="row">
            <div class="col-lg-3  col-md-6 col-sm-6">
                <div class="single-footer-widget tp_widgets">

                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="single-footer-widget news_widgets">
                    {{--                    <h6 class="footer_title">Newsletter</h6>--}}
                    {{--                    <p>You can trust us. we only send promo offers, not a single spam.</p>--}}
                    {{--                    <div id="mc_embed_signup">--}}
                    {{--                        <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative">--}}
                    {{--                            <div class="input-group d-flex flex-row">--}}
                    {{--                                <input name="EMAIL" placeholder="Your email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">--}}
                    {{--                                <button class="btn sub-btn">Get Started</button>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="mt-10 info"></div>--}}
                    {{--                        </form>--}}
                    {{--                    </div>--}}
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 offset-lg-1">
                <div class="single-footer-widget instafeed">
                    {{--                    <h6 class="footer_title">Instagram Feed</h6>--}}
                    {{--                    <ul class="list instafeed d-flex flex-wrap">--}}
                    {{--                        <li><img src="{{asset('bulkapp/img/instagram/Image-01.jpg')}}" alt=""></li>--}}
                    {{--                        <li><img src="{{asset('bulkapp/img/instagram/Image-02.jpg')}}" alt=""></li>--}}
                    {{--                        <li><img src="{{asset('bulkapp/img/instagram/Image-03.jpg')}}" alt=""></li>--}}
                    {{--                        <li><img src="{{asset('bulkapp/img/instagram/Image-04.jpg')}}" alt=""></li>--}}
                    {{--                        <li><img src="{{asset('bulkapp/img/instagram/Image-05.jpg')}}" alt=""></li>--}}
                    {{--                        <li><img src="{{asset('bulkapp/img/instagram/Image-06.jpg')}}" alt=""></li>--}}
                    {{--                        <li><img src="{{asset('bulkapp/img/instagram/Image-07.jpg')}}" alt=""></li>--}}
                    {{--                        <li><img src="{{asset('bulkapp/img/instagram/Image-08.jpg')}}" alt=""></li>--}}
                    {{--                    </ul>--}}
                </div>
            </div>
        </div>
        <div class="row footer-bottom d-flex justify-content-between align-items-center">
            <span class="text-center text-sm-left d-md-inline-block">Copyright © 2021 <a href="https://vk.com/w__a__s__p">Biba</a>  and <a
                    href="https://vk.com/oleg.hrokalo">Boba</a>  v2.0. All Rights Reserved.</span>
            <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Crafted with <i class="fa fa-heart text-danger"></i> by <a href="https://laravel.com/" class="text-dark" target="_blank">Laravel</a></span>

            <div class="col-lg-4 col-md-4 footer-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-behance"></i></a>
            </div>
        </div>
    </div>
</footer>
<!--================ End footer Area  =================-->





<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('/bulkapp/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('/bulkapp/js/popper.js')}}"></script>
<script src="{{asset('/bulkapp/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/bulkapp/js/stellar.js')}}"></script>
<script src="{{asset('/bulkapp/vendors/lightbox/simpleLightbox.min.js')}}"></script>
<script src="{{asset('/bulkapp/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('/bulkapp/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('/bulkapp/vendors/isotope/isotope-min.js')}}"></script>
<script src="{{asset('/bulkapp/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('/bulkapp/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('/bulkapp/vendors/counter-up/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('/bulkapp/vendors/counter-up/jquery.counterup.js')}}"></script>
<script src="{{asset('/bulkapp/js/mail-script.js')}}"></script>
<script src="{{asset('/bulkapp/vendors/popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('/bulkapp/js/theme.js')}}"></script>
</body>
</html>
