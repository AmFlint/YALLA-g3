@extends("front.layout_front")

@section("content")
    <div id="content404">
        <h1>404</h1>
        <h2>Ooops ... Cette page est introuvable <span> <img src="{{asset('img-layout/emoji.png')}}" alt="emoji étonné" width="70px" style="padding-top: 3%"> </span> </h2>
        <p>Nous n'arrrivons pas à trouver la page que vous recherchez ...</p>
        <button><a href="{{route('home')}}" style="color: white">ACCUEIL</a></button>
    </div>
@endsection