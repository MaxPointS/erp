
@extends('cpanel.layout.master')

@section('content')

<style>
  .slow  .toggle-group { transition: left 0.7s; -webkit-transition: left 0.7s; }
  .fast  .toggle-group { transition: left 0.1s; -webkit-transition: left 0.1s; }
  .quick .toggle-group { transition: none;      -webkit-transition: none; }
  #tableOrder_wrapper>.dt-buttons{
    margin: auto !important;
  
  }
  #tableOrder_filter,#tableOrder_paginate{
    float: left  !important;

  }
  #tableOrder_info{
    float: right !important;
  }
</style>

    <section class="content">


      <div class="row ">
        <div class="col-md-12"  >
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
   
@php
    $count=1;
@endphp
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
              <table id="tableOrder" class="table table-bordered  @if(App::isLocale('ar')) rtl @endif  table-striped" style="width:100%">
                <thead class="bg-primary">
                  <th>#</th>
                  <th >رقم الطلب</th>
                  <th>اسم العميل</th>
                  <th>العنوان</th>
                  <th >رقم التليفون</th>
                  {{-- <th>نوع الدفع</th> --}}
                  <td>حالة الطلب</th>
                  {{-- <th>تم الدفع</th>
                  <th>وقت توصيل الطلب</th> --}}
                  {{-- <th>تاريخ توصيل الطلب</th> --}}
                  <th>إجراءات</th>
                 
              </thead>
              <tbody>
                  @foreach ($orders as $order)


              <div class="modal fade" id="OrderStatModel{{$order->OrderID}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered  modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">هل تريد تحديث حال الطلب رقم </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                           
                            <label for="StatId{{$order->OrderID}}">حالة الطلب</label>
                            <select id="StatId{{$order->OrderID}}" class="form-control">
                              <option value="0" selected>إختر</option>
                              @foreach ($allstatuse  as $tatus)
                              @if(App::isLocale("are"))
                              <option value="{{$tatus->OrderReferance}}">{{$tatus->OrderArStatus}}</option>
                              @else
                              <option value="{{$tatus->OrderReferance}}">{{$tatus->OrderArStatus}}</option>
                              @endif
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">إلغاء</button>
                        <button type="button" onclick="updateStata{{$order->InvoiceNo}}()" class="btn btn-success">حفظ</button>
                        </div>
                      </div>
                    </div>
                  </div>
 
                      <tr>
                      <td>{{$count}}</td>
                      {{-- <a target="_blank"  href="{{url('cpanel/orders')}}/{{$order->OrderReferance}}"></a> --}}
                     <td>  {{$order->OrderID}} </td>
                      <td>{{$order->CustName}}</td>
                      <td>
                          <span class="text-success">منطقة</span>&emsp;
                          @if(App::isLocale('en')) 
                          <b class="text-primary">{{$order->AreaEnName}}</b>
                          @else
                          <b class="text-primary"> {{$order->AreaArName}}</b>
                          @endif
                          &emsp;<span class="text-success">قطعة</span>
                          <b class="text-primary"> {{$order->Block}}</b>
                          &emsp;<span class="text-success">شارع</span>
                          <b class="text-primary"> {{$order->Street}}</b>
                          &emsp;<span class="text-success">جادة</span>
                          <b class="text-primary"> {{$order->Jadda}}</b>
                          &emsp; <span class="text-success">قسيمة</span>
                          <b class="text-primary">  {{$order->Houseno}}</b>
                        </td>
                        <td>{{$order->CustPhone}}</td>
                        
                        <td class="" >
                            @if(App::isLocale('en')) 
                          
                            <span
                            @if ($order->OrderSID==1)
                            class="label label-success"
                           @endif  
                           @if ($order->OrderSID==2)
                            class="label label-primary"
                           @endif 
                           @if ($order->OrderSID==3)
                           class="label label-warning"
                          @endif 
                          @if ($order->OrderSID==4)
                          class="label label-danger"
                         @endif 
                            >{{$order->OrderEnStatus}} </span> 

                            @else
                            <span
                              @if ($order->OrderSID==1)
                              class="label label-success"
                             @endif  
                             @if ($order->OrderSID==2)
                              class="label label-primary"
                             @endif 
                             @if ($order->OrderSID==3)
                             class="label label-warning"
                            @endif 
                            @if ($order->OrderSID==4)
                            class="label label-danger"
                           @endif 
                              >{{$order->OrderArStatus}} </span> 
                       
                          @endif
                        </td>
                        
                      
                       
                        <td>
                        
                         @if ($order->OrderSID<4)
                         <button class="btn btn-primary inline"   data-toggle="modal" data-target="#OrderStatModel{{$order->OrderID}}"><i class="fa fa-edit"></i></button> 
                        
                          <button class="btn btn-danger inline" onclick="DeleteOrder{{$order->InvoiceNo}}();"><i class="fa fa-close"></i></button>
                          @endif
                        </td>
                       
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
                      
                      
                      
                      
                      
                        function DeleteOrder{{$order->InvoiceNo}}() {
                      
                      let orderNo ="{{$order->InvoiceID}}";
                      let token = "{{csrf_token()}}";
                      if(confirm("هل  تريد حذ الطلب" + orderNo))
                      {
                          
                           $.ajax(
                      {
                        method:"Delete",
                        url:'{{url("cpanel/orders")}}'+"/"+orderNo,
                        data:{inv:orderNo,_token:token},
                        datatype:"json",
                        success:function(res) {
                          if(res==='ok')
                           {
                            alert("تم الحذف");
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
                      
                        // alert("إختر الحالة" + orderNo);
                        // return;
                      }
                      
                   
                    
                    }
                    </script>
                  @endforeach
                  
              </tbody>
              <tfoot>
                
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th class="d-none"></th>
                  
              </tfoot>
              </table>
            </div>

          </div>
        </div>
      </div>


    </section>

 
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/wheelnav@1.7.1/js/dist/raphael.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="{{asset('js/morris/morris.min.js')}}"></script>
    
    <script>
      Morris.Bar({
    
    element: 'chart2',
    data: 
      <?php echo $countorders ?>
    ,
    
    xkey: 'ProductID',
    
    ykeys: ['Count'],
    
    labels: ['عدد الطلبات على الصنف '],
    // hideHover:'auto',
    fillOpacity: 0.2,
    xLabelAngle:45,
    resize:true,
    barColors:['rgb(11, 60, 12)']
    });
    </script> 
    
    

@endsection