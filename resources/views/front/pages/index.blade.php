@extends('front.layout.master')


@section('services')
    <!-- Section - Menu -->
    {{-- <section class="section pb-0 protrude" style="direction:rtl">
<h1 class="text-center text-primary">العروض</h1>
</section> --}}


    <section class="section header-mt-10 section-main section-main-1 bg-dark">
        <div class="container dark col-md-12 " style="padding:0px !important">
            <div class="slide-container">

                <div class="bg-image zooming">
                    <img src="{{ asset('/images/backg.jpeg') }}" alt="">
                </div>
                <h2 class="hide-sm">&nbsp;&nbsp;&nbsp;</h2>
                <div class="content dark">
                    <div id="section-main-1-carousel-content">
                        <div class="content-inner">
                            {{-- class="delivery-pickup-form"  --}}
                            <div class="form-group">
                                <a href="{{ route('companyServices') }}"
                                    class="btn btn-success btn-block btn-sm btn-submit">
                                    <span class="description">{{ trans('frontHeader.enterPage') }}</span><i
                                        class="fa @if (App::isLocale('en')) fa-arrow-right @else fa-arrow-left @endif"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    {{-- <section class="section container pb-0 protrude" @if (App::isLocale('ar')) style="direction:rtl" @endif>
        <h1 class="text-center text-primary" style="color:#703062 !important">{{ trans('frontHeader.branchess') }}</h1>
        <div class="row text-center">

            @for ($i = 1; $i < 8; $i++)
                <div class="col-xl-3 col-md-4  m-3 col-sm-12">
                    <a href="{{ trans('about.location' . $i) }}" target="_blank">
                        <h3> <i class="fa fa-map-marker" aria-hidden="true"></i> {{ trans('about.area' . $i) }}</h3>
                    </a>

                    <table class="w-100">
                        <tr>
                            <td>{{ trans('frontHeader.address') }}</td>
                            <td>{{ trans('about.aderss' . $i) }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('frontHeader.Mobile1') }}</td>
                            <td> {!! trans('about.tel' . $i) !!}</td>
                        </tr>
                        <tr>
                            <td> {{ trans('frontHeader.Whatsapp1') }}</td>
                            <td><a href="https://wa.me/965{{ trans('about.whatsapp' . $i) }}"
                                    target="_blank">{{ trans('about.whatsapp' . $i) }}</a></td>
                        </tr>
                    </table>


                </div>
            @endfor
        </div>
    </section> --}}

    <br />
    <section class="section pb-0 protrude" style="display:none;">
    </section>
@endsection
