
@extends('cpanel.layout.master')

@section('content')

{{-- <style>
  .dt-buttons, .btn-group,.dataTables_paginate {
    float: left !important;
  }
  .dataTables_info{
    float: right !important;
  }
</style> --}}


    <section class="content">



      <div class="row ">
        <div class="col-md-12 "  >
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">المنتجات حسب القائمة</h3>

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
    $count=1
@endphp
      <div class="row">
        <div class="col-md-12 table-responsive  text-nowrap">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">القائمة الرئيسية</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body table-responsive">
              {{-- @if(auth()->user()->RolID==1) --}}
              <a href="Products/create" class="btn btn-primary" >إضافة منتج جديد</a>
              {{-- @endif --}}
              <br/>
              <table id="table1" class="table table-bordered w-auto table-striped">
                <thead class="bg-primary text-center">
                  <th>#</th>
                  <th  class="text-center"></th>
                  <th  class="text-center">عربى</th>
                  <th  class="text-center">انجليزى</th>
                  <th  class="text-center">القائمة</th>
                  <th  class="text-center">الوصف عربى</th>
                  <th  class="text-center">الوصف انجليزى</th>
                  <th  class="text-center">سعر المنتج</th>
                  <th  class="text-center">سعر البيع</th>
                  <th  class="text-center">حالة المنتج</th>
                  <th class="text-center">إجراءات</th>
              </thead>
              <tbody>
                  <tr class="text-center">
                   @foreach ($productsList as $Product)
                  <td class="text-center ">{{$count}}</td>
                  <td class="text-center vertical"><img width="90" height="auto" src="{{asset($Product->ProductImagePath)}}" /></td>
                  <td class="text-center">{{$Product->ProductArName}}</td>
                  <td class="text-center ">{{$Product->ProductEnName}}</td>
                  
                  @if(App::isLocale("ar"))
                  
                  <td class="text-center">
                  
                    {{$Product->CatArName}}
                   
                     {{-- <a href="" class="btn" data-toggle="modal" data-target="#exampleModalCenter{{$Product->ProcuctID}}"> {{$Product->CatArName}} </a> --}}
                   
                  </td>
                  @else
                 
                  <td class="text-center">{{$Product->CatEnName}}</td>
                  @endif
                  <td class="text-center" >{{substr($Product->ProductArDesc,0,40)}}...</td>
                  <td class="text-center">{{substr($Product->ProductEnDesc,0,40)}}...</td>
                  <td class="text-center">{{$Product->ProductPrice}}</td>
                  <td class="text-center">{{$Product->ProductRealPrice}}</td>

                  <td class="text-center" >
                    <input  type="checkbox" disabled @if ($Product->ProductStatus) checked @endif productID="{{$Product->ProcuctID}}" data-toggle="toggle"  data-style="slow" />
                  </td>
                 
                  <td class="text-center">
                  <span><a class="btn btn-warning btn-sm" href="Products/{{$Product->ProcuctID}}/edit"><span class="fa fa-edit">تعديل</span></a></span>
                   <span><a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalLong{{$Product->ProcuctID}}" ><span class="fa fa-trash">حذف</span></a></span>
                  </td>
                 
                  </tr>
                  <?php $count+=1;?>






<div class="modal fade" id="exampleModalLong{{$Product->ProcuctID}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <form action="{{url('cpanel/Products').'/'.$Product->ProductArName}}" method="POST">
                        @csrf
                      <div class="modal-content">
                        <div class="modal-header bg-danger">
                          <h5 class="modal-title" id="exampleModalLongTitle">حذف المنتج   {{$Product->ProductArName}}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <span>الرجاء الملاحظة عند حذف المنتج سيتم حذف كل متعلقات المنتج </span>
                          <br>
                          <p>الافرع</p>
                          <p>الفواتير الخ...</p>
                            <input type="hidden" name="_method" value="DELETE" />
                            <input type="hidden" name="ProName" value="{{$Product->ProductArName}}" />
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal">إلغاء</button>
                          <input type="submit" class="btn btn-danger " value="حذف" />
                        </div>
                      </div>
                    </form>
                      {{--  --}}
                    </div>
                  </div>









                  <div class="modal fade" id="exampleModalCenter{{$Product->ProcuctID}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <form action="{{url('cpanel/UpadteProduct').'/'.$Product->ProcuctID}}" method="POST">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">نقل المنتج {{$Product->ProductArName}}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          
                            <input type="hidden" name="_method" value="PUT" />
                            @csrf
                           <div class="form-group">
                            <select class="form-control" name="CatIDList" id="">
                              @foreach ($categories as $catList)
                              @if (App::isLocale('ar'))
                                <option @if($catList->CatID ==$Product->CatID) selected @endif value="{{$catList->CatID}}">{{$catList->CatArName}}</option>
                              @else
                              <option @if($catList->CatID ==$Product->CatID) selected @endif value="{{$catList->CatID}}">{{$catList->CatEnName}}</option>
                              @endif
                              @endforeach
                              
                            </select>
                           </div>
                         
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                          <input type="submit" class="btn btn-primary" value="حفظ" />
                        </div>
                      </div>
                    </form>
                      {{--  --}}
                    </div>
                  </div>

               
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
  <script src="//cdn.jsdelivr.net/npm/wheelnav@1.7.1/js/dist/raphael.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="{{asset('js/morris/morris.min.js')}}"></script>

<script>
 
    Morris.Bar({
  
  element: 'chart2',
  data: <?php echo $jsoChart?>,

  xkey: 'CatID',
  
  ykeys: ['Count'],

  labels: ['عدد المنتجات داخل القائمة'],
  // hideHover:'auto',
  fillOpacity: 0.2,
  xLabelAngle:45,
  barColors:['rgb(120, 100, 13)']
});
  </script>

@endsection