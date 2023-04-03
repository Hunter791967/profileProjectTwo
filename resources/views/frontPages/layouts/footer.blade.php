<!-- Footer-area -->
<footer class="footer">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-4">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">Contact us</h5>
                        <h4 class="footer_title">{{ $contactDetails->phone }}</h4>
                    </div>
                    <div class="footer__widget__text">
                        <p>{{ $mainService->main_title }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">My Address</h5>
                        <h4 class="footer_title">{{ $contactDetails->address }}</h4>
                    </div>
                    <div class="footer__widget__address">
                        <p>El Shorouk City, Cairo, <br> Egypt</p>
                        <a href="mailto:{{ $contactDetails->email }}" class="mail">{{ $contactDetails->email }}</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">Follow me</h5>
                        <h4 class="footer_title">socially connect</h4>
                    </div>
                    <div class="footer__widget__social">
                        <p>{{ $mainService->sub_title }}</p>
                        <ul class="footer__social__list">
                            @foreach ($contactIcon as $singleIcon)
                                <li><a href="{{ $singleIcon->icon_link }}"><img
                                            src="{{ asset('uploads/contactIcons/' . $singleIcon->icon_image) }}"
                                            alt="Contact Icons" class="myContact_icon"></a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright__wrap">
            <div class="row">
                <div class="col-12">
                    <div class="copyright__text text-center">
                        <p>Copyrights @ Amr Elnahas 2023, All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer-area-end -->




<!-- JS here -->
<script src="{{ asset('frontDesign/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('frontDesign/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontDesign/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontDesign/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('frontDesign/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontDesign/js/element-in-view.js') }}"></script>
<script src="{{ asset('frontDesign/js/slick.min.js') }}"></script>
<script src="{{ asset('frontDesign/js/ajax-form.js') }}"></script>
<script src="{{ asset('frontDesign/js/wow.min.js') }}"></script>
<script src="{{ asset('frontDesign/js/plugins.js') }}"></script>
<script src="{{ asset('frontDesign/js/main.js') }}"></script>

@yield('page_js')

</body>

</html>
