@extends('admin.layout_admin')


@section('content')
<section id="details">
    <div class="container text-center">
        <h1 class="display-3">{{$post->title}}</h1>
    </div>
    <ul class="container">
    @foreach($post->tags->all() as $tag)
        <li class="btn pull-right alignLeftTag tag_{{$tag->color}}">{{$tag->name}}</li>
    @endforeach
    </ul>
    <article class="borderArticle">
        <p><strong>Catégorie </strong> : {{$post->category->name ?? ''}}</p>
        <p>{!! $post->content !!}</p>
    </article>
    <article class="borderArticle row">
        <div class="col-md-6 text-center">
            <h2>Résumé</h2>
            <p>{!! $post->summary !!}</p>
        </div>
        <div class="col-md-6 text-center">
            <div class="col-md-12">
                <h2>Vues</h2>
                <p>{!! $post->views !!}</p>
            </div>
        </div>
        <div class="col-md-6 text-center margin-top-published">
            <h2>Date de création</h2>
            <p>{!! $post->created_at !!}</p>
        </div>
        <div class="col-md-6 text-center margin-top-published">
            <h2>Dernière modification</h2>
            <p>{!! $post->updated_at !!}</p>
        </div>
        <div class="col-md-6 text-center margin-top-published">
            <h2>Meta Robot</h2>
            <p>{{$post->meta_robots}}</p>
        </div>
    </article>
    <div class="jumbotron" style="padding: 0">
        <img src="{{asset('img-content/uploads') . '/' . $post->image}}" alt="">
        <h2 class="text-center"><small>{{$post->alt}}</small></h2>
    </div>
    @if($post->media)
    <article class="borderArticle row">
        <div class="col-md-6 text-center">
            <h2>Type du média</h2>
            <p class="lead">{{$post->media->type}}</p>
        </div>
        <div class="col-md-6 text-center">
            <h2>Lien du média</h2>
            <p class="lead">{{$post->media->url}}</p>
        </div>
        @if($post->media->type == 'image')
        <div class="col-md-12">
            <img src="{{$post->media->url}}" alt="">
        </div>
        @elseif($post->media->type == 'youtube')
            <div class="col-md-12">
                <iframe src="{{$post->media->url}}" frameborder="0"></iframe>
            </div>
        @endif
    </article>
    @endif
</section>
@endsection

@section('scripts')

@endsection