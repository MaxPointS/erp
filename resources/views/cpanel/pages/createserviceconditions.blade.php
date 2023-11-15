@extends('cpanel.layout.master')

@section('css')
    <style>
        .select2-selection {
            border-radius: 0 !important;
        }
    </style>
@endsection



@section('content')
    <form action="{{ route('createcondition') }}" method="POST" id="termsForm" enctype="multipart/form-data">
        @csrf
        <div class="row ">
            <div class="col-md-12 ">
                <div class="box" style="border: 0 !important;box-shadow: 0 1px 9px 3px rgba(0,0,0,0.1);">
                    <div class="box-header">
                        <h3 class="box-title">{{ trans('serviceterms.termstitle') }} </h3>
                    </div>
                    <div class="box-body ">

                        <div class="form-row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="companyservice">{{ trans('companyTrans.service') }}</label>

                                    <div class="input-group text">
                                        <div class="input-group-addon">
                                            <i class="fa fa-building-o"></i>
                                        </div>
                                        {{-- <input type="text" id="datePolicy" class="form-control pull-right datepicker"> --}}
                                        <select class="form-control select2 " style="width: 100%;"
                                            style="border-radius:0 !important; " name="service" id="companyservice">
                                            <option value="">{{ trans('companyTrans.choose') }}</option>
                                            @foreach ($services as $service)
                                                @if (App::islocale('ar'))
                                                    <option value="{{ $service->uuid }}">{{ $service->arname }}
                                                    </option>
                                                @else
                                                    <option value="{{ $service->uuid }}">{{ $service->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <label style="color: red">
                                        @error('companyservice')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                    <!-- /.input group -->
                                </div>
                            </div>



                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="arname">{{ trans('companyTrans.arname') }}</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="">Ar</i>
                                        </div>
                                        <input type="text" id="arname" name="arname[]" value="{{ old('arname') }}"
                                            class="form-control pull-right arname">
                                    </div>
                                    <label for="arname" style="color: red">
                                        @error('arname')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                    <!-- /.input group -->
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="name">{{ trans('companyTrans.name') }}</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="">En</i>
                                        </div>
                                        <input type="text" name="name[]" id="name" value="{{ old('name') }}"
                                            class="form-control pull-right name">
                                    </div>
                                    <label for="address" style="color: red" class="name">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                    <!-- /.input group -->
                                </div>
                            </div>


                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="name"><span></span></label>

                                    <div class="input-group date">
                                        {{-- <div class="input-group-addon">
                                            <i class="">En</i>
                                        </div> --}}
                                        <span role="button" name="addCondition" id="addCondition"
                                            class="btn btn-success"><i class="fa fa-plus"></i></span>
                                    </div>
                                    <label for="address" style="color: red" class="name">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                    <!-- /.input group -->
                                </div>
                            </div>









                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button class="btn btn-success pull-right">Save</button>
                    </div>
                </div>
                <!-- /.box -->



            </div>
        </div>
    </form>
@endsection



@section('scriptes')
    <script>
        $(".select2").select2();

        $("#addCondition").click(function() {
            $(".form-row").append(
                '<div class="newRow"><div class="col-md-5">' +
                ' <div class="form-group"> <label for="arname">{{ trans('companyTrans.arname') }}</label>' +
                '  <div class="input-group date">  <div class="input-group-addon"> <i class="">Ar</i> </div>' +
                '<input type="text" id="arname" name="arname[]" value="" class="form-control pull-right arname"> </div> ' +
                ' <label for="arname" style="color: red">  </label></div></div>' +

                '<div class="col-md-5">' +
                ' <div class="form-group"> <label for="arname">{{ trans('companyTrans.name') }}</label>' +
                '  <div class="input-group date">  <div class="input-group-addon"> <i class="">En</i> </div>' +
                '<input type="text" id="arname" name="name[]" value="" class="form-control pull-right name"> </div> ' +
                ' <label for="arname" style="color: red">  </label></div></div>' +
                '  <div class="col-md-2"> <div class="form-group"> <label for="name"><span></span></label><div class="input-group date">' +
                '<span role="button" class="btn btn-danger deleterow"><i class="fa fa-minus"></i></span> </div> </div> </div></div>'
            );


            $(".deleterow").click(function() {
                $(this).parent().parent().parent().parent().remove();
            });
        });


        var x = new Audio("{{ url('audio/error.mp3') }}");
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', x.play())
                // toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        $("#termsForm").on("submit", function(event) {

            if($("#companyservice").val()==""){
                event.preventDefault();
                    Toast.fire({
                        icon: 'error',
                        title: "error",
                        // background: "white",
                    });
                    $(this).addClass("is-invalid");
                    return
            }
            var values = $("input[name='name[]']").map(function() {
                return $(this).val();
            }).get();

            var arvalues = $("input[name='arname[]']").map(function() {
                return $(this).val();
            }).get();

            $.each(values, (index, value) => {
                if (value == "") {
                    event.preventDefault();
                    Toast.fire({
                        icon: 'error',
                        title: "error",
                        background: "white",
                    });
                    $("input").css('border-color', 'red !important');
                    return;
                }

            });

            $.each(arvalues, (index, value) => {
                if (value == "") {
                    event.preventDefault();
                    Toast.fire({
                        icon: 'error',
                        title: "error",
                        background: "white",
                    });
                    $("input").css('border-color', 'red !important');
                    return;
                }

            });
        });
        
    </script>
@endsection
