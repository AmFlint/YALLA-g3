@extends('admin.layout_admin')

@section('content')
<div>
    <div class="col-xs-10 col-md-10 col-lg-10 col-xl-10 offset-md-1 alignTop ">
        @if(\Illuminate\Support\Facades\Session::has('error'))
        <div class="alert alert-{{\Illuminate\Support\Facades\Session::get('errorClass')}}">{{\Illuminate\Support\Facades\Session::get('error')}}</div>
        @endif
        <div class="row">
            <div class="col-xs-8 col-md-8 col-lg-8 col-xl-8">
                <a href="{{route('admin.posts_create')}}"><input type="button" value="Ajouter un article" class="btn btn-success pointer marginBottomAjoutArticle"></a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titre</th>
                    <th>Résumé</th>
                    <th>Visible</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($posts as $post)
            <tbody>
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{!! $post->summary !!}</td>
                    <td>{{$post->published}}</td>
                    <td><button type="button" class="btn btn-danger test" data-toggle="modal" data-target="#myModal">Suppr</button></td>
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
                        <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
                        <a class="decorationNone" href=""><button type="button" class="btn btn-danger">Supprimer</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var posts = {!! $posts !!};
</script>
<script src="{{asset('js/laroute.js')}}"></script>
<script type="text/javascript">

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
            link.href = root_route + laroute.action('admin.post_delete', {id: data[0]});
            modalId.innerHTML = "Supprimer l'article " + data[0] + " ?";
            modalTitle.innerHTML = data[1];
            modalCore.innerHTML = data[2];
        };
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset('js/angular.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="{{asset('js/admin/listing.js')}}"></script>
@endsection