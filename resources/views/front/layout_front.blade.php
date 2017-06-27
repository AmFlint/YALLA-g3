<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    @yield('meta')
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @yield('style')
</head>
<body class="@yield('body_class')">
@yield('nav')
<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"><img src="../../../public/img-layout/logo.png" alt="Logo"></a>
    <div class="collapse navbar-collapse text-uppercase justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Qui sommes nous ?</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Notre quotidien</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('post_listing')}}">Nos Actualités</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Contact</a>
            </li>
            <li class="nav-item">
                <div class="dropdown dropdownStyleFix">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Fr
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">En</a>
                        <a class="dropdown-item" href="#">العربية</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <button>Faire un don</button>
            </li>
        </ul>
    </div>
</nav>
@yield('content')

<footer>
    <div class="row rowMarginTopFixCallToAction">
        <div class="col-xs-6 col-md-12 text-center">
            <img src="" alt="">
        </div>
        <div class="col-xs-6 col-md-12 text-center">
            <img src="" alt="">
        </div>
    </div>
    <div class="col-xs-12 col-md-12 text-center">
        <a class="hoverFix" href="">© Yalla! pour les enfants | une école pour la paix</a>
    </div>
    <div class="col-xs-12 col-md-12 text-center">
        <a class="hoverFix" href="">13, rue René Villerme – 75011 PARIS</a>
    </div>
    <div class="col-xs-12 col-md-12 text-center">
        <a class="hoverFix" href="">Mentions légales | Nous contacter</a>
    </div>
</footer>
<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

@yield('scripts')
</body>
</html>
