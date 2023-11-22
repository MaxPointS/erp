@extends('cpanel.layout.master')

@section('content-header')
    {{-- <li class="active">{{ $pageName }}</li> --}}
@endsection


@section('css')
    @if (App::islocale('ar'))
        <style>
            #ableAreas_filter,
            .dataTables_filter,
            .dataTables_paginate {
                float: left;
                text-align: end;
            }
        </style>
    @endif

    <style>
        .form-control {
            border-radius: 0 !important;
        }

        .modal-dialog-centered {
            width: 85%;
        }

        .select2-selection {
            border-radius: 0 !important;
            height: 35px !important;
        }

        .select2-selection__arrow {
            top: 5px !important;
        }

        .select2-inputState-container {
            margin: auto !important;
        }

        .select2-search--dropdown {
            border-radius: 0 !important;
        }
    </style>
@endsection

@section('content')
    @php
        $d = date('Y') + 1;
        $yearcollection = [];
        for ($index = $d; $index >= $d - 50; $index--) {
            array_push($yearcollection, $index);
        }
    @endphp
    <br />


    <div class="row ">
        <div class="col-md-12 ">
            <div class="box" style="border: 0 !important;box-shadow: 0 1px 9px 3px rgba(0,0,0,0.1);">
                <div class="box-header">
                    <h3 class="box-title">{{ trans('policyTrans.CreatepolicyorateTitle') }} </h3>
                </div>
                <div class="box-body ">
                    <div class="form-row">

                        <div class="col-md-6">

                            <button data-toggle="modal" data-target="#createthirdpartypolicy"
                                class="btn btn-success">{{ trans('policyTrans.Createpolicyorate') }} </button>
                        </div>



                    </div>

                </div>
                <!-- /.box -->



            </div>
        </div>
    </div>




    <div class="row ">
        <div class="col-md-12 ">
            <div class="box" style="border: 0 !important;box-shadow: 0 1px 9px 3px rgba(0,0,0,0.1);">
                <div class="box-header">
                    <h3 class="box-title">{{ trans('policyTrans.policyorateList') }} </h3>
                </div>
                <div class="box-body ">
                    <div class="form-row">
                        <div class="table-responsitve">
                            <table id="TableAreas" class="table table-dark table-bordered  table-striped ">
                                <thead>
                                    <tr>
                                        {{-- <th>#</th> --}}
                                        <th>{{ trans('policyTrans.policyorateName') }}</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($policies as $policy)
                                        <tr>
                                            <td>
                                                @if (App::islocale('ar'))
                                                    {{ $policy->arname }}
                                                @else
                                                    {{ $policy->name }}
                                                @endif

                                            </td>
                                            <td style=" text-align: end" class="text-end">
                                                {{-- <div class="btn-group" role="group" aria-label="Basic example"> --}}
                                                <button onclick="setModalAttr(this)" type="button" id="EditBtn"
                                                    AreaAr="{{ $policy->arname }}"AreaName="{{ $policy->name }}"
                                                    policyUUID="{{ $policy->uuid }}" data-toggle="modal"
                                                    data-target="#EditArea" class="btn btn-success"><i
                                                        class="fa fa-edit"></i></button>

                                                <button type="button" data-toggle="modal" data-target="#DeleteArea"
                                                    class="btn btn-danger"><i class="fa fa-close"></i></button>
                                                {{-- </div> --}}
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

    <div class="modal fade" id="DeleteArea" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <form action="">

                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title" id="exampleModalLongTitle">{{ trans('policyTrans.DeletepolicyorateTitle') }}
                        </h5>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            @csrf
                            {{ trans('policyTrans.DeletepolicyorateMessage') }}
                        </div>
                    </div>
                    <div style="text-align: end !important" class="modal-footer ">
                        <button type="submit" class="btn btn-success" role="submit"><i class="fa fa-check"></i></button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                class="fa fa-close"></i></button>
                    </div>
                </div>


            </form>

        </div>
    </div>

    <form action="" method="">
        <div class="modal fade" style="width: 100% !important" id="editthirdpartypolicy" data-backdrop="static"
            tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ">

                        <div class="row">
                            <div class="col-md-10 col-lg-10 ">

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="input"></label>
                                        <input type="text" class="form-control" id="input">
                                        <label for="input"></label>
                                    </div>

                                    <div class="form-group col-md-4 " style="position: relative">
                                        <label for="inputState">State</label>
                                        <select id="inputState" class="form-control select2 " style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                        <label for="input"></label>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="inputState">State</label>
                                        <select id="inputState" class="form-control select2 " style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                        <label for="input"></label>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="input"></label>
                                        <input type="text" class="form-control " id="input">
                                        <label for="input"></label>

                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="inputZip">Zip</label>
                                        <input type="text" class="form-control" id="inputZip">
                                        <label for="input"></label>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="inputState">State</label>
                                        <select id="inputState" class="form-control select2 " style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                        <label for="input"></label>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="inputZip">Zip</label>
                                        <input type="text" class="form-control" id="inputZip">
                                        <label for="input"></label>

                                    </div>


                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 bg-success">
                                        <span>shdgjhasdgjhsagdb</span>
                                    </div>
                                </div>


                                <div class="form-row">

                                    <div class="form-group col-md-3">
                                        <label for="input"></label>
                                        <input type="text" class="form-control " id="plateno">
                                        <label for="input"></label>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="inputState">State</label>
                                        <select id="factory" class="form-control select2 " style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                        <label for="input"></label>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="factoryclass">State</label>
                                        <select id="inputState" class="form-control select2 " style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                        <label for="input"></label>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="licensetype">State</label>
                                        <select id="inputState" class="form-control select2 " style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                        <label for="input"></label>
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-3">
                                        <label for="year"></label>
                                        <input type="text" class="form-control " id="plateno">
                                        <label for="input"></label>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="inputState">State</label>
                                        <select id="shape" class="form-control select2 " style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                        <label for="input"></label>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="color">State</label>
                                        <select id="inputState" class="form-control select2 " style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                        <label for="input"></label>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="fule">State</label>
                                        <select id="inputState" class="form-control select2 " style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                        <label for="input"></label>
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-2">
                                        <label for="base"></label>
                                        <input type="text" class="form-control " id="plateno">
                                        <label for="input"></label>

                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="inputState">State</label>
                                        <select id="condition" class="form-control select2 " style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                        <label for="input"></label>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="enginno"></label>
                                        <input type="text" class="form-control " id="plateno">
                                        <label for="input"></label>

                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="emptyweight"></label>
                                        <input type="text" class="form-control " id="plateno">
                                        <label for="input"></label>

                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="loadedweight"></label>
                                        <input type="text" class="form-control " id="plateno">
                                        <label for="input"></label>

                                    </div>


                                </div>


                                <div class="form-row">
                                    <div class="col-md-12 bg-success">
                                        <span>بيانات المؤمن</span>
                                    </div>
                                </div>


                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="name"></label>
                                        <input type="text" class="form-control " id="plateno">
                                        <label for="input"></label>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="sid"></label>
                                        <input type="text" class="form-control " id="plateno">
                                        <label for="input"></label>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="inputState">State</label>
                                        <select id="nationality" class="form-control select2 " style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                        <label for="input"></label>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="profission"></label>
                                        <input type="text" class="form-control " id="plateno">
                                        <label for="input"></label>

                                    </div>

                                </div>

                                <div class="form-row">



                                    <div class="form-group col-md-3">
                                        <label for="inputState">State</label>
                                        <select id="governs" class="form-control select2 " style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                        <label for="input"></label>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="areas">State</label>
                                        <select id="nationality" class="form-control select2 " style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                            <label for="input"></label>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="block"></label>
                                        <input type="text" class="form-control " id="plateno">
                                        <label for="input"></label>

                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="street"></label>
                                        <input type="text" class="form-control " id="plateno">
                                        <label for="input"></label>

                                    </div>


                                    <div class="form-group col-md-2">
                                        <label for="jadda"></label>
                                        <input type="text" class="form-control " id="plateno">
                                        <label for="input"></label>
                                    </div>


                                </div>


                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="house"></label>
                                        <input type="text" class="form-control " id="plateno">
                                        <label for="input"></label>

                                    </div>


                                    <div class="form-group col-md-4">
                                        <label for="floor"></label>
                                        <input type="text" class="form-control " id="plateno">
                                        <label for="input"></label>
                                    </div>


                                    <div class="form-group col-md-4">
                                        <label for="appartment"></label>
                                        <input type="text" class="form-control " id="plateno">
                                        <label for="input"></label>
                                    </div>



                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-3">
                                        <label for="legal"></label>
                                        <input type="text" class="form-control " id="plateno">
                                        <label for="input"></label>

                                    </div>


                                    <div class="form-group col-md-3">
                                        <label for="legalsid"></label>
                                        <input type="text" class="form-control " id="plateno">
                                        <label for="input"></label>
                                    </div>


                                    <div class="form-group col-md-3">
                                        <label for="inputState">State</label>
                                        <select id="legalnationality" class="form-control select2 " style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                        <label for="input"></label>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="legalprofission"></label>
                                        <input type="text" class="form-control " id="plateno">
                                        <label for="input"></label>
                                    </div>

                                </div>


                            </div>{{-- right col8 --}}
                            <div class="col-md-2 col-lg-2">

                                <div class="row">
                                    <div class="col-12">
                                        sdjhajldhasjhdjsh
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table">
                                        <tr>
                                            <td class="text-center">sjkbakdbasjkd</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">sjkbakdbasjkd</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">sjkbakdbasjkd</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">sjkbakdbasjkd</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-center">
                                                <hr>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="text-center">sjkbakdbasjkd</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>



                    </div>{{-- body --}}

                    <div class="modal-footer  flex-bottom">
                        @csrf
                        <button type="button" class="btn btn-danger  pull-left" data-dismiss="modal"><i
                                class="fa fa-close"></i></button>
                        <button class="btn btn-primary  pull-left" role="submit"><i class="fa fa-check"></i></button>

                    </div>
                </div>
            </div>
        </div>
    </form>{{-- form create --}}

    <div class="modal fade" id="AddNewArea" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <form action="">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="datePolicy">Policy Date:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="">Ar</i>
                                        </div>
                                        <input type="text" id="AddAreaArName" class="form-control pull-right ">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="datePolicy">Policy Date:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="">Ar</i>
                                        </div>
                                        <input type="text" id="AddAreaName" class="form-control pull-right ">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>



                        </div>
                    </div>
                    <div style="text-align: end !important" class="modal-footer ">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                class="fa fa-close"></i></button>
                        <button type="submit" class="btn btn-success" role="submit"><i
                                class="fa fa-check"></i></button>
                    </div>
                </div>


            </form>

        </div>
    </div>





    <form action="{{ route('thirdparty.store') }}" method="post">
        <div class="modal fade" style="width: 100% !important" id="createthirdpartypolicy" data-backdrop="static"
            tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            {{ trans('thirdparty.thirdparty') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ">

                        <div class="row">
                            <div class="col-md-10 col-lg-10 ">

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="policyno">{{ trans('thirdparty.policyno') }}</label>
                                        <input type="text" class="form-control" id="policyno">
                                        @error('policyno')
                                            <label for="input">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4 " style="position: relative">
                                        <label for="policytype">{{ trans('thirdparty.policytype') }}</label>
                                        <select id="policytype" class="form-control select2 " style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                        @error('policytype')
                                            <label for="policytype">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="company">{{ trans('thirdparty.company') }}</label>
                                        <select id="company" name="company" class="form-control select2 "
                                            style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                        @error('company')
                                            <label for="company">{{ $message }}</label>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="startdate">{{ trans('thirdparty.startdate') }}</label>
                                        <input type="text" class="form-control datepicker" id="startdate"
                                            onchange="setLastDate()">
                                        @error('startdate')
                                            <label for="startdate">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="priod">{{ trans('thirdparty.priod') }}</label>
                                        <input type="number" min="1"value="1" maxlength="2" minlength="1"
                                            max="29" class="form-control" id="priod" onchange="setLastDate()">
                                        <label for="priod"></label>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="priodlenth">{{ trans('thirdparty.priodlenth') }}</label>
                                        <select id="priodlenth" class="form-control select2 " style="width: 100%"
                                            onchange="setLastDate()">
                                            <option value="day">{{ trans('thirdparty.day') }}</option>
                                            <option value="month">{{ trans('thirdparty.month') }}</option>
                                            <option value="year">{{ trans('thirdparty.year') }}</option>
                                        </select>
                                        <label for="priodlenth"></label>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="enddate">{{ trans('thirdparty.enddate') }}</label>
                                        <input type="text" disabled class="form-control" id="enddate">
                                        <label for="enddate"></label>

                                    </div>


                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 bg-success">
                                        <span>
                                            {{ trans('thirdparty.cardetails') }}
                                        </span>
                                    </div>
                                </div>


                                <div class="form-row">

                                    <div class="form-group col-md-3">
                                        <label for="plateno">{{ trans('thirdparty.plateno') }}</label>
                                        <input type="text" class="form-control " name="plateno"
                                            id="plateno">
                                        @error('plateno')
                                            <label for="plateno"></label>
                                        @enderror

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="factory">{{ trans('thirdparty.factory') }}</label>
                                        <select id="factory" name="factory" class="form-control select2 "
                                            style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                        @error('factory')
                                            <label for="factory"></label>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="factoryclass">{{ trans('thirdparty.factoryclass') }}</label>
                                        <select id="factoryclass" name="factoryclass" class="form-control select2 "
                                            style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                        @error('factoryclass')
                                            <label for="factoryclass"></label>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="licensetype">{{ trans('thirdparty.licensetype') }}</label>
                                        <select id="licensetype" name="licensetype" class="form-control select2 "
                                            style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                        @error('licensetype')
                                            <label for="licensetype"></label>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-3">
                                        <label for="yearmade">{{ trans('thirdparty.yearmade') }}</label>
                                        {{-- <input type="text" name="yearmade" class="form-control " id="yearmade"> --}}
                                        <select name="yearmade" id="yearmade" class="form-control select2 ">
                                            @foreach ($yearcollection as $item)
                                                <option @if(old('yearmade')==$item)selected @endif value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                        @error('yearmade')
                                        <label for="yearmade"></label>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="shape">{{ trans('thirdparty.shape') }}</label>
                                        <select id="shape" name="shape" class="form-control select2 "  style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option @if(old('shape')==1)selected @endif  >...</option>
                                            <option>...</option>
                                        </select>
                                        @error('shape')
                                        <label for="yearmade"></label>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="color">{{ trans('thirdparty.color') }}</label>
                                        <select id="color" name="color" class="form-control select2 " style="width: 100%">
                                            <option @if(old('shape')==1)selected @endif >Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                        @error('color')
                                        <label for="color"></label>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="fule">{{ trans('thirdparty.fuel') }}</label>
                                        <select id="fule" name="fule" class="form-control select2 " style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                        @error('fule')
                                        <label for="fule"></label>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-2">
                                        <label for="base">{{ trans('thirdparty.base') }}</label>
                                        <input type="text" name="base"value="" class="form-control "
                                            id="base">
                                            @error('base')
                                            <label for="base"></label>
                                            @enderror
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="condition">{{ trans('thirdparty.condition') }}</label>
                                        <select id="condition" name="condition" class="form-control select2 " style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                        @error('condition')
                                            <label for="condition"></label>
                                            @enderror
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="enginno">{{ trans('thirdparty.enginno') }}</label>
                                        <input type="text" class="form-control " name="enginno" id="enginno">
                                        @error('condition')
                                            <label for="enginno"></label>
                                            @enderror

                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="emptyweight">{{ trans('thirdparty.emptyweight') }}</label>
                                        <input type="text" class="form-control " name="emptyweight" id="emptyweight">
                                        <label for="emptyweight"></label>

                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="loadedweight">{{ trans('thirdparty.emptyweight') }}</label>
                                        <input type="text" class="form-control " id="plateno">
                                        <label for="input"></label>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="passengersno">{{ trans('thirdparty.passengersno') }}</label>
                                        <input type="text" name="passengersno" class="form-control " id="passengersno">
                                        <label for="input"></label>

                                    </div>

                                </div>


                                <div class="form-row">
                                    <div class="col-md-12 bg-success">
                                        <span>{{ trans('thirdparty.insuredcustomer') }}</span>
                                    </div>
                                </div>


                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="name">{{ trans('thirdparty.name') }}</label>
                                        <input type="text" class="form-control " name="name" id="name">
                                        <label for="name"></label>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="sid">{{ trans('thirdparty.sid') }}</label>
                                        <input type="text" class="form-control " name="sid" id="sid">
                                        <label for="sid"></label>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="nationality">{{ trans('thirdparty.nationality') }}</label>
                                        <select id="nationality" class="form-control select2 " style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                        <label for="nationalitys"></label>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="profission">{{ trans('thirdparty.profission') }}</label>
                                        <input type="text" class="form-control " name="profission" id="profission">
                                        <label for="input"></label>

                                    </div>

                                </div>

                                <div class="form-row">



                                    <div class="form-group col-md-3">
                                        <label for="govern">{{ trans('thirdparty.govern') }}</label>
                                        <select class="form-control select2 " name="govern" id="govern" style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                        <label for="input"></label>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="area">{{ trans('thirdparty.area') }}</label>
                                        <select id="area" class="form-control select2 " name="area" style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                            <label for="input"></label>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="block">{{ trans('thirdparty.block') }}</label>
                                        <input type="text" class="form-control " name="block" id="block">
                                        <label for="block"></label>

                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="street">{{ trans('thirdparty.street') }}</label>
                                        <input type="text" class="form-control " name="street" id="street">
                                        <label for="input"></label>

                                    </div>


                                    <div class="form-group col-md-2">
                                        <label for="jadda">{{ trans('thirdparty.jadda') }}</label>
                                        <input type="text" class="form-control " name="jadda" id="jadda">
                                        <label for="input"></label>
                                    </div>


                                </div>


                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="house">{{ trans('thirdparty.house') }}</label>
                                        <input type="text" class="form-control " name="house" id="house">
                                        <label for="house"></label>

                                    </div>


                                    <div class="form-group col-md-4">
                                        <label for="floor">{{ trans('thirdparty.floor') }}</label>
                                        <input type="text" class="form-control " name="floor" id="floor">
                                        <label for="input"></label>
                                    </div>


                                    <div class="form-group col-md-4">
                                        <label for="appartment">{{ trans('thirdparty.appartment') }}</label>
                                        <input type="text" class="form-control "  name="appertment" id="appartment">
                                        <label for="input"></label>
                                    </div>



                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="name">{{ trans('thirdparty.name') }}</label>
                                        <input type="text" class="form-control " name="name" id="name">
                                        <label for="name"></label>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="sid">{{ trans('thirdparty.sid') }}</label>
                                        <input type="text" class="form-control " name="sid" id="sid">
                                        <label for="sid"></label>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="nationality">{{ trans('thirdparty.nationality') }}</label>
                                        <select id="nationality" class="form-control select2 " style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                        <label for="nationalitys"></label>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="profission">{{ trans('thirdparty.profission') }}</label>
                                        <input type="text" class="form-control " name="profission" id="profission">
                                        <label for="input"></label>

                                    </div>

                                </div>


                                <div class="form-row">
                                    <div class="col-md-12 bg-success">
                                        <span>{{ trans('thirdparty.sellerdetials') }}</span>
                                    </div>
                                </div>


                               
                                <div class="form-row">

                                    <div class="form-group col-md-3">
                                        <label for="seller">{{ trans('thirdparty.seller') }}</label>
                                        <input type="text" class="form-control " name="seller" id="seller">
                                        <label for="input"></label>

                                    </div>


                                    <div class="form-group col-md-3">
                                        <label for="sellersid">{{ trans('thirdparty.sellersid') }}</label>
                                        <input type="text" class="form-control " name="sellersid" id="legalsid">
                                        <label for="input"></label>
                                    </div>


                                    <div class="form-group col-md-3">
                                        <label for="sellernationality">{{ trans('thirdparty.nationality') }}</label>
                                        <select id="sellernationality" class="form-control select2 " name="sellernationality" style="width: 100%">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                        <label for="input"></label>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="sellerprofission">{{ trans('thirdparty.profission') }}</label>
                                        <input type="text" class="form-control " name="sellerprofission" id="sellerprofission">
                                        <label for="input"></label>
                                    </div>

                                </div>




                            </div>{{-- right col8 --}}
                            <div class="col-md-2 col-lg-2">

                                <div class="row">
                                    <div class="col-12">
                                        {{ trans('thirdparty.primumdetails') }}
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table">
                                        <tr>
                                            <td class="text-center"> {{ trans('thirdparty.primum') }}</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">{{ trans('thirdparty.suppervisonfees') }}</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"> {{ trans('thirdparty.transfees') }}</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"> {{ trans('thirdparty.indors') }}</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-center">
                                                <hr>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="text-center">{{ trans('thirdparty.total') }}</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>



                    </div>{{-- body --}}

                    <div class="modal-footer  flex-bottom">
                        @csrf
                        <button type="button" class="btn btn-danger  pull-left" data-dismiss="modal"><i
                                class="fa fa-close"></i></button>
                        <button class="btn btn-primary  pull-left" role="submit"><i class="fa fa-check"></i></button>

                    </div>
                </div>
            </div>
        </div>
    </form>{{-- form create --}}
@endsection



@section('scriptes')
    <script src=" {{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script>
        //Date picker

        $(document).ready(function() {

            $("#startdate").val(new Date().toLocaleDateString())

            $("#TableAreas").dataTable({});

            // let today= todaydate.getDate()+"-"+todaydate.getMonth()+"-"+getYear();

            // $(".select2").select2({
            //     dropdownParent: $('#createthirdpartypolicy')
            // });

            $(".datepicker").keypress(function(event, key) {
                event.preventDefault();
            });
            $(".datepicker").datepicker({
                startDate: 'd',
                dateFormat: "yyyy-mm-dd"
            });

            $("#createthirdpartypolicy").modal();
        });


        function setModalAttr(param) {

            $("#AreaName").val($(param).attr('AreaName'));
            $("#AreaArName").val($(param).attr('AreaAr'));
            // $("#EditAreaSelect").val($(param).attr('policyUUID'))
        }



        function setLastDate() {

            // let startdate =  Date.parse($("#startdate").val());
            let sdate = new Date($("#startdate").val());
            let priod = parseInt($("#priod").val());
            switch ($("#priodlenth").val()) {
                case "day":
                    sdate.setDate(sdate.getDate() + parseInt(priod));
                    break;
                case "month":
                    sdate.setDate(sdate.getDate() + parseInt(priod * 30));
                    break;
                case "year":
                    sdate.setDate(sdate.getDate() + parseInt(priod * 365) - 1);
                    break;
            }
            // let priod =parseInt($("#priod").val());
            // let priodlenth = parseInt($("#priodlenth").val())  ;
            // sdate.setDate(sdate.getDate()+parseInt(priod*priodlenth+1) - 1);
            $("#enddate").val(sdate.toLocaleDateString());
        }
    </script>
@endsection
