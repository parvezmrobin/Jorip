@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">

            <h2>{{$survey->title}}</h2>
            <h4>{{$survey->description}}</h4>
            <form class="" action="../response" method="post">
                {{csrf_field()}}
                @foreach($survey->questions as $question)
                <div class="well">
                    <h5>{{$question->title}}</h5>
                    <h6>{{$question->description}}</h6>
                    @if($question->type->id == 1)


                            <input type="text" class="form-control" name="{{$question->id}}" required >

                    @elseif($question->type->id == 2)
                        <textarea type="text" class="form-control" name="{{$question->id}}" required></textarea>
                    @elseif($question->type->id == 3)


                    @foreach($question->options as $option)


                        <label><input type="radio" value="{{$option->id}}" name="{{$question->id}}">{{$option->option}}</label><br>

                    @endforeach

                    @elseif($question->type->id == 4)
                        
                        @foreach($question->options as $option)


                            <label><input type="checkbox" value="{{$option->id}}" name="{{$question->id}}[]">{{$option->option}}</label><br>

                        @endforeach

                    @endif
                </div>


                @endforeach
                    <input value="Submit" type="submit" class="btn btn-primary" style="float:right">

            </form>
        </div>

    </div>
</div>
@endsection
