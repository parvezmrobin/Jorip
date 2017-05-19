@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">

        <div  class="alert alert-info">
            <h3>{{$question->title}}</h3>
        </div>
        <div class="list-group col-xs-9">
            @foreach($question->responses as $response)
            <div>
                <div class="col-xs-9">
                    {{$response->response}}

                </div>
                <div class="col-xs-3">
                    {{$response->respondent->user->name}}

                </div>


            </div>
            @endforeach
        </div>


    </div>











    @endsection
