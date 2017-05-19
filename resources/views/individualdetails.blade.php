@extends('layouts.app')

@section('style')
    <style>
        .label{
            margin-bottom: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div  class="alert alert-info">
                <h3>{{$question->title}}</h3>
            </div>
            <div class="list-group col-xs-12">
                @if($question->type->id < 3)
                    @foreach($question->responses as $response)
                        <div class="list-group-item">
                            {{$response->response}}
                            <span class="label label-info" style="float: right;">
                                {{$response->respondent->user->name}}
                            </span>
                        </div>
                    @endforeach
                @else
                    @foreach($question->responses as $response)
                        <div class="list-group-item">
                            {{$response->question->options()->where('id', $response->response)->first()->option}}
                            <span class="label label-info" style="float: right;">
                                {{$response->respondent->user->name}}
                            </span>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection