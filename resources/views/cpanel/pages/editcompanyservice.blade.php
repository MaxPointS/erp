@extends('cpanel.layout.master')


@section('css')
    <style>
        .select2-selection {
            border-radius: 0 !important;
        }
    </style>
@endsection



@section('content')
    <form action="{{ route('updateService') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="uuid" value="{{$service->uuid}}">
        <div class="row ">
            <div class="col-md-12 ">
                <div class="box" style="border: 0 !important;box-shadow: 0 1px 9px 3px rgba(0,0,0,0.1);">
                    <div class="box-header">
                        <h3 class="box-title">
                            {{ trans('addServiceTrans.title') }}
                        </h3>
                    </div>
                    <div class="box-body ">

                        <div class="form-row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="datePolicy">
                                        {{ trans('addServiceTrans.clientcompany') }}
                                    </label>

                                    <div class="input-group text">
                                        <div class="input-group-addon">
                                            <i class="fa fa-building-o"></i>
                                        </div>
                                        {{-- <input type="text" id="datePolicy" class="form-control pull-right datepicker"> --}}
                                        <select class="form-control select2 " style="border-radius:0 !important; " 
                                            name="company" id="company">
                                            <option value="">
                                                {{ trans('addServiceTrans.choose') }}
                                            </option>
                                            @foreach ($companies as $company)
                                                @if (App::islocale('ar'))
                                                {{--  --}}
                                                    <option @if ($service->company_id == $company->uuid ) selected @endif   value="{{ $company->uuid }}">{{ $company->arname }}</option>
                                                @else
                                                    <option @if ($service->company_id == $company->uuid ) selected @endif value="{{ $company->uuid }}">{{ $company->name }}</option>
                                                @endif
                                            @endforeach

                                        </select>
                                    </div>
                                    <label style="color: red">
                                        @error('company')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                    <!-- /.input group -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        {{ trans('addServiceTrans.arname') }}

                                    </label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="">Ar</i>
                                        </div>
                                        <input type="text" name="arname" id="arname" value="{{$service->arname}}"
                                            class="form-control pull-right datepicker">
                                    </div>
                                    <!-- /.input group -->
                                    <label style="color: red">
                                        @error('arname')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        {{ trans('addServiceTrans.name') }}

                                    </label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="">En</i>
                                        </div>
                                        <input type="text" name="name" id="name" value="{{$service->name}}"
                                            class="form-control pull-right ">
                                    </div>
                                    <!-- /.input group -->
                                    <label style="color: red">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        {{ trans('addServiceTrans.ardescription') }}
                                    </label>

                                    <div class="input-group date">
                                        {{-- <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div> --}}
                                        <textarea class="form-control" name="ardescription" id ="ardescription" style="resize: none" cols="100"
                                            rows="5" autocomplete="off">{{$service->ardescription}}</textarea>
                                    </div>
                                    <label for="" style="color: red">
                                        @error('ardescription')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                    <!-- /.input group -->
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        {{ trans('addServiceTrans.description') }}

                                    </label>

                                    <div class="input-group date">
                                        {{-- <div class="input-group-addon">
                                            <i class="fa fa-link"></i>
                                        </div> --}}
                                        <textarea class="form-control"  style="resize: none"  name="description" id ="description" cols="100" rows="5"
                                            autocomplete="off">{{$service->description}}</textarea>
                                    </div>
                                    <label for="" style="color: red">
                                        @error('description')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                    <!-- /.input group -->
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>
                                        {{ trans('addServiceTrans.price') }}
                                    </label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-dollar"></i>
                                        </div>
                                        <input type="number" min="0.000" name="priceBefore" id="priceBefore" value="{{$service->priceBefore}}"
                                            minlength="0.000" step="0.001" placeholder="0.000" class="form-control pull-right ">
                                    </div>
                                    <label for="" style="color: red">
                                        @error('priceBefore')
                                            {{ $message }}
                                        @enderror 
                                    </label>

                                    <!-- /.input group -->
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>
                                        {{ trans('addServiceTrans.sellprice') }}

                                    </label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-dollar"></i>
                                        </div>
                                        <input type="number"min="0.000" name="price" id="price" step="0.001" value="{{$service->price}}" minlength="1.000"
                                            placeholder="0.000" class="form-control pull-right ">
                                    </div>
                                    <label for="" style="color: red">
                                        @error('price')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                    <!-- /.input group -->
                                </div>
                            </div>



                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>
                                        {{ trans('addServiceTrans.status') }}
                                    </label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-picture-o"></i>
                                        </div>
                                        <input type="file" class="form-control pull-right "  name="image" value="{{old('image')}}"
                                            id="image" accept=".jpg, .png, .jpeg">
                                    </div>
                                    <!-- /.input group -->
                                    <label for="" style="color: red">
                                        @error('image')
                                            {{ $message }}
                                        @enderror
                                    </label>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>
                                        {{ trans('addServiceTrans.status') }}
                                    </label>
                                    <div class="form-group">

                                        <div class="">
                                            <label>
                                                <input @if($service->status) checked  @endif name="status"  type="checkbox" data-toggle="toggle"
                                                    data-style="slow">
                                            </label>
                                        </div>
                                    </div>
                                    <!-- /.input group -->
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
                            <a href="{{route("showCompaniesList")}}" class="btn btn-danger">
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
    </script>
@endsection
