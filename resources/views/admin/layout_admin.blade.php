<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>
<body>
<main class="container">
    @yield('content')
</main>
@yield('scripts')
</body>
</html>
