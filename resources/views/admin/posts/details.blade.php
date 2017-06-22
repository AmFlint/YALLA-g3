@extends('admin.layout_admin')


@section('content')

    <h1>{{$post->title}}</h1>
    <ul>
    @foreach($post->tags->all() as $tag)
        <li>{{$tag->name}}</li>
    @endforeach
    </ul>
    {{$post->category->name}}

    <p>{!! $post->content !!}</p>
@endsection