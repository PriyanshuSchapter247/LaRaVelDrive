<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:lightslategray;">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
{{--        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
{{--            style="opacity: .8">--}}
        <span class="brand-text font-weight-light text-center"  style="color:black;">  <b>MiNI Drive </b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
{{--            <div class="image">--}}
{{--                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">--}}
{{--            </div>--}}
            <div class="info">
                <a href="#"  style="color:black;" class="d-block text-center">{{ Auth()->user()->name }}</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="/add" class="nav-link">
                                <i class="fa fa-plus nav-icon"  style="color:black;"></i>
                                <p  style="color:black;">Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/show" class="nav-link">
                                <i class="fa fa-list nav-icon"  style="color:black;"></i>
                                <p  style="color:black;">List</p>
                            </a>
                        </li>

{{--                    </ul>--}}
                </li>
                <li class="nav-item">
                    <a href="/sharelist" class="nav-link">
                        <i class="nav-icon fas fa-share"  style="color:black;"></i>
                        <p  style="color:black;">share

                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/requestlist" class="nav-link">
                        <i class="nav-icon fas fa-list"  style="color:black;"></i>
                        <p  style="color:black;">Request

                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
