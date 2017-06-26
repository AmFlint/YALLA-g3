@extends('admin.layout_admin')


@section('content')
<section id="details">
    <div class="container text-center">
        <h1 class="display-3">{{$post->title}}</h1>
    </div>
    <ul class="container">
    @foreach($post->tags->all() as $tag)
        <li class=" pull-right alignLeftTag"><a class="btn tag_{{$tag->color}}" href="{{route('admin.tags_assoc_posts', $tag->id)}}">{{$tag->name}}</a></li>
    @endforeach
    </ul>
    <article class="borderArticle">
        <p><strong>Catégorie </strong> : {{$post->category->name ?? ''}}</p>
        <p>{!! $post->content !!}</p>
    </article>
    <article class="borderArticle row">
        <div class="col-md-12">
            <h2 class="text-center">Résumé</h2>
            <p>{!! $post->summary !!}</p>
        </div>
    </article>
    <article class="borderArticle row text-center">
        <div class="col-md-4">
            <h2>Ajout</h2>
            <p>{!! $post->created_at !!}</p>
        </div>
        <div class="col-md-4">
            <h2>Vues</h2>
            <p>{!! $post->views !!}</p>
        </div>
        <div class="col-md-4">
            <h2>Modification</h2>
            <p>{!! $post->updated_at !!}</p>
        </div>
    </article>
    <article class="borderArticle row text-center">
        <div class="col-md-4">
            <h2>Locale</h2>
            <p class="text-uppercase">{!! $post->locale !!}</p>
        </div>
        <div class="col-md-4">
            <h2>Chemin</h2>
            <p>{!! $post->slug !!}</p>
        </div>
        <div class="col-md-4">
            <h2>Meta robots</h2>
            <p>{!! $post->meta_robots !!}</p>
        </div>
    <div class="jumbotron" style="padding: 0">
        <img src="{{asset('img-content/uploads') . '/' . $post->image}}" alt="">
        <h2 class="text-center"><small>{{$post->alt}}</small></h2>
    </div>
    </article>
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