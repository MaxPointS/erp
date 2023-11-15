@extends('cpanel.layout.master')

{{-- <meta http-equiv="refresh" content="15"> --}}

{{-- <meta http-equiv="refresh" content="15"> --}}

@section('content')
   
        <!-- Content Header (Page header) -->
        <section class="content-header ">

        </section>
 
        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row ">


                <!-- ./col -->

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner ltr">
                            <h3 id="nOrder">sfsf</h3>

                            <p>عدد الطلبات الجديدة</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars "></i>
                        </div>
                        <a href="{{ url('cpanel/orders/1') }}" class="small-box-footer"><i
                                class="fa fa-arrow-circle-left"></i>مشاهدة</a>
                    </div>
                </div>
                <!-- ./col -->


                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            {{-- <h3>{{count($countsOrde1)}}</h3> --}}
                            <h3 id="nOrder"></h3>
                            <p>عدد الطلبات تحت التجهيز </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>

                        </div>
                        <a href="{{ url('cpanel/orders/2') }}" class="small-box-footer"><i
                                class="fa fa-arrow-circle-left"></i>مشاهدة </a>
                    </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            {{-- <h3>{{count($countsOrde2)}}</h3> --}}
                            <h3 id="nOrder"></h3>

                            <p>عدد الطلبات المعدة للتوصيل</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ url('cpanel/orders/3') }}" class="small-box-footer"><i
                                class="fa fa-arrow-circle-left"></i>مشاهدة</a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            {{-- <h3>{{count($countsOrde3)}}</h3> --}}
                            <h3 id="nOrder"></h3>
                            <p>عدد الطلبات تم توصيلها</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ url('cpanel/orders/4') }}" class="small-box-footer"><i
                                class="fa fa-arrow-circle-left"></i>مشاهدة</a>
                    </div>
                </div>
                <audio style="display:none" id="aa" controls>
                    <source src="{{ asset('audio/ss.mp3') }}" id="cc" type="audio/mpeg">
                    <source src="{{ asset('audio/dd.ogg') }}" id="bb" type="audio/ogg">

                </audio>
                <!-- ./col -->
            </div>

            {{-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css"> --}}
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
            <script src="../js/morris/morris.min.js"></script>

            <script>
                // var vid = document.getElementById("aa");
                // playVid();

                // function playVid() {
                //     let x = document.getElementById("nOrder");

                //     let count = parseInt($(x).text());
                //     if (count > 0) {
                //         vid.play();
                //     }
                // }
            </script>

            <!-- ./ikkkkkkkkkkkkkkkkkkjhhhjjjjjjj -->



            <div class="row ">
                <div class="col-md-6">
                    <!-- AREA CHART -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">القائمة الرئيسية حسب الافرع</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div id="chart">
                                {{-- <canvas id="areaChart" style="height:250px"></canvas> --}}
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- DONUT CHART -->

                    <!-- /.box -->

                </div>
                <div class="col-md-6">
                    <!-- AREA CHART -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"> المنتجات حسب القائمة الرئيسية </h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div id="chart1">
                                {{-- <canvas id="areaChart" style="height:250px"></canvas> --}}
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- DONUT CHART -->

                    <!-- /.box -->

                </div>
            </div>


            <div class="row ">
                <div class="col-md-12 ">
                    <!-- AREA CHART -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">الطلبات على الاصناف</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body table-responsive-md table-responsive-sm">
                            <div id="chartpr" class="">

                                <div id="chart2"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

@endsection
