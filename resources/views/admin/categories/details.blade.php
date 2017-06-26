@extends('admin.layout_admin')

@section('content')
    <div>
        <div class="col-xs-10 col-md-10 col-lg-10 col-xl-10 offset-md-1 alignTop ">
            <h1>{{$category->name}}</h1>
            <h2 class="h2">{{$category->locale}}</h2>
            <h3 class="h3">{{$category->slug}}</h3>
            <a href="{{route('admin.category_edit', $category->id)}}" class="btn btn-success">Editer la catégorie</a>
        </div>
    </div>
@endsection