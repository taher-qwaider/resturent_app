<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Restaurantly Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('app/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('app/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('app/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('app/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('app/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('app/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('app/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('app/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('app/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('app/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Restaurantly - v3.1.0
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>+1 5589 55488 55</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sat: 11AM - 23PM</span></i>
      </div>

      <div class="languages d-none d-md-flex align-items-center">
        <ul>
            @if(\Illuminate\Support\Facades\Session::get('locale') == 'en')
                <li>En</li>
                <li><a href="{{ route('lang.locale', 'ar') }}">Ar</a></li>
            @elseif(\Illuminate\Support\Facades\Session::get('locale') == 'ar')
                <li><a href="{{ route('lang.locale', 'en') }}">En</a></li>
                <li>Ar</li>
            @else
                <li>En</li>
                <li><a href="{{ route('lang.locale', 'ar') }}">Ar</a></li>
            @endif
        </ul>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.blade.php">Restaurantly</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
          <li><a class="nav-link scrollto" href="#specials">Specials</a></li>
          <li><a class="nav-link scrollto" href="#events">Events</a></li>
          <li><a class="nav-link scrollto" href="#chefs">Chefs</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="#book-a-table" class="book-a-table-btn scrollto d-none d-lg-flex">Book a table</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Welcome to <span>Restaurantly</span></h1>
          <h2>Delivering great food for more than 18 years!</h2>

          <div class="btns">
            <a href="#menu" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
            <a href="#book-a-table" class="btn-book animated fadeInUp scrollto">Book a Table</a>
          </div>
        </div>
        <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in" data-aos-delay="200">
          <a href="https://www.youtube.com/watch?v=GlrxcuEDyF8" class="glightbox play-btn"></a>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="{{ asset('app/assets/img/about.jpg') }}" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>{{ $about_us->where('key', 'title')->first()->value }}</h3>
            <p class="fst-italic">{{ $about_us->where('key', 'sub-title')->first()->value }}</p>
            <ul>
                @foreach($about_us->where('key', 'lines') as $setting)
                    <li><i class="bi bi-check-circle"></i>{{ $setting->value }}</li>
                @endforeach
            </ul>
            <p>{{ $about_us->where('key', 'text')->first()->value }}</p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Why Us</h2>
          <p>Why Choose Our Restaurant</p>
        </div>

        <div class="row">
            @foreach($why_us as $setting)
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="box" data-aos="zoom-in" data-aos-delay="200">
                        <span>{{ $loop->iteration }}</span>
                        <h4>{{ $setting->key }}</h4>
                        <p>{{ $setting->value }}</p>
                    </div>
                </div>
            @endforeach
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Menu</h2>
          <p>Check Our Tasty Menu</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
                <li data-filter="*" class="filter-active">All</li>
                @foreach($categories as $category)
                    <li data-filter=".filter-{{ $category->title }}">{{ $category->translate(\Illuminate\Support\Facades\Session::get('locale'))->title }}</li>
                @endforeach
            </ul>
          </div>
        </div>

        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
            @foreach($meals as $meal)
                <div class="col-lg-6 menu-item filter-{{ $meal->category->title }}">
                    <img src="/storage/{{ $meal->image->path }}" class="menu-img" alt="">
                    <div class="menu-content">
                        <a href="#">{{ $meal->translate(\Illuminate\Support\Facades\Session::get('locale'))->name }}</a><span>{{ $meal->price }}</span>
                    </div>
                    <div class="menu-ingredients">
                        {{ $meal->translate(\Illuminate\Support\Facades\Session::get('locale'))->desc }}
                    </div>
                </div>
            @endforeach


        </div>

      </div>
    </section><!-- End Menu Section -->

    <!-- ======= Specials Section ======= -->
{{--    <section id="specials" class="specials">--}}
{{--      <div class="container" data-aos="fade-up">--}}

{{--        <div class="section-title">--}}
{{--          <h2>Specials</h2>--}}
{{--          <p>Check Our Specials</p>--}}
{{--        </div>--}}

{{--        <div class="row" data-aos="fade-up" data-aos-delay="100">--}}
{{--          <div class="col-lg-3">--}}
{{--            <ul class="nav nav-tabs flex-column">--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Modi sit est</a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Unde praesentium sed</a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Pariatur explicabo vel</a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Nostrum qui quasi</a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Iusto ut expedita aut</a>--}}
{{--              </li>--}}
{{--            </ul>--}}
{{--          </div>--}}
{{--          <div class="col-lg-9 mt-4 mt-lg-0">--}}
{{--            <div class="tab-content">--}}
{{--              <div class="tab-pane active show" id="tab-1">--}}
{{--                <div class="row">--}}
{{--                  <div class="col-lg-8 details order-2 order-lg-1">--}}
{{--                    <h3>Architecto ut aperiam autem id</h3>--}}
{{--                    <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>--}}
{{--                    <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>--}}
{{--                  </div>--}}
{{--                  <div class="col-lg-4 text-center order-1 order-lg-2">--}}
{{--                    <img src="assets/img/specials-1.png" alt="" class="img-fluid">--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--              <div class="tab-pane" id="tab-2">--}}
{{--                <div class="row">--}}
{{--                  <div class="col-lg-8 details order-2 order-lg-1">--}}
{{--                    <h3>Et blanditiis nemo veritatis excepturi</h3>--}}
{{--                    <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>--}}
{{--                    <p>Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode pakto madirna desera vafle de nideran pal</p>--}}
{{--                  </div>--}}
{{--                  <div class="col-lg-4 text-center order-1 order-lg-2">--}}
{{--                    <img src="assets/img/specials-2.png" alt="" class="img-fluid">--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--              <div class="tab-pane" id="tab-3">--}}
{{--                <div class="row">--}}
{{--                  <div class="col-lg-8 details order-2 order-lg-1">--}}
{{--                    <h3>Impedit facilis occaecati odio neque aperiam sit</h3>--}}
{{--                    <p class="fst-italic">Eos voluptatibus quo. Odio similique illum id quidem non enim fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis aut</p>--}}
{{--                    <p>Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis quisquam. Neque necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae sed laboriosam a iste odio. Earum odit nesciunt fugiat sit ullam. Soluta et harum voluptatem optio quae</p>--}}
{{--                  </div>--}}
{{--                  <div class="col-lg-4 text-center order-1 order-lg-2">--}}
{{--                    <img src="assets/img/specials-3.png" alt="" class="img-fluid">--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--              <div class="tab-pane" id="tab-4">--}}
{{--                <div class="row">--}}
{{--                  <div class="col-lg-8 details order-2 order-lg-1">--}}
{{--                    <h3>Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore</h3>--}}
{{--                    <p class="fst-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis delectus</p>--}}
{{--                    <p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in consequatur corporis atque. Eligendi asperiores sed qui veritatis aperiam quia a laborum inventore</p>--}}
{{--                  </div>--}}
{{--                  <div class="col-lg-4 text-center order-1 order-lg-2">--}}
{{--                    <img src="assets/img/specials-4.png" alt="" class="img-fluid">--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--              <div class="tab-pane" id="tab-5">--}}
{{--                <div class="row">--}}
{{--                  <div class="col-lg-8 details order-2 order-lg-1">--}}
{{--                    <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>--}}
{{--                    <p class="fst-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>--}}
{{--                    <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>--}}
{{--                  </div>--}}
{{--                  <div class="col-lg-4 text-center order-1 order-lg-2">--}}
{{--                    <img src="assets/img/specials-5.png" alt="" class="img-fluid">--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}

{{--      </div>--}}
{{--    </section><!-- End Specials Section -->--}}

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Events</h2>
          <p>Organize Your Events in our Restaurant</p>
        </div>

        <div class="events-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            @foreach($events as $event)
                  <div class="swiper-slide">
                      <div class="row event-item">
                          <div class="col-lg-6">
                              <img src="/storage/{{ $event->image->path }}" class="img-fluid" alt="">
                          </div>
                          <div class="col-lg-6 pt-4 pt-lg-0 content">
                              <h3>{{ $event->translate(\Illuminate\Support\Facades\Session::get('locale'))->title }}</h3>
                              <div class="price">
                                  <p><span>{{ $event->price }}</span></p>
                              </div>
                              <p class="fst-italic">
                                  {{ $event->translate(\Illuminate\Support\Facades\Session::get('locale'))->desc }}
                              </p>
                          </div>
                      </div>
                  </div>
            @endforeach
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Events Section -->

    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Reservation</h2>
          <p>Book a Table</p>
        </div>

        <form action="{{ route('home.reservation.store') }}" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
            @csrf
          <div class="row">
            <div class="col-lg-4 col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="text" name="date" class="form-control" id="date" placeholder="Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="text" class="form-control" name="time" id="time" placeholder="Time" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="number" class="form-control" name="num_of_people" id="people" placeholder="# of people" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
            <div class="validate"></div>
          </div>
          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit">Book a Table</button></div>
        </form>

      </div>
    </section><!-- End Book A Table Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p>What they're saying about us</p>
        </div>

        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            @foreach($reviews as $review)
                <div class="swiper-slide">
                      <div class="testimonial-item">
                          <p>
                              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                              {{ $review->text }}
                              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                          </p>
                          <img src="/storage/{{ $review->image->path }}" class="testimonial-img" alt="">
                          <h3>{{ $review->name }}</h3>
                          <h4>{{ $review->profession }}</h4>
                      </div>
                  </div>
            @endforeach

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Gallery</h2>
          <p>Some photos from Our Restaurant</p>
        </div>
      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">
            @foreach($album->images as $image)
                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="/storage/{{ $image->path }}" class="gallery-lightbox" data-gall="gallery-item">
                            <img src="/storage/{{ $image->path }}" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Chefs</h2>
          <p>Our Proffesional Chefs</p>
        </div>

        <div class="row">
            @foreach($chefs as $chef)
                <div class="col-lg-4 col-md-6">
                    <div class="member" data-aos="zoom-in" data-aos-delay="100">
                        <img src="/storage/{{ $chef->image->path }}" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>{{ $chef->name }}</h4>
                                <span>{{ $chef->degree }}</span>
                            </div>
                            <div class="social">
                                @foreach($chef->socials as $social)
                                    @switch($social->name)
                                        @case('twitter')
                                            <a href="{{ $social->url }}" target="_blank"><i class="bi bi-twitter"></i></a>
                                        @break
                                        @case('instagram')
                                            <a href="{{ $social->url }}" target="_blank"><i class="bi bi-instagram"></i></a>
                                        @break
                                        @case('linkedin')
                                            <a href="{{ $social->url }}" target="_blank"><i class="bi bi-linkedin"></i></a>
                                        @break
                                    @endswitch
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

      </div>
    </section><!-- End Chefs Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>
      </div>

      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>{{ $generals->where('key', 'location')->first()->value }}</p>
              </div>

              <div class="open-hours">
                <i class="bi bi-clock"></i>
                <h4>Open Hours:</h4>
                <p>
                  {{ $generals->where('key', 'open_hours')->first()->value }}
                </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>{{ $generals->where('key', 'email')->first()->value }}</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>{{ $generals->where('key', 'phone')->first()->value }}</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="{{ route('home.message.store') }}" method="post" role="form" class="php-email-form">
                @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="8" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Restaurantly</h3>
              <p>
                {{ $generals->where('key', 'location')->first()->value }}<br>
{{--                NY 535022, USA<br><br>--}}
                <strong>Phone:</strong> {{ $generals->where('key', 'phone')->first()->value }}<br>
                <strong>Email:</strong> {{ $generals->where('key', 'email')->first()->value }}<br>
              </p>
              <div class="social-links mt-3">
                  @foreach($social_medias as $social)
                      @switch($social->name)
                          @case('twitter')
                            <a href="{{ $social->url }}" class="twitter" target="_blank"><i class="bx bxl-twitter"></i></a>
                          @break
                          @case('instagram')
                            <a href="{{ $social->url }}" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
                          @break
                          @case('linkedin')
                            <a href="{{ $social->url }}" class="linkedin" target="_blank"><i class="bx bxl-linkedin"></i></a>
                          @break
                          @case('facebook')
                            <a href="{{ $social->url }}" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
                          @break
                          @case('skype')
                            <a href="{{ $social->url }}" class="google-plus" target="_blank"><i class="bx bxl-skype"></i></a>
                          @break
                      @endswitch
                  @endforeach
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Restaurantly</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('app/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('app/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('app/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('app/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('app/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('app/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('app/assets/js/main.js') }}"></script>
    <script>
{{--        {{ \Illuminate\Support\Facades\App::setLocale('ar') }}--}}
{{--        console.log('{!! \Illuminate\Support\Facades\Session::get('locale') !!}')--}}

    </script>
</body>

</html>
