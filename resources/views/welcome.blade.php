<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:27:43 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Kufa - Personal Portfolio HTML5 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('website_assets') }}/img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('website_assets') }}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('website_assets') }}/css/animate.min.css">
        <link rel="stylesheet" href="{{ asset('website_assets') }}/css/magnific-popup.css">
        <link rel="stylesheet" href="{{ asset('website_assets') }}/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="{{ asset('website_assets') }}/css/flaticon.css">
        <link rel="stylesheet" href="{{ asset('website_assets') }}/css/slick.css">
        <link rel="stylesheet" href="{{ asset('website_assets') }}/css/aos.css">
        <link rel="stylesheet" href="{{ asset('website_assets') }}/css/default.css">
        <link rel="stylesheet" href="{{ asset('website_assets') }}/css/style.css">
        <link rel="stylesheet" href="{{ asset('website_assets') }}/css/responsive.css">
    </head>
    <body class="theme-bg">

        <!-- preloader -->
        <div id="preloader">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                </div>
            </div>
        </div>
        <!-- preloader-end -->

        <!-- header-start -->
        <header>
            <div id="header-sticky" class="transparent-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-menu">
                                <nav class="navbar navbar-expand-lg">
                                    <a href="index.html" class="navbar-brand logo-sticky-none"><img src="{{ asset('website_assets') }}/img/logo/logo.png" alt="Logo"></a>
                                    <a href="index.html" class="navbar-brand s-logo-none"><img src="{{ asset('website_assets') }}/img/logo/s_logo.png" alt="Logo"></a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarNav">
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav ml-auto">
                                            @foreach ($navbars as $navbar)
                                                <li class="nav-item {{ $navbar->links == 'home' ? 'active' : '' }}"><a class="nav-link" href="#{{ $navbar->links }}">{{ $navbar->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="header-btn">
                                        <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- offcanvas-start -->
            <div class="extra-info">
                <div class="close-icon menu-close">
                    <button>
                        <i class="far fa-window-close"></i>
                    </button>
                </div>
                <div class="logo-side mb-30">
                    <a href="index-2.html">
                        <img src="img/logo/logo.png" alt="" />
                    </a>
                </div>
                <div class="side-info mb-30">
                    <div class="contact-list mb-30">
                        <h4>Office Address</h4>
                        <p>123/A, Miranda City Likaoli
                            Prikano, Dope</p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Phone Number</h4>
                        <p>+0989 7876 9865 9</p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Email Address</h4>
                        <p>info@example.com</p>
                    </div>
                </div>
                <div class="social-icon-right mt-20">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="offcanvas-overly"></div>
            <!-- offcanvas-end -->
        </header>
        <!-- header-end -->

        <!-- main-area -->
        <main>

            <!-- banner-area -->
            <section id="home" class="banner-area banner-bg fix">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-6">
                            @if ($banner['banner_status'] == 'active')
                                <div class="banner-content">
                                    <h6 class="wow fadeInUp" data-wow-delay="0.2s">HELLO!</h6>
                                    <h2 class="wow fadeInUp" data-wow-delay="0.4s">I am {{ $banner->getUserName->name }}</h2>
                                    <p class="wow fadeInUp" data-wow-delay="0.6s">I'm {{ $banner->getUserName->name }},{{ $banner['banner_descriptions'] }}</p>
                                    <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                        <ul>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                        </ul>
                                    </div>
                                    <a href="#" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                                </div>
                                </div>
                                <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                                    <div class="banner-img text-right">
                                        @if ($banner['banner_photo'])
                                            <img src="{{ asset('uploads/website_components_photos/banner_photos/') }}/{{ $banner['banner_photo'] }}" alt="">
                                        @else
                                            <img src="{{ asset('website_assets') }}/img/banner/banner_img.png" alt="">
                                        @endif
                                    </div>
                                </div>
                            @else
                            <div class="banner-content">
                                    <h6 class="wow fadeInUp" data-wow-delay="0.2s">HELLO!</h6>
                                    <h2 class="wow fadeInUp" data-wow-delay="0.4s">I am Will Smith</h2>
                                    <p class="wow fadeInUp" data-wow-delay="0.6s">I'm Will Smith, professional web developer with long time experience in this field​.</p>
                                    <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                        <ul>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                        </ul>
                                    </div>
                                    <a href="#" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                                </div>
                                </div>
                                <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                                    <div class="banner-img text-right">
                                        <img src="{{ asset('website_assets') }}/img/banner/banner_img.png" alt="">
                                    </div>
                                </div>
                            @endif
                    </div>
                </div>
                
                <div class="banner-shape"><img src="img/shape/dot_circle.png" class="rotateme" alt="img"></div>
            </section>
            <!-- banner-area-end -->

            <!-- about-area-->
            <section id="about" class="about-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        @if ($about_des['about_des_status'] == 'active')
                            <div class="col-lg-6">
                                <div class="about-img">
                                    @if ($about_des['about_img'])
                                        <img src="{{ asset('uploads/website_components_photos/about_img') }}/{{ $about_des['about_img'] }}" title="me-01" alt="me-01">
                                    @else
                                        <img src="{{ asset('website_assets') }}/img/banner/banner_img2.png" title="me-01" alt="me-01">
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 pr-90">
                                <div class="section-title mb-25">
                                    <span>Introduction</span>
                                    <h2>About Me</h2>
                                </div>
                                <div class="about-content">
                                    <p>{{ $about_des['about_education_description'] }}</p>
                                    <h3>Education:</h3>
                                </div>
                        @else
                            <div class="col-lg-6">
                                <div class="about-img">
                                    <img src="{{ asset('website_assets') }}/img/banner/banner_img2.png" title="me-01" alt="me-01">
                                </div>
                            </div>
                            <div class="col-lg-6 pr-90">
                                <div class="section-title mb-25">
                                    <span>Introduction</span>
                                    <h2>About Me</h2>
                                </div>
                                <div class="about-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, sed repudiandae odit deserunt, quas
                                        quibusdam necessitatibus nesciunt eligendi esse sit non reprehenderit quisquam asperiores maxime
                                        blanditiis culpa vitae velit. Numquam!</p>
                                    <h3>Education:</h3>
                                </div>
                        @endif
                            <!-- Education Item -->
                            @foreach ($abouts as $about)
                                @if ($about['about_status'] == 'active')
                                    <div class="education">
                                        <div class="year">{{ $about->about_education }}</div>
                                        <div class="line"></div>
                                        <div class="location">
                                            <span>{{ $about->about_education_title  }}</span>
                                            <div class="progressWrapper">
                                                <div class="progress">
                                                    <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: {{ $about->about_education_progress_bar  }}%;" aria-valuenow="{{ $about->about_education_progress_bar  }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <!-- End Education Item -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- about-area-end -->

            <!-- Services-area -->
            <section id="service" class="services-area pt-120 pb-50">
				<div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>WHAT WE DO</span>
                                <h2>Services and Solutions</h2>
                            </div>
                        </div>
                    </div>
					<div class="row">
                        @foreach ($services as $service)
                            @if($service->status == 'active')
                                <div class="col-lg-4 col-md-6">
                                    <div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                                        <i class="{{ $service->icon }}"></i>
                                        <h3>{{ $service->title }}</h3>
                                        <p>{{ $service->description }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
					</div>
				</div>
			</section>
            <!-- Services-area-end -->

            <!-- Portfolios-area -->
            <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>Portfolio Showcase</span>
                                <h2>My Recent Best Works</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($recents as $recent)
                            @if($recent->status == 'active')
                                <div class="col-lg-4 col-md-6 pitem">
                                    <div class="speaker-box">
                                        <div class="speaker-thumb">
                                            <img width="400" height="570" src="{{ asset('uploads/website_components_photos/recent_photos') }}/{{ $recent->recent_photo }}" alt="">
                                        </div>
                                        <div class="speaker-overlay">
                                            <span>{{ $recent->title }}</span>
                                            <h4><a href="portfolio-single.html">{{ $recent->description }}</a></h4>
                                            <a href="{{ route('recent.link', $recent->id) }}" class="arrow-btn">More information <span></span></a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- services-area-end -->


            <!-- fact-area -->
            <section class="fact-area">
                <div class="container">
                    <div class="fact-wrap">
                        <div class="row justify-content-between">
                            @foreach ($facts as $fact)
                                @if($fact->status == 'active')
                                    <div class="col-xl-2 col-lg-3 col-sm-6">
                                        <div class="fact-box text-center mb-50">
                                            <div class="fact-icon">
                                                <i class="{{ $fact->icon }}"></i>
                                            </div>
                                            <div class="fact-content">
                                                <h2><span class="count">{{ $fact->number }}</span></h2>
                                                <span>{{ $fact->title }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            <!-- fact-area-end -->

            <!-- testimonial-area -->
            <section class="testimonial-area primary-bg pt-115 pb-115">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>testimonial</span>
                                <h2>happy customer quotes</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10">
                            <div class="testimonial-active">
                                @foreach ($testimonial as $testi)
                                    @if($testi->status == 'active')
                                        <div class="single-testimonial text-center">
                                            <div class="testi-avatar">
                                                <img width="86" height="86" class="rounded" src="{{ asset('uploads/website_components_photos/testimonial_photos') }}/{{ $testi->testimoni_photo }}" alt="img">
                                            </div>
                                            <div class="testi-content">
                                                <h4><span>“</span>{{ $testi->qoute }}<span></span></h4>
                                                <div class="testi-avatar-info">
                                                    <h5>{{ $testi->name }}</h5>
                                                    <span>{{ $testi->designation }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- testimonial-area-end -->

            <!-- brand-area -->
            <div class="barnd-area pt-100 pb-100">
                <div class="container">
                    <div class="row brand-active">
                        @foreach ($brands as $brand)
                            @if($brand->status == 'active')
                                <div class="col-xl-2">
                                    <div class="single-brand">
                                        <img class="rounded" width="100" height="100" src="{{ asset('uploads/website_components_photos/brands_photos') }}/{{ $brand->brand_img }}" alt="">
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- brand-area-end -->

            <!-- contact-area -->
            <section id="contact" class="contact-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="section-title mb-20">
                                <span>information</span>
                                <h2>Contact Information</h2>
                            </div>
                            <div class="contact-content">
                                <p>Event definition is - somthing that happens occurre How evesnt sentence. Synonym when an unknown printer took a galley.</p>
                                <h5>OFFICE IN <span>NEW YORK</span></h5>
                                <div class="contact-list">
                                    <ul>
                                        <li><i class="fas fa-map-marker"></i><span>Address :</span>Event Center park WT 22 New York</li>
                                        <li><i class="fas fa-headphones"></i><span>Phone :</span>+9 125 645 8654</li>
                                        <li><i class="fas fa-globe-asia"></i><span>e-mail :</span>info@exemple.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-form">
                                <form action="{{ route('contact.message') }}" method="POST">
                                    @csrf
                                    <input name="name" type="text" placeholder="your name *">
                                    <input name="email" type="email" placeholder="your email *">
                                    <textarea name="message" id="message" placeholder="your message *"></textarea>
                                    <button class="btn">SEND</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

        </main>
        <!-- main-area-end -->

        <!-- footer -->
        <footer>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="copyright-text text-center">
                                <p>Copyright© <span>Kufa</span> | All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-end -->





		<!-- JS here -->
        <script src="{{ asset('website_assets') }}/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="{{ asset('website_assets') }}/js/popper.min.js"></script>
        <script src="{{ asset('website_assets') }}/js/bootstrap.min.js"></script>
        <script src="{{ asset('website_assets') }}/js/isotope.pkgd.min.js"></script>
        <script src="{{ asset('website_assets') }}/js/one-page-nav-min.js"></script>
        <script src="{{ asset('website_assets') }}/js/slick.min.js"></script>
        <script src="{{ asset('website_assets') }}/js/ajax-form.js"></script>
        <script src="{{ asset('website_assets') }}/js/wow.min.js"></script>
        <script src="{{ asset('website_assets') }}/js/aos.js"></script>
        <script src="{{ asset('website_assets') }}/js/jquery.waypoints.min.js"></script>
        <script src="{{ asset('website_assets') }}/js/jquery.counterup.min.js"></script>
        <script src="{{ asset('website_assets') }}/js/jquery.scrollUp.min.js"></script>
        <script src="{{ asset('website_assets') }}/js/imagesloaded.pkgd.min.js"></script>
        <script src="{{ asset('website_assets') }}/js/jquery.magnific-popup.min.js"></script>
        <script src="{{ asset('website_assets') }}/js/plugins.js"></script>
        <script src="{{ asset('website_assets') }}/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if (session('message_send'))
            <script>
                Swal.fire(
                'Message Send',
                'Successfully!',
                'success'
                )
            </script>
        @endif
    </body>

<!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:28:17 GMT -->
</html>

