<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{asset('img-layout/logo-favicon.png')}}" />
    <title>Admin</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body class="backoffice">
    <main>
        <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12 paddingFix backgroundNav">
            <nav>
                <ul class="clearfix" style="padding-top: 5px; height: 10px">
                    <li>Dashboard</li>
                    <li class="pull-right align-top">
                        {!! Form::open(['url' => route('logout'), 'method' => 'POST']) !!}
                            <button class="btn tag_red">Se déconnecter</button>
                        {!! Form::close() !!}
                    </li>
                </ul>
            </nav>
        </div>
        <div class="col-xs-2 col-md-2 col-lg-2 col-xl-2 backgroundNavAside paddingFix">
            <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12 paddingFix">
                <ul class="list-group">
                    <li class="list-group-item justify-content-between">
                        <a href="{{route('home')}}" style="display: block; margin: 0 auto;">
                            <img style="width: 130px;" src="{{asset('img-layout/logo.svg')}}" alt="">
                        </a>
                    </li>
                    <a class="decorationNone marginTopNavAside" href="{{route('admin.dashboard')}}">
                        <li class="decorationNone list-group-item justify-content-between {{getCurrentNavPosition('dashboard')}}">
                            Dashboard
                        </li>
                    </a>
                    <a class="decorationNone" href="{{route('admin.history')}}">
                        <li class="decorationNone list-group-item justify-content-between {{getCurrentNavPosition('history')}}">
                            Historique
                        </li>
                    </a>
                    <a class="decorationNone" href="{{route('admin.posts')}}">
                        <li class="decorationNone list-group-item justify-content-between {{getCurrentNavPosition('posts')}}">
                            Posts
                        </li>
                    </a>
                    <a class="decorationNone" href="{{route('admin.tags')}}">
                        <li class="decorationNone list-group-item justify-content-between {{getCurrentNavPosition('tags')}}">
                            Tags
                        </li>
                    </a>
                    <a class="decorationNone" href="{{route('admin.categories')}}">
                        <li class="decorationNone list-group-item justify-content-between {{getCurrentNavPosition('categories')}}">
                            Categories
                        </li>
                    </a>
                    <a class="decorationNone" href="{{route('admin.messages')}}">
                        <li class="decorationNone list-group-item justify-content-between {{getCurrentNavPosition('messages')}}">
                            Messages
                        </li>
                    </a>
                </ul>
            </div>
        </div>

        <div class="offset-md-2" style="padding-top: 4%">
            @yield('content')
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script>
        var root_route = 'http://localhost:8888';
    </script>
    @yield('scripts')
</body>
</html>
