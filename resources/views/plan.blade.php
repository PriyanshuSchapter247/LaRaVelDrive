@extends('layouts.app')
@section('content')


    @foreach($plans as $plan)
        @csrf
        {{--        {{dd($plan)}}--}}
        {{--        //Subcription  Page--}}
        <div Style="margin-top:4%; margin-left:25%">
            <div class="card" style="width: 20rem; float:left;">
                <div class="card-body">
                    <ul class="card-title" style="text-align: center;"><h3>Subcription {{$plan->id}}</h3></ul>
                    <p class="card-text" style="text-align: center;">You have uploade only {{$plan->limit}} image</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item" style="text-align: center;"><h1>{{$plan->name}}</h1></li>
                    <li class="list-group-item" style="text-align: center;">Price->{{$plan->cost}}</li>
                </ul>
                <div class="card-body" style="text-align: center;">

                    <li class="list-group-item" style="text-align: center; display:none;">{{$plan->id}}</li>

                    <a type="button" href="/subscription/{{$plan->id}}" class="btn btn-info">Select</a>

                </div>
            </div>


        </div>


    @endforeach
@endsection
