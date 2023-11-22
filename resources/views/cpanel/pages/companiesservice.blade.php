@extends('cpanel.layout.master')

@section('content-header')
    {{-- <li class="active">{{$pageName}}</li> --}}
@endsection
@section('Css')
@endsection
@section('content')
    <br />

    <div class="row ">

        @foreach ($companies as $company)
            <div class="col-md-6">
                <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-blue">
                        <div class="widget-user-image">
                            <img class="img-circle" src="{{ asset('images') . '/' . $company->image }}" alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username">
                            @if (App::islocale('ar'))
                                {{ $company->arname }}
                            @else
                                {{ $company->name }}
                            @endif

                        </h3>
                        <h5 class="widget-user-desc">
                            @if (App::islocale('ar'))
                                {{ $company->companyservicetype->arname }}
                            @else
                                {{ $company->companyservicetype->name }}
                            @endif
                            
                        </h5>
                        <br>
                        <div class="pull-end btn-group">
                            <a href="{{route('companies.edit',$company->id)}}" class="btn btn-sm btn-success "> <i class="fa fa-edit"></i></a>
                            <button class="btn btn-sm btn-warning ">  <i class="fa fa-book"></i> </button>
                            <button class="btn btn-sm btn-danger "> <i class="fa fa-close"></i></button>
                        </div>
                    </div>
                    
                    <div class="box-footer no-padding pull-end">
                        <ul class="nav nav-stacked">
                            <li><a href="#">
                                    {{ trans('addServiceTrans.servicescount') }}
                                    <span
                                        class=" @if (App::islocale('ar')) pull-left  @else pull-right @endif  badge bg-blue">
                                        {{ $company->services->count() }}
                                    </span></a>
                            </li>
                            <li><a href="#">Tasks <span
                                        class="@if (App::islocale('ar')) pull-left  @else pull-right @endif  badge bg-aqua">5</span></a>
                            </li>
                            <li><a href="#">Completed Projects <span
                                        class="@if (App::islocale('ar')) pull-left  @else pull-right @endif   badge bg-green">12</span></a>
                            </li>

                            

                        </ul>
                    </div>

                </div>

            </div>
        @endforeach


    </div>
    <div class="row ">
        <div class="col-md-12 ">
            <div class="box" style="border: 0 !important;box-shadow: 0 1px 9px 3px rgba(0,0,0,0.1);">
                <div class="box-header">
                    <h3 class="box-title">Filtering </h3>
                </div>
                <div class="box-body ">
                    <div class="form-row">
                        <div class="table-responsitve">
                            <table id="services" class="table table-stripped table-fit ">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th style="width: 100px"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($services as $service)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('images') . '/' . $service->Image }}"
                                                    style="width: 70px;height: 70px;" alt="">
                                            </td>
                                            <td>
                                                @if (App::islocale('ar'))
                                                    {{ Str::limit($service->arname), 20, '...' }}
                                                @else
                                                    {{ Str::limit($service->name, 20, '...') }}
                                                @endif
                                            </td>
                                            <td>
                                                @if (App::islocale('ar'))
                                                    {{-- {{ $service->ardescription }} --}}
                                                    {{ Str::limit($service->ardescription, 35, '...') }}
                                                @else
                                                    {{ Str::limit($service->description, 35, '...') }}
                                                @endif
                                            </td>

                                            <td>
                                                @foreach ($service->terms as $term)
                                                    @if (App::islocale('ar'))
                                                        {{ $term->arname }}<br>
                                                    @else
                                                        {{ $term->name }} <br>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                {{ $service->priceBefore }}
                                            </td>
                                            <td>
                                                {{ $service->price }}
                                            </td>
                                            <td>
                                                @if ($service->status)
                                                    <span class="label label-success">
                                                        {{ trans('addServiceTrans.active') }}
                                                    </span>
                                                @else
                                                    <span class="label label-danger">
                                                        {{ trans('addServiceTrans.notactive') }}

                                                    </span>
                                                @endif
                                            </td>
                                            <td>

                                                <a href="{{ route('EditService', $service->id) }}" type="button"
                                                    id="EditBtn" {{-- data-toggle="modal" data-target="#EditArea" --}} class="btn btn-success"><i
                                                        class="fa fa-edit"></i></a>

                                                <a type="button" data-toggle="modal" data-target="#DeleteArea"
                                                    class="btn btn-danger"><i class="fa fa-close"></i></a>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->



        </div>
    </div>
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
