@extends('admin.layout_admin')
<link rel="stylesheet" href="https://unpkg.com/ng-table@2.0.2/bundles/ng-table.min.css">

@section('content')
<div>
    <div class="col-xs-10 col-md-10 col-lg-10 col-xl-10 offset-md-1 alignTop ">
        <h1 class="h1 text-center">Historique d'altération des articles</h1>
        @if(\Illuminate\Support\Facades\Session::has('error'))
        <div class="alert alert-{{\Illuminate\Support\Facades\Session::get('errorClass')}}">{{\Illuminate\Support\Facades\Session::get('error')}}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Id du parent</th>
                    <th>Titre</th>
                    <th>Date de l'altération</th>
                    <th>Type</th>
                    <th>Locale</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($posts as $post)
            <tbody>
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->post_id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{ $post->action }}</td>
                    <td>{{$post->locale}}</td>
                    <td><a href="{{route('admin.rollback', $post->id)}}" class="btn btn-warning test">Rollback</a></td>
                </tr>
            </tbody>
            @endforeach
        </table>
        {{ $posts->links('pagination.default') }}
    </div>
</div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="{{asset('js/admin/listing.js')}}"></script>
@endsection