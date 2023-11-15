

<html>
<body >
  <head>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}"> 
    <style>
    body{
    font-family: Arial, Helvetica, sans-serif !important;
      font-size: 10px !important
    }
      .example-print {
    display: none;
}
@media print {
   .example-screen {
       display: none;
    }
    .example-print {
       display: block;
    }
}
      </style>
  </head>
<div class="container">
  <?php $orcount=1;?>
    <section class="content">


      <div class="row ">
        <div class="col-md-12 text-center"  >
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border text-center">
              <h3 class="box-title"></h3>
              <img   class="rounded-circle " width="30%" height="30%" src="{{asset('imgs/logo2.png')}}"/>
             
            </div>

            <br>
            <div class="box-body table-responsive-md table-responsive-sm" style="font-size: 18px !important">
              <div id="chart " class="">
                  

                <div>
                  <div class="content" ">
                     
<div >  التاريخ :
 @foreach ($orders as $order) {{$order->cr}}</div>

                  <div>
                      @break
                @endforeach</div>
                    
                     



                  </div>


              </div>


              <br>
{{-- 
                  <table id="tableOrder1">
                        <thead >
                       <th>التاريخ</th>
                    </thead >
                       <tbody>
                  @foreach ($orders as $order)
                  <tr>
                      <td class="text-center">{{$order->cr}}</td>
                </tr>
                        @break
                  @endforeach
                      </tbody>
                  </table>
                        --}}



                <table id="tableOrder" class="table  table-bordered table-striped">
                    
                    
                  <thead class="bg-primary text-center">
                    
                    <th class="text-center" >رقم الطلب</th>
                    <th class="text-center">اسم العميل</th>
                    <th class="text-center">العنوان</th>
                    <th class="text-center"> التليفون</th>
                    <th class="text-center">نوع الدفع</th>
                    <th class="text-center">تم الدفع</th>
                </thead>
                <tbody>
                  @foreach ($orders as $order)
                  
                  <tr>
                   
                    <td>{{$order->InvoiceNo}} </td>
                    <td>{{$order->CustName}} </td>
                    <td   style="">
                      <span class="text-center text-success"></span>&emsp;
                      {{$order->AreaArName}}
                      &emsp;<span class=" text-center text-success">قطعة</span>
                      {{$order->Block}}
                      &emsp;<span class="text-success">شارع</span>
                      {{$order->Street}}
                      &emsp;<span class="text-success">جادة</span>
                      {{$order->Jadda}}
                      &emsp; <span class="text-success">قسيمة</span>
                      {{$order->Houseno}}
                    </td>
                   
                    <td>{{$order->CustPhone}}</td>
                    <td>{{$order->PayTypearName}}</td>
                    <td>@if($order->paid) نعم @else لا @endif</td>
                   
                  
                  <tr>
                    
                    @break
                  @endforeach
                </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
   

      <div class="row">
        <div class="col-md-12">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              

              
            <div class="box-body table-responsive">
              {{-- <a href="Products/create" class="btn btn-primary" >إضافة قائمة جديدة</a> --}}
              <br/>
              <table id="tableOrder" class="table  table-bordered table-striped">
                <thead class="text-center bg-primary text-center">
                  <th class="text-center" >#</th>
                  <th class="text-center"> الصنف</th>
                  <th class="text-center">الكمية</th>
                  <th class="text-center">سعر الوحدة</th>
                  <th class="text-center">اجمالى</th>
              </thead>
              <tbody class="text-center">
                  @foreach ($orders as $order)
                  <tr>
                    <td>{{$orcount}}</td>
                    <td>{{$order->ProductArName}} <span></span> {{$order->ProductEnName}}</td>
                    <td>{{$order->Qty}}</td>
                    <td>{{$order->ProductRealPrice}}</td>
                    <td>{{number_format( intval($order->Qty)*floatval( $order->ProductRealPrice),3)}}</td>
                  <tr>
                    <?php $orcount++?>
                  @endforeach
                  
              </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
       </div>




      <div class="row" >
        <div class="col-md-6"  >
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
            <div class="box-body ">
             
                <table id="tableOrder"  class="table  table-bordered table-striped">
                <tbody>
                  @foreach ($orders as $order)
                  <tr>
                    <td>سعر التوصيل</td>
                  <td>{{ number_format($order->DelvCost,3)}}</td>
                 
                  </tr>
                  <tr>
                    <td>إجمالى</td>
                  <td>{{$order->TotalPrice}}</td>
                 
                  </tr>
                  @break
                  @endforeach
                 
                </tbody>
                </table>
             
            </div>
          </div>
        </div>
      </div>
     </div>


      <div class="row " >
        <div class="col-md-12 "  >
          <!-- AREA CHART -->
          <button class="example-screen btn btn-success " onclick="display();">طباعة</button>
            <button class="example-screen btn btn-danger " onclick="window.close()">إلغاء</button>
        <!--<a href="{{url('cpanel/orders')}}" class="example-screen btn btn-primary " >رجوع</a>-->
        </div>
      </div>

    </section>

</div>

<script src="{{ asset('plugins/jQuery/jQuery-2.2.0.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script>
  function display()
  {
    window.print();
  }
  </script>
<body>
<html>


