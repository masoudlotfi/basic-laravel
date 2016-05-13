<!doctype html>
<html class="no-js" lang="fa" dir="rtl">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" type="image/x-icon" href="#">
    <title>فروشگاه تست</title>

{!! Theme::css('/zarinpal-theme/css/foundation.css') !!}

<!-- Custom styles for this template -->

    {!! Theme::css('/zarinpal-theme/css/streamline.css') !!}
    {!! Theme::css('/zarinpal-theme/sass/theme.css') !!}
    {!! Theme::css('/zarinpal-theme/css/login.css') !!}

    @yield('css')

    <style>
        .close {
            display: none;
        }
    </style>
    {!! Theme::js('/zarinpal-theme/js/modernizr.js') !!}

</head>

<body class="login-bg ">

<!-- preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<!-- End of preloader -->
<!-- right sidebar wrapper -->

<div class="inner-wrap">
    <div class="large-4 medium-8 small-12 large-centered medium-centered small-centered columns">
        <!-- Container Begin -->
        @include('flash::message')
        <div class="box bg-white shadowbox">
            <!-- Profile -->
            <div class="profile auth-panel">
                <h3 style="top: 0">
                    فروشکاه تست
                </h3>
            </div>
            <!-- End of Profile -->
            @yield('content')
        </div>
        <!-- box -->
    </div>
    <!-- End of Container Begin -->
</div>
<!-- end paper bg -->

<!-- end of inner-wrap -->

<!-- main javascript library -->
{!! Theme::js('/zarinpal-theme/js/jquery.js') !!}
{!! Theme::js('/zarinpal-theme/js/waypoints.min.js') !!}
{!! Theme::js('/zarinpal-theme/js/preloader-script.js') !!}
<!-- foundation javascript -->
{!! Theme::js('/zarinpal-theme/js/foundation.min.js') !!}
{!! Theme::js('/zarinpal-theme/js/foundation.dropdown.js') !!}
<!-- main edumix javascript -->
@yield('js')
</body>
</html>
