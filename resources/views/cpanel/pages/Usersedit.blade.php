
@extends('cpanel.layout.master')

@section('content')



  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
        {{ trans('users.Users') }}
    </h1>
  
  </section>

  <!-- Main content -->
  <section class="content">

    <?php
    // use App\Models\govern as pp;
    use App\Models\rols;
    use App\Models\branches;
    use App\Models\userslogin;

     $countUsers = 1;

    $rols = rols::all();//(["GovID"=>1])->Get();
    $branches2 = branches::all();//select(["branches.*","AreaEnName","AreaArName"])->join("areas","areas.AreaID","=","branches.AreaID")->get(); //DB::table('branches')->select(["branches.*","AreaEnName","AreaArName"])->join("areas","areas.AreaID","=","branches.AreaID")->get();
    $UsersLogins=userslogin::join("rols","rols.RolID","=","userslogin.RolID")->get();
  ?>

    <div class="row " >
      <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
          <h3 class="box-title">{{ trans('users.edituser') }}</h3>
          </div>
      
        <form id="form" role="form" action="{{url('cpanel/Users').'/'.$user->UserID}}" method="Post">
            {{-- {{ csrf_field() }} --}}
            @csrf
            <input type="hidden" name="_method" value="PATCH" />
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputFile">{{ trans('users.UserName') }}</label>
                    <span id="errorar"></span>
                <input class="form-control"  required  name="UserName" value="{{$user->UserName}}"  type="text" autocomplete="off"  placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">{{ trans('users.UserPass') }}</label>
                    <span id="erroren"></span>
                    <input class="form-control text-left"  type="password"  name="UserPass"  autocomplete="off"  placeholder="">
                  </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">{{trans('users.Branch') }}</label>
                <select style="height: 40px" class="form-control" name="Branch" id="exampleFormControlSelect1">
                    @if (App::isLocale('en'))
                    <option @if($user->BranchID==0) selected @endif value="0">All Branchs</option> 
                    @else
                    <option @if($user->BranchID==0) selected @endif value="0">كل الافرع</option> 
                    @endif
                    @foreach ($branches2 as $pranche1)
                  @if (App::isLocale('en'))
                  <option @if($user->BranchID==$pranche1->PranchID) selected @endif value="{{$pranche1->PranchID}}">{{$pranche1->PranchEnname}}</option> 
                  @else
                  <option @if($user->BranchID==$pranche1->PranchID) selected @endif value="{{$pranche1->PranchID}}">{{$pranche1->PranchArname}}</option>
                  @endif
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect2">{{ trans('users.Role') }}</label>
                <select style="height: 40px" class="form-control" name="Role" id="exampleFormControlSelect2">
                  @foreach ( $rols  as  $role)
                  @if (App::isLocale('en'))
                  <option @if($user->RolID==$role->RolID) selected @endif value="{{$role->RolID}}">{{$role->RoleArName}}</option>  
                  @else
                  <option @if($user->RolID==$role->RolID) selected @endif value="{{$role->RolID}}">{{$role->RoleEnName}}</option>
                  @endif
                  @endforeach
                </select>
              </div>
              <div class="checkbox">
                <label>
                  <input @if($user->uStatus) checked @endif   name="userstatus" type="checkbox" data-toggle="toggle" data-style="slow"> 
                </label>
              </div>
            </div>
            {{-- {{ trans('branches.Active') }} --}}
            <!-- /.box-body 
            
            -->

            <div class="box-footer">
            <a href="{{url('cpanel/Users')}}" class="btn btn-danger"  id="cancel">{{ trans('branches.Cancel') }}</a>
              <button type="submit" onsubmit=""  class="btn btn-primary">{{ trans('branches.Save') }}</button>
              
            </div>
          </form>

        </div>
      
        <!-- /.box -->

      </div>

    </div>
    <!-- /.row -->
  </section>


    
@endsection