@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="progress">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
  aria-valuemin="0" aria-valuemax="100" style="width:40%">
    % Complete
  </div>
</div>


    <div class="col-md-12">

     <h4>This is a text input question</h4>
     <input id="stext" type="text" class="form-control" name="stext"  maxlength="60" required autofocus>

    </div>
    <div class="col-md-12">

     <h4>Large Text input question</h4>
     <input id="ltext" type="text" class="form-control" name="ltext"  required >

  </div>
  <div class="col-md-12">
   @if(questions->type->id == 3)
        <h5>Multiple Question</h5>
        foreach($questions as $var)
        <div class="radio">
        <label><input type="radio" name="optradio">{{$var->type}}</label>
    </div>
        @endforeach
    @else if(questions->type->id == 4)
        <h5>Check Box Question</h5>
        foreach($questions as $var)
        <div class="checkbox">
        <label><input type="checkbox" value="">{{$var->type}}</label>
        </div>
        @endforeach
    @endif

</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" style="float right">
            Submit
        </button>
    </div>
</div>



  </div>

</div>


@endsection
