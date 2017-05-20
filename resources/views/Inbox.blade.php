@extends('layouts.app')

@section('style')
<style media="screen">

</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <h2 class="col-xs-offset-3">Messages</h2>
        <div  class="alert alert-info">
            <a href="./msgdetails"><h3 >Shahriar Shuvo</h3>
            <h5>Hello Oishie?how are you doing??.....</h5></a>



        </div>
        <div  class="alert alert-info">
            <a href="./msgdetails"><h3 >Parvez M. Robin</h3>
            <h5>Hey! Have you checked the new...</h5></a>



        </div>
        <div  class="alert alert-info">
            <a href="./msgdetails"><h3 >Sumaya</h3>
            <h5>Where are you? I am calling you...</h5>"></a>



        </div>
        <div class="form-group">
            <div class="col-md-6 ">

                <a href="./message" class="btn btn-primary " style="float:right"  >
                    <span class="glyphicon glyphicon-plus-sign"></span>
                </a>
            </div>
        </div>




    </div>
</div>
@endsection
