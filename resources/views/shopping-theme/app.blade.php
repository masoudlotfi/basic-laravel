<!doctype html>
<html class="no-js" lang="fa" dir="rtl">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" type="image/x-icon" href="{{ URL::asset('zarinpal-theme/img/favicon.ico') }}">
    <title>{{trans('sidebar.zarinpal')}} | {{trans('title.'. Route::getCurrentRoute()->getAction()['as'])}}</title>

    {!! Theme::css(URL::asset('zarinpal-theme/css/foundation.css')) !!}
            <!-- Custom styles for this template -->
    {!! Theme::css(URL::asset('zarinpal-theme/css/streamline.css')) !!}
    {!! Theme::css(URL::asset('zarinpal-theme/sass/theme.css')) !!}

    @yield('css')

            <!-- pace loader -->
    {!! Theme::js(URL::asset('zarinpal-theme/js/pace/pace.js')) !!}
    {!! Theme::css(URL::asset('zarinpal-theme/js/pace/themes/orange/pace-theme-flash.css')) !!}
    {!! Theme::css(URL::asset('zarinpal-theme/css/slicknav.css')) !!}
    <style>
        #content-wrapper {
            margin-bottom: 5rem;
        }
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
</head>

<body>

<div class="inner-wrap">
    {{--    {{dd(Route::getCurrentRoute()->getAction()['as'])}}--}}
            <!-- Right sidemenu -->
    @if(Route::current()->getAction()['namespace'] == 'App\Http\Controllers\Panel')
    @include('partials.sidebar_panel')
    @elseif(Route::current()->getAction()['namespace'] == 'App\Http\Controllers\Admin')
    @include('partials.sidebar_admin')
    @endif
            <!-- end of Rightsidemenu -->
    <div class="wrap-fluid" id="paper-bg" style="position: relative;">
        <!-- top nav -->
        @include('partials.top_nav')
                <!-- end of top nav -->
        <!-- breadcrumbs -->
        {!! Breadcrumbs::render(Route::getCurrentRoute()->getActionName()) !!}
                <!-- end of breadcrumbs -->
        @include('flash::message')
        <div id="content-wrapper">
            @yield('content')
        </div>
        @include('partials.footer')
    </div>
    <a class="exit-off-canvas"></a>
</div>
{!! Theme::js(URL::asset('zarinpal-theme/js/jquery.js')) !!}
{!! Theme::js(URL::asset('zarinpal-theme/js/modernizr.js')) !!}
        <!-- main javascript library -->
{!! Theme::js(URL::asset('zarinpal-theme/js/waypoints.min.js')) !!}
        <!-- foundation javascript -->
{!! Theme::js(URL::asset('zarinpal-theme/js/foundation.min.js')) !!}
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
@else
    @yield('js_slide_admin')
@endif

<script>
    $(document).foundation();
</script>

{!! Theme::js(URL::asset('zarinpal-theme/js/notify.js')) !!}
<script>
    (function (window) {
        "use strict";
        WSconnect();
        function WSconnect() {
            var wss = new WebSocket("wss://notify.zarinpal.com");
            var count = 0;
            wss.onmessage = function (evt) {
                var received_msg = JSON.parse(evt.data);
                if (received_msg.notification) {
                    notify(received_msg);
                }
                var html = document.getElementById('online-notification').innerHTML;
                html += "<div><a href=\"" + received_msg.link + "\"><h3 class=\"top-notification-message right\"><b class=\"text-green fontello-record\"></b>"
                        + "<span>" + received_msg.title + "</span></h3>"
                            //+"<span>12:23<small class=\"top-notification-message\">PM</small></span>"
                        + "<p class=\"top-notification-message\" style=\"white-space: normal\">" + nl2br(received_msg.message) + "</p>";
                +"</a></div>";
                document.getElementById('online-notification').innerHTML = html;
                document.getElementById('notification-count').innerHTML = ++count;
            };

            wss.onclose = WSconnect;
        }

        function notify(options) {
            var title = options.title;
            options.body = options.message;
            options.timeout = 20;
            options.notifyClick = function () {
                this.close();
                if (options.link) {
                    window.open(options.link, '_blank');
                }
            }
            options.notifyError = function () {
                console.error('Error showing notification. You may need to request permission.');
            }
            if (!Notify.needsPermission) {
                var Notification = new Notify(title, options);
                Notification.show();
            } else if (Notify.isSupported()) {
                Notify.requestPermission(function(){
                    var Notification = new Notify(title, options);
                    Notification.show();
                });
            }
        }

        function nl2br(str) {
            return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + '<br/>' + '$2');
        }

    })(window);
</script>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-19706501-5', 'auto');
    ga('send', 'pageview');

    window.heap=window.heap||[],heap.load=function(e,t){window.heap.appid=e,window.heap.config=t=t||{};var r=t.forceSSL||"https:"===document.location.protocol,a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src=(r?"https:":"http:")+"//cdn.heapanalytics.com/js/heap-"+e+".js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(a,n);for(var o=function(e){return function(){heap.push([e].concat(Array.prototype.slice.call(arguments,0)))}},p=["addEventProperties","addUserProperties","clearEventProperties","identify","removeEventProperty","setEventProperties","track","unsetEventProperty"],c=0;c<p.length;c++)heap[p[c]]=o(p[c])};
    heap.load("4072151808");
    heap.identify("{{Auth::user()->email}}");
</script>

</body>
</html>
