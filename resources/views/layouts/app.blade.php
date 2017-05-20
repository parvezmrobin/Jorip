<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@yield('style')

<!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <style >

        .list-inline li {
            margin: 0px;

            display: table-cell;
            text-align: center;
            width: 20%;
            font-size: xx-large;
        }
        body {
            padding-top: 100px;
        }



    </style>
</head>
<body>
<div id="app">
    <nav role="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header navbar-left pull-left">

            </div>
            <div class="navbar-header navbar-right pull-right">
                <ul class="nav pull-left list-inline ">
                    <li class="navbar-text pull-left"><a href="#"><span class="glyphicon glyphicon-envelope"></span></a></li>
                    <li class="navbar-text pull-left"><a href="{{url('survey_list')}}"><span class="glyphicon glyphicon-stats"></span></a></li>
                    <li class="navbar-text pull-left"><a href="#"><span class="glyphicon glyphicon-folder-open"></span></a></li>
                    <li class="navbar-text pull-left"><a href="{{url('survey/create')}}"><span class="glyphicon glyphicon-file"></span></a></li>
                    <li class="navbar-text pull-left">
                        <a href="#" data-toggle="collapse" data-target="#clps">
                            <span class="glyphicon glyphicon-th-list"></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="visible-xs-block clearfix"></div>
            <div class="collapse" id="clps">
                <ul class="nav navbar-nav navbar-left">

                    <li><a href="#">Profile</a></li>
                    <li><a href="{{url('payments')}}">Payment System</a></li>
                    <li><a href="#">Settings</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>

    <div class="container" >
        @yield('content')
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('script')
</body>
</html>
