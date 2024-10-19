<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="shortcut icon"
        href="{{ url('/assets/compiled/images/logo.jpeg') }}"
        type="image/x-icon">



    <link rel="stylesheet" crossorigin href="{{ url('assets/compiled/css/app.css') }}">
    <link rel="stylesheet" crossorigin href="{{ url('assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" crossorigin href="{{url('assets/compiled/css/iconly.css') }}">
</head>

<body>
    <script src="{{ url('assets/static/js/initTheme.js') }}"></script>
    <div id="app">
     
        @yield('content')
        
    </div>
    <script src="{{ url('assets/static/js/components/dark.js') }}"></script>
    <script src="{{ url('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>


    <script src="{{ url('assets/compiled/js/app.js')}}"></script>



</body>

</html>
