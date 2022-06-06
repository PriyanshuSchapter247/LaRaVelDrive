@extends('layouts.app')
@section('content')


    {{--            <div class="container" >--}}
    {{--                <div class="row">--}}
    {{--                    <div class="col-md-12" style="border:2px solid black; border-radius:30px 0 20px 0; box-shadow: 3px 5px 5px 15px lightslategray;)">--}}
    {{--                        <div class="row featurette" >--}}
    {{--                            <div class="col-md-12 mt-5 ">--}}
    {{--                                <center>--}}
    {{--                                    <h2 class="featurette-heading">Notes View<span class="text-muted" ></span></h2>--}}
    {{--                                </center>--}}
    {{--                                <div>--}}
    {{--                                    {{dd($notes->image)}}--}}
    {{--                                    <img src="{{asset('/images/banner/'.$notes->image)}}" style="margin-left: 46%; border-radius:30px 30px 30px 30px; width:10%; height:5%"--}}
    {{--                                         class="img-fluid" alt="...">--}}
    {{--                                </div>--}}
    {{--                                <hr>--}}
    {{--                                <div style="text-align:center">--}}
    {{--                                    <tr>--}}
    {{--                                        <td><h1>{{$notes->name}}</h1></td>--}}
    {{--                                    </tr>--}}
    {{--                                </div>--}}
    {{--                                <hr>--}}
    {{--                                <div style="text-align:center">--}}
    {{--                                    <tr>--}}
    {{--                                        <td><h3>{{$notes->notes}}</h3></td>--}}
    {{--                                    </tr>--}}
    {{--                                </div>--}}
    {{--                                <hr>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    <div class="content-wrapper">
        <section class="content">

            <div class="container">
{{--                @foreach($notes as $note)--}}
                <div class="row">
                        <div class="col-lg-4">
                            <div class="card" >
                                <div class="card-header" style="margin-left: 70px">
                                    {{--         {{dd($notes->image)}}--}}
                                    <img src="{{asset('/images/banner/'.$notes->image)}}" style=""
                                         class="img-fluid" alt="...">

                                </div>
                                <div class="card-body" style="text-align:center">
                                    <span class="tag tag-teal">{{$notes->name}}</span>
                                    <h5>
                                        <div class="user">
                                            <div class="user-info">
                                                <h5>{{$notes->notes}}</h5>
                                            </div>
                                        </div>
                                    </h5>
                                </div>
                            </div>
                        </div>

                </div>
{{--                @endforeach--}}
            </div>

    </section>
    </div>





@endsection
