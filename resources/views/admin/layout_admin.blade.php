<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>
<main>
    <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12 paddingFix backgroundNav">
        <nav>
            <ul>
                <li>Dashboard</li>
                <li class="liNavBar">
                    <div class="form-wrapper">
                        <input type="text" name="searchBar" placeholder="Search">
                        <div class="underline"></div>
                        <button>
                            <img src="magnifying-glass.png" alt="">
                        </button>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
    <div class="col-xs-2 col-md-2 col-lg-2 col-xl-2 backgroundNavAside paddingFix">
        <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12 paddingFix">
            <ul class="list-group">
                <li class="list-group-item justify-content-between">
                    <img src="logo.png" alt="">
                </li>
                <li class="list-group-item justify-content-between active">
                    <a href="{{route('admin.dashboard')}}">Dashboard</a>
                </li>
                <li class="list-group-item justify-content-between">
                    <a href="{{route('admin.posts')}}">Posts</a>
                </li>
                <li class="list-group-item justify-content-between">
                    <a href="{{route('admin.dashboard')}}">Dashboard</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="offset-md-2">
        @yield('content')
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script>
    var root_route = 'http://localhost:8888';
</script>
@yield('scripts')
</body>
</html>
