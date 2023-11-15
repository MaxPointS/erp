<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <ul class="sidebar-menu">

            <li class="">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i><span>{{ trans('nav.Dashboard') }}</span>
                </a>

            </li>


            <li class="treeview">
                <a href="{{ route('com-service-view') }}">
                    <i class="fa fa-files-o"></i>
                    <span>{{ trans('nav.Pranch') }}</span>
                    <span class="label label-primary pull-right"></span>
                </a>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>{{ trans('nav.vehicles') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('showInsuranceViechle') }}"><i
                                class="fa fa-circle-o"></i>{{ trans('nav.vehiclesInsuredList') }}</a></li>

                    {{-- <li><a href=""><i class="fa fa-circle-o"></i>{{ trans('nav.AddCategories') }}</a></li> --}}

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>{{ trans('nav.Companies') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('showCompaniesList') }}"><i
                                class="fa fa-circle-o"></i>{{ trans('nav.Companiesdashboard') }}</a></li>

                    <li><a href="{{ route('CreateCompany') }}"><i
                                class="fa fa-circle-o"></i>{{ trans('nav.companiesList') }}</a></li>

                    <li><a href="{{ route('AddService') }}"><i
                                class="fa fa-circle-o"></i>{{ trans('nav.addservice') }}</a></li>
                                <li><a href="{{ route('addconditions') }}"><i
                                    class="fa fa-circle-o"></i>{{ trans('nav.terms') }}</a></li>

                </ul>
            </li>

            {{-- <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>{{ trans('nav.Categories') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('cpanel/categories') }}"><i
                                class="fa fa-circle-o"></i>{{ trans('nav.CategoriesManu') }}</a></li>
                  
                    <li><a href="{{ url('cpanel/categories/create') }}"><i
                                class="fa fa-circle-o"></i>{{ trans('nav.AddCategories') }}</a></li>
                  
                </ul>
            </li> --}}

            {{-- <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>{{ trans('nav.Products') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('cpanel/Products') }}"><i class="fa fa-circle-o"></i>
                            {{ trans('nav.ProductsManu') }}</a></li>
                    
                    <li><a href="{{ url('cpanel/Products/create') }}"><i class="fa fa-circle-o"></i>
                            {{ trans('nav.AddProducts') }}</a></li>
             
                </ul>
            </li> --}}

            {{-- <li class="treeview">
               <a href="#">
                   <i class="fa fa-pie-chart"></i>
                   <span>{{ trans('nav.Orders') }}</span>
                   <i class="fa fa-angle-left pull-right"></i>
               </a>
               <ul class="treeview-menu">
                   <li><a href="{{ url('cpanel/orders') }}"><i
                               class="fa fa-circle-o"></i>{{ trans('nav.Dashboard') }}</a></li>
                 
                   <li><a href="{{ url('HR.index') }}"><i
                               class="fa fa-circle-o"></i>{{ trans('nav.AddCategories') }}</a></li>
                
               </ul>
           </li> --}}


            {{-- <li>
                <a href="{{ url('cpanel/sells') }}"><i class="fa fa-circle-o text-green"></i>
                    <span> {{ trans('nav.Sells') }}</span>
                </a>
            </li> --}}
            {{-- <li><a href="{{ url('cpanel/orders') }}"><i class="fa fa-circle-o text-yellow"></i> <span>
                        {{ trans('nav.Orders') }}</span></a></li> --}}


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gear"></i> <span>{{ trans('nav.Settings') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">
                    
                    <li>
                        <a href="{{ route('areas') }}"><i class="fa fa-circle-o"></i>{{ trans('nav.Areas') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('governs') }}"><i class="fa fa-circle-o"></i>{{ trans('nav.governs') }}</a>
                    </li>

                    <li>
                        <a href="{{ route('serviceType') }}"><i class="fa fa-circle-o"></i>{{ trans('nav.serviceType') }}</a>
                    </li>

                    <li>
                        <a href="{{ route('RoleList') }}"><i
                                class="fa fa-circle-o"></i>{{ trans('nav.role') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('UsersList') }}"><i
                                class="fa fa-circle-o"></i>{{ trans('nav.UsersMenu') }}</a>
                    </li>


                </ul>
            </li>



        </ul>

    </section>
    <!-- /.sidebar -->
</aside>
