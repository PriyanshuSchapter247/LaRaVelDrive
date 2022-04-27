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
                                    <h2 class="featurette-heading">Image View<span class="text-muted"></span></h2>
                                </center>
                            </div>
{{--                            @if($image->created_by == auth()->user()->id)--}}


{{--                                <div class="col-md-12" >--}}
{{--                                    <center> <img style="height:10%; width:10%" src={{ asset('images/images/' . $image->image) }} alt=""></center>--}}
{{--                                </div>--}}


{{--                                <div class="col-md-6 mt-6" style="margin-left:25%; background-color:darkolivegreen">--}}
{{--                                    <td>--}}
{{--                                        <input type="text"  class="form-control" onclick="this.select()" value="{{asset('images/images/'.$image->image)}}" />--}}
{{--                                    </td>--}}
{{--                                </div>--}}

                            @if($share->send_to == auth()->user()->email || $share->send_from == auth()->user()->email)

                                <div class="col-md-12" >
                                    <center> <img style="height:10%; width:10%" src={{ asset('images/images/' . $image->image) }} alt=""></center>
                                </div>


                                <div class="col-md-6 mt-6" style="margin-left:25%; background-color:darkolivegreen">
                                    <td>
                                        <input type="text"  class="form-control" onclick="this.select()" value="{{asset('images/images/'.$image->image)}}" />
                                    </td>
                                </div>

                                @if (Auth::user()->id == $image->created_by)
                                    <div class="col-md-12 mt-2">
                                        <a href="/shareview/{{ $image->id }}"><i class="btn btn-block btn-outline-info"
                                                                                 data-feather="edit">Share</i></a>
                                    </div>
                                @endif


                            @else
                                <div class="col-md-12 mt-3">
                                    <center>
                                        <h4><b> Not Allow by Owner.Plese send Request</b></h4>
                                    </center>
                                    <a href="/request/{{ $image->id }}"><i class="btn btn-block btn-outline-info"
                                            data-feather="edit">Request</i></a>
                                </div>

                            @endif
{{--                                @endif--}}




                        </div>
                    </div>
                    <!-- /.col -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.              content -->
    </div>
@endsection
