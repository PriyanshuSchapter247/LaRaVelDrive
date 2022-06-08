@extends('layouts.app')

@section('content')
    <style>
        .btn-block {
            margin-top: 15px;
        }


        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg:hover {
            opacity: 0.7;
        }

        /* The Modal (background) */
        .modal {
            /* display: none; */
            /* Hidden by default */
            /* position: fixed; */
            /* Stay in place */
            /* z-index: 1; */
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            /* left: 0; */
            /* top: 0; */
            /* width: 100%; */
            /* Full width */
            /* height: 100%; */
            /* Full height */
            /* overflow: auto; */
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9);
            /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 100%;
            /* max-width: 400px; */
            max-height: 500px;
        }

        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation */
        .modal-content,
        #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }

    </style>
    <div class="content-wrapper">


        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Share Image</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Share Image</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    {{--// For request Page--}}
    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
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
                            <div class="card-header">
                                <h3 class="card-title">Share Images Table</h3>


                            </div>

                        {{--// REQUEST  view form--}}
                        <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead style="text-align: center">
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Request From</th>
                                        {{-- <th>Share to</th> --}}
                                        {{-- <th>View</th> --}}
                                        <th>image</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody style="text-align: center">
                                    @foreach ($images as $image)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            {{-- <td>{{ $image->user->email }}</td> --}}
                                            <td>{{ $image->send_to }}</td>
{{--                                            <td><img type="hidden " id="myImg" src="public/images/images/{{ $image->send_image }}"--}}
{{--                                                     width="400px" height="70px" alt=" Shared Image"></td>--}}

{{--                        {{dd($image->image->image)}}--}}
                                            <td><img id="myImg" src=" {{asset("/images/images/".$image->image->image)}}"
                                                     width="400px" height="70px" alt=""></td>

                                            <td><a href="/changestatus/{{ $image->id }}"><i
                                                        class="btn btn-block btn-outline-success"
                                                        data-feather="edit">Accept</i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>


                        </div>


                    </div>

                </div>
            </div>

        </section>


    </div>

@endsection
