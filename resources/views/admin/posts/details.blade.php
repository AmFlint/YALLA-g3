@extends('admin.layout_admin')


@section('content')
<section id="details">
    <div class="container text-center">
        <h1 class="display-3">{{$post->title}}</h1>
    </div>
    <ul class="container">
    @foreach($post->tags->all() as $tag)
        <li class="btn tag_{{$tag->color}} pull-right alignLeftTag">{{$tag->name}}</li>
    @endforeach
    </ul>
    <article class="borderArticle">
        <p><strong>Catégorie </strong> : {{$post->category->name ?? ''}}</p>
        <p>{!! $post->content !!}</p>
    </article>
    <article class="jumbotron">
        <img src="{{asset('img-content/uploads') . '/' . $post->image}}" alt="">
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
    </article>
</section>
@endsection

@section('scripts')

@endsection