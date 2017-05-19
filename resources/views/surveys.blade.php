@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($surveys as $var)

                <div class="alert alert-success">
                    <h3 href="#">{{$var->title}}<span class="label label-success" style="float:right">{{$var->points_per_response}}</span></h3>
                    <h5>{{$var->company->user->name}}</h5>
                </div>
            @endforeach
            {{$surveys->links()}}
        </div>
    </div>
@endsection
