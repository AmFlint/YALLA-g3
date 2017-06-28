@extends('admin.layout_admin')

@section('content')
    <div>
        <div class="col-xs-10 col-md-10 col-lg-10 col-xl-10 offset-md-1 alignTop ">
            <h1 class="h1 text-center">Liste des Tags</h1>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(\Illuminate\Support\Facades\Session::has('error'))
                <div class="alert alert-{{\Illuminate\Support\Facades\Session::get('errorClass')}}">{{\Illuminate\Support\Facades\Session::get('error')}}</div>
            @endif
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
                </thead>
                @foreach($messages as $message)
                    <tbody>
                    <tr>
                        <td>{{$message->id}}</td>
                        <td>
                            <a href="{{route('admin.message_details', $message->id)}}">
                                {{$message->name}}
                            </a>
                        </td>
                        <td>
                            <a href="{{route('admin.message_details', $message->id)}}">
                                {{$message->email}}
                            </a>
                        </td>
                        <td>
                            <a href="{{route('admin.message_details', $message->id)}}">
                                {{\Illuminate\Support\Str::words($message->content, 5, '...')}}
                            </a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger test" data-toggle="modal" data-target="#myModal">Supprimer</button>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <h5></h5>
                            <p></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Retour</button>
                            <a class="decorationNone" href=""><button type="button" class="btn btn-danger">Supprimer</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/laroute.js')}}"></script>
    <script type="text/javascript">

        /**
         * Fonction pour actualiser
         * les données dans le modal
         * depuis la page list.
         **/

        var table = document.getElementsByTagName("table")[0];
        var tbody = table.getElementsByTagName("tbody")[0];
        var button = document.querySelectorAll('.test');
        var modalTitle = document.querySelector(".modal-body h5");
        var modalCore = document.querySelector(".modal-body p");
        var modalId = document.querySelector('.modal-title');
        var link = document.querySelector('.modal-footer a');

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
                link.href = root_route + laroute.route('admin.message_delete', {id: data[0]});
                modalId.innerHTML = "Supprimer l'article " + data[0] + " ?";
                modalTitle.innerHTML = data[1];
                modalCore.innerHTML = data[3];
            };
        }
    </script>
    <script src="{{asset('js/admin/tagColor.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

@endsection