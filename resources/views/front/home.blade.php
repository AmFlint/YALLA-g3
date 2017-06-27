@extends('front.layout_front')

@section('body_class', 'site')
@section('content')
  <!-- header -->
  <video src="{{asset('video/backgroundHomePage.mp4')}}" autoplay="1" loop="1"></video>
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
        <img src="{{asset('img-content/front/homePage1.jpg')}}" alt="">
        <div class="rectImgColorRed"></div>
      </div>
      <div class="col-xs-12 col-md-5 alignContainerTextHomePageRight desktopText">
        <h3>L'aide humanitaire de proximité</h3>
        <p>Développer la solidarité internationale en  créant un pont entre les sociétés civiles en  mesure d'aider celles et ceux qui en ont besoin.</p>
        <img src="{{asset('img-layout/picto-plus-copy.svg')}}" alt="">
      </div>
    </div>
    <div class="row rowMarginTopFix">
      <div class="col-xs-12 col-md-5 offset-md-1 alignContainerTextHomePageLeft">
        <h3>Les droits de l’enfant comme valeurs souveraines</h3>
        <p>Développer la solidarité internationale en créant un pont entre les sociétés civiles en mesure de d’aider et celles qui en ont besoin.</p>
        <img src="{{asset('img-layout/picto-plus-copy.svg')}}" alt="">
      </div>
      <div class="col-xs-12 col-md-5 paddingFix orderContentHomePage">
        <img src="{{asset('img-content/front/homePage2.jpg')}}" alt="">
        <div class="rectImgColorYellow"></div>
      </div>
    </div>

    <div class="row rowMarginTopFix">
      <div class="col-xs-12 col-md-5 offset-md-1 paddingFix">
        <img src="{{asset('img-content/front/homePage3.jpg')}}" alt="">
        <div class="rectImgColorGreen">
        </div>
      </div>
      <div class="col-xs-12 col-md-5 alignContainerTextHomePageRight desktopText">
        <h3>Notre histoire</h3>
        <p>Yalla! Pour les Enfants a été créée en juillet 2013 par des citoyens français connaisseurs de la Syrie et du Moyen-Orient, et soucieux du respect des droits l’Homme.</p>
        <img src="{{asset('img-layout/picto-plus-copy.svg')}}" alt="">
      </div>
    </div>
  </div> 
  <div class="row rowMarginTopFixCallToAction justify-content-center derniereActu">
    <div class="col-md-12 offset-md-12">
      <h3 class="text-center">Notre dernière actualité</h3>
    </div>
    <div class="col-md-5 col-xs-12 text-center">
      <img src="{{asset('img-content/front/homePage4.jpg')}}" alt="">
      <h4 class="marginTopAddTag">Fest-noz solidaire le 29 octobre à Poullaouen</h4>
      <p class="marginTopAddTag">Yalla! Pour les Enfants vous convie le samedi 29 octobre à un fest-noz de levée de fonds dont les entiers bénéfices reviendront à son école d’Aley, située au Liban, à quelques kilomètres</p>
      <div>
        <button class="text-uppercase">lire l'article</button>
      </div>
      <a class="marginTopAddTag hoverFix" href="">Voir tous nos articles</a>
    </div>
  </div>
  <div class="row text-center rowMarginTopFixCallToAction">
    <div class="col-xs-12 col-md-12 buttonCTA backgroundBannerHommePageOne">
      <p style="margin-top: 15vh;">Un petit geste à <span class="fontWeightBoldDubai">plusieurs</span> un grand pas <span class="fontWeightBoldDubai">ensemble</span></p>
      <button>Faire un don</button>
    </div>
  </div>
  <div class="row text-center">
    <div class="col-xs-12 col-md-12 buttonCTA backgroundBannerHommePage2">
      <p style="margin-top: 15vh;">Devenez <span class="fontWeightBoldDubai">membre</span> de ce projet</p>
      <button>Nous rejoindre</button>
    </div>
  </div>
</div>
@endsection