@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($messages as $var)
                <div  class="alert alert-info">
                <a href="#">
                    <h3 >{{$var->name}}</h3>
                    <h5>{{<?php echo substr($var->body,30);?>}}</h5>

                </a>
            </div>
            @endforeach

        </div>
    </div>
@endsection
