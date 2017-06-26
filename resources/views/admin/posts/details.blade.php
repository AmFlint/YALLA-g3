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
    <article>
        <p><strong>Catégorie </strong> : {{$post->category->name ?? ''}}</p>
        <p>{!! $post->content !!}</p>
    </article>
</section>
@endsection

@section('scripts')

@endsection