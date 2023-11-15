<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="noarchive">
    <meta name="keywords" content="" />
    <meta name="description" content="" />

    <!-- Title -->
    <title>{{ trans('frontHeader.SiteVendor') }}</title>


    {{-- <link rel="alternate" href="http://tofialmeshaal.com" hreflang="ar-ar" />
    <link rel="alternate" href="http://tofialmeshaal.com/lang/en" hreflang="en-us" /> --}}


    <!-- CSS Plugins -->
    @include('front.inc.frontCss')

    @yield('css')

    <!-- CSS Theme -->
    <style>
        #panel-cart .panel-cart-action {
            background-color: #ffffff;
            padding: 1rem 0;
        }
    </style>


</head>

<body>

    <div id="body-wrapper" @if (App::islocale('ar')) dir="rtl" @endif class="animsition">


        @include('front.inc.header')

        {{-- @include('front.inc.combLogo') --}}
        {{-- <main role="main"> --}}

        @yield('services')


        @include('front.inc.footer')
  
    </div>



    @include('front.inc.frontScripts')

    @yield("scripts")
</body>

</html>
