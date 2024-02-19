<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates.header')
    <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/admin-responsive.css') }}" rel="stylesheet">
    
</head>

<body>

    @yield('content')

</body>

</html>