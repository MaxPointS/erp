@extends('cpanel.layout.master')

@section('content')
    <form action="" method="POST">
        <div class="row ">
            <div class="col-md-12 ">
                <div class="box" style="border: 0 !important;box-shadow: 0 1px 9px 3px rgba(0,0,0,0.1);">
                    <div class="box-header">
                        <h3 class="box-title">Filtering </h3>
                    </div>
                    <div class="box-body ">

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="datePolicy">Policy Date:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="">Ar</i>
                                        </div>
                                        <input type="text" id="datePolicy" class="form-control pull-right datepicker">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Issue Date:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="">En</i>
                                        </div>
                                        <input type="text" class="form-control pull-right datepicker">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Issue Date:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-home"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right ">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Issue Date:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right ">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Issue Date:</label>
                                    <div class="form-group">
                                      
                                        <div class="">
                                          <label>
                                              <input checked name="pranchstatus" type="checkbox" data-toggle="toggle"
                                                  data-style="slow">
                                          </label>
                                      </div>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Issue Date:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-link"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right ">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>


                        </div>


                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button class="btn btn-success pull-right">filter</button>
                    </div>
                </div>
                <!-- /.box -->



            </div>
        </div>
    </form>
@endsection
