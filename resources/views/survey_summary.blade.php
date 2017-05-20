@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="well-sm well">
                <h3 class="text-center text-primary">{{$survey->title}}</h3>
                <h4 class="text-center text-info">{{$survey->description}}</h4>
            </div>

            <div class="col-md-4">
                <h3 class="text-center">Total Response: {{rand(4, 6)}}</h3>
            </div>
            <div class="btn-group col-xs-offset-3">
                <a href="#" type="button" class="btn btn-primary col-xs-6 disabled">Summary</a>
                <a href="../stat/{{$survey->id}}" type="button" class="btn btn-primary col-xs-6">Individual</a>
            </div>
            <br>
            <br>
            @foreach($questions as $question)
                <div class="well">
                    <h4>{{$question->title}}</h4>
                    <canvas id="crt{{$question->id}}" width="400" height="400"></canvas>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        var ctx, data;
        @foreach($questions as $question)
            ctx = document.getElementById("crt{{$question->id}}");
            data = {
                labels: {!! json_encode($question->responses->map(function ($item){return $item->option;})->all()) !!},
                datasets: [{
                    data: {{json_encode($question->responses->map(function ($item){return $item->response_count;})->all())}},
                    backgroundColor: [
                        "#FF6384",
                        "#36A2EB",
                        "#FFCE56",
                        "#8bc34a"
                    ],
                    hoverBackgroundColor: [
                        "#FF3242",
                        "#1850EB",
                        "#FF6228",
                        "#48c325"
                    ]
                }]
            };
            new Chart(ctx,{
                type: 'pie',
                data: data
            });
        @endforeach
    </script>
@endsection
