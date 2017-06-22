@extends('admin.layout_admin')

@section('content')
    <div id="page-wrapper" style="min-height: 315px;">
        <!-- row -->
        <div class="row">
            <div class="col-md-9 col-xs-8 col-md-10 col-lg-10 col-xl-10">
                <div class="row alignTop">
                    <div class="col-md-3 col-xs-3 col-md-3 col-lg-3 col-xl-3 offset-md-1">
                        <div class="card">
                            <img src="img-content/ic_message_black_48px.svg" alt="">
                            <p class="descriptionCard"><span class="strong">125</span> nouveau messages</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-3 col-md-3 col-lg-3 col-xl-3">
                        <div class="card">
                            <img src="{{ asset('image/')  }}" alt="">
                            <p class="descriptionCard"><span class="strong">54%</span> unique visiteurs</p>
                        </div>
                    </div>
                    <div class="col-md-3col-xs-3 col-md-3 col-lg-3 col-xl-3">
                        <div class="card">
                            <img src="img-content/ic_filter_none_black_48px.svg" alt="">
                            <p class="descriptionCard"><span class="strong">154</span> page view</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 col-xs-8 col-md-10 col-lg-10 col-xl-10 offset-md-1 behindFix">
                <div class="col-md-12 col-xs-12 col-md-12 col-lg-12 col-xl-12 alignTopSelect">
                    <button type="button" class="btn btn-info">Tag1</button>
                    <button type="button" class="btn btn-info alignLeftTag">Tag2</button>
                    <button type="button" class="btn btn-info alignLeftTag">Tag3</button>
                    <button type="button" class="btn btn-info alignLeftTag">Tag4</button>
                    <button type="button" class="btn btn-info alignLeftTag">Tag5</button>
                    <button type="button" class="btn btn-info alignLeftTag">Tag6</button>
                </div>
                <div class="white-box">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Article</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>Role</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Deshmukh</td>
                                <td>Prohaska</td>
                                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Suppr</button></td>
                                <td>admin</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
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
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Etes vous sûre de supprimer</h4>
                        </div>
                        <div class="modal-body">
                            <h5>Le titre de l'article</h5>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Supprimer</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset('js/angular.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
@endsection