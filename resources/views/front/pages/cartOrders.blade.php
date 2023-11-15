@extends('front.layout.master')
@section('services')
    <div class="page-title header-mt-10 rest-cover zooming mySlides"
        style="background-image: url('{{ asset('/images/backg.jpeg') }}');height:300px">
        {{-- <h1></h1> --}}
    </div>


    <style>
        #select2-area-vm-container,
        .select2-selection__rendered {
            color: black !important;
        }
    </style>

    <section class="section bg-light">
        <div class="container">
            <form id="checkout-form" action="{{ route('CheckOut') }}" name="checkoutdata" method="POST" data-validate=""
                novalidate="novalidate">
                @csrf


                <div class="row">

                    <div
                        class="@if (App::islocale('ar')) col-xl-4 pull-xl-8 col-lg-5 pull-lg-7 @else col-xl-4 push-xl-8 col-lg-5 push-lg-7 @endif ">

                    </div>

                    {{--  push-xl-4 push-lg-5  --}}
                    <div
                        class="@if (App::islocale('ar')) col-xl-8 push-xl-4 col-lg-7 push-lg-5 checkout-fields @else col-xl-8 pull-xl-4 col-lg-7 pull-lg-5 checkout-fields @endif ">
                        {{-- <input type="hidden" name="is_guest_checkout" value="1"> --}}
                        @if (session()->has('orderEror'))
                            <div>
                                <h4 class="text-danger">


                                    {{ trans('frontHeader.errorMessage') }} &colon; {{ session()->get('MinOrderPrice') }}
                                    {{ trans('frontHeader.KD') }}

 
                                </h4>
                            </div>
                        @endif

                        <div class="bg-white p-4 p-md-5 mb-4">

                            <h4 class="border-bottom pb-4"><i
                                    class="ti ti-user ml-3 text-primary"></i>{{ trans('frontHeader.MainData') }}</h4>
                            <div class="row mb-5 ">

                                    <div class="form-group col-sm-6">
                                        <label>{{ trans('frontHeader.CustName') . ':' }}</label>
                                        <input id="guest_name" required="" name="firstname" value="{{old('firstname')}}" class="form-control"
                                            aria-required="true">
                                            @error('firstname')
                                                <label for="" style="color: red">
                                                    {{$message}}
                                                </label>
                                            @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>{{ trans('frontHeader.customerlastname') . ':' }}</label>
                                        <input id="guest_name" required="" value="{{old('lastname')}}" name="lastname" class="form-control"
                                            aria-required="true">
                                            @error('lastname')
                                                <label for="" style="color: red">
                                                    {{$message}}
                                                </label>
                                            @enderror
                                    </div>

                                        <div class="form-group col-sm-12">
                                            <label>{{ trans('frontHeader.Mobile') . ':' }}</label>
                                            <input type="number" maxlength="8" minlength="8" value="{{old('tel')}}" id="guest_contact" required=""
                                                name="tel" class="form-control" aria-required="true">
                                                @error('tel')
                                                <label for="" style="color: red">
                                                    {{$message}}
                                                </label>
                                            @enderror
                                        </div>
                                
                            </div>

                            <div id="address_block">
                                <h4 class="border-bottom pb-4"><i
                                        class="ti ti-map-alt ml-3 text-primary"></i>{{ trans('frontHeader.address') }}
                                </h4>
                                <div class="row mb-5">
                                    <div class="form-group col-sm-12">
                                        <div class="select-container">
                                            <select name="govern_id"  class="form-control select2"  style="width:100%;">
                                                <option  value="">{{ trans('frontHeader.ChooseArea') }}</option>
                                                @foreach ($governs as $govern)
                                                    @if (APP::islocale('ar'))
                                                        <option  value="{{ $govern->uuid }}">{{ $govern->arname }}</option>
                                                    @else
                                                        <option  value="{{ $govern->uuid }}">{{ $govern->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">
                                        <label></label>
                                        <input type="text"  placeholder="{{ trans('frontHeader.address') }} " name="address" value="{{old('address')}}" id="address"
                                            class="form-control" aria-required="false">
                                    </div>

                                    {{-- <div class="form-group col-sm-6">
                                        <label></label>
                                        <input type="text"
                                            placeholder="{{ trans('frontHeader.Jadda') . '(' . trans('frontHeader.optionalField') . ')' }}"
                                            name="Jadda" id="avenue" class="form-control">
                                    </div> --}}

                                    {{-- <div class="form-group col-sm-6">
                                        <label></label>
                                        <input type="text" required=""
                                            placeholder=" {{ trans('frontHeader.Street') }}*" name="street" id="street"
                                            class="form-control" aria-required="true">
                                    </div> --}}

                                    {{-- <div class="form-group col-sm-6">
                                        <label></label>
                                        <input type="text" required="" name="houseno"
                                            placeholder="{{ trans('frontHeader.HouseNo') }} *" id="houseno"
                                            class="form-control" aria-required="true">
                                    </div> --}}

                                    {{-- <div class="form-group col-sm-6">
                                        <label></label>
                                        <input type="text"
                                            placeholder="{{ trans('frontHeader.Floor') . '(' . trans('frontHeader.optionalField') . ')' }}"
                                            name="floor" id="floor" class="form-control">
                                    </div> --}}

                                    {{-- <div class="form-group col-sm-6">
                                        <label></label>
                                        <input type="text" name="officeno_Dept"
                                            placeholder="{{ trans('frontHeader.Dept') . '(' . trans('frontHeader.optionalField') . ')' }}"
                                            class="form-control">
                                    </div> --}}

                                    {{-- <div class="form-group col-sm-12">
                                        <label></label>
                                        <textarea type="text" name="Note" placeholder="اتجاه إضافي(اختياري)" id="extra_direction" class="form-control"></textarea>
                                    </div> --}}


                                </div>
                            </div>

                            {{-- <div id="branch_block" style="display:none">
                                <h4 class="border-bottom pb-4"><i class="ti ti-map-alt ml-3 text-primary"></i>التقاط تفاصيل فرع</h4>
                                <div class="row mb-5">
                                    <div class="form-group col-sm-12">
                                        <label>الاسم:</label>
                                        <strong></strong>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>الجوال/ الهاتف:</label>
                                        <strong></strong>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>العنوان:</label>
                                        <strong></strong>
                                    </div>                        
                                </div>
                            </div> --}}

                            {{-- <h4 class="border-bottom pb-4"><i
                                    class="ti ti-package ml-3 text-primary"></i>{{ trans('frontHeader.OrderType') }}</h4>
                            <div class="row mb-5 text-lg">
                                <div class="col-md-6 col-sm-6 form-group">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" checked="" id="standard_time" name="order_time"
                                            value="0" class="custom-control-input">
                                        <span class="custom-control-indicator"><svg class="icon" x="0px" y="0px"
                                                viewBox="0 0 32 32">
                                                <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79"
                                                    fill="none" stroke="#FFFFFF" stroke-width="4"
                                                    stroke-linecap="square" stroke-miterlimit="10"
                                                    d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"></path>
                                            </svg></span>
                                        <span class="custom-control-description">
                                            {{ trans('frontHeader.ordertimeMain') }}<br>
                                            <small class="text-sm text-muted">{{ trans('frontHeader.ondelv') }}</small>
                                        </span>

                                    </label>
                                </div>
                                <div class="col-md-6 col-sm-6 form-group">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" id="some_time" name="order_time" value="1"
                                            class="custom-control-input">
                                        <span class="custom-control-indicator"><svg class="icon" x="0px" y="0px"
                                                viewBox="0 0 32 32">
                                                <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79"
                                                    fill="none" stroke="#FFFFFF" stroke-width="4"
                                                    stroke-linecap="square" stroke-miterlimit="10"
                                                    d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"></path>
                                            </svg></span>
                                        <span class="custom-control-description">{{ trans('frontHeader.orderlater') }}<br>
                                            <span class="text-sm text-muted">{{ trans('frontHeader.choosetime') }}</span>
                                        </span>

                                    </label>
                                </div>

                                <div id="choose_time" style="display:none"
                                    class=" @if (App::islocale('ar')) form-group pull-md-6 col-sm-5 text-md @else form-group push-md-6 col-sm-5 text-md @endif">
                                    <label>{{ trans('frontHeader.LaterMessage') }}</label>
                                    <div class="form-group bootstrap-timepicker">
                                        <input id="expected_order_time" autocomplete="off" name="expected_order_time"
                                            class="form-control datetimepicker">
                                    </div>
                                </div>
                            </div> --}}

                            <h4 class="border-bottom pb-4"><i
                                    class="ti ti-wallet ml-3 text-primary"></i>{{ trans('frontHeader.Payment') }}</h4>
                            <div class="row text-lg">
                                <div class="col-md-6 col-sm-6 form-group">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" checked="" name="payment_method_id" value="1"
                                            class="custom-control-input">
                                        <span class="custom-control-indicator"><svg class="icon" x="0px" y="0px"
                                                viewBox="0 0 32 32">
                                                <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79"
                                                    fill="none" stroke="#FFFFFF" stroke-width="4"
                                                    stroke-linecap="square" stroke-miterlimit="10"
                                                    d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"></path>
                                            </svg></span>
                                        <span class="custom-control-description">{{ trans('frontHeader.KNetPay') }}</span>
                                    </label>
                                </div>
                                {{-- <div class="col-md-6 col-sm-6 form-group">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="payment_method_id" value="2"
                                            class="custom-control-input">
                                        <span class="custom-control-indicator"><svg class="icon" x="0px" y="0px"
                                                viewBox="0 0 32 32">
                                                <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79"
                                                    fill="none" stroke="#FFFFFF" stroke-width="4"
                                                    stroke-linecap="square" stroke-miterlimit="10"
                                                    d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"></path>
                                            </svg></span>
                                        <span
                                            class="custom-control-description">{{ trans('frontHeader.OnDelver') }}</span>
                                    </label>
                                </div> --}}
                            </div>
                        </div>


                        <div class="text-center">
                            <button role="submit" class="btn btn-primary btn-lg"
                                id="order-now"><span>{{ trans('frontHeader.OrderNow') }}</span></button>
                        </div>

                    </div>





                </div>
            </form>

        </div>
    </section>
@endsection
