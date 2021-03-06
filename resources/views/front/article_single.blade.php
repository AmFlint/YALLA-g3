@extends('front.layout_front')
@section('title', \Illuminate\Support\Str::words($post->title, 20, '...'))
@section('meta')
    <meta name="description" content="{{$post->meta_description}}">
    <meta property="og:title" content="{{\Illuminate\Support\Str::words($post->title, 20, '...')}}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{route('post_single', $post->slug)}}">
    <meta property="og:image" content="{{asset('img-content/uploads' . '/' . $post->image)}}">
    <meta name="twitter:card" content="{{$post->card}}" />
    @if($post->meta_robots)
        <meta name="robots" content="{{strtolower($post->meta_robots)}}">
    @endif
@endsection
@section('content')
  <div class="row">
    <div class="col-md-9 offset-md-3">
      <h1 class="h1-article fontWeightRegularDubai">{{$post->title}}</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-1 offset-md-1 btn-tags">
      <div class="col-md-12">
        <p class="inline"><b>Catégorie</b></p>
        <a href="{{route('posts_by_category', $post->category->slug)}}" class="btn tag_yellow hoverFixWhite">{{$post->category->name}}</a>
      </div>
      <div class="col-md-12">
        <p class="inline fontWeightRegularDubai tags"><b>Tags</b></p>
          @foreach($post->tags->all() as $tag)
            <a href="{{route('posts_by_tag', $tag->slug)}}" class="marginBottomAjoutArticle hoverFixWhite btn tag_{{$tag->color}}">{{$tag->name}}</a>
          @endforeach
      </div>
      <div class="col-md-12">
        <p class="tags"><b class="fontWeightRegularDubai">Date</b>  {{$post->created_at->format('d/m/y')}}</p>
        <p class="hidden font-weight-bold fontWeightRegularDubai">Partager</p>
          <a class="twitter-share-button"
             href="https://twitter.com/intent/tweet" data-size="large">
              Tweet</a>
        <div class="fb-share-button" data-href="http://vivianebadach.eu/doctorapp" data-layout="button" data-size="large" data-mobile-iframe="false"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fvivianebadach.eu%2F&amp;src=sdkpreparse">Partager</a></div>
      </div>
    </div>
    <div class="col-md-8 offset-md-1">
      <img class="img-fluid img-center" src="{{asset('img-content/uploads') . '/' . $post->image}}" alt="{{$post->alt}}">
      <section class="text-article">
        {!! $post->content !!}
      </section>
        @if($post->media)

          @if($post->media->type == 'youtube')
          <div class="embed-responsive embed-responsive-16by9">
                  <iframe width="700" height="400" class="embed-responsive-item" src="{{$post->media->url}}" frameborder="0" allowfullscreen></iframe>
          </div>
          <div class="col-md-8">
          @elseif($post->media->type == 'image')
              <img src="{{$post->media->url}}" alt="visuel article 1" class="img-fluid">
          @else
              <img src="{{asset('img-content/uploads') . '/' . $post->media->url}}" alt="visuel article 2" class="img-fluid">
          @endif
          </div>
        @endif
    </div>
  </div>
  <script>window.twttr = (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0],
              t = window.twttr || {};
          if (d.getElementById(id)) return t;
          js = d.createElement(s);
          js.id = id;
          js.src = "https://platform.twitter.com/widgets.js";
          fjs.parentNode.insertBefore(js, fjs);

          t._e = [];
          t.ready = function(f) {
              t._e.push(f);
          };

          return t;
      }(document, "script", "twitter-wjs"));</script>
  <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.8";
          fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>
@endsection
