@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-4 col-xs-offset-1">
                <h3>Total Response: </h3>
            </div>
            <div class="btn-group col-xs-offset-3">
               <button type="button" class="btn btn-primary col-xs-6">Summmary</button>
               <button type="button" class="btn btn-primary col-xs-6">Individual</button>

           </div>
           @foreach($users as $var)
               <div  class="alert alert-info">
               <a href="#">

                   <h5>{{$var->name}}</h5>
               </a>
           </div>
           @endforeach
        </div>
    </div>
@endsection