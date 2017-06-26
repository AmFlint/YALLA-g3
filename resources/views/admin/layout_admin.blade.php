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
                                <img src="{{asset('img-content/admin/ic_search_black_24dp_2x.png')}}" alt="">
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
                    <a class="decorationNone marginTopNavAside" href="{{route('admin.dashboard')}}">
                        <li class="decorationNone list-group-item justify-content-between active">
                            Dashboard
                        </li>
                    </a>
                    <a class="decorationNone" href="{{route('admin.history')}}">
                        <li class="decorationNone list-group-item justify-content-between">
                            Historique
                        </li>
                    </a>
                    <a class="decorationNone" href="{{route('admin.posts')}}">
                        <li class="decorationNone list-group-item justify-content-between">
                            Posts
                        </li>
                    </a>
                    <a class="decorationNone" href="{{route('admin.tags')}}">
                        <li class="decorationNone list-group-item justify-content-between">
                            Tags
                        </li>
                    </a>
                    <a class="decorationNone" href="{{route('admin.categories')}}">
                        <li class="decorationNone list-group-item justify-content-between">
                            Categories
                        </li>
                    </a>
                </ul>
            </div>
        </div>

        <div class="offset-md-2" style="padding-top: 4%">
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
