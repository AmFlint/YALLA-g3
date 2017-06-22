@extends('admin.layout_admin')

@section('content')
    {!! Form::open(['url' => route('admin.tag_add'), 'class' => 'test', 'files' => true]) !!}
    <label for="">Name</label>
    <input type="text" class="form-control" name="name">
    <label for="">Locale</label>
    <input type="text" name="locale" class="form-control">
    <input type="submit" value="envoyer" class="btn btn-success">
    {!! Form::close() !!}
@endsection