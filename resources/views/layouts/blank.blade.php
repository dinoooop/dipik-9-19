<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates.head')
    <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/admin-responsive.css') }}" rel="stylesheet">
    @yield('head')
</head>

<body>

    @yield('content')

</body>

</html>