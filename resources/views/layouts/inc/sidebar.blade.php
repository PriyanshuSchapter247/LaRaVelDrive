<!-- For Right Direction-->
{{--<marquee width="60%" direction="right" height="100px"></marquee>--}}
<!-- For Left Direction-->
{{--<marquee width="60%" direction="left" height="100px"></marquee>--}}

<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:lightslategray;">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
        {{--        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
        {{--            style="opacity: .8">--}}
{{--        <span class="brand-text font-weight-light text-center" style="color:black; display: inline-block">  <b>MiNI Drive </b></span>--}}
        <h1 class="ml6">
  <span class="text-wrapper">
    <span class="letters">MiNI Drive</span>
  </span>
        </h1>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="/images/logo.png" class="img-circle elevation-2" alt="User Image">
                        </div>
            <div class="info">
                <span style="color:black; display:inline-block"
                      class="d-block text-center">{{ Auth()->user()->name }}</span>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="/image_add" class="nav-link">
                        <i class="fa fa-plus nav-icon" style="color:black;"></i>
                        <p style="color:black;">Add</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/show" class="nav-link">
                        <i class="fa fa-list nav-icon" style="color:black;"></i>
                        <p style="color:black;">List</p>
                    </a>
                </li>

                {{--                    </ul>--}}
                </li>
                <li class="nav-item">
                    <a href="/sharelist" class="nav-link">
                        <i class="nav-icon fas fa-share" style="color:black;"></i>
                        <p style="color:black;">share

                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/requestlist" class="nav-link">
                        <i class="nav-icon fas fa-list" style="color:black;"></i>
                        <p style="color:black;">Request

                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('image.index', ['view_deleted' => 'DeletedRecords']) }}" class="nav-link">
                        <i class="nav-icon fas fa-list" style="color:black;"></i>
                        <p style="color:black;">Trash
                        </p>
                    </a>
                </li>



{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('notedetails')}}" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-list" style="color:black;"></i>--}}
{{--                        <p style="color:black;">Notes--}}

{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}


                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Notes
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <a  href="{{ route('notes.show')}}" class="dropdown-item" style="color:black" type="button">view notes</a>
                        <a href="{{ route('add.category')}}" class="dropdown-item" style="color:black" type="button"> add category</a>
                        <a href="{{ route('add.notes')}}" class="dropdown-item" style="color:black" type="button"> add notes</a>
                    </div>



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
