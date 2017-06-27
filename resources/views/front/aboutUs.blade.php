@extends('front.layout_front')
@section('body_class', 'site')
@section('nav')
    <div class="quiSommesNousBg">
@endsection
@section('content')
			<!-- Début du contenu au dessus de la ligne de flotaison -->
			<div class="homePage">
				<div class="row">
					<div class="col-xs-12 col-md-8 offset-md-2">
						<h2 class="text-center"><span class="fontWeightBoldDubai">Qui sommes nous ?</span></h2>
						<p>Yalla! est une association qui aide les enfants Syrien psychologiquement mais également à avoir accès à l’éducation.</p>
					</div>
				</div>
			</div>
		</div>
		<!-- Début du contenu en dessous de la ligne de floataison -->
		<div class="contentPageWhoAreYou">
			<div class="row">
				<div class="col-xs-12 col-md-5 offset-md-1">
					<div class="containerImgPageWhoAreYou displayNone">
						<img class="imgRotatePageWhoAreYou positionnement" src="" alt="">
						<div class="rectImgColorRed"></div>
					</div>
				</div>
				<div class="col-xs-12 col-md-5">
					<p>Yalla ! est dirigée par un Bureau composé de quatre membres, qui rendent compte des actions de Yalla ! aux adhérents de l’association à travers des rapports d’activités concernant chaque projet et lors des Assemblées générales tenues une fois par an à Paris.</p>
				</div>				
			</div>
			<div class="row marginTopContentPageWhoAreYou">
				<div class="col-xs-12 col-md-4 offset-md-2 orderPlusOne">
					<p class="">Les bénévoles de Yalla ! à Paris et sur le terrain ont préalablement adopté les valeurs de l’association et agissent conformément à ses principes. Ils rapportent leurs activités de façon régulière au Bureau qui contrôle la conformité des actions développées sur le terrain à la mission et aux valeurs que s’est données Yalla !.</p>
				</div>
				<div class="col-xs-12 col-md-5 offset-md-1">
					<div class="containerImgPageWhoAreYouSecond">
						<img class="positionnement widthImgSectionTwo" src="{{asset('img-content/front/quiSommesNous2.jpg')}}" alt="">
						<div class="rectImgColorPink"></div>
					</div>
				</div>				
			</div>
			<div class="row">
				<div class="bannerPageWhoAreYouFirst">
					<!-- <div class="rectImgColorYellowBanner"></div> -->
				</div>
			</div>
			<div class="row justify-content-around marginTopContentPageWhoAreYou">
				<div class="col-xs-12 col-md-12">
					<h3 class="text-center styleTitleNotreStategie">Notre stratégie</h3>
				</div>

				<div class="col-xs-12 col-md-3">
					<img class="alignBottomClassic" src="{{asset('img-layout/class-group-of-students-and-professor-in-front.svg')}}" alt="">
					<h5 class="text-center">Intégration des bénéficiaires</h5>
					<p class="paddingTopFix">et de la communauté d’accueil à tous les stades de développement du projet afin de garantir une compréhension mutuelle des enjeux et objectifs du projet, et contribuer au succès de la mission.</p>
				</div>
				<div class="col-xs-12 col-md-3">
					<img class="alignBottomClassic" src="{{asset('img-layout/world.svg')}}" alt="">
					<h5 class="text-center">Création d’un lien dynamique entre les donateurs et les bénéficiaires</h5>
					<p class="paddingTopFix">afin de créer une solidarité de proximité et garantir une visibilité sur la destination et l’impact des dons quels que soient leurs montants, tout en faisant parvenir aux bénéficiaires un message de soutien concret de la part de la société civile solidaire.</p>
				</div>
				<div class="col-xs-12 col-md-3">
					<img class="alignBottomClassic" src="{{asset('img-layout/link.svg')}}" alt="">
					<h5 class="text-center">Respect de la coordination de l’aide humanitaire</h5>
					<p class="paddingTopFix">menée par les agences humanitaires des Nations Unies, afin de s’intégrer dans une action globale et parvenir ensemble à plus d’efficacité pour répondre aux besoins les plus prégnants.</p>
				</div>
			</div>
			<h3 class="col-xs-12 col-md-12 text-center marginTopContentPageWhoAreYou styleTitleNotreStategie">L’équipe du Bureau</h3>
			<div class="row text-center marginTopContentPageWhoAreYou">
				<div class="col-xs-12 offset-xs-0 col-md-3 offset-md-2 containerImgNotreStrategie">
					<img class="" src="{{asset('img-content/front/quiSommesNous4.jpg')}}" alt="">
					<div class="rectImgColorRedStrategieOne"></div>
					<p>Mary LEMELAND-MELLIONEC, Présidente de l’association</p>
				</div>
				<div class="col-xs-12 offset-xs-0 col-md-3 offset-md-2 containerImgNotreStrategie">
					<img src="{{asset('img-content/front/quiSommesNous5.jpg')}}" alt="">
					<div class="rectImgColorRedStrategieTwo"></div>
					<p>Mary LEMELAND-MELLIONEC, Présidente de l’association</p>
				</div>
			</div>
			<div class="row text-center marginTopContentPageWhoAreYou">
				<div class="col-xs-10 offset-xs-0 col-md-3 offset-md-2 containerImgNotreStrategie">
					<img class="" src="{{asset('img-content/front/quiSommesNous6.jpg')}}" alt="">
					<div class="rectImgColorRedStrategieThree"></div>
					<p>Sophie FANUCCHI, Secrétaire et référente juridique</p>
				</div>
				<div class="col-xs-12 offset-xs-0 col-md-3 offset-md-2 containerImgNotreStrategie">
					<img class="" src="{{asset('img-content/front/quiSommesNous7.jpg')}}" alt="">
					<div class="rectImgColorRedStrategieFour"></div>
					<p> Pierre LEMELAND, Trésorier </p>
				</div>
			</div>
			<div class="bannerPageWhoAreYou text-center">
				<p>Un petit geste à <span class="fontWeightBoldDubai">plusieurs</span>, un grand pas <span class="fontWeightBoldDubai">ensemble</span></p>
				<button class="text-uppercase">faire un don</button>
			</div>
		</div>
@endsection