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
        .select2-selection {
            border-radius: 0 !important;
        }
    </style>
@endsection

@section('content')
    <br />


    <div class="row ">
        <div class="col-md-12 ">
            <div class="box" style="border: 0 !important;box-shadow: 0 1px 9px 3px rgba(0,0,0,0.1);">
                <div class="box-header">
                    <h3 class="box-title">{{ trans('carconditionTrans.CreatecarconditionorateTitle') }} </h3>
                </div>
                <div class="box-body ">
                    <div class="form-row">

                        <div class="col-md-6">

                            <button data-toggle="modal" data-target="#AddNewArea" class="btn btn-success">{{ trans('carconditionTrans.Createcarconditionorate') }} </button>
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
                        <h3 class="box-title">{{ trans('carconditionTrans.carconditionorateList') }} </h3>
                    </div>
                    <div class="box-body ">
                        <div class="form-row">
                            <div class="table-responsitve">
                                <table id="TableAreas" class="table table-dark table-bordered  table-striped ">
                                    <thead>
                                        <tr>
                                            {{-- <th>#</th> --}}
                                            <th>{{ trans('carconditionTrans.carconditionorateName') }}</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carconditions as $carcondition)
                                            <tr>
                                             <td>
                                                @if (App::islocale('ar'))
                                                    {{$carcondition->arname}}
                                                @else
                                                {{$carcondition->name}}
                                                    
                                                @endif

                                             </td>
                                             <td style=" text-align: end" class="text-end">
                                                {{-- <div class="btn-group" role="group" aria-label="Basic example"> --}}
                                                <button onclick="setModalAttr(this)"  type="button" id="EditBtn"
                                                    
                                                    AreaAr="{{ $carcondition->arname }}"AreaName="{{ $carcondition->name }}" carconditionid="{{ $carcondition->id }}" 
                                                    data-toggle="modal" data-target="#EditArea"
                                                    class="btn btn-success"><i class="fa fa-edit"></i></button>
                                                
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
                            <h5 class="modal-title" id="exampleModalLongTitle">{{ trans('carconditionTrans.DeletecarconditionorateTitle') }}</h5>
                            <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-row">
                                @csrf
                                {{ trans('carconditionTrans.DeletecarconditionorateMessage') }}
                            </div>
                        </div>
                        <div style="text-align: end !important" class="modal-footer ">
                            <button type="submit" class="btn btn-success" role="submit"><i
                                    class="fa fa-check"></i></button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                    class="fa fa-close"></i></button>
                        </div>
                    </div>


                </form>

            </div>
        </div>
        

        <div class="modal fade" id="EditArea" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                                            <input type="text" id="AreaArName" class="form-control pull-right ">
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
                                            <input type="text" id="AreaName" class="form-control pull-right ">
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


    @endsection



    @section('scriptes')
        <script src=" {{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
        <script>
            //Date picker

            $(document).ready(function() {

                $("#TableAreas").dataTable({});
                $(".select2").select2();


            
            });


            function setModalAttr (param) { 
               
                    $("#AreaName").val($(param).attr('AreaName'));
                    $("#AreaArName").val($(param).attr('AreaAr'));
                    // $("#EditAreaSelect").val($(param).attr('carconditionid'))
             }
        </script>
    @endsection
