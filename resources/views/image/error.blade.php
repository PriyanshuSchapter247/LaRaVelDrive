@extends('layouts.app')
@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row featurette">
                            <div class="col-md-12 mt-5 ">
                                <center>
                                    <h2 class="featurette-heading">
                                        Image View
                                        <span
                                            class="text-muted">
                                        </span>
                                    </h2>
                                </center>
                            </div>
                            <div class="card" style="width: 18rem; margin-left: 37%; margin-top:10%">
                                <div class="card-body">
                                    <h1 class="card-title" style="margin-left: 40%;">
                                        !OOPS
                                    </h1>
                                    <p class="card-text" style="margin-left: 17%;">
                                        Owner is delete this image
                                    </p>

                                    <a href="{{route('home')}}" style="margin-left: 37%;"
                                       class="btn btn-primary">
                                        Home
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.              content -->
    </div>
@endsection
