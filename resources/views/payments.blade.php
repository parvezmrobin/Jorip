@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="form-group">
            <label for="" class="control-label col-md-4"><strong>Total Points: {{App\Respondent::find(Auth::id())->points}}</strong></label>
        </div>

        <div class="col-xs-12 form-group">
            <button type="button" class="btn btn-info col-xs-6 col-xs-offset-3 " data-toggle="collapse" data-target="#buypoints">Buy Points</button>
        </div>

        <div id="buypoints" class="collapse">
            <div class="well" >
                <div class="form-group">
                    <label for="package" class="col-md-4 control-label">Package</label>

                    <div class="col-md-6">
                        <input id="package" type="text" class="form-control" name="package" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="bkashid" class="col-md-4 control-label">Bkash TRX Id</label>

                    <div class="col-md-6">
                        <input id="bkashid" type="number" class="form-control" name="bkashid" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" style="float:right">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 form-group">
            <button type="button" class="btn btn-info col-xs-6 col-xs-offset-3 " data-toggle="collapse" data-target="#recharge">Mobile Recharge</button>
        </div>
        <div id="recharge" class="collapse">
            <div class="well">
                <div class="form-group">
                    <label for="" class="control-label col-md-4"><strong>Total Points:</strong></label>
                </div>
                <div class="form-group">
                    <label for="phonenumber" class="col-md-4 control-label">Mobile Number</label>
                    <div class="col-md-6">
                        <input id="mobilenumber" type="number" class="form-control" name="mobilenumber" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" style="float:right">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 form-group">
            <button type="button" class="btn btn-info col-xs-6 col-xs-offset-3 " data-toggle="collapse" data-target="#cashout">Cash Out</button>
        </div>
        <div id="cashout" class="collapse">
            <div class="well">

                <div class="form-group">
                    <div class="form-group">
                        <label for="" class="control-label col-md-4"><strong>Total Points:</strong></label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cashout" class="col-md-4 control-label">Bkash Number</label>

                    <div class="col-md-6">
                        <input id="cashout" type="number" class="form-control" name="cashout" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" style="float:right">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>



    </div>

</div>

@endsection
