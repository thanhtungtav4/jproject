<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        @yield('before_style')

        @include('components.styles')

        <link href="{{asset('static/backend/css/customize.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('static/backend/css/custom.css?v='.time())}}" rel="stylesheet" type="text/css" />
        @yield('after_style')
    </head>
    <body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed">
       <div class="kt-grid kt-grid--hor kt-grid--root">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
                <!-- begin:: Aside -->
                @include('components.aside')
                <!-- end:: Aside -->
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
                    <!-- begin:: Header -->
                    @yield('header')
                    <!-- end:: Header -->
                    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
                        <!-- begin:: Content -->
                        @yield('content')
                        <!-- end:: Content -->
                    </div>
                    <!-- begin:: Footer -->
                    @include('components.footer')
                    <!-- end:: Footer -->
                </div>
            </div>
        </div>


        @include('components.scroll-top')
        <script>
            var KTAppOptions = {
                "colors": {
                    "state": {
                        "brand": "#2c77f4",
                        "light": "#ffffff",
                        "dark": "#282a3c",
                        "primary": "#5867dd",
                        "success": "#34bfa3",
                        "info": "#36a3f7",
                        "warning": "#ffb822",
                        "danger": "#fd3995"
                    },
                    "base": {
                        "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                        "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
                    }
                }
            };
        </script>
        <script src="{{ asset('js/laroute.js?v='.time()) }}" type="text/javascript"></script>
        @include('components.scripts')
        <script type="text/javascript">
            $(window).on('load', function() {
                $('body').removeClass('m-page--loading');
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.kt-menu__item a').each(function () {
                var href = this.href;
                if (href == window.location.href){
                    $(this).parent().addClass('kt-menu__item--active');
                }
            });
        </script>
        @yield('after_script')
    </body>
</html>
