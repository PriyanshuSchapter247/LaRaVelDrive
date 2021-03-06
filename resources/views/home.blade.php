@extends('layouts.app')

@section('content')
    {{--    <script type="text/javascript">--}}
    {{--        window.loading_screen = window.pleaseWait({--}}
    {{--            logo: "/images/logo.svg",--}}
    {{--            backgroundColor: '#ffffff',--}}
    {{--            loadingHtml: 'Add html here'--}}
    {{--        });--}}
    {{--    </script>--}}
    {{--    <script>window.loading_screen.finish();</script>--}}
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-right">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            {{--// DashBoard Page--}}
        </div>
        <div class="col-md-12">
            <div class="card">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible" style="width:30%;height:3% ;margin-left:35%">
                        <p>{{ $message }}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif ($message = Session::get('danger'))
                    <div class="alert alert-danger alert-dismissible" style="width:30%;height:3% ;margin-left:35%">
                        <p>{{ $message }}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>

        <div class="col-lg-12 col-12" style="background-color:lightblue; font-size:20px;">
            {{--            <div class="image">--}}
            {{--                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">--}}
            {{--            </div>--}}
            <div class="info">
                <p href="#" class="d-block" style="margin-left: 35%;">Welcome to MiNI
                    Drive {{ Auth()->user()->name }}</p>
            </div>
        </div>


        <!-- <div class="col-lg-12 col-12" style="background-color:lightblue;">
            <!-- small box -->
        <!-- <div class="small-box ">
            <!-- <div class="inner"> -->
        <!-- <h3>View</h3> -->

        <!-- <p>Images</p> -->
        <!-- </div> -->
        <!-- <div class="icon"> -->
        <!-- <i class="fas fa-list"></i> -->
        <!-- </div> -->
        <!-- <a href="/show" class="small-box-footer"><i class="fas fa-list"></i></a> -->
        <!-- </div> -->
        <!-- </div> -->

@endsection
