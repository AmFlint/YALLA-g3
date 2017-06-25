@extends('admin.layout_admin')

@section('content')
    <div>
        <div class="col-xs-10 col-md-10 col-lg-10 col-xl-10 offset-md-1 alignTop ">
            <h1>{{$tag->name}}</h1>
            <h2 class="h2">{{$tag->locale}}</h2>
            <h3 class="h3">{{$tag->slug}}</h3>
            <a href="{{route('admin.tag_edit', $tag->id)}}" class="btn btn-success">Editer le tag</a>
        </div>
    </div>

@endsection