@extends('front.layout_front')
@section('title', Lang::get('contact.title'))
@section('meta')
    <meta name="description" content="{{Lang::get('contact.meta_description')}}">
    <meta property="og:title" content="{{Lang::get('contact.title')}}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{route('contact')}}">
    <meta property="og:image" content="{{asset('img-content/front/homePage1.jpg')}}">
    <meta name="twitter:card" content="summary" />
@endsection
@section('content')
    <link rel="stylesheet" href="{{asset('css/screen-2.css')}}">
    <h1 class="h1 text-center alignTitleContact">{{Lang::get('contact.title')}}</h1>
    @if(\Illuminate\Support\Facades\Session::has('error'))
        <div class="alert alert-{{\Illuminate\Support\Facades\Session::get('errorClass')}}">{{\Illuminate\Support\Facades\Session::get('error')}}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
  {!! Form::open(['url' => route('post_message')]) !!}
    <div class="row">
      <div class="col-md-8 offset-md-2 col-xs-10">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleTextarea">{{Lang::get('contact.listen')}}</label>
              <textarea name="content" class="form-control border-top-0 border-left-0 border-right-0" id="exampleTextarea" rows="3" placeholder="{{Lang::get('contact.question')}}"></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-xs-8">
            <div class="form-group">
              <label for="exampleInputPassword1">{{Lang::get('contact.greetings')}}</label>
              <input type="text" class="form-control border-top-0 border-left-0 border-right-0" id="exampleInputPassword1" name="name" placeholder="{{Lang::get('contact.name')}}">
            </div>

            <div class="form-group">
              <input type="email" name="email" class="form-control border-top-0 border-left-0 border-right-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{Lang::get('contact.mail')}}">
            </div>
          </div>
          <div class="col-md-2 offset-md-4 btn-right">
            <div class="">
              <button class="btn btn-secondary btn-legal" type="submit"><img class="btn-width" src="{{asset('img-layout/right-arrow.svg')}}" alt=""></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
