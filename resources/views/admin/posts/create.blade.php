@extends('admin.layout_admin')

@section('content')

    {!! Form::open(['url' => route('admin.posts_store'), 'class' => 'test', 'files' => true]) !!}
        {!! Form::label('locale', 'Langue de l\'article') !!}
        {!! Form::select('locale', ['fr' => 'Français', 'en' => 'English', 'ar' => 'Arabic'], App::getLocale(), ['class' => 'form-control']) !!}
        <div class="spacer"></div>
        {!! Form::label('title', 'Titre') !!}
        {!! Form::text('title', null,['class' => 'form-control']) !!}
        <div class="spacer"></div>
        {!! Form::label('content', 'Contenu') !!}
        {!! Form::textarea('content', null,['class' => 'form-control']) !!}
        <div class="spacer"></div>
        {!! Form::label('summary', 'Résumé de l\'Article') !!}
        {!! Form::text('summary', null,['class' => 'form-control']) !!}
        <div class="spacer"></div>
        <div class="invisible">
            {!! Form::label('slug', 'Slug de l\'Article') !!}
            {!! Form::text('slug', null,['class' => 'form-control']) !!}
        </div>
        {!! Form::label('card', 'Type de carte au partage sur twitter') !!}
        {!! Form::select('card', ['summary' => 'Résumé', 'summary_large_image' => 'Résumé avec image large', 'app' => 'Optimisé Mobile', 'player' => 'Lecteur vidéo'], null, ['class' => 'form-control']) !!}
    {!! Form::close() !!}
@endsection
@section('scripts')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=mudnu9qj1yp6k3zmxh17y5ltrjwydufkkoxlre701kcz297y"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endsection