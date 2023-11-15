
@extends('cpanel.layout.master')

@section('content')


  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      الافرع
    </h1>
  
  </section>

  <!-- Main content -->
  <section class="content">

    <?php
    use App\Models\govern as pp;
    use App\Models\areas;
    use App\Models\branches;

    $gov = pp::all();
    // $area = areas::all(["GovID"=>1])->Get();
    $area = areas::all();
    //$branches2 = branches::select(["branches.*","AreaEnName","AreaArName"])->join("areas","areas.AreaID","=","branches.AreaID")->get(); //DB::table('branches')->select(["branches.*","AreaEnName","AreaArName"])->join("areas","areas.AreaID","=","branches.AreaID")->get();
  ?>

    <div class="row " >
      <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
          <h3 class="box-title">{{ trans('branches.AddPranch') }}</h3>
          </div>
      
          <form id="form" role="form" action="{{url('cpanel/branches').'/'.$branchesEdit->PranchID}}" method="POST">
            {{-- {{ csrf_field() }} --}}
            @csrf
            <input type="hidden" name="_method" value="PUT"/>
            <div class="box-body">
              <div class="form-group">
                <label for="exampleFormControlSelect1">{{ trans('branches.Govern') }}</label>
                <select style="height: 40px" onchange="getData(this.value)"  class="form-control" name="GovID" id="exampleFormControlSelect1">
                  @foreach ($gov as $gv)
                  @if (App::isLocale('en'))
                  <option @if($branchesEdit->GovID==$gv->GovID) selected @endif value="{{$gv->GovID}}">{{$gv->GovEnName}}</option> 
                  @else
                  <option @if($branchesEdit->GovID==$gv->GovID) selected @endif value="{{$gv->GovID}}">{{$gv->GovArName}}</option>
                  @endif
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect2">{{ trans('branches.Area') }}</label>
                <select style="height: 40px" class="form-control" name="AreaID" id="exampleFormControlSelect2">
                  @foreach ($area as $ar)
                  @if (App::isLocale('en'))
                  <option @if($branchesEdit->AreaID==$ar->AreaID) selected @endif value="{{$ar->AreaID}}">{{$ar->AreaEnName}}</option>  
                  @else
                  <option @if($branchesEdit->AreaID==$ar->AreaID) selected @endif value="{{$ar->AreaID}}">{{$ar->AreaArName}}</option>
                  @endif

                 
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="">{{ trans('branches.ArabicName') }}</label>
                <span id="errorar"></span>
              <input class="form-control"  required id="arname" name="prancharname" value="{{$branchesEdit->PranchArname}}" type="text" autocomplete="off"  placeholder="اسم الفرع باللغة العربية">
              </div>

              <div class="form-group">
                <label for="">{{ trans('branches.EnglishName') }}</label>
                <span id="erroren"></span>
                <input class="form-control text-left" required type="text" id="enname" value="{{$branchesEdit->PranchEnName}}" name="Pranchenname"  autocomplete="off"  placeholder="English pranch Name">
               
              </div>
              <div class="form-group">
                <label for="">{{ trans('branches.BranchNo') }}</label>
                <span id="erroren"></span>
                <input class="form-control" type="number" min="11111111" max="99999999"  id="enname" minlength="8" maxlength="8" name="BranchNo"   value="{{$branchesEdit->BranchNo}}" autocomplete="off"  placeholder="رقم التليفون - الواتساب">
                {{-- <input class="form-control" required type="number" min="8" max="8" value="{{$branchesEdit->BranchNo}}" name="BranchNo"  autocomplete="off"  placeholder="رقم التليفون - الواتساب"> --}}
               
              </div>
              <label for="">{{ trans('branches.WorkTime') }}</label>
              <div class="form-row">
               
                  <div class="form-group col-md-6">
                    <label>{{ trans('branches.from') }}</label>
                    <div class="input-group ">
                      <input type="text" name="openfrom" value="{{date("h:i A",strtotime($branchesEdit->Openfrom))}}" class="form-control timepicker">
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label>{{ trans('branches.to') }}</label>
                    <div class="input-group">
                      <input type="text" name="Closeto" value="{{date("h:i A",strtotime($branchesEdit->Closeto))}}" class="form-control timepicker2">
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                  </div>
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                  <label for="">{{ trans('branches.DelvCost') }}</label>
                  <span id="erroren"></span>
                  <input class="form-control "style="width: 100px"  type="number" min="0.000" step="0.050"  maxlength="7" value="{{$branchesEdit->DelvCost}}"  id="DelvCost" name="DelvCost"  autocomplete="off" placeholder="0.000"><span class='d-inline'>د.ك</span>
                 
                </div>
                
                <div class="form-group col-md-6">
                  <label for="">{{ trans('branches.MinOrderPrice') }}</label>
                  <span id="erroren"></span>
                  <input class="form-control "style="width: 100px"  type="number" min="0.000" step="0.050"  maxlength="7" value="{{$branchesEdit->MinOrderPrice}}"  id="MinOrderPrice" name="MinOrderPrice"  autocomplete="off" placeholder="0.000"><span class='d-inline'>د.ك</span>
                </div>
               </div>

              <div class="checkbox">
                <label>
                  <input @if($branchesEdit->Pranchstatus==1) checked @endif  name="pranchstatus" type="checkbox" data-toggle="toggle" data-style="slow"> 
                </label>
              </div>
            </div>
            {{-- {{ trans('branches.Active') }} --}}
            <!-- /.box-body 
            
            -->

            <div class="box-footer">
              <a href="{{url('cpanel/branches')}}" class="btn btn-danger"  id="cancel">{{ trans('branches.Cancel') }}</a>
              <button type="submit" onsubmit=""  class="btn btn-primary">{{ trans('branches.Save') }}</button>
              
            </div>
          </form>

        </div>
      

      </div>

      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </section>


<script>


function getData(eval)
{
  $.ajax({
    type: "GET",
    url: "{{url('cpanel/areas').'/'}}"+eval,
    dataType: "json",
    success: function (response) {
      $("#exampleFormControlSelect2").find("option").remove();
            if(response.length>0)
            {
              for (let index = 0; index < response.length; index++) {
                $("#exampleFormControlSelect2").append("<option value='"+response[index].AreaID+"'>"+response[index].AreaArName+"</option>");
              }
            }
    },error:function(response){
      console.log(response);
    }
  }
  );
}
</script>
    
@endsection