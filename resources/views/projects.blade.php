@extends('frontPages.layouts.app')
@section('content')
    <!-- main-area -->
    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb__wrap">
            <div class="container custom-container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="breadcrumb__wrap__content">
                            <h2 class="title">PROJECTS</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Projects</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb__wrap__icon">
                <ul>
                    @foreach ($methodologyDetail as $singleIcon)
                        <li><img src="{{ asset('uploads/methodologyDetails/' . $singleIcon->icon_image) }}" alt="">
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- portfolio-area -->
        <section class="portfolio__inner">
            <div class="container">
                {{-- <div class="row">
                    <div class="col-12">
                        <div class="portfolio__inner__nav">
                            <button class="active" data-filter="*">all</button>
                            <button data-filter=".cat-one">mobile apps</button>
                            <button data-filter=".cat-two">website Design</button>
                            <button data-filter=".cat-three">ui/kit</button>
                            <button data-filter=".cat-four">Landing page</button>
                        </div>
                    </div>
                </div> --}}
                <div class="portfolio__inner__active">

                    @foreach ($projType as $singleType)
                        <div class="portfolio__inner__item grid-item cat-two cat-three">
                            <div class="row gx-0 align-items-center">
                                <div class="col-lg-6 col-md-10">
                                    <div class="portfolio__inner__thumb">
                                        <a href="portfolio-details.html">
                                            <img src="{{ asset('uploads/projectTypes/' . $singleType->image) }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-10">
                                    <div class="portfolio__inner__content">
                                        <h2 class="title"><a href="portfolio-details.html">{{ $singleType->name }}</a></h2>
                                        {{-- <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                            have
                                            suffered alteration in some form, by injected humour, or randomised words which
                                            don't look even slightly believable.</p>
                                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                                            anything embarrassing
                                            hidden in the middle of text</p> --}}
                                        {{-- <a href="{{ url('projectDetail') }}" class="link">View Case Study</a> --}}

                                        <a href="{{ route('projectDetail.projectDetail', ['myprojectid' => $singleType->id]) }}"
                                            class="link">View Case Study</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- portfolio-area-end -->


        <!-- contact-area -->
        <section class="homeContact">
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

    <!-- banner-area -->

    <!-- main-area-end -->
@endsection

@section('page_title', 'EXPERIENCE')

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
