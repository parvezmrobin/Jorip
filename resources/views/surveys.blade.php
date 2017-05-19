@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($surveys as $var)

            <div class="alert alert-success">

                <h2 href="#">{{$var->name}}<span class="label label-success" style="float:right">{{$var->point}}</span></h2>

                <h4>{{$var->company}}</h4>


            @endforeach
        </div>
</div>






@endsection
