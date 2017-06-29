@extends('front.layout_front')
@section('title', Lang::get('home.title'))
@section('meta')
<meta name="description" content="{{Lang::get('home.meta_description')}}">
<meta property="og:title" content="{{Lang::get('home.title')}}">
<meta property="og:type" content="article">
<meta property="og:url" content="{{route('home')}}">
<meta property="og:image" content="{{asset('img-content/front/homePage1.jpg')}}">
<meta name="twitter:card" content="summary" />
@endsection
@section('body_class', 'site')
@section('navClass', 'navWhite')
@section('content')
<!-- header -->
<video src="{{asset('video/backgroundHomePage.mp4')}}" autoplay="1" loop="1"></video>
<!-- Début du contenu au dessus de la ligne de flotaison -->
<div class="homePage">
  <div class="row">
    <div class="col-xs-12 col-md-12">
      <h2 class="text-center">{!! Lang::get('home.school') !!}</h2>
      <a class="btn-link" href="{{route('donate')}}">
        <button class="ctaHome text-uppercase">{{Lang::get('home.donate')}}</button>
      </a>
    </div>
  </div>
</div>
<div class="contentHomePage">
  <div class="row">
    <div class="col-xs-12 col-md-5 offset-md-1 paddingFix">
      <img src="{{asset('img-content/front/homePage1.jpg')}}" alt="" class="text-center">
      <div class="rectImgColorRed"></div>
    </div>
    <div class="col-xs-12 col-md-5 alignContainerTextHomePageRight desktopText">
      <h3>{{Lang::get('home.humanitary')}}</h3>
      <p>{{Lang::get('home.humanitary_p')}}</p>
     </div>
  </div>

  <div class="row rowMarginTopFix">
    <div class="col-xs-12 col-md-5 offset-md-1 alignContainerTextHomePageLeft">
      <h3>{{Lang::get('home.children_rights')}}</h3>
      <p>{{Lang::get('home.children_rights_p')}}</p>
    </div>
    <div class="col-xs-12 col-md-5 paddingFix orderContentHomePage">
      <img src="{{asset('img-content/front/homePage2.jpg')}}" alt="">
      <div class="rectImgColorYellow"></div>
    </div>
  </div>

  <div class="row rowMarginTopFix">
    <div class="col-xs-12 col-md-5 offset-md-1 paddingFix">
      <img src="{{asset('img-content/front/homePage3.jpg')}}" alt="">
      <div class="rectImgColorGreen">
      </div>
    </div>
    <div class="col-xs-12 col-md-5 alignContainerTextHomePageRight desktopText">
      <h3>{{Lang::get('home.our_story')}}</h3>
      <p>{{Lang::get('home.our_story_p')}}</p>
    </div>
  </div>
</div> 
<div class="row rowMarginTopFixCallToAction justify-content-center derniereActu">
  <div class="col-md-12 offset-md-12">
    <h3 class="text-center">{{Lang::get('home.actualities')}}</h3>
  </div>
  <div class="col-md-5 col-xs-12 text-center">
    <a href="{{route('posts_by_category', $post->category->slug)}}" class="btn btn-info float-right" id="actuCat">{{$post->category->name}}</a>
    <img src="{{asset('img-content/uploads') . '/' . $post->image}}" alt="">
    @foreach($post->tags as $tag)
      <a href="{{route('posts_by_tag', $tag->slug)}}" class=" marginTopAddTag btn tag_{{$tag->color}}">{{$tag->name}}</a>
    @endforeach
    <h4 class="marginTopAddTag">{{$post->title}}</h4>
    <p class="marginTopAddTag">{!! $post->summary !!}</p>
    <div class="">
      <button class="text-uppercase">{{Lang::get('home.read_article')}}</button>
    </div>
    <a class="marginTopAddTag hoverFix navBlack" href="">Voir tous nos articles</a>
  </div>
</div>
<div class="row text-center rowMarginTopFixCallToAction">
  <div class="col-xs-12 col-md-12 buttonCTA backgroundBannerHommePageOne">
    <p style="margin-top: 15vh;">{!! Lang::get('home.help') !!}</p>
    <a class="btn-link" href="{{route('donate')}}">
      <button>{{Lang::get('home.donate')}}</button>
    </a>
  </div>
</div>
<div class="row text-center">
  <div class="col-xs-12 col-md-12 buttonCTA backgroundBannerHommePage2">
    <p style="margin-top: 15vh;">{!! Lang::get('home.join_project') !!}</p>
    <button>{{Lang::get('home.join_us')}}</button>
  </div>
</div>
</div>
@endsection