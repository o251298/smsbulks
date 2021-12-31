<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <meta name="KeyWords" content="смс рассылка, вайбер рассылка, удалился вайбер, массовая рассылка"/>
    <meta name="Description" content="смс рассылка, вайбер рассылка, удалился вайбер, массовая рассылка" />
    <title>SmsBulks | сервис рассылок смс | массовая рассылка | Вайбер рассылка</title>
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
                        <li class="nav-item active"><a class="nav-link" href="#home">Главная</a></li>
                        <li class="nav-item"><a class="nav-link" href="#feature">Услуги</a></li>
                        <li class="nav-item"><a class="nav-link" href="#price">Цены</a>
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
                <div class="col-lg-9">
                    <h2>
                        Мы улучшаем вашу
                        <br />
                        коммуникацию с клиентом
                    </h2>


                    <p>
                        SmsBulks — сервис CMC рассылок, официальный партнёр Viber и операторов мобильной связи Украины. Создавайте массовые СМС рассылки рекламы, сообщайте про акции и скидки сразу после регистрации!
                    </p>
                    <a class="banner_btn" href="{{route('login')}}">Попробовать</a>
                </div>
                <div class="col-lg-3">
                    <div class="banner_map_img">
                        <img class="img-fluid" src="img/banner/right-mobile.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Feature Area =================-->
<section class="feature_area p_120" id="feature">
    <div class="container">
        <div class="main_title">
            <h2>ОСНОВНЫЕ УСЛУГИ</h2>
            <p>Рассылайте SMS бонусы, сообщайте про акции и скидки
                сразу после регистрации!</p>
        </div>
        <div class="feature_inner row">
            <div class="col-lg-3 col-md-6">
                <div class="feature_item">
                    <img src="{{asset('bulkapp/img/icon/f-icon-1.png')}}" alt="">
                    <h4>SMS и Viber сообщения</h4>
                    <p>
                        По опросам ведущих маркетологов - это самый эффективный способ сообщить действующим или потенциальным клиентам о предстоящих акциях, событиях, скидках.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature_item">
                    <img src="{{asset('bulkapp/img/icon/f-icon-1.png')}}" alt="">
                    <h4>Таргетированные СМС-рассылки</h4>
                    <p>
                        Не тратьте деньги зря. Отправляйте сообщения только своей целевой аудитории - определенный регион, сфера интересов, пол, возраст. Мы вам поможем!
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature_item">
                    <img src="{{asset('bulkapp/img/icon/f-icon-1.png')}}" alt="">
                    <h4>Простая интеграция</h4>
                    <p>
                        Простая интеграция с любой системой позволяет отправлять сообщения автоматически: подтверждение пароля, доставка товара, подача такси и прочее.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature_item">
                    <img src="{{asset('bulkapp/img/icon/f-icon-1.png')}}" alt="">
                    <h4>WEB Интерфейс</h4>
                    <p>СМС рассылка с сайта сразу после регистрации. 10000 клиентов получат Ваше sms сообщение в течение двух минут!</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Feature Area =================-->

<!--================Interior Area =================-->
<section class="interior_area">
    <div class="container">
        <div class="interior_inner row">
            <div class="col-lg-6">
                <img class="img-fluid" src="https://seo24.kiev.ua/wp-content/uploads/chto-takoe-api.jpg" alt="">
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="interior_text">
                    <h4>Интеграции SmsBulks
                    </h4>
                    <p>
                        Существующие приложения и CRM системы автоматизируют бизнес-процессы и помогают собственникам бизнеса контролировать все сферы деятельности компаний. Автоматизация минимизирует рутинную работу и, как результат, экономит время и средства. А интеграция с приложением SMS рассылок создает эффективную систему коммуникаций с клиентами и сотрудниками компании.
                    </p>
                    <a class="main_btn" href="#">See Details</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Interior Area =================-->

<!--================Interior Area =================-->
<section class="interior_area interior_two">
    <div class="container">
        <div class="interior_inner row">
            <div class="col-lg-5 offset-lg-1">
                <div class="interior_text">
                    <h4>Начните сейчас</h4>
                    <p>
                        В Вашем распоряжении удобный личный кабинет, 10 бесплатных смс на тест и персональный менеджер, готовый помочь с настройкой и запуском смс-рассылки.
                    </p>
                    <a class="main_btn" href="#">See Details</a>
                </div>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid" src="https://www.smsapi.com/blog/wp-content/uploads/2015/10/iPhone_6_rtv2_1.png" alt="">
            </div>
        </div>
    </div>
