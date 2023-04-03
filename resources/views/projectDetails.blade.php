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
                            <h2 class="title">Case Details</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('frontPages') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb__wrap__icon">
                <ul>
                    @foreach ($methodologyDetail as $singleDetail)
                        <li><img src="{{ asset('uploads/methodologyDetails/' . $singleDetail->icon_image) }}"
                                alt="Methodology Details Icons"></li>
                    @endforeach
                </ul>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- portfolio-details-area -->
        <section class="services__details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="services__details__thumb">

                            <img src="{{ asset('uploads/projects/' . $project->image) }}" alt="Project Detail Image">
                        </div>
                        <div class="services__details__content">
                            <h2 class="title">{{ $project->name }}</h2>
                            <div class="main_desc">

                                {!! $project->project_desc !!}
                            </div>
                            <div class="services__details__img">
                                {{-- <div class="row"> --}}
                                <div class="col-sm-5">
                                    <img src="{{ asset('uploads/methodology/' . $imageFirst->image) }}" alt="ImageFirst">
                                </div>
                                <div class="col-sm-5">
                                    <img src="{{ asset('uploads/methodology/' . $imageLast->image) }}" alt="ImageLast">
                                </div>
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <aside class="services__sidebar">
                            <div class="widget">
                                <h5 class="title">Get in Touch</h5>
                                <form role="form" action="{{ route('front.store') }}" method="post"
                                    class="sidebar__contact">
                                    @csrf
                                    <input type="text" placeholder="Name*" name="name">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="email" name="email" placeholder="Email*">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="number" placeholder="Phone Number*" name="phone">
                                    @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <textarea name="message" id="message" placeholder="Please Write Your Message*"></textarea>
                                    @error('message')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <button type="submit" class="btn contact_btn">send massage</button>
                                </form>
                            </div>
                            <div class="widget med_widget">
                                <h5 class="title">Project Information</h5>
                                <ul class="sidebar__contact__info">
                                    <li><span>Date :</span> {{ $project->date }}</li>
                                    <li><span>Location :</span> {{ $project->location_add }}</li>
                                    <li><span>Client :</span> {{ $project->client_name }}</li>
                                    {{-- <li class="cagegory"><span>Category :</span>
                                        <a href="portfolio.html">Photo,</a>
                                        <a href="portfolio.html">UI/UX</a>
                                    </li> --}}
                                    <li><span>Project Link :</span> <a
                                            href="portfolio-details.html">{{ $project->project_link }}</a></li>
                                </ul>
                            </div>
                            <div class="widget">
                                <h5 class="title">Contact Details</h5>
                                <ul class="sidebar__contact__info">
                                    <li><span>NAME :</span> {{ $contactDetails->name }}</li>
                                    <li><span>EMAIL :</span> {{ $contactDetails->email }} </li>
                                    <li><span>PHONE :</span> {{ $contactDetails->phone }}</li>
                                    <li><span>ADDRESS :</span> {{ $contactDetails->address }}</li>
                                </ul>
                                <ul class="sidebar__contact__social">
                                    @foreach ($contactIcon as $singleIcon)
                                        <li><a href="{{ $singleIcon->icon_link }}"><img
                                                    src="{{ asset('uploads/contactIcons/' . $singleIcon->icon_image) }}"
                                                    alt="My Links Icons" class="myContact_icon"></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- portfolio-details-area-end -->


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
    <!-- main-area-end -->
@endsection

@section('page_title', 'EXPERIENCE')

@section('page_style')
    <link rel="stylesheet" href="{{ asset('first/styles/frontHome.css') }}">
@endsection

{{-- @section('page_js')
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

@endsection --}}
