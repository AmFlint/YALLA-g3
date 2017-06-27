@extends('front.layout_front')
@section('meta')
    <meta name="description" content="{{Lang::get('meta.home_description')}}">
@endsection
@section('body_class', 'site')
@section('content')
<!-- Début du contenu au dessus de la ligne de flotaison -->
<div class="homePage">
  <div class="row">
    <div class="col-xs-12 col-md-12">
      <h2 class="text-center"> Une école pour la<span class="fontWeightBoldDubai"> paix</span></h2>
      <button>Faire un don</button>
    </div>
  </div>
</div>
<div class="contentHomePage">
  <div class="row">
    <div class="col-xs-12 col-md-5 offset-md-1 paddingFix">
      <img src="" alt="">
      <div class="rectImgColorRed"></div>
    </div>
    <div class="col-xs-12 col-md-5 alignContainerTextHomePageRight desktopText">
      <h3>L'aide humanitaire de proximité</h3>
      <p>Développer la solidarité internationale en  créant un pont entre les sociétés civiles en  mesure d'aider celles et ceux qui en ont besoin.</p>
    </div>
  </div>


  <div class="row rowMarginTopFix">
    <div class="col-xs-12 col-md-5 offset-md-1 alignContainerTextHomePageLeft">
      <h3>Les droits de l’enfant comme valeurs souveraines</h3>
      <p>Développer la solidarité internationale en créant un pont entre les sociétés civiles en mesure de d’aider et celles qui en ont besoin.</p>
    </div>
    <div class="col-xs-12 col-md-5 paddingFix orderContentHomePage">
      <img src="" alt="">
      <div class="rectImgColorYellow"></div>
    </div>
    </div>

    <div class="row rowMarginTopFix">
      <div class="col-xs-12 col-md-5 offset-md-1 paddingFix">
        <img src="" alt="">
        <div class="rectImgColorGreen">
        </div>
      </div>
      <div class="col-xs-12 col-md-5 alignContainerTextHomePageRight desktopText">
        <h3>Notre histoire</h3>
        <p>Yalla! Pour les Enfants a été créée en juillet 2013 par des citoyens français connaisseurs de la Syrie et du Moyen-Orient, et soucieux du respect des droits l’Homme.</p>
      </div>
    </div>
  </div>





  <div class="row text-center rowMarginTopFixCallToAction">
    <div class="col-xs-12 col-md-12">
      <h4>Ensemble rendons le monde meilleur</h4>
      <button class="text-uppercase callToAction">Nous rejoindre</button>
    </div>
  </div>
  <div class="row text-center rowMarginTopFixCallToAction">
    <div class="col-xs-12 col-md-12">
      <h4>Aidez-nous à rendre le monde meilleur</h4>
      <button class="text-uppercase callToAction">Faire un don</button>
    </div>
  </div>
</div>
@endsection