</section>
<!--================End Interior Area =================-->

<!--================Price Area =================-->
<section class="price_area p_120" id="price">
    <div class="container">
        <div class="main_title">
            <h2>Цены</h2>
            <p>
                Услуги оплачиваются согласно тарифов, указанных в таблице.
                Чем больше сумма при пополнении счёта, тем дешевле каждое отправленное SMS.
            </p>
        </div>
        <div class="price_item_inner row">
            <div class="col-lg-4">
                <div class="price_item">
                    <div class="price_head">
                        <div class="float-left">
                            <h3>Standard</h3>
                            <p>Плата только за часть смс</p>
                        </div>
                        <div class="float-right">
                            <h2>0.36 грн</h2>
                        </div>
                    </div>
                    <div class="price_body">
                        <ul class="list">
                            <li><a href="#">Бесплатное АИ</a></li>
                            <li><a href="#">Загрузка до 20 баз в формате CSV</a></li>
                            <li><a href="#">Массовые рассылки</a></li>
                        </ul>
                    </div>
                    <div class="price_footer">
                        <a class="main_btn2" href="#">Купить</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="price_item">
                    <div class="price_head">
                        <div class="float-left">
                            <h3>Full</h3>
                            <p>Плата только за часть смс</p>
                        </div>
                        <div class="float-right">
                            <h2>0.36 грн + 400 грн</h2>
                        </div>
                    </div>
                    <div class="price_body">
                        <ul class="list">
                            <li><a href="#">Бесплатное АИ</a></li>
                            <li><a href="#">Загрузка до 100 баз в формате CSV, TXT</a></li>
                            <li><a href="#">Массовые рассылки</a></li>
                        </ul>
                    </div>
                    <div class="price_footer">
                        <a class="main_btn2" href="#">Купить</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="price_item">
                    <div class="price_head">
                        <div class="float-left">
                            <h3>Premium</h3>
                            <p>Плата только за часть смс</p>
                        </div>
                        <div class="float-right">
                            <h2>0.36 грн + 800</h2>
                        </div>
                    </div>
                    <div class="price_body">
                        <ul class="list">
                            <li><a href="#">Бесплатное АИ</a></li>
                            <li><a href="#">Загрузка безграничного кол-ва баз в формате CSV, TXT, EXCEL</a></li>
                            <li><a href="#">Массовые рассылки</a></li>
                            <li><a href="#">Месенджеры рассылки</a></li>
                        </ul>
                    </div>
                    <div class="price_footer">
                        <a class="main_btn2" href="#">Купить</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Price Area =================-->

