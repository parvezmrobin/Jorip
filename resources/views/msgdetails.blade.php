@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form class="form-horizontal" action="messegesend" method="post">
            <div class="form-group">
                <label for="nameemail" class="col-md-4 ">Sender</label>

                <div class="col-md-4 ">
                    <div class="well">
                        Shahriyar Shuvo
                    </div>

            </div>
            <div class="col-md-4  ">
            <div class="form-group">
                <label for="body" class="col-md-4  ">Message</label>
                    <div class="col-md-4  ">
                    <div class="well">
                        Hello Oishie! How are you doing? I need to inform you some important things, when you will be free?
                    </div>
                </div>

                </div>
            </div>

            <br>



        </form>


    </div>

</div>


@endsection
