@extends('front.layout_front')
@section('content')
  {{-- A virer --}}
    <link rel="stylesheet" href="{{asset('css/screen-2.css')}}">
  {{-- --}}
    <h2 class="text-center" style="margin: 5% auto">Nos informations</h2>

<div class="container clearfix">
  <div class="col-md-12">
      <div class="artImg">
          <img class="img-fluid center-block" src="{{asset('img-content/front/article-3.png')}}" alt="">
          <div class="square-width actuContent" id="actuContent">
              <h3 class="h3-articles">Assemblée Générale de Yalla ! Pour les Enfants.</h3>
              <p class="p-articles col-xs-10 col-md-10 col-lg-10">Chers adhérents, chers amis, Nous vous invitons à l’Assemblée Générale de Yalla ! Pour les Enfants, qui se tiendra le jeudi 29 septembre 2016 à 18h30 à « La Trockette » 125, rue du Chemin Vert.</p>
              <button type="button" class="btn btn-secondary btn-articles"><a href="#">Lire l'article</a></button>
          </div>
          <div id="rectActuYellow"></div>
      </div>
  </div>
    <div class="col-md-12">
        <div class="artImg">
            <img class="img-fluid center-block" src="{{asset('img-content/front/article-3.png')}}" alt="">
            <div class="square-width" id="actuContent" style="border-bottom: 10px solid #cd3d41">
                <h3 class="h3-articles">Assemblée Générale de Yalla ! Pour les Enfants.</h3>
                <p class="p-articles col-xs-10 col-md-10 col-lg-10">Chers adhérents, chers amis, Nous vous invitons à l’Assemblée Générale de Yalla ! Pour les Enfants, qui se tiendra le jeudi 29 septembre 2016 à 18h30 à « La Trockette » 125, rue du Chemin Vert.</p>
                <button type="button" class="btn btn-secondary btn-articles"><a href="#">Lire l'article</a></button>
            </div>
            <div id="rectActuRed"></div>
        </div>
    </div>

</div>
      <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center column">
        <li class="page-item"><a class="page-link pagination active-pagination test-hover" href="#">1</a></li>
        <li class="page-item"><a class="page-link pagination test-hover" href="#">2</a></li>
        <li class="page-item"><a class="page-link pagination test-hover" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link pagination test-hover" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
    </nav>

@endsection
