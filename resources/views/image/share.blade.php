@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Image Share</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Url</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid" style=" margin-left: 330px" >
                <div class="row">
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Image Share</h3>
                                {{-- <a href="/show" class="btn btn-outline-primary" style="float: right">List</a> --}}
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="/share">
                                @csrf
                                <div class="card-body" >
                                    <div class="form-group">
                                        {{-- <label for="exampleInputFile">Share Image</label> --}}
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Share to</label>
                                            <select class="custom-select form-control-border" name="send_to"
                                                id="exampleSelectBorder">
                                                <option value="Select">Select Users</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id}}">{{ $user->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Image</label>
                                            <input type="text" name="send_image" value="{{ $image->image }}"
                                                class="form-control" id="exampleInputEmail1" placeholder="Image">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Url</label>
                                            <input type="text" name="url" value="{{ asset('view/'. $image['id']) }}"
                                                class="form-control" id="exampleInputEmail1" placeholder="Image">
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <center> <button type="submit" name="submit" class="btn btn-primary">Share</button>
                                    </center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
