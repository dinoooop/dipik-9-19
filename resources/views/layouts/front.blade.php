<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates.header')
    <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/columns.css') }}" rel="stylesheet">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YNZBHRFPDC"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-YNZBHRFPDC');
    </script>
    @yield('head')
    
</head>

<body>

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>