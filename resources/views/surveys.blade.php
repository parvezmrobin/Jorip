@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($surveys as $var)

                <div class="alert alert-success">
                    <h2 href="#">{{$var->title}}<span class="label label-success" style="float:right">{{$var->points_per_response}}</span></h2>
                    <h4>{{$var->company->user->name}}</h4>
                </div>
            @endforeach
        </div>
    </div>
@endsection
