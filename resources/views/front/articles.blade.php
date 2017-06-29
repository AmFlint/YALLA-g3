@extends('front.layout_front')
@section('title', Lang::get('partners.title'))
@section('meta')
  <meta name="description" content="{{Lang::get('posts.meta_description')}}">
  <meta property="og:title" content="{{Lang::get('posts.title')}}">
  <meta property="og:type" content="article">
  <meta property="og:url" content="{{route('posts')}}">
  <meta property="og:image" content="{{asset('img-content/front/homePage1.jpg')}}">
  <meta name="twitter:card" content="summary" />
@endsection
@section('content')
  {{-- A virer --}}
    <link rel="stylesheet" href="{{asset('css/screen-2.css')}}">
  {{-- --}}
    <h2 class="text-center" style="margin: 5% auto">Nos informations</h2>

<div class="container clearfix">
    @foreach($posts as $post)
  <div class="col-md-12">
      <a href="{{route('post_single', $post->slug)}}">
      <div class="artImg">
          <img class="img-fluid center-block" src="{{asset('img-content/uploads') . '/' . $post->image}}" alt="{{$post->alt}}">
          <div class="square-width actuContent" id="actuContent">
              <h3 class="h3-articles">{{$post->title}}</h3>
              <a href="{{route('posts_by_category', $post->category->slug)}}" class="btn btn-info">{{$post->category->name}}</a>
              @foreach($post->tags as $tag)
                  <a href="{{route('posts_by_tag', $tag->slug)}}" class="btn tag_{{$tag->color}}">{{$tag->name}}</a>
              @endforeach
              <p class="p-articles col-xs-10 col-md-10 col-lg-10">{!! $post->summary !!}</p>
              <button type="button" class="btn btn-secondary btn-articles"><a href="{{route('post_single', $post->slug)}}">Lire l'article</a></button>
          </div>
          <div id="rectActuYellow"></div>
      </div>
      </a>
  </div>
    @endforeach
</div>
      <nav aria-label="Page navigation example">
          {{$posts->links('pagination.articles')}}
    </nav>

@endsection
