<!-- Header -->
<header id="header" class="light fixed">
 
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <!-- Logo -->
                <div class="module module-logo transparent">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('images/logo2.png') }}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-7">
                <!-- Navigation -->
                <nav class="module module-navigation  ml-4">
                    <ul @if (App::islocale('ar')) dir="rtl" @endif id="nav-main" class="nav nav-main">
                        <li><a class="about-us-li" href="{{ route('home') }}"><i class="ti ti-home"></i>
                                {{ trans('frontHeader.MainPage') }} </a></li>
                        @if (App::islocale('en'))
                            <li>
                                <form id="changeLangForm" method="POST" action="{{ route('ChangeLangauge') }}">
                                    @csrf
                                    <input type="hidden" name="lang" value="ar">
                                    <a href="" id="submitFormLink" style="cursor: pointer;"><i
                                            class="ti ti-world"></i> ARABIC</a>
                                </form>
                            </li>
                        @else
                            {{-- <li><a href="{{url('lang/ar')}}"><i class="ti ti-world" ></i> ARABIC</a></li> --}}
                            {{-- <a href="{{ route('ChangeLangauge','en') }}">ENGLISH<i class="ti ti-world"></i></a> --}}
                            <li>
                                <form id="changeLangForm" method="POST" action="{{ route('ChangeLangauge') }}">
                                    @csrf
                                    <input type="hidden" name="lang" value="en">
                                    <a href="" id="submitFormLink" style="cursor: pointer;"><i
                                            class="ti ti-world"></i> English</a>
                                </form>
                            </li>
                        @endif 

                        <li><a class="about-us-li" href="{{ route('companyServices') }}"><i class="ti ti-view-grid"></i>
                                {{ trans('frontHeader.services') }} </a></li>
                        <li><a href=""><i class="ti ti-truck"></i>
                                {{ trans('frontHeader.followorder') }} </a></li>


                        {{-- <li><a data-toggle="modal" href="#loginModal"><i class="ti ti-shift-left" ></i> تسجيل الدخول</a></li> --}}
                    </ul>
                </nav>
            </div>
            <div class="col-md-2">
                {{--  data-toggle="panel-cart" {{url('CartOrders')}} --}}
                <a href="#" class="module module-cart left" data-toggle="panel-cart">
                    <span class="cart-icon">
                        <i class="ti ti-shopping-cart"></i>
                        <span id="cart-count" class="notification cart-count">

                            @if ($cart->count() > 0)
                                {{ $cart->count() }}
                            @else
                                0
                            @endif
                        </span>
                    </span>

                    <span id="cart-value" class="cart-value">
                        @if ($cart->count() > 0)
                            @php
                                $totalcartPrice = 0.0;

                                if ($cart->count() > 0) {
                                    foreach ($cart as $item) {
                                        $totalcartPrice += round($item->qty * $item->services->first()->price, 3);
                                    };
                                }
                            @endphp
                            {{$totalcartPrice}}
                       
                        @else
                            0.000
                        @endif
                    </span>
                </a>
            </div>
        </div>
    </div>

</header>
<!-- Header / End -->

<!-- Header -->
<header id="header-mobile" class="light">

    <div class="module module-nav-toggle">
        <a href="#" id="nav-toggle"
            data-toggle="panel-mobile"><span></span><span></span><span></span><span></span></a>
    </div>

    <div class="module module-logo">
        <a href="{{ url('/') }}">
            <img src="{{ asset('images/logo2.png') }}" alt="">
        </a>
    </div>
    {{-- data-toggle="panel-cart" --}}
    {{-- {{url("CartOrders")}} --}}
    {{-- <a href="#"  class="module module-cart" >
                        <i class="ti ti-shopping-cart"></i>
                        <span id="cart-value" class="notification cart-count">
                            @if (session()->has('cart'))
                                            {{count(session()->get('cart'))}}
                                            @else
                                            0
                                            @endif
                        </span>
                    </a>
                    --}}


    <div class="">
        <a href="#" class="module module-cart left" data-toggle="panel-cart">
            <span class="cart-icon">
                <i class="ti ti-shopping-cart"></i>
                <span class="notification cart-count">
                    @if ($cart->count() > 0)
                                {{ $cart->count() }}
                            @else
                                0
                            @endif
                </span>
            </span>
            {{-- <span class="cart-value">0</span> --}}
        </a>
    </div>

</header>
