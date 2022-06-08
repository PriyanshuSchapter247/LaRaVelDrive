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
{{--                            {{dd(auth()->user()->id)}}--}}




                            @if(isset($share->send_to) && $share->send_to == auth()->user()->id)
{{--                                                                @if($image)--}}
                                                                    <div class="col-md-12">
                                                                        <center>
                                                                            <img style="height:10%; width:10%"
                                                                                 src={{ asset('images/images/'. $image->image) }} alt="">
                                                                        </center>
                                                                    </div>
                                                                    <div class="col-md-6 mt-6" style="margin-left:25%; background-color:darkolivegreen">
                                                                        <td>
                                                                            <input type="text" class="form-control" onclick="this.select()"
                                                                                   value="{{asset('images/images/'.$image->image)}}"/>
                                                                        </td>
                                                                    </div>
{{--                                                                @elseif(empty($image))--}}
{{--                                                                    <div class="card" style="width: 18rem; margin-left: 37%; margin-top:10%">--}}
{{--                                                                        <div class="card-body">--}}
{{--                                                                            <h1 class="card-title" style="margin-left: 40%;">--}}
{{--                                                                                !OOPS--}}
{{--                                                                            </h1>--}}
{{--                                                                            <p class="card-text" style="margin-left: 17%;">--}}
{{--                                                                                Owner is delete this image--}}
{{--                                                                            </p>--}}

{{--                                                                            <a href="{{route('home')}}" style="margin-left: 37%;"--}}
{{--                                                                               class="btn btn-primary">--}}
{{--                                                                                Home--}}
{{--                                                                            </a>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                @endif--}}

{{--{{dd($image)}}--}}
                            @elseif((isset($image) && $image->created_by == auth()->user()->id))
                                    <div class="col-md-12">
                                        <center>
                                            <img style="height:10%; width:10%"
                                                 src={{ asset('images/images/' . $image->image) }} alt="">
                                        </center>
                                    </div>
                                    <div class="col-md-6 mt-6" style="margin-left:25%; background-color:darkolivegreen">
                                        <td>
                                            <input type="text" class="form-control" onclick="this.select()"
                                                   value="{{asset('images/images/'.$image->image)}}"/>
                                        </td>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <a href="/shareview/{{ $image->id }}">
                                            <i class="btn btn-block btn-outline-info"
                                               data-feather="edit">
                                                Share
                                            </i>
                                        </a>
                                    </div>

                            @else
                                <div class="col-md-12 mt-3">
                                    <center>
                                        <h4>
                                            <b>
                                                Not Allow by Owner.Plese send Request
                                            </b>
                                        </h4>
                                    </center>

{{--                                    {{dd($image->id)}}--}}
                                    <a href="/request/{{ $image->id }}">
                                        <i class="btn btn-block btn-outline-info"
                                           data-feather="edit">
                                            Request
                                        </i>
                                    </a>
                                </div>

                            @endif
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.              content -->
    </div>
@endsection
