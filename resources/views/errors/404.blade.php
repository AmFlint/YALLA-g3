@extends("front.layout_front")

@section("content")
    <div id="content404">
        <h1>404</h1>
        <h2>{!! Lang::get('errors.404_p') !!}<span> <img src="{{asset('img-layout/emoji.png')}}" alt="emoji étonné" width="70px" style="padding-top: 3%"> </span></h2>
        <p>{{Lang::get('errors.404_under_p')}}</p>
        <button><a href="{{route('home')}}" style="color: white">{{Lang::get('errors.home')}}</a></button>
    </div>
@endsection