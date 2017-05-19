@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h1>Payment System</h1>


        </div>
        <form class="form-horizontal" action="companypoints" method="post">
            <div class="form-group">
                <label for="points" class="col-md-4 control-label">How much points you want to give?</label>

                <div class="col-md-6">
                    <input id="points" type="number" class="form-control" name="points" >
                </div>
            </div>
            <div class="form-group">
                <label for="pointspresponse" class="col-md-4 control-label">Points/Response</label>

                <div class="col-md-6">
                    <input id="pointspresponse" type="number" class="form-control" name="pointspresponse" >
                </div>
            </div>
            <div>
                <h4>You would like to get a total</h4>

            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>


        </form>

    </div>

</div>




@endsection
