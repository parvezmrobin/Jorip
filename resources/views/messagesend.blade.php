@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <form class="form-horizontal" action="messegesend" method="post">
            <div class="form-group">
                <label for="nameemail" class="col-md-4 control-label">Name/Email</label>

                <div class="col-md-2">
                    <input id="nameemail" type="text" class="form-control" name="nameemail" >
                </div>
            </div>
            <div class="form-group">
                <label for="body" class="col-md-4 control-label">Message</label>
                <div class="col-md-4">
                    <textarea id="body" type="text" class="form-control" name="body" >
                        </textarea>
                </div>
            </div>

            <br>

            <div class="form-group">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>


        </form>


    </div>

</div>



@endsection
