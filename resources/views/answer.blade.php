@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form class="" action="response" method="post">


                <h2>{{$survey->title}}</h2>
                <h4>{{$survey->description}}</h4>
                @foreach($survey->questions as $question)
                <div class="well">
                    <h5>{{$question->title}}</h5>
                    <h6>{{$question->description}}</h6>

                    @if($question->type->id == 1)

                    <div class="form-horizontal">
                        <div class="form-group">
                            <input id="stext" type="text" class="form-control" name="{{$question->id}}" required >
                        </div>
                    </div>


                    @elseif($question->type->id == 2)

                    <div class="form-horizontal">
                        <div class="form-group">
                            <textarea id="body" type="text" class="form-control" name="{{$question->id}}" required>
                            </textarea>
                        </div>
                    </div>



                    @elseif($question->type->id == 3)


                    @foreach($question->options as $option)

                    <div class="radio">
                        <label><input type="radio"  name="{{$question->id}}">{{$option->option}}</label>
                    </div>
                    @endforeach

                    @elseif($question->type->id == 4)
                        
                        @foreach($question->options as $option)

                        <div class="checkbox">
                            <label><input type="checkbox"  name="{{$question->id}}">{{$option->option}}</label>
                        </div>
                        @endforeach

                    @endif
                </div>


                @endforeach

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" style="float:right">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
