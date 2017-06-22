@extends('admin.layout_admin')

@section('content')
    <div class="spacer"></div>
    <a href="{{route('admin.posts_create')}}"><input type="button" value="Add" class="btn btn-primary btn-sm"></a>
    <div class="spacer"></div>
    <table class="table table-bordered" ng-app="App" ng-controller="MainCtrl" ng-cloak>
        <tr>
            <td>Id</td>
            <td>Titre</td>
            <td>Résumé</td>
            <td>Visible</td>
            <td>Action</td>
        </tr>

        <tr ng-repeat="post in posts">
            <td>@{{post.id}}</td>
            <td>@{{post.title}}</td>
            <td>@{{post.summary}}</td>
            <td>@{{post.published}}</td>
            <td>
                <button class="btn btn-danger" ng-click="deleteModal(post)">Supprimer</button>
            </td>
        </tr>
    </table>
    <div class="spacer"></div>
    <a href="./?a=ajouter"><input type="button" value="Add" class="btn btn-primary btn-sm"></a>
    <div class="spacer"></div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Supprimer l'article @{{ modal.id }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Êtes vous sur de vouloir supprimer l'article @{{ modal.title }} ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var posts = {!! $posts !!};
    </script>
    <script src="{{asset('js/angular.js')}}"></script>
    <script src="{{asset('js/admin/listing.js')}}"></script>
@endsection