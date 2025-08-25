<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- CSS
 ============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('newcss/bootstrap.min.css') }}">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('newcss/icons.min.css') }}">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('newcss/plugins.css') }}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('newcss/style.css') }}">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @yield('css')
</head>

<body>
    @include('front.layout.navbar')
    @yield('content')
    @include('front.layout.footer')



    <!-- JS
============================================ -->

    <!-- jQuery JS -->
    <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Plugins JS -->
    <script src="{{ asset('js/plugins.js') }}"></script>

    <!-- Ajax Mail -->
    <script src="{{ asset('js/ajax-mail.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- Modernizer JS -->
    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzcEM8z2_imGO8TMRmJEpDEahvZ7KYY_U"></script>

    @yield('js')
</body>

</html>
