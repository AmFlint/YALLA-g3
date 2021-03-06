<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    @yield('meta')
    <link rel="icon" type="image/png" href="{{asset('img-layout/logo-favicon.png')}}" />
    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
    @yield('style')
</head>
<body class="@yield('body_class')">
    @yield('nav')
    <div class="menuBurger">
    <div class="clickBurger">
        <div class="stripe"></div>
        <div class="stripe"></div>
        <div class="stripe"></div>
    </div>
        <ul>
            <li class="nav-item text-left">
                <a class="nav-link" href="{{route('home')}}">Accueil</a>
            </li>
            <li class="nav-item text-left">
                <a class="nav-link" href="{{route('about')}}">{{Lang::get('nav.about')}}</a>
            </li>
            <li class="nav-item text-left">
                <a class="nav-link" href="{{route('quotidien')}}">{{Lang::get('nav.quotidien')}}</a>
            </li>
            <li class="nav-item text-left">
                <a class="nav-link" href="{{route('post_listing')}}">{{Lang::get('nav.actualities')}}</a>
            </li>
            <li class="nav-item text-left">
                <a href="{{route('contact')}}" class="nav-link">{{Lang::get('nav.contact')}}</a>
            </li>
            <li class="nav-item text-left">
                <div class="dropdown dropdownStyleFix">
                    <button class="btn btn-secondary dropdown-toggle navWhite nav-link" style="color: #000;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ucfirst(App::getLocale())}}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/en">En</a>
                        <a class="dropdown-item" href="/ar">العربية</a>
                        <a class="dropdown-item" href="/fr">Fr</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('img-layout/logo.svg')}}" alt="Logo" id="Logo"></a>
        <div class="@yield('navClass') collapse navbar-collapse text-uppercase justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">{{Lang::get('nav.about')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('quotidien')}}">{{Lang::get('nav.quotidien')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('post_listing')}}">{{Lang::get('nav.actualities')}}</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('contact')}}" class="nav-link">{{Lang::get('nav.contact')}}</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown dropdownStyleFix">
                        <button class="btn btn-secondary dropdown-toggle navWhite" style="color: #000;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ucfirst(App::getLocale())}}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="/en">En</a>
                            <a class="dropdown-item" href="/ar">العربية</a>
                            <a class="dropdown-item" href="/fr">Fr</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="btn-link" href="{{route('donate')}}"><button>{{Lang::get('home.donate')}}</button></a>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')

    <footer>
        <div class="row">
            <div class="col-xs-2 offset-md-5 text-center col-md-2">
                <a href="https://twitter.com/4Yalla?lang=fr"><img src="{{asset('img-layout/twitter.svg')}} " alt="logo twitter"></a>
                <a href="https://www.facebook.com/yalla.enfants.syriens/"><img src="{{asset('img-layout/facebook.svg')}}" alt="logo facebook"></a>
            </div>
        </div>
        <div class="col-xs-12 col-md-12 text-center linkMarginBottomFooter">
            <a href="">{{Lang::get('footer.title-footer')}}</a>
        </div>
        <div class="col-xs-12 col-md-12 text-center linkMarginBottomFooter">
            <a href="">13, rue René Villerme – 75011 PARIS</a>
        </div>
        <div class="col-xs-12 col-md-12 text-center linkMarginBottomFooter">
            <a href="{{route('terms')}}">{{Lang::get('footer.ecole-paix')}}</a> |
            <a href="{{route('contact')}}">{{Lang::get('footer.contact')}}</a> |
            <a href="{{route('partners')}}">{{Lang::get('footer.partners')}}</a>
        </div>
    </footer>
    <script>

        var menuBurger = document.querySelector('.menuBurger');
        var listBurger = document.querySelector('.menuBurger ul');
        var timerList = 800;
        var body = document.querySelector('body');
        var clickBurger = document.querySelector('.clickBurger');

        
        clickBurger.addEventListener('click', function toggleBurger() {
            menuBurger.classList.toggle('menuBurgerOn');
            menuBurger.classList.toggle('menuBurgerOff',true);
            if (menuBurger.classList.contains('menuBurgerOn')) {
                body.style.overflow = 'hidden';
                setTimeout(function() {
                    listBurger.classList.add('displayBlock');
                },timerList);
            }
            else{
                listBurger.classList.remove('displayBlock');
                body.style.overflowY = 'visible';
            }
        })

    </script>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    @yield('scripts')
</body>
</html>
