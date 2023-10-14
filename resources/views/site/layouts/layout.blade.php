<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title }}</title>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">
    @stack('css')
</head>

<body>
    @include('site.layouts.partials.navbar')

    {{ $slot }}


    @include('site.layouts.partials.footer')

    <!-- JS Scripts-->
    <script src="{{asset('assets/site/js/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('assets/site/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/site/js/main.js')}}"></script>
    @stack('js')

</body>
</html>