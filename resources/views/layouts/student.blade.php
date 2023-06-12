<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('sub-title') | {{ trans('panel.site_title') }}</title>
    <!-- Custom styles -->
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/marketplace/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/marketplace/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    @yield('styles')
</head>

    <body id="page-top">
        @include('partials.student.navbar')
        @yield('content')
        <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('assets/js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('assets/js/demo/chart-pie-demo.js') }}"></script>
       
        <script src="https://kit.fontawesome.com/2888840f77.js" crossorigin="anonymous"></script>

        <script src="{{ asset('assets/marketplace/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/marketplace/js/jquery.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
       
        
        @yield('scripts')
        
    </body>
</html>