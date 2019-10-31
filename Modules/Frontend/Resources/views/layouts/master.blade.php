<!DOCTYPE html>
<html lang="{{Config::get('app.locale')}}" xmlns="http://www.w3.org/1999/html">
<head>
    <title> @yield('title')</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="RYOKI KOGYO CO.,LTD" />
    <link rel="shortcut icon" type="image/png" href="{{ asset($dataShareConfig['favicon'][getValueByLang('')]) }}"/>
    <!-- css files -->
    <link href="{{asset('static/frontend')}}/css/css_slider.css" type="text/css" rel="stylesheet" media="all"><!-- slider css -->
    <link href="{{asset('static/frontend')}}/css/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
    <link href="{{asset('static/frontend')}}/css/style.css" rel='stylesheet' type='text/css' /><!-- custom css -->
    <link href="{{asset('static/frontend')}}/css/font-awesome.min.css" rel="stylesheet"><!-- fontawesome css -->
    <link href="{{asset('static/frontend')}}/css/ekko-lightbox.css" rel='stylesheet' type='text/css' />
    <!-- //css files -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!-- //google fonts -->
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
</head>
<body>
<!-- top header -->
<div class="fixed-top" id="navbar">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <ul class="d-lg-flex header-w3_pvt">
                        <li class="mr-lg map_txt">
                            <span class="map_icon"></span>
                            {{$dataShareConfig['main_company'][getValueByLang('')]}}
                        </li>
                        <li class="mr-lg icon_text">
                            <span class="email_icon"></span>
                            <a href="mailto:{{$dataShareConfig['email'][getValueByLang('')]}}" class=""> {{$dataShareConfig['email'][getValueByLang('')]}}</a>
                        </li>
                        <li class="mr-lg icon_text phone_head">
                            <span class="phone_icon"></span>
                            <a href="tel:{{$dataShareConfig['hot_line'][getValueByLang('')]}}" class=""> {{$dataShareConfig['hot_line'][getValueByLang('')]}}</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-3 header-right-w3_pvt">
                    <ul class="d-lg-flex header-w3_pvt justify-content-lg-end top-head-icon">
                        <li class="">
                            <a href="{{$dataShareConfig['linkedin'][getValueByLang('')]}}" target="_blank"><span class="btn_facebook"></span></a>
                        </li>
                        <li class="">
                            <a href="{{$dataShareConfig['facebook'][getValueByLang('')]}}" target="_blank"><span class="btn_in"></span></a>
                        </li>
                        {{--<li class="">--}}
                            {{--<span class="btn_seach"></span>--}}
                        {{--</li>--}}
                        @foreach(Config::get('app.locales') as $locale)
                        <li class="lang">
                            <a hreflang="{{$locale}}" href="{{route('frontend.index.change-locale', ['locale' => $locale])}}"> <span class="@if(Config::get('app.locale') == $locale) active @endif ">{{$locale}}</span></a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
        <!-- Navigation -->
        @include('frontend::inc.header')
        @yield('content')
        <!-- Footer -->
        @include('frontend::inc.footer')
        <script src="{{asset('static/frontend')}}/js/jquery.js"></script>
        <script src="{{asset('static/frontend')}}/js/bootstrap.js"></script>
         <script src="{{asset('static/frontend')}}/js/ekko-lightbox.js"></script>
         <script src="{{asset('static/frontend')}}/js/ekko-lightbox.js.map"></script>
        <!-- Portfolio Modals -->
        <!-- Modal 1 -->
        <div id="my-modal">
            @include('frontend::inc.modal')
        </div>
        <!-- move top -->

    <!-- Return to Top -->
    <a href="javascript:" id="return-to-top"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
    <script>
        // ===== Scroll to Top ====
        $(window).scroll(function() {
            if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
                $('#return-to-top').fadeIn(200);    // Fade in the arrow
            } else {
                $('#return-to-top').fadeOut(200);   // Else fade out the arrow
            }
        });
        $('#return-to-top').click(function() {      // When arrow is clicked
            $('body,html').animate({
                scrollTop : 0                       // Scroll to top of body
            }, 500);
        });

        $(document).ready(function () {
            var hash = window.location.hash;
            $( 'ul.nav a[href="' + hash + '"]' ).click();
        })
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>
        <!-- move top -->
        @yield('after_script')

    </body>
</html>
