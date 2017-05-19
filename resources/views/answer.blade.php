@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form class="form-horizontal" action="response" method="post">
                <h2>{{$survey->title}}</h2>
                <h4>{{$survey->description}}</h4>
                @foreach($survey->questions as $question)
                <h5>{{$question->title}}</h5>
                <h6>{{$question->description}}</h6>


                @if($question->type->id == 1)
                <div class="form-group">
                    <input id="stext" type="text" class="form-control" name="{{$question->id}}" required>
                </div>


                @elseif($question->type->id == 2)
                <div class="form-group">
                    <textarea id="body" type="text" class="form-control" name="{{$question->id}}" required>
                    </textarea>
                </div>

                @elseif($question->type->id == 3)
                @foreach($question->options as $option)
                <div class="radio">
                    <label><input type="radio" class="form-control" name="{{$question->id}}">{{$option->option}}</label>
                </div>
                @endforeach

                @elseif($question->type->id == 4)
                <div class="form-group">
                    @foreach($question->options as $option)
                    <div class="checkbox">
                        <label><input type="checkbox" class="form-control" name="{{$question->id}}">{{$option->option}}</label>
                    </div>
                    @endforeach
                </div>
                @endif


                @endforeach

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" style="float:right">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
