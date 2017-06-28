@extends('front.layout_front')
@section('meta')
  <meta name="robots" content="noindex, nofollow">
@endsection
@section('content')
    <h1 class="text-center h1-co">Connexion</h1>
  <div class="row">
    <div class="col-md-4 offset-md-4 col-xs-5">
    <form>
      <div class="form-group">
        <input type="ID" class="form-control input-co" aria-describedby="ID" placeholder="Identifiant">
      </div>

      <div class="form-group">
        <input type="password" class="form-control input-co" placeholder="Mot de passe">
      </div>

      <div class="text-center">
      <button type="button" class="btn btn-secondary btn-co">Se connecter</button>
    </div>
    </form>
  </div>
  </div>
@endsection
