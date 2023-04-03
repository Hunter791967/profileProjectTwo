@extends('frontPages.layouts.app', ['phone' => $contactDetails->phone, 'address' => $contactDetails->address, 'email => $contactDetails->email', 'main_title' => $mainService->main_title])
@section('content')
    <!-- main-area -->
    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb__wrap">
            <div class="container custom-container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="breadcrumb__wrap__content">
                            <h2 class="title">Profissional Services Details</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Profssional Services Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb__wrap__icon">
                <ul>
                    @foreach ($serviceData as $singleSer)
                        <li><img src="{{ asset('uploads/services/' . $singleSer->icon_image) }}" alt="Services Icons"></li>
                    @endforeach
                </ul>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- services-details-area -->
        <section class="services__details">
            <div class="container">
                @include('sweetalert::alert')
                <div class="row">
                    <div class="col-lg-8">
                        <div class="services__details__thumb">
                            <img src="{{ asset('uploads/mainServices/' . $mainService->main_image) }}"
                                alt="Main Service Image">
                        </div>
                        <div class="services__details__content">
                            <h2 class="title">{{ $mainService->main_title }}</h2>
                            <div class="main_desc">

                                {!! $mainService->main_desc !!}
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
                    <div class="services__details__img">
                        <div class="row serviceImage_center">
                            @foreach ($serviceImage as $singleImage)
                                <div class="col-sm-3">
                                    <img src="{{ asset('uploads/services/' . $singleImage->service_image) }}"
                                        alt="Selected Services Image">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <h2 class="small-title">{{ $mainService->sub_title }}</h2>
                    <div class="sub_desc">

                        {!! $mainService->sub_desc !!}
                    </div>
                </div>
            </div>
        </section>
        <!-- services-details-area-end -->


        <!-- contact-area -->
        <section class="homeContact homeContact__style__two">
            <div class="container">
                <div class="homeContact__wrap">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="section__title">
                                {{-- <span class="sub-title">07 - Say hello</span> --}}
                                <h2 class="title">We'd Love To Hear From <br>You</h2>
                            </div>
                            <div class="homeContact__content">
                                <p>Please Feel Free To Submit Your Feedback About The Proposed Services, The Site or Any
                                    Other Thing You Need To Give Us A Feedbackt, Thank You</p>
                                <h2 class="mail"><a
                                        href="mailto:{{ $contactDetails->email }}">{{ $contactDetails->email }}</a></h2>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="homeContact__form">
                                <form role="form" action="{{ route('front.store') }}" method="post">
                                    <input type="text" placeholder="Enter Name*" name="name">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="email" placeholder="Enter Email*" name="email">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="number" placeholder="Enter Phone Number*" name="phone">
                                    @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <textarea name="message" placeholder="Please Write A Feedback*" name="message"></textarea>
                                    @error('message')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <button type="submit">Send Feedback</button>
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

@section('page_title', 'ServicesPage')

@section('page_style')
    <link rel="stylesheet" href="{{ asset('first/styles/frontHome.css') }}">
@endsection
