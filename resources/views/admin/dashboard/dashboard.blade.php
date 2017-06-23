@extends('admin.layout_admin')

@section('content')
    <div id="page-wrapper" style="min-height: 315px;">
        <!-- row -->
        <div class="row">
            <div class="col-md-9 col-xs-8 col-md-10 col-lg-10 col-xl-10">
                <div class="row alignTop">
                    <div class="col-md-4 col-xs-4 col-md-4 col-lg-4 col-xl-4 offset-md-1">
                        <div class="card">
                            <img src="{{asset('img-content/admin/ic_message_black_48px.svg')}}" alt="">
                            <p class="descriptionCard"><span class="strong">125</span> nouveau messages</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="card">
                            <img src="{{asset('img-content/admin/ic_filter_none_black_48px.svg')}}" alt="">
                            <p class="descriptionCard"><span class="strong">54%</span> unique visiteurs</p>
                        </div>
                    </div>
                    <div class="col-md-3  col-xs-3 col-md-3 col-lg-3 col-xl-3 ">
                        <div class="card">
                            <img src="{{asset('img-content/admin/ic_filter_none_black_48px.svg')}}" alt="">
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
                                <td><button type="button" class="btn btn-danger test" data-toggle="modal" data-target="#myModal">Suppr</button></td>
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

            <!-- /.container-fluid -->
        </div>
    </div>
    <script type="text/javascript">
        var table = document.getElementsByTagName("table")[0];
        var tbody = table.getElementsByTagName("tbody")[0];
        var button = document.querySelectorAll('.test');
        var modalTitle = document.querySelector(".modal-body h5");
        var modalCore = document.querySelector(".modal-body p");
        var modalId = document.querySelector('.modal-title');
        var SuprRoute = document.querySelector('')


        for (var i = 0; i < button.length; i++) {
            button[i].onclick = function getCellValue(e) {
                e = e || window.event;
                var data = [];
                var target = e.srcElement || e.target;
                while (target && target.nodeName !== "TR") {
                    target = target.parentNode;
                }
                if (target) {
                    var cells = target.getElementsByTagName("td");
                    for (var i = 0; i < cells.length; i++) {
                        data.push(cells[i].innerHTML);
                    }
                }
                modalId.innerHTML = "Supprimer l'article " + data[0] + " ?";
                modalTitle.innerHTML = data[1];
                modalCore.innerHTML = data[2];
            };
        }
    </script>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset('js/angular.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
@endsection