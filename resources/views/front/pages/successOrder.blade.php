@extends('front.layout.master')
@section('CatProducts')
    <div class="page-title header-mt-10 bg-dark dark">
        <!-- BG Image -->
        <div class="bg-image bg-parallax skrollable skrollable-between" data-top-bottom="background-position-y: 30%"
            data-bottom-top="background-position-y: 70%"
            style="background-image: url(&quot;http://alkadisweets.com/assets/img/photos/bg-croissant.jpg&quot;); background-position-y: 37.0677%;">
            <img src="http://alkadisweets.com/assets/img/photos/bg-croissant.jpg" alt="" style="display: none;"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 push-lg-4">

                </div>
            </div>
        </div>
    </div>

    <section class="section bg-light">

        <div class="row text-center">
            <div class="col-12 text-center">
                <h4 class="text-success">{{ trans('frontHeader.successMessage') }}</h4>
                <br />
                <h4 class="text-success"><i class="fa fa-whatsapp "></i> <a
                        href="https://wa.me/+965{{ session()->get('BranchNo') }}">{{ session()->get('BranchNo') }}</a></h4>
            </div>
        </div>

        <div class="container">

            <div class="row">

                {{-- class="@if (App::islocale('ar')) col-xl-8 push-xl-4 col-lg-7 push-lg-5 checkout-fields @else col-xl-8 pull-xl-4 col-lg-7 pull-lg-5 checkout-fields @endif " --}}
                <div class="col-12">

                    <div class="bg-white p-4 p-md-5 mb-4 ">
                        <h4 class="border-bottom pb-4"><i
                                class="fa fa-edit fa-x ml-3 text-success"></i>{{ trans('frontHeader.MainData') }}</h4>
                        <table class="table table-bordered">
                            <thead class="bg-light">
                                {{-- <th class="text-center">#</th> --}}
                                <th class="text-center">{{ trans('frontHeader.CustName') }}</th>
                                <th class="text-center">{{ trans('frontHeader.address') }}</th>
                                <th class="text-center">{{ trans('frontHeader.Mobile') }}</th>
                                <th class="text-center">{{ trans('frontHeader.OrderNO') }}</th>

                            </thead>
                            <tbody>

                                @foreach ($custorders as $Cust)
                                    <tr>
                                        <td>{{ $Cust->CustName }}</td>
                                        <td>
                                            {{-- <b>{{trans('frontHeader.Area')}}</b> --}}
                                            <b class="text-success"> {{ $Cust->AreaArName }} </b>
                                            {{ trans('frontHeader.Block') }}<b class="text-success"> {{ $Cust->Block }}
                                            </b>
                                            {{ trans('frontHeader.Street') }} <b class="text-success"> {{ $Cust->Street }}
                                            </b>
                                            {{ trans('frontHeader.Jadda') }}<b class="text-success"> {{ $Cust->Jadda }}
                                            </b>
                                            {{ trans('frontHeader.HouseNo') }} <b class="text-success">
                                                {{ $Cust->Houseno }} </b>
                                            {{ trans('frontHeader.Floor') }} <b class="text-success"> {{ $Cust->Floor }}
                                            </b>
                                            {{ trans('frontHeader.Dept') }}<b class="text-success">
                                                {{ $Cust->Office_Dept }} </b>
                                        </td>


                                        <td>{{ $Cust->CustPhone }}</td>
                                        <td>{{ $Cust->InvoiceNo }}</td>
                                        {{-- <td>{{$Cust->CustName}}</td> --}}
                                    </tr>
                                @break
                            @endforeach

                        </tbody>
                    </table>

                    <h4 class="border-bottom pb-4"><i
                            class="ti ti-layout-grid3 ti-2x ml-3 text-primary"></i>{{ trans('frontHeader.OrderDetails') }}
                    </h4>
                    <table class="table table-bordered">
                        <thead class="bg-light text-whiet">
                            <th class="text-center">#</th>
                            <th class="text-center">{{ trans('frontHeader.ProdcName') }}</th>
                            <th class="text-center">{{ trans('frontHeader.Qty') }}</th>
                            <th class="text-center">{{ trans('frontHeader.Total') }}</th>

                        </thead>
                        <tbody>
                            <?php $index = 1; ?>
                            @foreach ($custorders as $order)
                                <tr>
                                    <td>{{ $index }}</td>
                                    <td>{{ $order->ProductArName }} </td>
                                    <td>{{ $order->Qty }} </td>
                                    <td>{{ number_format($order->ProductRealPrice * $order->Qty, 3) }} </td>

                                </tr>
                                <?php $index++; ?>
                            @endforeach

                        </tbody>
                    </table>
                    <table class="table table-bordered w-50">

                        <tbody>

                            @foreach ($custorders as $invoice)
                                <tr>
                                    <td>{{ trans('frontHeader.delvCost') }}</td>
                                    <td>{{ session()->get('DelvCost') }}</td>

                                </tr>
                                <tr>
                                    <td>{{ trans('frontHeader.TotalPrice') }}</td>
                                    <td>{{ $invoice->TotalPrice }} </td>
                                </tr>
                            @break
                        @endforeach

                    </tbody>
                </table>
                <div class="text-center">
                    <a href="{{ url('/home') }}" class="btn btn-primary btn-lg"
                        id="order-now"><span>{{ trans('frontHeader.back') }}</span></a>
                </div>

            </div>


        </div>
    </div>

</section>
@endsection
