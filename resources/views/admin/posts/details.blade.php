@extends('admin.layout_admin')


@section('content')
<section id="details">
    <div class="jumbotron">
        <img src="{{asset('img-content/uploads') . '/' . $post->image}}" alt="">
    </div>
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
            <div class="col-md-12">
                <h2>Dernière modification</h2>
                <p>{!! $post->updated_at !!}</p>
            </div>
        </div>
    </article>
</section>
@endsection

@section('scripts')

@endsection