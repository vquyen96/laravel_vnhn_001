<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <base href="{{ asset('local/resources/assets/') }}/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/">
    <link rel="stylesheet" type="text/css" href="css/header-footer.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/time.css">
    <link rel="stylesheet" href="css/all.css">

    {{-- <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css"> --}}
    @yield('css')
<!-- Styles -->
</head>
<body>
@include('client.layouts.header')
@yield('main')
@include('client.layouts.footer')
</body>

{{-- <script src="{{ asset('local/resources/assets/js/time.js') }}"></script> --}}
<script src="js/jquery-3.3.1.min.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/header-footer.js"></script>
@yield('script')
</html>
