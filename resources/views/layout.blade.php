<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

    <link href="{{asset("assets/css/animations.css")}}" rel="stylesheet" type="text/css">


</head>
{{--{{asset("assets/css/styles.e-commerce.css")}}--}}
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <a class="navbar-brand" href="#">
        <img src="{{asset("assets/images/ksu_logo.png")}}" width="150" height="57.625" class="d-inline-block align-top" alt="">
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/home')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://en.wikipedia.org/wiki/Diffie%E2%80%93Hellman_key_exchange">About Diffie Hellman</a>
            </li>
        </ul>
    </div>
</nav>
@yield('content')
</body>
</html>
