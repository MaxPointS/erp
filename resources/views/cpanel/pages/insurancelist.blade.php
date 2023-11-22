@extends('cpanel.layout.master')

@section('content-header')
    <li class="active">{{ $pageName }}</li>
@endsection

@section('content')
    <br />
    <div class="row ">

        <div class="col-md-4 col-sm-6 col-xs-12 ">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-car"></i></span>
                <div class="info-box-content  p-0">
                    <span class="info-box-text">Messages</span>
                    <span class="info-box-number">1,410</span>
                </div>
                <a href="{{route("thirdparty.index")}}" class="btn btn-success @if(App::islocale("ar")) pull-left @else pull-right @endif" style="border-radius:0"><i
                        class=" fa fa-pencil"></i></a>
            </div>

        </div> {{-- box --}}

        <div class="col-md-4 col-sm-4 col-xs-6">
            <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa  fa-ambulance"></i></span>
                <div class="info-box-content  p-0">
                    <span class="info-box-text">Messages</span>
                    <span class="info-box-number">1,410</span>
                </div>
                <span class="btn btn-success @if(App::islocale("ar")) pull-left @else pull-right @endif" style="border-radius:0"><i
                        class=" fa fa-pencil"></i></span>
            </div>

        </div> {{-- box --}}

        <div class="col-md-4 col-sm-4 col-xs-6">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa  fa-star-o"></i></span>
                <div class="info-box-content  p-0">
                    <span class="info-box-text">Messages</span>
                    <span class="info-box-number">1,410</span>
                </div>
                <span class="btn btn-success @if(App::islocale("ar")) pull-left @else pull-right @endif" style="border-radius:0"><i
                        class=" fa fa-pencil"></i></span>
            </div>

        </div> {{-- box --}}


        <div class="col-md-4 col-sm-4 col-xs-6">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa  fa-flag"></i></span>
                <div class="info-box-content  p-0">
                    <span class="info-box-text">Messages</span>
                    <span class="info-box-number">1,410</span>
                </div>
                <span class="btn btn-success @if(App::islocale("ar")) pull-left @else pull-right @endif" style="border-radius:0"><i
                        class=" fa fa-pencil"></i></span>
            </div>

        </div> {{-- box --}}

        <div class="col-md-4 col-sm-4 col-xs-6">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa  fa-anchor"></i></span>
                <div class="info-box-content  p-0">
                    <span class="info-box-text">Messages</span>
                    <span class="info-box-number">1,410</span>
                </div>
                <span class="btn btn-success @if(App::islocale("ar")) pull-left @else pull-right @endif" style="border-radius:0"><i
                        class=" fa fa-pencil"></i></span>
            </div>

        </div> {{-- box --}}


        <div class="col-md-4 col-sm-4 col-xs-6">
            <div class="info-box">
                <span class="info-box-icon bg-purple"><i class="fa   fa-plane"></i></span>
                <div class="info-box-content  p-0">
                    <span class="info-box-text">Messages</span>
                    <span class="info-box-number">1,410</span>
                </div>
                <span class="btn btn-success @if(App::islocale("ar")) pull-left @else pull-right @endif" style="border-radius:0"><i
                        class=" fa fa-pencil"></i></span>
            </div>

        </div> {{-- box --}}
       

    </div> {{-- row --}}
@endsection



@section('scriptes')
    <script src=" {{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script>
        //Date picker
        $('.datepicker').datepicker({
            autoclose: true
        });
        $("#TableVichleInsurance").dataTable({
            info: false,
            // ordering: true,
            paging: true
        });
    </script>
@endsection
