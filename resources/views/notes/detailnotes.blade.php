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

    {{--// IMage view page--}}

    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Notes Table</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <p>{{ $message }}</p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @elseif ($message = Session::get('danger'))
                                <div class="alert alert-danger alert-dismissible">
                                    <p>{{ $message }}</p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="card-header">
                                <h3 class="card-title">Notes Table</h3>

                                <a href="/add" class="btn btn-outline-secondary" style="float: right">Add</a>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead style="text-align: center">
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>name</th>
                                        <th>Category</th>
                                        <th>Notes</th>
                                        <th>image</th>
                                        <th>view</th>
                                        <th>edit</th>
                                        <th>Delete</th>

                                    </tr>
                                    </thead>

                                    {{--
                                                                        @if (!empty($image)) --}}
                                    {{--                                                                        {{dd($notes)}}--}}
                                    <tbody style="text-align: center">

                                    @foreach ($notes as $note)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{$note->name}}</td>
                                            <td>{{$note->categoryName->name}}</td>
                                            <td>{{$note->notes}}</td>
                                            <td><a href="/view/{{$note->id }}"><img id="myImg"
                                                                                    src="{{asset('/images/banner/'.$note->image)}}"
                                                                                    width="200px"
                                                                                    height="70px" alt=""></a></td>


                                            {{----}}
                                            <td><a href="/view/{{ $note->id }}"><i
                                                        class="btn btn-block btn-outline-primary"
                                                        data-feather="edit">view</i></a></td>

                                            <td><a href="{{route('edit.notes', $note->id)}}"><i
                                                        class="btn btn-block btn-outline-primary"
                                                        data-feather="edit">edit</i></a></td>
                                            {{----}}
                                            <td><a href="/notes_delete/{{ $note->id }}"><i
                                                        class="btn btn-block btn-outline-danger"
                                                        data-feather="edit">Delete</i></a></td>
                                            {{----}}
                                            {{----}}
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>

                            <!-- /.card-body -->
                        </div>


                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->


    </div>

@endsection
