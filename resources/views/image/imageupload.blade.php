@extends('layouts.app')

@section('content')
    <div class="content-wrapper">


        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Images</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Add Image</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Add Images</h3>
                                <a href="/show" class="btn btn-outline-primary" style="float: right">List</a>

                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="/store" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        {{--                                        @if($errors->any())--}}
                                        <label for="exampleInputFile">Image</label>
                                        @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        {{--                                        @endif--}}
                                        <div class="input-group">
                                            <div class="custom-file">

                                                <input type="file" name="image" id="exampleInputFile" multiple>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    {{--                                    <div class="input-group-btn">--}}
                                    <center>
                                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                    </center>
                                </div>
                                {{--                                </div>--}}
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->


    </div>
@endsection
