<!DOCTYPE html>
<html @if (App::islocale("ar") ) lang="ar" dir="rtl" @else lang="en" dir="ltr" @endif>
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Dashboard  -  CompanyName </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" >

    @include('cpanel.inc.Css')
    @yield('css')

</head>
<body class="hold-transition skin-blue sidebar-mini" @if (App::islocale("ar") ) dir="rtl" @else dir="ltr" @endif >
    <!-- Site wrapper -->
    <div class="wrapper">

        <!----------------------------------------header with nav---------------------------->
    
        @include('cpanel.inc.header')

        <!-- =============================================== -->
        <!-- Left side column. contains the sidebar -->
        <!------------------------------------------------------------------Left side--------------------------------------->
 
        @include('cpanel.inc.SideBar')
        
        {{-- @include('sweetalert::alert') --}}
        <!-- =============================================== -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <section class="content-header">
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    @yield('content-header')
                  </ol>
            
            </section>


        
            <br/>
            <!-- Main content -->
            <section class="content">
              
                @yield('content')
                
           

              
                
                
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-------------------------------------------footer---------------------------------------------------->
       
        @include('cpanel.inc.footer')
        
        <!-- Control Sidebar -->
        <!-------------------------------------------controlslid---------------------------------------------------->
        @include('cpanel.inc.controlside')
        <!-- /.control-sidebar -->
        
        
        
        
        
       
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    <!-----------------------------------------------------------------------scripts------->
   
    @include('cpanel.inc.scripts')
   
    @yield('scriptes')



    
</body>
</html>



