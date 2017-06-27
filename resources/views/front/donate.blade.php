@extends('front.layout_front')

@section('content')
    <link rel="stylesheet" href="{{asset('css/screen-2.css')}}">
  <h1 class="text-center h1-don">Nous soutenir</h1>
  <div class="offset-md-1">
  <h3>Pour faire un don à Yalla!</h3>
</div>
  <div class="row margin">
    <div class="col-md-3 col-xs-12 col-lg-3 offset-md-1">
      <ul>
        <li class="font-bold">Vous pouvez à tout moment faire un don par :</li>
        <li class="margin">- Chèque bancaire à l’ordre de « Yalla! Pour les Enfants », adressé à Yalla! 13, rue René Villermé 75011 Paris</li>
        <li class="margin">- Virement bancaire sur le compte de notre association</li>
        <li class="margin">- Don en ligne sur le site de notre partenaire la plateforme de financement participatif W4 (Women’s WorldWide Web). C’est simple et rapide, tout nous est reversé (pas de commission), et les dons sont déductibles d’impôts !</li>
      </ul>
    </div>
    <div class="col-md-6 col-xs-12 col-lg-6 offset-md-1">
      <img class="img-fluid rounded" src="{{asset('img-content/front/don-1.png')}}" alt="">
    </div>
  </div>

  <div class="offset-md-8">
    <h3 class="h3-don">L'importance des dons réguliers</h3>
  </div>
  <div class="row">

      <div class="col-md-6 col-xs-12 col-lg-6 offset-md-1">
        <img class="img-fluid rounded no-active" src="{{asset('img-content/front/don-2.png')}}" alt="">
      </div>
      <div class="col-md-3 col-xs-12 col-lg-3 offset-md-1">
        <ul>
          <li>Pour répondre à nombreuses de vos questions, nous n’organisons pas de parrainage individuel et personnalisé en raison de nos ressources, limitées, et de notre principe d’équité, de ne pas faire de différence entre nos écoliers. Toutefois, le don régulier de nos adhérents et sympathisants n’en reste pas moins crucial pour le bon déroulement de l’année scolaire. il permettra aux enfants d’avoir une scolarité ininterrompue, ce qui est indispensable à son équilibre et à sa progression. En donnant 15 euros par mois, vous couvrez les frais de scolarisation d’un enfant syrien pendant une semaine.</li>
          <li class="margin">Il suffit pour cela d’autoriser un virement automatique de votre compte en banque sur celui de Yalla! en indiquant en objet : “Parrainage Yalla!”</li>
        </ul>

        <ul class="font-bold">
          <li>Coordonnées bancaires de Yalla! Pour les Enfants</li>
          <li class="margin">CREDIT COOPERATIF</li>
          <li class="margin">RIB : 42559 00005 41020040979 04</li>
          <li class="margin">IBAN : FR76 4255 9000 0541 0200 4097 904</li>
          <li class="margin">BIC : CCOPFRPPXXX</li>
        </ul>
      </div>
</div>
@endsection