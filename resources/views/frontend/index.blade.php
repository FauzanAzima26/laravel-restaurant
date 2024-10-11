<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - Yummy Restaurant</title>
    <meta name="description" content="Yummy Restaurant">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{asset('frontend')}}/img/favicon.png" rel="icon">
    <link href="{{asset('frontend')}}/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('frontend')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{asset('frontend')}}/css/main.css" rel="stylesheet">

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- =======================================================
  * Template Name: Yummy
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <div class="swal" data-swal="{{ session('success') }}"></div>

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="{{asset('frontend')}}/img/logo.png" alt=""> -->
                <h1 class="sitename">Yummy</h1>
                <span>.</span>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home<br></a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#menu">Menu</a></li>
                    <li><a href="#events">Events</a></li>
                    <li><a href="#chefs">Chefs</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#review">Review</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="#" data-bs-toggle="modal" data-bs-target="#modalBook">Book a Table</a>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section light-background">

            <div class="container">
                <div class="row gy-4 justify-content-center justify-content-lg-between">
                    <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1 data-aos="fade-up">Enjoy Your Healthy<br>Delicious Food</h1>
                        <p data-aos="fade-up" data-aos-delay="100">We are team of talented designers making websites
                            with Bootstrap</p>
                        <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                            <a href="#book-a-table" class="btn-get-started">Booka a Table</a>
                            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                                class="glightbox btn-watch-video d-flex align-items-center"><i
                                    class="bi bi-play-circle"></i><span>Watch Video</span></a>
                        </div>
                    </div>
                    <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                        <img src="{{asset('frontend')}}/img/hero-img.png" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>About Us<br></h2>
                <p><span>Learn More</span> <span class="description-title">About Us</span></p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">
                    <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{asset('frontend')}}/img/about.jpg" class="img-fluid mb-4" alt="">
                        <div class="book-a-table">
                            <h3>Book a Table</h3>
                            <p>+1 5589 55488 55</p>
                        </div>
                    </div>
                    <div class="col-lg-5" data-aos="fade-up" data-aos-delay="250">
                        <div class="content ps-0 ps-lg-5">
                            <p class="fst-italic">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore
                                magna aliqua.
                            </p>
                            <ul>
                                <li><i class="bi bi-check-circle-fill"></i> <span>Ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.</span></li>
                                <li><i class="bi bi-check-circle-fill"></i> <span>Duis aute irure dolor in reprehenderit
                                        in voluptate velit.</span></li>
                                <li><i class="bi bi-check-circle-fill"></i> <span>Ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta
                                        storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
                            </ul>
                            <p>
                                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident
                            </p>

                            <div class="position-relative mt-4">
                                <img src="{{asset('frontend')}}/img/about-2.jpg" class="img-fluid" alt="">
                                <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                                    class="glightbox pulsating-play-btn"></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Why Us Section -->
        <section id="why-us" class="why-us section light-background">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="why-box">
                            <h3>Why Choose Yummy</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                                Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus
                                optio ad corporis.
                            </p>
                            <div class="text-center">
                                <a href="#" class="more-btn"><span>Learn More</span> <i
                                        class="bi bi-chevron-right"></i></a>
                            </div>
                        </div>
                    </div><!-- End Why Box -->

                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

                            <div class="col-xl-4">
                                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                    <i class="bi bi-clipboard-data"></i>
                                    <h4>Corporis voluptates officia eiusmod</h4>
                                    <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut
                                        aliquip</p>
                                </div>
                            </div><!-- End Icon Box -->

                            <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                    <i class="bi bi-gem"></i>
                                    <h4>Ullamco laboris ladore lore pan</h4>
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                        deserunt</p>
                                </div>
                            </div><!-- End Icon Box -->

                            <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                    <i class="bi bi-inboxes"></i>
                                    <h4>Labore consequatur incidid dolore</h4>
                                    <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere
                                    </p>
                                </div>
                            </div><!-- End Icon Box -->

                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Why Us Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section dark-background">

            <img src="{{asset('frontend')}}/img/stats-bg.jpg" alt="" data-aos="fade-in">

            <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Clients</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Projects</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Hours Of Support</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Workers</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>

        </section><!-- /Stats Section -->

        <!-- Menu Section -->
        <section id="menu" class="menu section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Our Menu</h2>
                <p><span>Check Our</span> <span class="description-title">Yummy Menu</span></p>
            </div><!-- End Section Title -->

            <div class="container">

                <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">

                    <li class="nav-item">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
                            <h4>Starters</h4>
                        </a>
                    </li><!-- End tab nav item -->

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
                            <h4>Breakfast</h4>
                        </a><!-- End tab nav item -->

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lunch">
                            <h4>Lunch</h4>
                        </a>
                    </li><!-- End tab nav item -->

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-dinner">
                            <h4>Dinner</h4>
                        </a>
                    </li><!-- End tab nav item -->

                </ul>

                <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                    @include('frontend._menuStarter')

                    <!-- End Starter Menu Content -->

                    @include('frontend._menuBreakfast')
                    <!-- End Breakfast Menu Content -->

                    @include('frontend._menuLunch')
                    <!-- End Lunch Menu Content -->

                    @include('frontend._menuDinner') <!-- End Dinner Menu Content -->

                </div>

            </div>

        </section><!-- /Menu Section -->

        <!-- Events Section -->
        @include('frontend._event')
        <!-- /Events Section -->

        <!-- Chefs Section -->
        @include('frontend._chef')
        <!-- /Chefs Section -->

        <!-- Gallery Section -->
        @include('frontend._gallery')
        <!-- /Gallery Section -->

        <!-- Contact Section -->
        @include('frontend._contact')
        <!-- /Contact Section -->

        <!-- modal book -->
        @include('frontend._modalBook')
        <!-- End modal book--)
        
        <!-- review section -->
        @include('frontend._review')
        <!-- End review section -->
    </main>

    <footer id="footer" class="footer dark-background">

        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    <div class="address">
                        <h4>Address</h4>
                        <p>A108 Adam Street</p>
                        <p>New York, NY 535022</p>
                        <p></p>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>Contact</h4>
                        <p>
                            <strong>Phone:</strong> <span>+1 5589 55488 55</span><br>
                            <strong>Email:</strong> <span>info@example.com</span><br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                        <h4>Opening Hours</h4>
                        <p>
                            <strong>Mon-Sat:</strong> <span>11AM - 23PM</span><br>
                            <strong>Sunday</strong>: <span>Closed</span>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4>Follow Us</h4>
                    <div class="social-links d-flex">
                        <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Yummy</strong> <span>All Rights Reserved</span>
            </p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{asset('frontend')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend')}}/vendor/php-email-form/validate.js"></script>
    <script src="{{asset('frontend')}}/vendor/aos/aos.js"></script>
    <script src="{{asset('frontend')}}/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{asset('frontend')}}/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{asset('frontend')}}/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="{{asset('frontend')}}/js/main.js"></script>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- sweetalert -->
    <script>
        const swal = $('.swal').data('swal');

        if (swal) {
            Swal.fire({
                title: 'Success!',
                text: swal,
                icon: 'success',
                timer: 2500,
                showConfirmButton: false
            })
        }
    </script>

</body>

</html>