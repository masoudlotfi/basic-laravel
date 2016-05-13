<!doctype html>
<html class="no-js" lang="fa" dir="rtl">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" type="image/x-icon" href="{{ URL::asset('zarinpal-theme/img/favicon.ico') }}">
    <title>{{trans('sidebar.zarinpal')}}</title>

    {!! Theme::css(URL::asset('zarinpal-theme/css/foundation.css')) !!}
    <!-- Custom styles for this template -->
    {!! Theme::css(URL::asset('zarinpal-theme/sass/style.css')) !!}
    {!! Theme::css(URL::asset('zarinpal-theme/css/streamline.css')) !!}
    {!! Theme::css(URL::asset('zarinpal-theme/sass/theme.css')) !!}
    {!! Theme::css(URL::asset('zarinpal-theme/css/responsive-tables.css')) !!}

    @yield('css')

    <!-- pace loader -->
    {!! Theme::js(URL::asset('zarinpal-theme/js/pace/pace.js')) !!}
    {!! Theme::css(URL::asset('zarinpal-theme/js/pace/themes/orange/pace-theme-flash.css')) !!}
    {!! Theme::css(URL::asset('zarinpal-theme/css/slicknav.css')) !!}

    {!! Theme::js(URL::asset('zarinpal-theme/js/modernizr.js')) !!}

</head>

<body>

<!-- right sidebar wrapper -->
<div class="inner-wrap">
        <div class="wrap-fluid" id="paper-bg">
            <!-- top nav -->
            @include('partials.top_nav_guest_ticket')
            <!-- end of top nav -->
            <!-- end of breadcrumbs -->

            @include('flash::message')

            @yield('content')
        </div>
        <a class="exit-off-canvas"></a>
        <!-- End of Right Menu -->
</div>

<!-- end paper bg -->

<!-- </div>
end of off-canvas-wrap -->

<!-- end of inner-wrap -->


<!-- main javascript library -->
{!! Theme::js(URL::asset('zarinpal-theme/js/jquery.js')) !!}
{!! Theme::js(URL::asset('zarinpal-theme/js/waypoints.min.js')) !!}
<!-- foundation javascript -->
{!! Theme::js(URL::asset('zarinpal-theme/js/foundation.min.js')) !!}
{!! Theme::js(URL::asset('zarinpal-theme/js/foundation.dropdown.js')) !!}
{!! Theme::js(URL::asset('zarinpal-theme/js/responsive-tables.js')) !!}
<!-- main edumix javascript -->
{!! Theme::js(URL::asset('zarinpal-theme/js/jquery.slimscroll.min.js')) !!}
{!! Theme::js(URL::asset('zarinpal-theme/js/jquery.slicknav.min.js')) !!}
{!! Theme::js(URL::asset('zarinpal-theme/js/sliding-menu.js')) !!}
{!! Theme::js(URL::asset('zarinpal-theme/js/scriptbreaker-multiple-accordion-1.js')) !!}
{!! Theme::js(URL::asset('zarinpal-theme/js/jquery.counterup.min.js')) !!}
{!! Theme::js(URL::asset('zarinpal-theme/js/jquery.circliful.min.js')) !!}
{!! Theme::js(URL::asset('zarinpal-theme/js/jquery.mask.min.js')) !!}
{!! Theme::js(URL::asset('zarinpal-theme/js/app.js')) !!}

@yield('js')

@if(Route::current()->getAction()['namespace'] == 'App\Http\Controllers\Panel')
    @yield('js_slide_panel')
@endif
<style>
    footer #social_links a {
        fill: #333;
    }

    footer #social_links a:hover {
        fill: #008CBA;
    }

    #social_links svg {
        width: 2rem;
    }
</style>

<script>
    $(document).foundation();
</script>

</body>
</html>
