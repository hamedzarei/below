<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>below - @yield('title')</title>
    <link rel="icon" href="{{ asset("image/logo3.png") }}" type="image/png" sizes="16x16">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("css/bootstrap-reboot.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/bootstrap-grid.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/toastr.min.css") }}">
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        header {
            background: rgba(143, 199, 66, 0.4);
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
    @yield('style')
</head>
<body>
{{--<header>--}}
    {{--<div class="container-fluid">--}}
        {{--<div class="row">--}}
            {{--<div class="col-sm-2">--}}
                {{--<img src="{{ asset("image/logo3.png") }}" alt="">--}}
            {{--</div>--}}
            {{--<div class="col-sm-10">--}}
                {{--<div class="title content">--}}
                    {{--Welcome to below App--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}
{{--</header>--}}
@section('sidebar')

@show

<div class="container-fluid">
    @yield('content')
</div>

</body>
<script src="{{ asset("js/jquery-3.4.1.min.js") }}"></script>
<script src="{{ asset("js/popper.min.js") }}"></script>
<script src="{{ asset("js/bootstrap.min.js") }}"></script>
<script src="{{ asset("js/toastr.min.js") }}"></script>
@yield('script')
</html>