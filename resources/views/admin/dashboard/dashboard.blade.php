@extends('admin.layout_admin')
@section('content')

    <div id="page-wrapper" style="min-height: 315px;" ng-app="App" ng-controller="MainCtrl" ng-cloak>
        <!-- row -->
        <div class="row">
            <div class="col-md-9 col-xs-8 col-md-12 col-lg-12 col-xl-12">
                <div class="row alignTop">
                    <div class="col-md-4 col-xs-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="card">
                            <img src="{{asset('img-content/admin/ic_message_black_48px.svg')}}" alt="">
                            <p class="descriptionCard"><span class="strong">125</span> nouveaux messages</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="card">
                            <img src="{{asset('img-content/admin/ic_filter_none_black_48px.svg')}}" alt="">
                            <p class="descriptionCard"><span class="strong">54%</span> unique visiteur</p>
                        </div>
                    </div>
                    <div class="col-md-4  col-xs-4 col-md-4 col-lg-4 col-xl-4 ">
                        <div class="card">
                            <img src="{{asset('img-content/admin/ic_filter_none_black_48px.svg')}}" alt="">
                            <p class="descriptionCard"><span class="strong">154</span> pages views</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 col-xs-8 col-md-10 col-lg-10 col-xl-10 offset-md-1 behindFix">
                <div class="col-md-12 col-xs-12 col-md-12 col-lg-12 col-xl-12 alignTopSelect">
                    <button type="button" class="btn btn-default" ng-click="getPost()" ng-class="{'btn-info' : type === 'post'}">Post</button>
                    <button type="button" class="btn btn-default alignLeftTag" ng-click="getCategory()" ng-class="{'btn-info' : type === 'category'}">Category</button>
                    <button type="button" class="btn btn-default alignLeftTag" ng-click="getTag()" ng-class="{'btn-info' : type === 'tag'}">Tag</button>

                    <button type="button" class="btn btn-default alignLeftTag pull-right" ng-click="getFr()" ng-class="{'btn-info' : localisation === 'fr'}">Français</button>
                    <button type="button" class="btn btn-default alignLeftTag pull-right" ng-click="getEn()" ng-class="{'btn-info' : localisation === 'en'}">English</button>
                    <button type="button" class="btn btn-default alignLeftTag pull-right" ng-click="getAr()" ng-class="{'btn-info' : localisation === 'ar'}">Arabic</button>
                </div>
                <div class="white-box">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th ng-click="sortById()">Id</th>
                                <th ng-click="sortByName()">Nom</th>
                                <th ng-click="sortByLocale()">Locale</th>
                                <th ng-click="sortByView()">nb Vue</th>
                            </tr>
                            </thead>
                            <tbody ng-repeat="post in posts | orderBy:sort:descSort">
                            <tr ng-click="setGraph(post)" style="cursor: pointer" data-toggle="modal" data-target="#graph">
                                <td>@{{ post.id }}</td>
                                <td>@{{ post.title }} @{{ post.name }}</td>
                                <td>@{{ post.locale }}</td>
                                <td>@{{ post.view }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{--modal--}}
        <div class="modal fade bd-example-modal-lg" id="graph" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="padding: 2%">
                    <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <canvas id="myChart">
                    </canvas>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12 alignTopPagination">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- /.container-fluid -->
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        var posts = {!! $posts !!}
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset('js/angular.js')}}"></script>
    <script src="{{asset('js/laroute.js')}}"></script>
    <script src="{{asset('js/admin/listing.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="{{ asset('js/Chart.min.js' )}}"></script>
    <script src="{{asset('js/admin/chart.js')}}"></script>
@endsection