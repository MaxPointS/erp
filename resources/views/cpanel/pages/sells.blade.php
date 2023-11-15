
@extends('cpanel.layout.master')

@section('content')

<style>
  .slow  .toggle-group { transition: left 0.7s; -webkit-transition: left 0.7s; }
  .fast  .toggle-group { transition: left 0.1s; -webkit-transition: left 0.1s; }
  .quick .toggle-group { transition: none;      -webkit-transition: none; }
</style>


    <section class="content">


     
  
      <?php
 
 

  use App\Models\orderstatus;
//       use App\Models\products;
//       use App\Models\Orders;

      $jsoChart = '';
       $count = 1;

      // $productsList = products::join("categories","categories.CatID","=","products.CatID")
      // ->join("branches","categories.PranchID","=","branches.PranchID")
      // ->get();

    //   $productsList =null;
    //    if (auth()->user()->RolID==1){
    //   $productsList = products::join("categories","categories.CatID","=","products.CatID")
    //   ->join("branches","categories.PranchID","=","branches.PranchID")
    //   ->get();
    //    }else {
    //     $productsList = products::join("categories","categories.CatID","=","products.CatID")
    //   ->join("branches","categories.PranchID","=","branches.PranchID")->where(["branches.PranchID"=>auth()->user()->BranchID])
    //   ->get();
    //    }
    //  foreach ($productsList as $key =>  $produc) {
    //   $countsOrde = Orders::where(['ProductID'=>  $produc->ProcuctID])->get();
    //   $jsoChart .= "{Category:'".$produc->ProductArName."'".",Product:'".count($countsOrde)."'},";
    //  }

    //  $jsoChart = substr($jsoChart, 0,-1);
     

    ?>

      <div class="row ">
        <div class="col-md-12 "  >
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body table-responsive-md table-responsive-sm">
              <div id="chart " class="">
                    <div id="chart2"></div>
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
              <h3 class="box-title">الطلبات</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body table-responsive">
              {{-- <a href="Products/create" class="btn btn-primary" >إضافة قائمة جديدة</a> --}}
              <br/>
              <table id="tableOrder"  class="table table-bordered table-striped">
                <thead class="bg-primary text-center">
                  <th>#</th>
                  <th>رقم الفاتورة</th>
                  <th>تاريخ</th>
                  <!--<th>العنوان</th>-->
                  <!--<th>رقم التليفون</th>-->
                  <th>نوع الدفع</th>
                  <th>سعر الفاتورة</th>
                  <th>تم الدفع</th>
                
                  <th class="text-center">مغلق</th>
              </thead>
              <tbody>
                  @foreach ($orders as $order)



                      <tr>
                      <td>{{$count}}</td>
                     <td> <a target="_blank"  href="{{url('cpanel/orders')}}/{{$order->InvoiceID}}"> {{$order->InvoiceNo}} </a></td>
                     <td>{{$order->cr}}</td>
                      <!--<td>-->
                      <!--    <span class="text-success">منطقة</span>&emsp;-->
                      <!--    @if(App::isLocale('en')) -->
                      <!--    {{$order->AreaEnName}}-->
                      <!--    @else-->
                      <!--    {{$order->AreaArName}}-->
                      <!--    @endif-->
                      <!--    &emsp;<span class="text-success">قطعة</span>-->
                      <!--    {{$order->Block}}-->
                      <!--    &emsp;<span class="text-success">شارع</span>-->
                      <!--    {{$order->Street}}-->
                      <!--    &emsp;<span class="text-success">جادة</span>-->
                      <!--    {{$order->Jadda}}-->
                      <!--    &emsp; <span class="text-success">قسيمة</span>-->
                      <!--    {{$order->Houseno}}-->
                      <!--  </td>-->
                      <!--  <td>{{$order->CustPhone}}</td>-->
                        <td>
                            @if(App::isLocale('en')) 
                          {{$order->PayTypeName}}
                          @else
                          {{$order->PayTypearName}}
                          @endif
                        </td>
                        <td class="" >
                           
                            {{$order->TotalPrice}}
                          
                        </td>
                        
                        <td>
                          @if($order->paid)
                          نعم
                          @else
                          لا
                          @endif
                        </td>
                        <td ><input type="checkbox" disabled @if(!$order->Closed)  checked @endif data-toggle="toggle" data-style="slow"></td>
                      </tr>
                      <?php $count++;?>


                       <script>
                        function updateStata{{$order->InvoiceNo}}() {
                      let Statusid = $("#StatId{{$order->InvoiceNo}}").val();
                      let orderNo ="{{$order->InvoiceID}}";
                      let token = "{{csrf_token()}}";
                      if(parseInt(Statusid)===0)
                      {
                        alert("إختر الحالة" + orderNo);
                        return;
                      }
                      
                    $.ajax(
                      {
                        method:"Put",
                        url:'{{url("cpanel/orderState")}}'+"/"+orderNo,
                        data:{Status:Statusid,inv:orderNo,_token:token},
                        datatype:"json",
                        success:function(res) {
                          if(res==='ok')
                          {
                            alert("تم الحفظ");
                            console.log(res);

                            $("#OrderStatModel{{$order->InvoiceNo}}").modal("hide");//
                            location.reload();
                          }
                          //else{
                          //   alert("error");
                          //  }
                          },
                          error:function(err){
                            console.log(err);
                          }
                      });
                    
                     }
                    </script>
                  @endforeach
                  
              </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>


    </section>




 
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> --}}
  {{-- <script src="//cdn.jsdelivr.net/npm/wheelnav@1.7.1/js/dist/raphael.min.js"></script> --}}
  {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> --}}

  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> --}}

  <script src="{{asset('js/morris/morris.min.js')}}"></script>

<script>
      Morris.Bar({
  
  element: 'chart2',
  data: 
    <?php echo $sellsMonths;?>
    ,

  xkey: 'Month',
  
  ykeys:['Count'],

  labels: ['عدد الفواتير  '],
  xLabelAngle:45,
  // hideHover:'auto',
  fillOpacity: 0.2,
  barColors:['rgb(1, 2, 120)']
});
  </script> 

  
@endsection