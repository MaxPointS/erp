@extends('cpanel.layout.master')

@section('css')
    <style>
        .select2-selection {
            border-radius: 0 !important;
        }
    </style>
@endsection



@section('content')
    <form action="{{ route('companies.update',$company->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="row ">
            <div class="col-md-12 ">
                <div class="box" style="border: 0 !important;box-shadow: 0 1px 9px 3px rgba(0,0,0,0.1);">
                    <div class="box-header">
                        <h3 class="box-title">{{ trans('companyTrans.CreateTitle') }} </h3>
                    </div>
                    <div class="box-body ">

                        <div class="form-row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="arname">{{ trans('companyTrans.arname') }}</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="">Ar</i>
                                        </div>
                                        <input type="text" id="arname" name="arname" value="{{ $company->arname }}"
                                            class="form-control pull-right datepicker">
                                    </div>
                                    <label for="arname" style="color: red">
                                        @error('arname')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                    <!-- /.input group -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">{{ trans('companyTrans.name') }}</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="">En</i>
                                        </div>
                                        <input type="text" name="name" id="name" value="{{ $company->name }}"
                                            class="form-control pull-right datepicker">
                                    </div>
                                    <label for="address" style="color: red" class="name">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                    <!-- /.input group -->
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">{{ trans('companyTrans.address') }}</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-home"></i>
                                        </div>
                                        <input type="text" name="address" id="address" value="{{ $company->address }}"
                                            class="form-control pull-right ">
                                    </div>
                                    <label for="address" style="color: red">
                                        @error('address')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                    <!-- /.input group -->
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="araddress">{{ trans('companyTrans.araddress') }}</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-home"></i>
                                        </div>
                                        <input type="text" name="araddress" id="araddress"
                                            value="{{ $company->araddress }}" class="form-control pull-right ">
                                    </div>
                                    <label for="araddress" style="color: red">
                                        @error('araddress')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                    <!-- /.input group -->
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="companyServiceType">{{ trans('companyTrans.servicetype') }}</label>

                                    <div class="input-group text">
                                        <div class="input-group-addon">
                                            <i class="fa fa-building-o"></i>
                                        </div>
                                        {{-- <input type="text" id="datePolicy" class="form-control pull-right datepicker"> --}}
                                        <select class="form-control select2 " style="width: 100%"
                                            style="border-radius:0 !important; " name="companyServiceType"
                                            id="companyServiceType">
                                            <option value="">{{ trans('companyTrans.choose') }}</option>
                                            @foreach ($companyservicetype as $serviceType)
                                                @if (App::islocale('ar'))
                                                    <option @if  ($company->companyservicetype_id == $serviceType->id  )  selected @endif value="{{ $serviceType->id }}">{{ $serviceType->arname }}
                                                    </option>
                                                @else
                                                    <option @if  ($company->companyservicetype_id == $serviceType->id  )  selected @endif value="{{ $serviceType->id }}">{{ $serviceType->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <label style="color: red">
                                        @error('companyServiceType')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                    <!-- /.input group -->
                                </div>
                            </div>


                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="location">{{ trans('companyTrans.location') }}</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-link"></i>
                                        </div>
                                        <input type="text" name="location" id="location" value="{{ $company->location }}"
                                            class="form-control pull-right ">
                                    </div>
                                    <!-- /.input group -->
                                    <label style="color: red" for="location">
                                        @error('location')
                                            {{ $message }}
                                        @enderror

                                    </label>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ trans('companyTrans.status') }}</label>
                                    <div class="form-group  is-invalid">

                                        <div class="is-invalid">
                                            <label>
                                                <input @if($company->active) checked  @endif name="status" type="checkbox"
                                                    class="form-control is-invalid" data-toggle="toggle" data-style="slow">
                                            </label>
                                        </div>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tel">{{ trans('companyTrans.tel') }}</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input type="number" min="0" minlength="8" maxlength="8"
                                            value="{{ $company->tel }}" placeholder="+96500000000" max="+99999999999"
                                            name="tel" id="tel" class="form-control  ">
                                        {{-- <input type="text" class="form-control pull-right "> --}}
                                    </div>
                                    <!-- /.input group -->
                                    <label style="color: red">
                                        @error('tel')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">{{ trans('companyTrans.image') }}</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-image"></i>
                                        </div>
                                        <input type="file" name="image" accept="image/*" id="image"
                                            class="form-control pull-right ">
                                           
                                    </div>
                                    <!-- /.input group -->
                                    <label style="color: red">
                                        @error('image')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                </div>
                            </div>






                        </div>


                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="btn-group">
                            <button class="btn btn-success pull-right" role="submit">
                                {{ trans('companyTrans.save') }}
                            </button>
                            <a href="{{route("companies.index")}}" class="btn btn-danger">
                                {{ trans('companyTrans.cancel') }}
                            </a>
                        </div>
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
        $("#tel").keydown(function(e) {

        });
    </script>
@endsection
