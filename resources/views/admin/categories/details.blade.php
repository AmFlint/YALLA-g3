@extends('admin.layout_admin')

@section('content')
    <section id="details">
        <article class="borderArticle row text-center">
            <div class="col-md-4">
                <h2>Nom</h2>
                <p>{!! $category->name !!}</p>
            </div>
            <div class="col-md-4">
                <h2>Locale</h2>
                <p class="text-uppercase">{!! $category->locale !!}</p>
            </div>
            <div class="col-md-4">
                <h2>Chemin</h2>
                <p>{!! $category->slug !!}</p>
            </div>
            <div class="col-md-12 text-center" style="margin-bottom: 2%">
                <button class="btn tag_{{$category->color}} center-block">{{$category->name}}</button>
            </div>
        </article>
        <div class="col-md-12 text-center">
            <a href="{{route('admin.tag_edit', $category->id)}}" class="btn btn-success">Editer le tag</a>
        </div>
    </section>
@endsection