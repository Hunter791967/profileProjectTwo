{{-- @extends('frontPages.layouts.app', ['phone' => $contactDetails->phone, 'address' => $contactDetails->address, 'email => $contactDetails->email', 'main_title' => $mainService->main_title]) --}}
@extends('frontPages.layouts.app')
@section('content')
    <!-- main-area -->
    <main>
        <section class="main_circle"></section>
        <!-- banner-area -->
        <section class="banner">
            <div class="container custom-container">
                <div class="row first_section">
                    <div class="col-lg-6 order-0 order-lg-2 first_sectionWest">
                        <div class="banner__img text-center text-xxl-end">
                            {{-- <img src="{{ asset('frontDesign/img/images/colors.png') }}" class="colors" alt="Colors"> --}}
                            <img src="{{ asset('uploads/homeSlider/' . $showData->panner) }}" class="men"
                                alt="My Profile Photo">
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-12 first_sectionEast">
                        <div class="banner__content">
                            <h2 class="title wow fadeInUp" data-wow-delay=".2s">{{ $showData->title }}<span>
                                    {{ $showData->sub_title }}</span>
                                {{-- <br> --}}

                            </h2>
                            <p class="wow fadeInUp" data-wow-delay=".4s">{{ $showData->title_desc }}</p>
                            <a href="{{ url('about') }}"
                                class="btn banner__btn wow btn_first">{{ $showData->btn_text }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="scroll__down">
                <a href="#aboutSection" class="scroll__link">Scroll down</a>
            </div>
            <div class="banner__video">
                <a href='{{ asset("uploads/homeSlider/$showData->scetion_video") }}' class="popup-video"><i
                        class="fas fa-play"></i></a>
            </div>
        </section>
        <!-- banner-area-end -->

        <!-- about-area -->
        <section id="aboutSection" class="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 main_icons exterior_icons">
                        <ul class="about__icons__wrap about_icons">
                            @foreach ($Gallery as $singleGallery)
                                <li>
                                    <img class="light" src="{{ asset('uploads/icons/' . $singleGallery->icon_image) }}"
                                        alt="ABOUT ICONS">
                                    <img class="dark" src="{{ asset('uploads/icons/' . $singleGallery->icon_image) }}"
                                        alt="ABOUT ICONS">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-6 main_icons interior_icons">
                        <div class="about__content">
                            <div class="section__title">
                                <span class="sub-title">Info About</span>
                                <h2 class="title">{{ $aboutData->title }}</h2>
                            </div>
                            <div class="about__exp">
                                <div class="about__exp__icon">
                                    <img src="{{ asset('frontDesign/img/icons/about02.png') }}" alt="">
                                </div>
                                <div class="about__exp__content">
                                    <p>{{ $aboutData->about_favorite }}</p>
                                </div>
                            </div>
                            <p class="desc">{{ $aboutData->about_desc }}</p>
                            <a href="{{ asset('uploads/resume/' . $aboutData->resume) }}" class="btn"
                                download>{{ $aboutData->btn_text }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end -->

        <!-- services-area -->
        <section class="services">
            <div class="container">
                <div class="services__title__wrap">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-xl-7 col-lg-6 col-md-8">
                            <div class="section__title">
                                <span class="sub-title">My Services</span>
                                <h2 class="title">{{ $mainService->main_title }}</h2>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 col-md-4">
                            <div class="services__arrow"></div>
                        </div>
                    </div>
                </div>
                <div class="row gx-0 services__active">
                    @foreach ($serviceData as $singleSer)
                        <div class="col-xl-3">
                            <div class="services__item">
                                <div class="services__thumb">
                                    <a href="services-details.html"><img
                                            src="{{ asset('uploads/services/' . $singleSer->service_image) }}"
                                            alt="Service_Image"></a>
                                </div>
                                <div class="services__content">
                                    <div class="services__icon">
                                        <img class="light" src="{{ asset('uploads/services/' . $singleSer->icon_image) }}"
                                            alt="Service_Icon">
                                        <img class="dark" src="{{ asset('uploads/services/' . $singleSer->icon_image) }}"
                                            alt="Service_Icon">
                                    </div>
                                    <h3 class="title"><a href="services-details.html">{{ $singleSer->name }}</a></h3>
                                    <div class="services_tab">
                                        {{-- {!! $singleSer->service_tab !!} --}}
                                        {!! Str::limit($singleSer->service_tab, 400) !!}
                                    </div>
                                    <a href="{{ url('services') }}" class="btn border-btn service_btn">Read more</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- services-area-end -->

        <!-- work-process-area -->
        <section class="work__process">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section__title text-center">
                            <span class="sub-title">My Project Management Methodologies</span>
                            <h2 class="title">I Use Agile & SAP Activate Methodologies</h2>
                        </div>
                    </div>
                </div>
                <div class="methodology">
                    <div class="methodologyEast">
                        <div class="methodology_name">
                            <h4>{{ $methodolgyOne->name }}</h4>
                            <div class="horiz_line"></div>
                        </div>
                        <div class="methodology_image"><img
                                src="{{ asset('uploads/methodology/' . $methodolgyOne->image) }}" alt="First_Methodology"
                                class="methodology_imagesrc">
                        </div>
                    </div>
                    <div class="methodologyWest">
                        <div class="webApplication_progress">
                            <h4>Web Application Development Progress Bar</h4>
                            <div class="horiz_line"></div>
                        </div>
                        <div class="methodology_container">
                            <input type="radio" class="radio" name="progress" value="five" id="five" checked>
                            <label for="five" class="label">5%</label>

                            <input type="radio" class="radio" name="progress" value="twenty" id="twenty">
                            <label for="twenty" class="label">20%</label>

                            <input type="radio" class="radio" name="progress" value="fourty" id="fourty">
                            <label for="fourty" class="label">40%</label>

                            <input type="radio" class="radio" name="progress" value="sixty" id="sixty">
                            <label for="sixty" class="label">60%</label>

                            <input type="radio" class="radio" name="progress" value="eighty" id="eighty">
                            <label for="eighty" class="label">80%</label>

                            <input type="radio" class="radio" name="progress" value="onehundred" id="onehundred">
                            <label for="onehundred" class="label">100%</label>

                            <div class="progress">
                                <div class="progress-bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row work__process__wrap">
                    @foreach ($methodologyDetail as $singleMeth)
                        <div class="col">
                            <div class="work__process__item">
                                <div class="work__process__icon">
                                    <img class="light"
                                        src="{{ asset('uploads/methodologyDetails/' . $singleMeth->icon_image) }}"
                                        alt="Methodology Icon">
                                    <img class="dark"
                                        src="{{ asset('uploads/methodologyDetails/' . $singleMeth->icon_image) }}"
                                        alt="Methodology Icon">
                                </div>
                                <div class="work__process__content">
                                    <h4 class="title">{{ $singleMeth->name }}</h4>
                                    <p>{{ $singleMeth->methodology_desc }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="methodologyTwo">
                    <div class="methodologyEast">
                        <div class="methodology_name">
                            <h4>{{ $methodolgyTwo->name }}</h4>
                            <div class="horiz_line"></div>
                        </div>
                        <div class="methodology_image"><img
                                src="{{ asset('uploads/methodology/' . $methodolgyTwo->image) }}" alt="First_Methodology"
                                class="methodology_imagesrc">
                        </div>
                    </div>
                    <div class="methodologyWest">
                        <div class="webApplication_progress">
                            <h4>ERP Implementation Progress Bar</h4>
                            <div class="horiz_line"></div>
                        </div>
                        <div class="methodology_container">
                            <input type="radio" class="radio" name="progressOne" value="five" id="five"
                                checked>
                            <label for="five" class="label">5%</label>

                            <input type="radio" class="radio" name="progressOne" value="twenty" id="twenty">
                            <label for="twenty" class="label">20%</label>

                            <input type="radio" class="radio" name="progressOne" value="fourty" id="fourty">
                            <label for="fourty" class="label">40%</label>

                            <input type="radio" class="radio" name="progressOne" value="sixty" id="sixty">
                            <label for="sixty" class="label">60%</label>

                            <input type="radio" class="radio" name="progressOne" value="eighty" id="eighty">
                            <label for="eighty" class="label">80%</label>

                            <input type="radio" class="radio" name="progressOne" value="onehundred" id="onehundred">
                            <label for="onehundred" class="label">100%</label>

                            <div class="progress">
                                <div class="progress-bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row work__process__wrap">
                    @foreach ($methodologyDetailTwo as $singleMethTwo)
                        <div class="col">
                            <div class="work__process__item">
                                <div class="work__process__icon">
                                    <img class="light"
                                        src="{{ asset('uploads/methodologyDetails/' . $singleMethTwo->icon_image) }}"
                                        alt="Methodology Icon">
                                    <img class="dark"
                                        src="{{ asset('uploads/methodologyDetails/' . $singleMethTwo->icon_image) }}"
                                        alt="Methodology Icon">
                                </div>
                                <div class="work__process__content">
                                    <h4 class="title">{{ $singleMethTwo->name }}</h4>
                                    <p>{{ $singleMethTwo->methodology_desc }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- work-process-area-end -->

        <!-- portfolio-area -->
        <section class="portfolio">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-8">
                        <div class="section__title text-center">
                            <span class="sub-title">My Experience</span>
                            <h2 class="title">Samples Of My Successful Previous Projects</h2>
                        </div>
                    </div>
                </div>
                <div class="row proj_type">
                    <div class="col-xl-12 col-lg-12">
                        <ul class="nav nav-tabs portfolio__nav" id="portfolioTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="all-tab" data-bs-toggle="tab"
                                    data-bs-target="#all" type="button" role="tab" aria-controls="all"
                                    aria-selected="true">{{ $projFirst->name }}</button>
                            </li>
                            @foreach ($projType as $singleType)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="all-tab" data-bs-toggle="tab" data-bs-target="#all"
                                        type="button" role="tab" aria-controls="all"
                                        aria-selected="true">{{ $singleType->name }}</button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="portfolioTabContent">
                <div class="tab-pane show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    <div class="container">
                        <div class="row gx-0 justify-content-center">
                            <div class="col">
                                <div class="portfolio__active">
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{ asset('uploads/projectTypes/' . $projFirst->image) }}"
                                                alt="First Project Type">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>{{ $projFirst->name }}</span>
                                            <h4 class="title"><a
                                                    href="{{ url('projectDetail') }}">{{ $projFirst->name }}</a></h4>
                                            <a href="{{ url('projectDetail') }}" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    @foreach ($projType as $singleType)
                                        <div class="portfolio__item">
                                            <div class="portfolio__thumb">
                                                <img src="{{ asset('uploads/projectTypes/' . $singleType->image) }}"
                                                    alt="">
                                            </div>
                                            <div class="portfolio__overlay__content">
                                                <span>{{ $singleType->name }}</span>
                                                <h4 class="title"><a
                                                        href="{{ url('projectDetail') }}">{{ $singleType->name }}</a>
                                                </h4>
                                                <a href="{{ url('projectDetail') }}" class="link">Case Study</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- portfolio-area-end -->

        <!-- partner-area -->
        {{-- <section class="partner">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <ul class="partner__logo__wrap">
                            <li>
                                <img class="light" src="{{ asset('frontDesign/img/icons/partner_light01.png') }}"
                                    alt="">
                                <img class="dark" src="{{ asset('frontDesign/img/icons/partner_01.png') }}"
                                    alt="">
                            </li>
                            <li>
                                <img class="light" src="{{ asset('frontDesign/img/icons/partner_light02.png') }}"
                                    alt="">
                                <img class="dark" src="{{ asset('frontDesign/img/icons/partner_02.png') }}"
                                    alt="">
                            </li>
                            <li>
                                <img class="light" src="{{ asset('frontDesign/img/icons/partner_light03.png') }}"
                                    alt="">
                                <img class="dark" src="{{ asset('frontDesign/img/icons/partner_03.png') }}"
                                    alt="">
                            </li>
                            <li>
                                <img class="light" src="{{ asset('frontDesign/img/icons/partner_light04.png') }}"
                                    alt="">
                                <img class="dark" src="{{ asset('frontDesign/img/icons/partner_04.png') }}"
                                    alt="">
                            </li>
                            <li>
                                <img class="light" src="{{ asset('frontDesign/img/icons/partner_light05.png') }}"
                                    alt="">
                                <img class="dark" src="{{ asset('frontDesign/img/icons/partner_05.png') }}"
                                    alt="">
                            </li>
                            <li>
                                <img class="light" src="{{ asset('frontDesign/img/icons/partner_light06.png') }}"
                                    alt="">
                                <img class="dark" src="{{ asset('frontDesign/img/icons/partner_06.png') }}"
                                    alt="">
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="partner__content">
                            <div class="section__title">
                                <span class="sub-title">05 - partners</span>
                                <h2 class="title">I proud to have collaborated with some awesome companies</h2>
                            </div>
                            <p>I'm a bit of a digital product junky. Over the years, I've used hundreds of web and mobile
                                apps in different industries and verticals. Eventually, I decided that it would be a fun
                                challenge to try designing and building my own.</p>
                            <a href="contact.html" class="btn">Start a conversation</a>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- partner-area-end -->

        <!-- testimonial-area -->
        {{-- <section class="testimonial">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6 order-0 order-lg-2">
                        <ul class="testimonial__avatar__img">
                            <li><img src="{{ asset('frontDesign/img/images/testi_img01.png') }}" alt=""></li>
                            <li><img src="{{ asset('frontDesign/img/images/testi_img02.png') }}" alt=""></li>
                            <li><img src="{{ asset('frontDesign/img/images/testi_img03.png') }}" alt=""></li>
                            <li><img src="{{ asset('frontDesign/img/images/testi_img04.png') }}" alt=""></li>
                            <li><img src="{{ asset('frontDesign/img/images/testi_img05.png') }}" alt=""></li>
                            <li><img src="{{ asset('frontDesign/img/images/testi_img06.png') }}" alt=""></li>
                            <li><img src="{{ asset('frontDesign/img/images/testi_img07.png') }}" alt=""></li>
                        </ul>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="testimonial__wrap">
                            <div class="section__title">
                                <span class="sub-title">06 - Client Feedback</span>
                                <h2 class="title">Happy clients feedback</h2>
                            </div>
                            <div class="testimonial__active">
                                <div class="testimonial__item">
                                    <div class="testimonial__icon">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                    <div class="testimonial__content">
                                        <p>We are motivated by the satisfaction of our clients. Put your trust in us &share
                                            in our H.Spond Asset Management is made up of a team of expert, committed and
                                            experienced people with a passion for financial markets. Our goal is to achieve
                                            continuous.</p>
                                        <div class="testimonial__avatar">
                                            <span>Rasalina De Wiliamson</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial__item">
                                    <div class="testimonial__icon">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                    <div class="testimonial__content">
                                        <p>We are motivated by the satisfaction of our clients. Put your trust in us &share
                                            in our H.Spond Asset Management is made up of a team of expert, committed and
                                            experienced people with a passion for financial markets. Our goal is to achieve
                                            continuous.</p>
                                        <div class="testimonial__avatar">
                                            <span>Rasalina De Wiliamson</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial__arrow"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- testimonial-area-end -->

        <!-- blog-area -->
        {{-- <section class="blog">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col-lg-4 col-md-6 col-sm-9">
                        <div class="blog__post__item">
                            <div class="blog__post__thumb">
                                <a href="blog-details.html"><img
                                        src="{{ asset('frontDesign/img/blog/blog_post_thumb01.jpg') }}"
                                        alt=""></a>
                                <div class="blog__post__tags">
                                    <a href="blog.html">Story</a>
                                </div>
                            </div>
                            <div class="blog__post__content">
                                <span class="date">13 january 2021</span>
                                <h3 class="title"><a href="blog-details.html">Facebook design is dedicated to what's
                                        new
                                        in design</a></h3>
                                <a href="blog-details.html" class="read__more">Read mORe</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-9">
                        <div class="blog__post__item">
                            <div class="blog__post__thumb">
                                <a href="blog-details.html"><img
                                        src="{{ asset('frontDesign/img/blog/blog_post_thumb02.jpg') }}"
                                        alt=""></a>
                                <div class="blog__post__tags">
                                    <a href="blog.html">Social</a>
                                </div>
                            </div>
                            <div class="blog__post__content">
                                <span class="date">13 january 2021</span>
                                <h3 class="title"><a href="blog-details.html">Make communication Fast and
                                        Effectively.</a></h3>
                                <a href="blog-details.html" class="read__more">Read mORe</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-9">
                        <div class="blog__post__item">
                            <div class="blog__post__thumb">
                                <a href="blog-details.html"><img
                                        src="{{ asset('frontDesign/img/blog/blog_post_thumb03.jpg') }}"
                                        alt=""></a>
                                <div class="blog__post__tags">
                                    <a href="blog.html">Work</a>
                                </div>
                            </div>
                            <div class="blog__post__content">
                                <span class="date">13 january 2021</span>
                                <h3 class="title"><a href="blog-details.html">How to increase your productivity at work
                                        -
                                        2021</a></h3>
                                <a href="blog-details.html" class="read__more">Read mORe</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog__button text-center">
                    <a href="blog.html" class="btn">more blog</a>
                </div>
            </div>
        </section> --}}
        <!-- blog-area-end -->

        <!-- contact-area -->
        <section class="homeContactOne">
            <div class="container">
                <div class="homeContact__wrap">
                    @include('sweetalert::alert')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="section__title">
                                <h2 class="title">Please Feel Free To Ask Me <br>Any questions?</h2>
                            </div>
                            <div class="homeContact__content">
                                <p>We Will Give You A Prompt Response And Answer Your Questions ASAP</p>
                                <h2 class="mail"><a
                                        href="mailto:{{ $contactDetails->email }}">{{ $contactDetails->email }}</a>
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="homeContact__form">
                                <form role="form" action="{{ route('front.store') }}" method="post">
                                    @csrf
                                    <input type="text" placeholder="Enter name*" name="name">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="email" placeholder="Enter mail*" name="email">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="number" placeholder="Enter Phone Number*" name="phone">
                                    @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <textarea name="message" placeholder="Please Write A Question?" name="message"></textarea>
                                    @error('message')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <button type="submit">Send Details</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->

    </main>
    <!-- main-area-end -->
@endsection

@section('page_title', 'My Profile')

@section('page_style')
    <link rel="stylesheet" href="{{ asset('first/styles/frontHome.css') }}">
@endsection

@section('page_js')
    <script>
        /***********************************************************************************************************/
        // //**This Function  */
        const mainIcons = document.querySelectorAll(".main_icons");
        // console.log(mainIcons);
        window.addEventListener("scroll", check_animation);

        check_animation();

        function check_animation() {
            const trigger = (window.innerHeight / 6) * 4;

            mainIcons.forEach((mainIcon) => {
                const top = mainIcon.getBoundingClientRect().top;

                if (trigger > top) {
                    mainIcon.classList.add("show_content");
                } else {
                    mainIcon.classList.remove("show_content");
                }
            });
        }
    </script>

@endsection
