@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        @foreach($sueveys as $survey)
        <div class="alert alert-info">
            <a href="../summary/{{$survey->id}}">
                <h3 >{{$survey->title}}<span class="label label-primary" style="float:right">{{$survey->points_per_response}}</span></h3>
                <h5>{{$survey->description}}</h5>
            </a>
        </div>
        @endforeach

    </div>

</div>

@endsection
