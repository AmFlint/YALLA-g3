@extends('admin.layout_admin')

@section('content')
    <div>
        <div class="col-xs-10 col-md-10 col-lg-10 col-xl-10 offset-md-1 alignTop ">
            <h1 class="h1">Editer la categorie <span class="text-primary">"{{$category->name}}"</span></h1>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::open(['method' => 'put', 'url' => route('admin.category_update', $category->id), 'class' => 'test']) !!}
            {!! Form::label('name', 'Nom de la categorie') !!}
            {!! Form::text('name', $category->name, ['class' => 'form-control marginBottomAjoutArticle']) !!}
            {!! Form::label('locale', 'Langue de la catégorie') !!}
            {!! Form::select('locale', ['fr' => 'Français', 'en' => 'English', 'ar' => 'Arabic'], $category->locale, ['class' => 'form-control marginBottomAjoutArticle']) !!}
            {!! Form::label('slug', 'Chemin de la categorie')!!}
            {!! Form::text('slug', $category->slug, ['class' => 'form-control marginBottomAjoutArticle']) !!}
            @if($categories->all())
                {!! Form::label('parent_id', 'Catégorie Parent (hiérarchie)') !!}
                {!! Form::select('parent_id', $categories, null, ['class' => 'form-control marginBottomAjoutArticle']) !!}
            @endif
            {!! Form::submit('Editer', ['class' => 'btn btn-success pointer']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection