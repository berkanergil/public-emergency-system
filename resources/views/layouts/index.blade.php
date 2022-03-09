<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>EmergenCyp</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />
    <link rel="icon" href="{{ asset('images/favicon-16x16.png') }}">

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('css/landing_page/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/landing_page/LineIcons.2.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/landing_page/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/landing_page/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/landing_page/glightbox.min.css') }}s" />
    <link rel="stylesheet" href="{{ asset('css/landing_page/main.css') }}" />
    <script src="{{ url('https://kit.fontawesome.com/3a82b90854.js') }}" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ url('https://cdn.linearicons.com/free/1.0.0/icon-font.min.css') }}">
</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="nav-inner">
                        <!-- Start Navbar -->
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="{{ route('emergencyp') }}">
                                <img src="{{ asset('images/logo-white-sm.png') }}" alt="EmergenCyp Logo">
                            </a>
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="#home" class="page-scroll active"
                                            aria-label="Toggle navigation">{{ __('Home') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#features" class="page-scroll"
                                            aria-label="Toggle navigation">{{ __('Features') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#overview" aria-label="Toggle navigation">{{ __('Overview') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#team" aria-label="Toggle navigation">{{ __('Team') }}</a>
                                    </li>

                                </ul>
                            </div> <!-- navbar collapse -->
                            @include('layouts/languageSwitcher')

                            <div class="button add-list-button">
                                <a href="{{ route('login') }}" class="btn">{{ __('Sign In') }}</a>
                            </div>
                        </nav>
                        <!-- End Navbar -->
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    <!-- End Header Area -->

    <!-- Start Hero Area -->
    <section id="home" class="hero-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12 col-12">
                    <div class="hero-content">
                        <h1 class="wow fadeInLeft" data-wow-delay=".4s">
                            {{ __('A powerful app for your emergencies.') }}</h1>
                        <p class="wow fadeInLeft" data-wow-delay=".6s">
                            {{ __('EmergenCyp is a graduation project for Eastern Mediterranean University for Tolgahan Dayanıklı, Khairat Yakaka and Anas Nidal. It is not a real world application to be used by people - yet!') }}
                        </p>
                        <div class="button wow fadeInLeft" data-wow-delay=".8s">
                            <a href="javascript:void(0)" class="btn"><i class="fa-brands fa-app-store"></i>
                                App
                                Store</a>
                            <a href="javascript:void(0)" class="btn btn-alt"><i class="fa-brands fa-google-play"></i>
                                Google
                                Play</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-12">
                    <div class="hero-image wow fadeInRight" data-wow-delay=".4s">
                        <img src="assets/images/hero/phone.png" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->

    <!-- Start Features Area -->
    <section id="features" class="features section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h3 class="wow zoomIn" data-wow-delay=".2s">{{ __('Features') }}</h3>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">
                            {{ __('Minimum Time & Effort') }}
                            <br>
                            {{ __('Maximum Efficiency') }}
                        </h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">
                            {{ __('We are providing good user experience, good user interfaces, and all the information we have learned during our education.') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Feature -->
                    <div class="single-feature wow fadeInUp" data-wow-delay=".2s">
                        <i class="lnr lnr-smartphone"></i>
                        <h3>{{ __('Use Your Mobile To Report') }}</h3>
                        <p>{{ __('Simply fill the form, upload evidence, and add the location to report your emergency.') }}
                        </p>
                    </div>
                    <!-- End Single Feature -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Feature -->
                    <div class="single-feature wow fadeInUp" data-wow-delay=".4s">
                        <i class="lnr lnr-user"></i>
                        <h3>{{ __('Web Authorities Will View') }}</h3>
                        <p>{{ __('Web Authorities will view your emergency and deploy the necessary emergency units with your report details.') }}
                        </p>
                    </div>
                    <!-- End Single Feature -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Feature -->
                    <div class="single-feature wow fadeInUp" data-wow-delay=".6s">
                        <i class="lnr lnr-map-marker"></i>
                        <h3>{{ __('Emergency Units On The Way') }}</h3>
                        <p>{{ __('Once your report is reached to web authority, the agents will get notification to reach you in the closest time possible tracking the location sent during the reporting.') }}
                        </p>
                    </div>
                    <!-- End Single Feature -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Feature -->
                    <div class="single-feature wow fadeInUp" data-wow-delay=".2s">
                        <i class="lnr lnr-bubble"></i>
                        <h3>{{ __('Contact Us') }}</h3>
                        <p>{{ __('If you have questions or any trouble, you can contact us.') }}</p>
                    </div>
                    <!-- End Single Feature -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Feature -->
                    <div class="single-feature wow fadeInUp" data-wow-delay=".4s">
                        <i class="lnr lnr-cog"></i>
                        <h3>{{ __('Powerful System') }}</h3>
                        <p>{{ __('The system is accurate, you can feel free to use it!') }}</p>
                    </div>
                    <!-- End Single Feature -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Feature -->
                    <div class="single-feature wow fadeInUp" data-wow-delay=".6s">
                        <i class="lnr lnr-layers"></i>
                        <h3>{{ __('Database Storage') }}</h3>
                        <p>{{ __('The reports will be kept in our databases for in need of any investigation of the emergency.') }}
                        </p>
                    </div>
                    <!-- End Single Feature -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Features Area -->

    <!-- Start Achievement Area -->
    <section id="overview" class="our-achievement section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                    <div class="title">
                        <h2>{{ __('Trusted by Assoc.Prof.Dr.Duygu Çelik as our supervisor') }}</h2>
                        <p>{{ __('We have disturbed her many times to make things go on') }} <span
                                class="lnr lnr-smile"></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="single-achievement wow fadeInUp" data-wow-delay=".2s">
                                <h3 class="counter"><span id="secondo1" class="countup"
                                        cup-end="100">100</span>%</h3>
                                <p>{{ __('satisfaction') }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="single-achievement wow fadeInUp" data-wow-delay=".4s">
                                <h3 class="counter">+<span id="secondo2" class="countup"
                                        cup-end="100">100</span>K</h3>
                                <p>{{ __('Report Capacity') }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="single-achievement wow fadeInUp" data-wow-delay=".6s">
                                <h3 class="counter"><span id="secondo3" class="countup"
                                        cup-end="125">235</span></h3>
                                <p>{{ __('Emergency Units') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Achievement Area -->
    <section id="team" class="team section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                    <div class="title">
                        <h2>{{ __('Our Team') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 offset-lg-12 col-md-12 col-12">
                    <div class="row active-with-click">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <article class="material-card Blue">
                                <h2>
                                    <span>Khairat Yakaka Ahmed Monguno</span>
                                    <strong>
                                        {{ __('Backend Developer / Analyzer') }}
                                    </strong>
                                </h2>
                                <div class="mc-content">
                                    <div class="img-container">
                                        <img class="img-responsive"
                                            src="https://material-cards.s3-eu-west-1.amazonaws.com/thumb-christopher-walken.jpg">
                                    </div>
                                    <div class="mc-description">
                                        He has appeared in more than 100 films and television shows, including The Deer
                                        Hunter, Annie Hall, The Prophecy trilogy, The Dogs of War ...
                                    </div>
                                </div>
                                <a class="mc-btn-action">
                                    <i class="fa fa-bars"></i>
                                </a>
                                <div class="mc-footer">
                                    <h4>
                                        {{ __('Social') }}
                                    </h4>
                                    <a class="fa fa-fw fa-facebook"></a>
                                    <a class="fa fa-fw fa-twitter"></a>
                                    <a class="fa fa-fw fa-linkedin"></a>
                                    <a class="fa fa-fw fa-google-plus"></a>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <article class="material-card Blue-Grey">
                                <h2>
                                    <span>Tolgahan Dayanıklı</span>
                                    <strong>
                                        {{ __('Team Leader / Full-Stack Developer') }}
                                    </strong>
                                </h2>
                                <div class="mc-content">
                                    <div class="img-container">
                                        <img class="img-responsive" src="{{ asset('images/tolga_home_bg.jpg') }}">
                                    </div>
                                    <div class="mc-description">
                                        He has won two Academy Awards, for his roles in the mystery drama Mystic River
                                        (2003) and the biopic Milk (2008). Penn began his acting career in television
                                        with a brief appearance in a 1974 episode of Little House on the Prairie ...
                                    </div>
                                </div>
                                <a class="mc-btn-action">
                                    <i class="fa fa-bars"></i>
                                </a>
                                <div class="mc-footer">
                                    <h4>
                                        {{ __('Social') }}
                                    </h4>
                                    <a class="fa fa-fw fa-facebook"></a>
                                    <a class="fa fa-fw fa-twitter"></a>
                                    <a class="fa fa-fw fa-linkedin"></a>
                                    <a class="fa fa-fw fa-google-plus"></a>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <article class="material-card Teal">
                                <h2>
                                    <span>Anas Nidal</span>
                                    <strong>
                                        {{ __('Mobile Application Developer / Tester') }}
                                    </strong>
                                </h2>
                                <div class="mc-content">
                                    <div class="img-container">
                                        <img class="img-responsive"
                                            src="https://material-cards.s3-eu-west-1.amazonaws.com/thumb-clint-eastwood.jpg">
                                    </div>
                                    <div class="mc-description">
                                        He rose to international fame with his role as the Man with No Name in Sergio
                                        Leone's Dollars trilogy of spaghetti Westerns during the 1960s ...
                                    </div>
                                </div>
                                <a class="mc-btn-action">
                                    <i class="fa fa-bars"></i>
                                </a>
                                <div class="mc-footer">
                                    <h4>
                                        {{ __('Social') }}
                                    </h4>
                                    <a class="fa fa-fw fa-facebook"></a>
                                    <a class="fa fa-fw fa-twitter"></a>
                                    <a class="fa fa-fw fa-linkedin"></a>
                                    <a class="fa fa-fw fa-google-plus"></a>
                                </div>
                            </article>
                        </div>

                    </div>
    </section>
    </div>
    </div>
    </div>
    </section>

    <!--/ End Pricing Table Area -->



    <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Start Footer Top -->
        <div class="footer-top">
            <div class="container">
                © 2022 Emergencyp.com - {{ __('All rights reserved.') }}
            </div>
        </div>
        <!--/ End Footer Top -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lnr lnr-arrow-up-circle"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('js/landing_page/bootstrap.min.') }}"></script>
    <script src="{{ asset('js/landing_page/wow.min.js') }}"></script>
    <script src="{{ asset('js/landing_page/tiny-slider.js') }}"></script>
    <script src="{{ asset('js/landing_page/glightbox.min.js') }}"></script>
    <script src="{{ asset('js/landing_page/count-up.min.js') }}"></script>
    <script src="{{ asset('js/landing_page/main.js') }}"></script>
    <script src="{{ url('https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js') }}"></script>
    <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js') }}"></script>
    <script type="text/javascript">
        //====== counter up 
        var cu = new counterUp({
            start: 0,
            duration: 2000,
            intvalues: true,
            interval: 100,
            append: " ",
        });
        cu.start();
    </script>
    <script>
        $(function() {
            $('.material-card > .mc-btn-action').click(function() {
                var card = $(this).parent('.material-card');
                var icon = $(this).children('i');
                icon.addClass('fa-spin-fast');

                if (card.hasClass('mc-active')) {
                    card.removeClass('mc-active');

                    window.setTimeout(function() {
                        icon
                            .removeClass('fa-arrow-left')
                            .removeClass('fa-spin-fast')
                            .addClass('fa-bars');

                    }, 800);
                } else {
                    card.addClass('mc-active');

                    window.setTimeout(function() {
                        icon
                            .removeClass('fa-bars')
                            .removeClass('fa-spin-fast')
                            .addClass('fa-arrow-left');

                    }, 800);
                }
            });
        });
    </script>

</body>

</html>
