@extends('admin.layout_admin')

@section('content')
    <div class="row">
        <div class="col-xs-8Custom col-md-8Custom offset-xl-1 alignTop">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::open(['method' => 'put', 'url' => route('admin.tag_update', $tag->id), 'class' => 'test', 'files' => true]) !!}
                {!! Form::label('name', 'Nom du tag') !!}
                {!! Form::text('name', $tag->name, ['class' => 'form-control']) !!}
                {!! Form::label('locale', 'Langue du tag') !!}
                {!! Form::select('locale', ['fr' => 'Français', 'en' => 'English', 'ar' => 'Arabic'], $tag->locale, ['class' => 'form-control']) !!}
                {!! Form::label('slug', 'Chemin du tag')!!}
                {!! Form::text('slug', $tag->slug, ['class' => 'form-control']) !!}
                {!! Form::submit('Editer', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection