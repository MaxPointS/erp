@extends('cpanel.layout.master')

<style>
  .toggle.android { border-radius: 0px;}
  .toggle.android .toggle-handle { border-radius: 0px; }
</style>

@section('content')
<?php 
 use App\Models\invoices;
$countsOrde = invoices::where(['OStatus'=>1])->get();
$countsOrde1 = invoices::where(['OStatus'=>2])->get();
$countsOrde2 = invoices::where(['OStatus'=>3])->get();
$countsOrde3 = invoices::where(['OStatus'=>4])->get();

?>

        <!-- Content Header (Page header) -->
        <section class="content-header direction">
         
        </section>

        <!-- Main content -->
        {{--  @if(App::isLocale('en')) style="direction:ltr !important;"  @endif --}}
        <section class="content @if(App::isLocale('en')) text-left  @endif">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-6 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{count($countsOrde1)}}</h3>

                            <p></p>
                        </div>
                        <div class="icon">
                             <i class="ion ion-stats-bars"></i>

<input type="checkbox" checked data-toggle="toggle" data-style="android" data-onstyle="info">
                        </div>
                        <a href="{{url('cpanel/orders')}}" class="small-box-footer"><i class="fa fa-arrow-circle-left"></i>مشاهدة </a>
                    </div>
                </div>
                <!-- ./col -->
               
                <!-- ./col -->
              
                <!-- ./col -->
                
                <!-- ./col -->
            </div>

        </section>

@endsection