<!--================Feature Area =================-->
{{--<section class="screenshot_area p_120" id="screen">--}}
{{--    <div class="container">--}}
{{--        <div class="main_title">--}}
{{--            <h2>Unique Screenshots</h2>--}}
{{--            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua.</p>--}}
{{--        </div>--}}
{{--        <div class="screenshot_inner owl-carousel">--}}
{{--            <div class="item">--}}
{{--                <img src="{{asset('bulkapp/img/feature/feature-1.jpg')}}" alt="">--}}
{{--            </div>--}}
{{--            <div class="item">--}}
{{--                <img src="{{asset('bulkapp/img/feature/feature-2.jpg')}}" alt="">--}}
{{--            </div>--}}
{{--            <div class="item">--}}
{{--                <img src="{{asset('bulkapp/img/feature/feature-3.jpg')}}" alt="">--}}
{{--            </div>--}}
{{--            <div class="item">--}}
{{--                <img src="{{asset('bulkapp/img/feature/feature-4.jpg')}}" alt="">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<!--================End Feature Area =================-->

<!--================Testimonials Area =================-->
{{--<section class="testimonials_area p_120">--}}
{{--    <div class="container">--}}
{{--        <div class="main_title">--}}
{{--            <h2>Testimonials</h2>--}}
{{--            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua.</p>--}}
{{--        </div>--}}
{{--        <div class="testi_slider owl-carousel">--}}
{{--            <div class="item">--}}
{{--                <div class="testi_item">--}}
{{--                    <div class="media">--}}
{{--                        <div class="d-flex">--}}
{{--                            <img src="{{asset('bulkapp/img/testimonials/testi-1.png')}}" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="media-body">--}}
{{--                            <p>Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware.</p>--}}
{{--                            <h4>Mark Alviro Wiens</h4>--}}
{{--                            <h5>CEO at Google</h5>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="item">--}}
{{--                <div class="testi_item">--}}
{{--                    <div class="media">--}}
{{--                        <div class="d-flex">--}}
{{--                            <img src="{{asset('bulkapp/img/testimonials/testi-2.png')}}" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="media-body">--}}
{{--                            <p>Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware.</p>--}}
{{--                            <h4>Mark Alviro Wiens</h4>--}}
{{--                            <h5>CEO at Google</h5>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<!--================End Testimonials Area =================-->

<!--================Download App Area =================-->
{{--<section class="download_app_area p_120">--}}
{{--    <div class="container">--}}
{{--        <div class="app_inner">--}}
{{--            <h2>Download This App Today!</h2>--}}
{{--            <p>It won’t be a bigger problem to find one video game lover in your neighbor. Since the introduction of Virtual Game, it has been achieving great heights so far as its popularity and technological advancement are concerned.</p>--}}
{{--            <div class="app_btn_area">--}}
{{--                <div class="app_btn">--}}
{{--                    <div class="media">--}}
{{--                        <div class="d-flex">--}}
{{--                            <i class="fa fa-apple" aria-hidden="true"></i>--}}
{{--                        </div>--}}
{{--                        <div class="media-body">--}}
{{--                            <a href="#"><h4>Available</h4></a>--}}
{{--                            <p>on App Store</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="app_btn">--}}
{{--                    <div class="media">--}}
{{--                        <div class="d-flex">--}}
{{--                            <i class="fa fa-android" aria-hidden="true"></i>--}}
{{--                        </div>--}}
{{--                        <div class="media-body">--}}
{{--                            <a href="#"><h4>Available</h4></a>--}}
{{--                            <p>on App Store</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<!--================End Download App Area =================-->

<!--================Latest News Area =================-->
{{--<section class="latest_news_area p_120">--}}
{{--    <div class="container">--}}
{{--        <div class="main_title">--}}
{{--            <h2>Latest News</h2>--}}
{{--            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua.</p>--}}
{{--        </div>--}}
{{--        <div class="latest_news_inner row">--}}
{{--            <div class="col-lg-4">--}}
{{--                <div class="l_news_item">--}}
{{--                    <a class="date" href="#">10 April, 2018</a>--}}
{{--                    <a href="#"><h4>Benjamin Franklin Method Of Habit Formation</h4></a>--}}
{{--                    <p>There are many kinds of narratives and organizing principles. Science is driven by evidence gathered in experiments, and by the falsification of extant theories and their </p>--}}
{{--                    <div class="post_view">--}}
{{--                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 4.5k Views</a>--}}
{{--                        <a href="#"><i class="fa fa-commenting" aria-hidden="true"></i> 07</a>--}}
{{--                        <a href="#"><i class="fa fa-reply" aria-hidden="true"></i> 362</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-4">--}}
{{--                <div class="l_news_item">--}}
{{--                    <a class="date" href="#">10 April, 2018</a>--}}
{{--                    <a href="#"><h4>Benjamin Franklin Method Of Habit Formation</h4></a>--}}
{{--                    <p>There are many kinds of narratives and organizing principles. Science is driven by evidence gathered in experiments, and by the falsification of extant theories and their </p>--}}
{{--                    <div class="post_view">--}}
{{--                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 4.5k Views</a>--}}
{{--                        <a href="#"><i class="fa fa-commenting" aria-hidden="true"></i> 07</a>--}}
{{--                        <a href="#"><i class="fa fa-reply" aria-hidden="true"></i> 362</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-4">--}}
{{--                <div class="l_news_item">--}}
{{--                    <a class="date" href="#">10 April, 2018</a>--}}
{{--                    <a href="#"><h4>Benjamin Franklin Method Of Habit Formation</h4></a>--}}
{{--                    <p>There are many kinds of narratives and organizing principles. Science is driven by evidence gathered in experiments, and by the falsification of extant theories and their </p>--}}
{{--                    <div class="post_view">--}}
{{--                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 4.5k Views</a>--}}
{{--                        <a href="#"><i class="fa fa-commenting" aria-hidden="true"></i> 07</a>--}}
{{--                        <a href="#"><i class="fa fa-reply" aria-hidden="true"></i> 362</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<!--================End Latest News Area =================-->

<!--================ start footer Area  =================-->
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
