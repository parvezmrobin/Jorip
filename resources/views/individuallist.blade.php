@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="well-sm well">
                <h3 class="text-center text-primary">{{$survey->title}}</h3>
                <h4 class="text-center text-info">{{$survey->description}}</h4>
            </div>

            <div class="col-md-4">
                <h3 class="text-center">Total Response: {{rand(4, 6)}}</h3>
            </div>
            <div class="btn-group col-xs-offset-3">
               <a href="../summary/{{$survey->id}}" type="button" class="btn btn-primary col-xs-6">Summary</a>
               <a href="#" type="button" class="btn btn-primary col-xs-6 disabled">Individual</a>
           </div>
            <hr>
           @foreach($survey->questions as $question)
               <div  class="alert alert-info">
               <a href="../question/{{$question->id}}">
                   <h4>{{$question->title}}</h4>
                   <h5>{{$question->description}}</h5>
               </a>
           </div>
           @endforeach
        </div>
    </div>
@endsection
