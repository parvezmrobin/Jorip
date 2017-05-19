@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(isset($alert))
                <div class="alert alert-info alert-dismissable">
                    {{$alert}}
                </div>
            @endif
            @foreach($surveys as $var)
                <div  class="alert alert-info">
                <a href="./survey/{{$var->id}}">
                    <h3 >{{$var->title}}<span class="label label-primary" style="float:right">{{$var->points_per_response}}</span></h3>
                    <h5>{{$var->company->user->name}}</h5>
                </a>
            </div>
            @endforeach
            {{$surveys->links()}}
        </div>
    </div>
@endsection
