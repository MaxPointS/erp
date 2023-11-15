 <!DOCTYPE html>
 <!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
 <html>

 <head lang="{{ App::getLocale() }}" @if (App::isLocale('en')) dir="ltr" @endif>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>توفى المشعل</title>
     <!-- Tell the browser to be responsive to screen width -->
     <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
     <!-- Bootstrap 3.3.6 -->
     <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">


     {{-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">  --}}

    

     {{-- <link href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap4.min.css" rel="stylesheet" /> --}}
     <link href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.bootstrap4.min.css" rel="stylesheet" />

     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css"> 

     <!-- Font Awesome -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

     <!-- Ionicons -->

     <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
     <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
     



     <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
         rel="stylesheet">
     <!-- Theme style -->
     <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
     <link rel="stylesheet" href=" {{ asset('plugins/select2/select2.min.css') }}">
     <link rel="stylesheet" href=" {{ asset('css/chk.css') }}">




     @if (App::isLocale('en'))
         {{-- <link rel="stylesheet" href="  {{ asset('css/AdminLTE.css') }} "/>  --}}
         <link rel="stylesheet" href="  {{ asset('css/AdminLTE.css') }} " />
         <link rel="stylesheet" href="  {{ asset('css/app.css') }} ">
         {{-- <link rel="stylesheet" href="  {{ asset('dist/css/AdminLTEen.css.map') }} "/>  --}}
     @else
         <link rel="stylesheet" href="  {{ asset('dist/css/AdminLTE.css') }} " />
         {{-- <link rel="stylesheet" href="  {{ asset('css/app.css') }} ">  --}}
     @endif


     <link rel="stylesheet" href="  {{ asset('dist/css/skins/skin-blue.min.css') }}">


 </head>

 </head>

 <body class="hold-transition skin-blue sidebar-mini @if (App::isLocale('en')) text-left @endif"
     @if (App::isLocale('en')) dir="ltr" @endif>

     <div class="wrapper direction ">

         <!-- Main Header -->
         <header class="main-header direction @if (App::isLocale('en')) text-left @endif">

             <!-- Logo -->
             <a href="{{ route('website') }}" class="logo">
                 <!-- mini logo for sidebar mini 50x50 pixels -->
                 <span class="logo-mini"><b>T</b>FF</span>
                 <!-- logo for regular state and mobile devices -->
                 <span class="logo-lg"><b>{{ trans('nav.Svendor') }}</b></span>
             </a>

             <!-- Header Navbar -->
             <nav class="navbar navbar-static-top " role="navigation">

                 <!-- Sidebar toggle button-->
                 <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                     <span class="sr-only">Toggle navigation</span>
                 </a>
                 <!-- Navbar Right Menu -->
                 <div class="navbar-custom-menu ">

                     <ul class="nav navbar-nav">

                         {{-- <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-language"></i>
              {{-- <span class="label label-danger">0</span> 
            </a>
          <ul class="dropdown-menu">
              <li class="header">اللغات المتاحة</li>
              <li>
                <!-- Inner menu: contains the tasks -->
               {{-- <ul class="menu">
                  <li><!-- Task item -->
                  <a href="{{url('lang/en')}}">الانجليزية</a>
                  </li>
                  <li><!-- Task item -->
                    <a href="{{url('lang/ar')}}">العربية</a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
            </ul>
          </li> --}}

                         <!-- User Account Menu -->
                         <li class="dropdown user user-menu">
                             <!-- Menu Toggle Button -->

                             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                 <!-- The user image in the navbar-->

                                 <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                 <span class="hidden-xs">{{ Auth()->user()->username }} </span>
                             </a>

                             <ul class="dropdown-menu">
                                 <!-- The user image in the menu -->
                                 <li class="user-header">



                                     <img class="rounded-circle" width="100%" height="100%"
                                         src="{{ asset('imgs/logo2.png') }}" />



                                 </li>

                                 <!-- Menu Footer-->
                                 <li class="user-footer">
                                     <div class="pull-left">
                                         <!--<a href="#" class="btn btn-default btn-flat">Profile</a>-->
                                     </div>
                                     <div class="pull-center">
                                         <form method="POST" action="{{ route('logout') }}">
                                             @csrf

                                             <button type="submit" class="btn btn-default btn-flat">
                                                 {{ __('Log Out') }}
                                             </button>
                                         </form>
                                         <!--<a href="#" class="btn btn-default btn-flat">Profile</a>-->
                                     </div>
                                     <div class="pull-right">


                                         {{-- <a href="{{route('logout')}}" class="btn btn-default btn-flat">خروج</a> --}}
                                     </div>
                                 </li>
                             </ul>
                         </li>

                     </ul>

                 </div>

             </nav>
         </header>
         <!-- Left side column. contains the logo and sidebar direction-->
         <aside class="main-sidebar">
             <!-- sidebar: style can be found in sidebar.less -->
             <section class="sidebar">

                 <ul class="sidebar-menu">

                     <li class="">
                         <a href="{{ url('cpanel/dashboard') }}">

                             <i class="fa fa-dashboard"></i><span>{{ trans('nav.Dashboard') }}</span>

                         </a>

                     </li>

                     {{-- @if (session()->get('logindata')->RolID == 1) --}}
                     {{-- @role('admin') --}}
                     @can('viewBranches', branches::class)
                         
                     @php
                         $countbranches = App\Models\branches::all()->count();
                     @endphp
                     <li class="treeview">
                         <a href="{{ url('cpanel/branches') }}">
                             <i class="fa fa-files-o"></i>
                             <span>{{ trans('nav.Pranch') }}</span>
                             <span class="label label-primary pull-right">{{ $countbranches }}</span>
                         </a>
                     </li>

                     @endcan
                     <li class="treeview">
                         <a href="#">
                             <i class="fa fa-pie-chart"></i>
                             <span>{{ trans('nav.HR') }}</span>
                             <i class="fa fa-angle-left pull-right"></i>
                         </a>
                         <ul class="treeview-menu">
                             <li><a href="{{ route('HR.index') }}"><i
                                         class="fa fa-circle-o"></i>{{ trans('nav.HREmployees') }}</a></li>
                             {{-- @if (session()->get('logindata')->RolID == 1) --}}
                             <li><a href="{{ url('HR.index') }}"><i
                                         class="fa fa-circle-o"></i>{{ trans('nav.AddCategories') }}</a></li>
                             {{-- @endif --}}
                         </ul>
                     </li>

                     <li class="treeview">
                         <a href="#">
                             <i class="fa fa-pie-chart"></i>
                             <span>{{ trans('nav.Categories') }}</span>
                             <i class="fa fa-angle-left pull-right"></i>
                         </a>
                         <ul class="treeview-menu">
                             <li><a href="{{ url('cpanel/categories') }}"><i
                                         class="fa fa-circle-o"></i>{{ trans('nav.CategoriesManu') }}</a></li>
                             {{-- @if (session()->get('logindata')->RolID == 1) --}}
                             <li><a href="{{ url('cpanel/categories/create') }}"><i
                                         class="fa fa-circle-o"></i>{{ trans('nav.AddCategories') }}</a></li>
                             {{-- @endif --}}
                         </ul>
                     </li>

                     <li class="treeview">
                         <a href="#">
                             <i class="fa fa-laptop"></i>
                             <span>{{ trans('nav.Products') }}</span>
                             <i class="fa fa-angle-left pull-right"></i>
                         </a>
                         <ul class="treeview-menu">
                             <li><a href="{{ url('cpanel/Products') }}"><i class="fa fa-circle-o"></i>
                                     {{ trans('nav.ProductsManu') }}</a></li>
                             {{-- @if (session()->get('logindata')->RolID == 1) --}}
                             <li><a href="{{ url('cpanel/Products/create') }}"><i class="fa fa-circle-o"></i>
                                     {{ trans('nav.AddProducts') }}</a></li>
                             {{-- @endif --}}
                         </ul>
                     </li>

                     <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>{{ trans('nav.Orders') }}</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('cpanel/orders') }}"><i
                                        class="fa fa-circle-o"></i>{{ trans('nav.Dashboard') }}</a></li>
                            {{-- @if (session()->get('logindata')->RolID == 1) --}}
                            <li><a href="{{ url('HR.index') }}"><i
                                        class="fa fa-circle-o"></i>{{ trans('nav.AddCategories') }}</a></li>
                            {{-- @endif --}}
                        </ul>
                    </li>


                     <li><a href="{{ url('cpanel/sells') }}"><i class="fa fa-circle-o text-green"></i> <span>
                                 {{ trans('nav.Sells') }}</span></a></li>
                     {{-- <li><a href="{{ url('cpanel/orders') }}"><i class="fa fa-circle-o text-yellow"></i> <span>
                                 {{ trans('nav.Orders') }}</span></a></li> --}}

                     {{-- @if (session()->get('logindata')->RolID == 1) --}}
                     <li class="treeview">
                         <a href="#">
                             <i class="fa fa-edit"></i> <span>{{ trans('nav.Settings') }}</span>
                             <i class="fa fa-angle-left pull-right"></i>
                         </a>

                         <ul class="treeview-menu">
                             {{-- <li><a href="{{url('cpanel/orders')}}"><i class="fa fa-circle-o"></i>{{ trans('nav.UsersMenu') }}</a></li> --}}
                             <li><a href="{{ url('cpanel/areas') }}"><i
                                         class="fa fa-circle-o"></i>{{ trans('nav.Areas') }}</a></li>
                             <li><a href="{{ url('cpanel/BranchsCategory') }}"><i
                                         class="fa fa-circle-o"></i>{{ trans('nav.BranchCat') }}</a></li>
                             <li><a href="{{ url('cpanel/Users') }}"><i
                                         class="fa fa-circle-o"></i>{{ trans('nav.UsersMenu') }}</a></li>
                             {{-- <li><a href="" data-toggle="modal" data-target="#AreasModel"><i class="fa fa-circle-o"></i>{{ trans('nav.Areasadd') }}</a></li> --}}

                         </ul>
                     </li>
                     {{-- @endif --}}


                 </ul>



             </section>
             <!-- /.sidebar -->
         </aside>
