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
            {!! Form::open(['url' => route('admin.posts_store'), 'class' => 'test', 'files' => true]) !!}

            <div class="cardPageAdd">
                <div class="row">
                    <div class="col-md-12 col-xs-12 col-md-12 col-lg-12 col-xl-12 paddingFix">
                        <h2 class="paddingFix text-center">Ajouter un article :</h2>
                    </div>
                    <div class="col-md-6 col-lg-6 paddingFix styleForm">
                        {!! Form::label('locale', 'Langue de l\'article :') !!}
                        <select ng-change="getTagsAndCategories(languages)" name="locale" ng-model="languages"
                                ng-options="locale.locale as locale.language for locale in locales track by locale.locale"
                                class="form-control"></select>
                    </div>
                    <div class="col-md-6 col-lg-6 styleForm">
                        {!! Form::label('title', 'Titre :') !!}
                        {!! Form::text('title', null,['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-12 col-xs-12 col-md-12 col-lg-12 col-xl-12 paddingFix styleForm">
                        {!! Form::label('content', 'Contenu :') !!}
                        {!! Form::textarea('content', null,['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-12 col-xs-12 col-md-12 col-lg-12 col-xl-12 paddingFix styleForm">
                        <div class="col-md-12 col-lg-12 paddingFix">
                            {!! Form::label('summary', 'Résumé de l\'Article :') !!}
                            {!! Form::text('summary', null,['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="invisible">
                        {!! Form::label('slug', 'Slug de l\'Article') !!}
                        {!! Form::text('slug', null,['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-8 col-xs-8 col-md-8 col-lg-8 col-xl-8 paddingFix">
                        <div class="styleForm">
                            {!! Form::label('card', 'Type de carte au partage sur twitter :') !!}
                        </div>
                        {!! Form::select('card', ['summary' => 'Résumé', 'summary_large_image' => 'Résumé avec image large', 'app' => 'Optimisé Mobile', 'player' => 'Lecteur vidéo'], null, ['class' => 'form-control']) !!}
                    </div>
                    <select name="tag_list[]" class="form-control paddingFix invisible" multiple="multiple">
                        <option ng-repeat="tag in tags_selected" selected value="@{{ tag.id }}">@{{ tag.name }}</option>
                    </select>
                    <div class="col-md-8 col-xs-8 col-md-8 col-lg-8 col-xl-8 paddingFix styleForm marginBottomAjoutArticle">
                        {!! Form::label('category_id', 'Catégorie :') !!}
                        <select name="category_id" id="" class="form-control marginBottomAjoutArticle"
                                ng-model="category_id"
                                ng-options="category.id as category.name for category in categories track by category.id"></select>
                        <input type="hidden" ng-init="published = 0" name="published" ng-model="published"
                               value="@{{ published }}">
                        {!! Form::label('meta_robots', 'Règles de référencement') !!}
                        {!! Form::select('meta_robots', ['' => 'Indexer normalement', 'noindex, follow' => 'NOINDEX, FOLLOW', 'index, nofollow' => "INDEX, NOFOLLOW", 'noindex, nofollow' => 'NOINDEX, NOFOLLOW'], '', ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12 col-md-12 col-lg-12 col-xl-12 paddingFix">
                        <div>
                            {!! Form::label('image', 'Image titre de l\'Article') !!}
                            {!! Form::file('image', ['class' => 'form-control-file marginBottomAjoutArticle']) !!}
                        </div>
                        <div class="form-check marginBottomAjoutArticle">
                            <label class="form-check-label">
                                <input type="checkbox" ng-model="media" class="form-check-input">
                                Media en ligne / Upload une image ? (facultatif)
                            </label>
                        </div>
                        <div ng-show="!media" class="row">
                            <div class="col-md-6">
                                {!! Form::label('type', 'Type de lien (youtube, image)') !!}
                                {!! Form::select('type', ['image' => 'Image', 'youtube' => 'lien Youtube'], null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::label('url') !!}
                                {!! Form::text('url', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div ng-show="media">
                            {!! Form::label('imageMedia', 'Choisissez votre image') !!}
                            {!! Form::file('imageMedia', ['class' => 'form-control-file']) !!}
                        </div>
                        <div class="styleForm">
                            {!! Form::submit('Ajouter', ['class' => 'btn btn-success pointer']) !!}
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
                <button type="button" class="btn btn-success marginTopAddTag" data-toggle="modal"
                        data-target="#myModal">
                    Gérer les tags
                </button>
            </div>
            <div class="card margin-top-published">
                <div class="card-head">
                    <h4 class="text-center">Publier l'article</h4>
                </div>
                <button type="button" ng-click="publish()" class="btn btn-success marginTopAddTag marginBottomAjoutArticle"
                        ng-class="{'btn-danger': published == 1}" ng-cloak>
                    @{{publishMessage}}
                </button>
                <p class="lead" ng-show="published" ng-cloak>L'Article sera publié après validation du formulaire</p>
                <p class="lead" ng-hide="published" ng-cloak>L'Article ne sera pas publié</p>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
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
                                <input type="text" class="form-control" placeholder="Search for..." ng-model="inputTag">
                                <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button">Ajouter!</button>
                            </span>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-10 col-lg-10">
                        <button class="btn btn-default" ng-class="{'btn-success': checkSelection(tag)}"
                                ng-repeat="tag in tags" style="margin: 1%"
                                ng-click="selectTag(tag)">@{{ tag.name }}</button>
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
    <script>tinymce.init({selector: 'textarea'});</script>
    <script>
        tinymce.init({
            selector: '[name="summary"]',
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
            integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
            integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
            crossorigin="anonymous"></script>
    <script src="{{asset('js/laroute.js')}}"></script>
    <script>
        var tags = {!! $tags !!};
        var post = {
            locale: 'fr',
            published: 0
        };
        var categories = {!! $categories !!};
    </script>
    <script src="{{asset('js/admin/tags.js')}}"></script>
@endsection