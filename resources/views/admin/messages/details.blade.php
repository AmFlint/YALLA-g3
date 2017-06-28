@extends('admin.layout_admin')

@section('content')
    <section id="details">
    <article class="borderArticle row text-center">
        <div class="col-md-6">
            <h2>Nom</h2>
            <p>{!! $message->name !!}</p>
        </div>
        <div class="col-md-6">
            <h2>email</h2>
            <p><a href="mailto:{{$message->email}}">{!! $message->email !!}</a></p>
        </div>
        <div class="col-md-12">
            <h2>Message</h2>
            <p>{!! $message->content !!}</p>
        </div>
    </article>
    </section>
@endsection