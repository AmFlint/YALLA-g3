@extends('admin.layout_admin')

@section('content')
    <div class="row">
        <div class="col-xs-8Custom col-md-8Custom offset-xl-1 alignTop">
            <h1 class="h1">Editer le tag <span class="text-primary">"{{$tag->name}}"</span></h1>
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
                {!! Form::hidden('color', $tag->color, ['id' => 'inputColor']) !!}
                <label for="" class="vab">Couleur du tag :</label>
                <div class="tagColor border colorful tag_{{$tag->color}}"></div>
                <div class="tagColors mgb-tags">
                    <div class="tagColor tag_red pointer btn"></div>
                    <div class="tagColor tag_blue pointer btn"></div>
                    <div class="tagColor tag_yellow pointer btn"></div>
                    <div class="tagColor tag_pink pointer btn"></div>
                </div>
                {!! Form::submit('Editer', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/admin/tagColor.js')}}"></script>
@endsection