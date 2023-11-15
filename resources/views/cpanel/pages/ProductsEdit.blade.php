
@extends('cpanel.layout.master')

@section('content')

<style>
  .switch.android { border-radius: 0px;}
  .switch.android .switch-handle { border-radius: 0px; }
</style>


  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     
    </h1>
  
  </section>
  <!-- Main content -->
  <section class="content">

    <?php
      use App\Models\categories;
      use App\Models\branches;
      $branches = branches::first();
    $Categories = categories::where('PranchID',$branches->PranchID)->get();
  ?>
      @if ( session()->get("error"))
      <h1 class="text-center">{{ session()->get("error")}}</h1>
    @endif
    <div class="row ">
      <!-- left column -->
      <div class="col-md-12" >
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border  text-center">
            <h3 class="box-title"> اضافة قائمة صنف رئيسى</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <div class="box-body">
          <form id="form" action="{{url('cpanel/Products/'.$product->ProcuctID)}}" role="form" method="POST"  enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="Put"  />
           <div class="row">
             <div class="col-md-8">
              <div class="box-body">
                <div class="form-group">
                  <label for="">القائمة</label>
                  <select style="height: 40px"   class="form-control" name="ProductCatID" id="ProductCatID">
                    @foreach ($Categories as $Category)
                    @if ($Category->CatID ===$product->CatID)
                    @if (App::isLocale('ar'))
                     <option selected value="{{$Category->CatArName}}">{{$Category->CatArName}}</option>
                    @else
                    <option selected value="{{$Category->CatEnName}}">{{$Category->CatEnName}}</option> 
                    @endif
                   
                    @else
                      @if (App::isLocale('ar'))
                        <option value="{{$Category->CatArName}}">{{$Category->CatArName}}</option>
                      @else
                      <option  value="{{$Category->CatEnName}}">{{$Category->CatEnName}}</option> 
                      @endif
                    @endif
                   
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="ProductArName">اسم المنتج باللغة العربية</label>
                  <input class="form-control"  required id="ProductArName" name="ProductArName"  type="text" value="{{$product->ProductArName}}"  autocomplete="off"  placeholder="اسم المنتج باللغة العربية">
                  <input class="form-control"   id="ProductArName1" name="ProductArName1"  type="hidden" value="{{$product->ProductArName}}" />
                </div>
  
                <div class="form-group">
                  <label for="ProductEnName">اسم المنتج باللغة الانجليزية</label>
                  <input class="form-control text-left" required type="text" id="ProductEnName" name="ProductEnName" value="{{$product->ProductEnName}}"  autocomplete="off"  placeholder="Product English Name">
                  <label style="display: none" id="txtarab">fffdssdds</label>
                </div>
  
  
                <div class="form-group">
                <label for="ProductArDesc">وصف المنتج باللغة العربية</label>
                <textarea class="form-control" style="resize: none" id="ProductArDesc"   name="ProductArDesc" rows="5" autocomplete="off">{{$product->ProductArDesc}}</textarea>
                <label style="display: none" id="txtarab">fffdssdds</label>
              </div>


              <div class="form-group">
                <label for="ProductEnDesc">وصف المنتج باللغة الانجليزية</label>
                <textarea class="form-control text-left"  style="resize: none" id="ProductEnDesc"   name="ProductEnDesc" rows="5" autocomplete="off">{{$product->ProductEnDesc}}</textarea>
                <label style="display: none" id="txtarab">fffdssdds</label>
              </div>

<div class="form-row">
              <div class="form-group col-md-6">
                <label for="ProductPrice">سعر المنتج</label>
                <input class="form-control" style="width: 100px" type="number" min="0.000"step="0.01"  maxlength="7"  id="ProductPrice" value="{{$product->ProductPrice}}" name="ProductPrice"  autocomplete="off"   placeholder="0.000"><span>د.ك</span>
                <label style="display: none" id="txtarab">fffdssdds</label>
              </div>
              <div class="form-group col-md-6">
                <label for="ProductRealPrice">سعر البيع</label>
              <input class="form-control "style="width: 100px"  type="number" min="0.000" step="0.01"  maxlength="7"  id="ProductRealPrice" value="{{$product->ProductRealPrice}}" name="ProductRealPrice"  autocomplete="off"  placeholder="0.000"><span class='d-inline'>د.ك</span>
              </div>
              </div> 
              
              
               <div class="form-group">
                <label for="ProductRealPrice">ترتيب داخل القائمة</label>
                <input class="form-control "style="width: 100px"  type="number" min="1" step="1" value="{{$product->MenuSort}}"   max="1000"  maxlength="7"  id="Menusort" name="Menusorted"  autocomplete="off"  ><span class='d-inline'></span>
              </div>
              
              
              <div class="form-group">
                <label for="productImgPath">صورة القائمة</label>
                <input class="form-control"  type="file" id="productImgPath" name="productImgPath"  autocomplete="off"  placeholder="ُEnglish pranch Name">
                <label style="display: none" id="txtarab">fffdssdds</label>
              </div>
              <div class="form-group">
                
              <img width="20%" height="auto" src="{{asset($product->ProductImagePath)}}" />
              <input type="hidden" name="OldImgPath" value="{{$product->ProductImagePath}}" />
              </div>
              
              <div class="checkbox">
                  <input type="checkbox"    @if($product->ProductStatus)  checked @endif  name="ProductActive" data-toggle="toggle" data-style="slow">
                    {{--<input @if($product->ProductStatus) checked @endif name="ProductActive" data-toggle="toggle" data-style="slow"> --}}
                  
                   
                </div>

                    
              </div>
             </div>
           </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <a href=" {{url('cpanel/Products')}}  " class="btn btn-danger"  id="cancel">الغاء</a>
              <button type="submit"  class="btn btn-primary">حفظ</button>
              
            </div>
          </form>
         </div>
        </div>
    
      </div>

    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->

    
@endsection