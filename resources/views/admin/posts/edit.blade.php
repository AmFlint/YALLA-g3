@extends('admin.layout_admin')

@section('content')
<div class="row" ng-app="tagApp" ng-controller="TacosCtrl">
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
        {!! Form::open(['method' => 'put', 'url' => route('admin.post_update', $post->id), 'class' => 'test', 'files' => true]) !!}

        <div class="cardPageAdd">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-md-12 col-lg-12 col-xl-12 paddingFix">
                    <h2 class="paddingFix text-center">Editer un article :</h2>
                </div>
                <div class="col-md-6 col-lg-6 paddingFix styleForm">
                    {!! Form::label('locale', 'Langue de l\'article :') !!}
                    <select ng-change="getTags(languages)" name="locale" ng-model="languages" ng-options="locale.locale as locale.language for locale in locales track by locale.locale" class="form-control"></select>
                </div>
                <div class="col-md-6 col-lg-6 styleForm">
                    {!! Form::label('title', 'Titre') !!}
                    {!! Form::text('title', $post->title,['class' => 'form-control']) !!}
                </div>
                <div class="col-md-12 col-xs-12 col-md-12 col-lg-12 col-xl-12 paddingFix styleForm">
                    {!! Form::label('content', 'Contenu') !!}
                    {!! Form::textarea('content', $post->content,['class' => 'form-control']) !!}
                </div>
                <div class="col-md-12 col-xs-12 col-md-12 col-lg-12 col-xl-12 paddingFix styleForm">
                    <div class="col-md-12 col-lg-12 paddingFix">
                        {!! Form::label('summary', 'Résumé de l\'Article') !!}
                        {!! Form::text('summary', $post->summary,['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="invisible">
                    {!! Form::label('slug', 'Slug de l\'Article') !!}
                    {!! Form::text('slug', $post->slug,['class' => 'form-control']) !!}
                </div>
                <div class="col-md-8 col-xs-8 col-md-8 col-lg-8 col-xl-8 paddingFix">
                    <div class="styleForm">
                        {!! Form::label('card', 'Type de carte au partage sur twitter') !!}
                    </div>

                    {!! Form::select('card', ['summary' => 'Résumé', 'summary_large_image' => 'Résumé avec image large', 'app' => 'Optimisé Mobile', 'player' => 'Lecteur vidéo'], $post->card, ['class' => 'form-control']) !!}
                </div>
                <select name="tag_list[]" class="form-control paddingFix" multiple="multiple">
                    <option ng-repeat="tag in tags_selected" selected value="@{{ tag.id }}">@{{ tag.name }}</option>
                </select>
                <div class="col-md-8 col-xs-8 col-md-8 col-lg-8 col-xl-8 paddingFix styleForm marginBottomAjoutArticle">
                    {!! Form::label('category_id', 'Catégorie') !!}
                    {!! Form::select('category_id', $categories, $post->category->id, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12 col-md-12 col-lg-12 col-xl-12 paddingFix">
                    <div>
                        {!! Form::file('image') !!}
                    </div>
                    <div class="styleForm">
                    {!! Form::submit('Editer', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-3 col-md-3 alignTop paddingFix">
        <div class="card">
            <div class="card-head">
                <h4 class="text-center">Gérer les tags</h4>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success marginTopAddTag" data-toggle="modal" data-target="#myModal">
                Gérer les tags
            </button>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="col-lg-12" ng-submit="addTag(event)">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for..."ng-model="inputTag">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button">Ajouter!</button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-md-10 col-lg-10">
                    <button class="btn btn-default" ng-class="{'btn-success': checkSelection(tag)}" ng-repeat="tag in tags" style="margin: 1%" ng-click="selectTag(tag)" >@{{ tag.name }}</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
@section('scripts')
<script src="{{asset('js/angular.js')}}"></script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=mudnu9qj1yp6k3zmxh17y5ltrjwydufkkoxlre701kcz297y"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<script>
    tinymce.init({
        selector: '[name="summary"]',
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="{{asset('js/laroute.js')}}"></script>
<script>
    var tags = {!! $tags !!};
    var post = {
        locale: 'fr_FR'
    };
</script>
<script src="{{asset('js/admin/tags.js')}}"></script>
@endsection