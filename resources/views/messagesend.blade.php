@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <form class="form-horizontal" action="messegesend" method="post">
            <div class="form-group">
                <label for="nameemail" class="col-md-4 ">Name/Email</label>

                <div class="col-md-4 ">
                    <textarea name="name/mail" class="form-control" rows="1" cols="35" >parvezmrobin@gmail.com</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="body" class="col-md-4  ">Message</label>
                <div class="col-md-4 ">
                    <textarea name="name/mail" rows="8" class="form-control" cols="35" >This is a demo mail. Company can email any user if they wish to contact with him/her personally</textarea>
                </div>
            </div>

            <br>

            <div class="form-group">
                <div class="col-md-6 ">
                    <button type="submit" class="btn btn-primary">
                        Sent
                    </button>
                </div>
            </div>


        </form>


    </div>

</div>



@endsection
