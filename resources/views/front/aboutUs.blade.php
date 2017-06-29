@extends('front.layout_front')
@section('title', Lang::get('about.meta_title'))
@section('meta')
    <meta name="description" content="{{Lang::get('about.meta_description')}}">
    <meta property="og:title" content="{{Lang::get('about.title')}}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{route('about')}}">
    <meta property="og:image" content="{{asset('img-content/front/quiSommesNous2.jpg')}}">
    <meta name="twitter:card" content="summary" />
@endsection
@section('body_class', 'site')
@section('nav')
    <div class="quiSommesNousBg">
@endsection
@section('navClass', 'navWhite')
	@section('content')
	<!-- Début du contenu au dessus de la ligne de flotaison -->
	<div class="homePage container">
		<div class="row">
			<div class="col-xs-12 col-md-8 offset-md-2">
				<h2 class="text-center alignTopTitleAboutUS">{!!  Lang::get('about.title') !!}</h2>
			</div>
		</div>
	</div>
</div>
<!-- Début du contenu en dessous de la ligne de floataison -->
<div class="contentPageWhoAreYou">
	<div class="row">
		<div class="col-xs-12 col-md-5 offset-md-1">
			<div class="containerImgPageWhoAreYou displayNone">
				<img class="imgRotatePageWhoAreYou positionnement" src="{{asset('img-content/front/quiSommesNous9.jpg')}}" alt="vusual-Paris">
				<div class="rectImgColorRed"></div>
			</div>
		</div>
		<div class="col-xs-12 offset-md-1 col-md-4">
			<p>{{Lang::get('about.composition')}}</p>
		</div>				
	</div>
	<div class="row marginTopContentPageWhoAreYou">
		<div class="col-xs-12 col-md-4 offset-md-2 orderPlusOne">
			<p class="">{{Lang::get('about.volunteer')}}</p>
		</div>
		<div class="col-xs-12 col-md-5 offset-md-1">
			<div class="responsiveAlignHomePageImg">
				<img class="positionnement widthImgSectionTwo" src="{{asset('img-content/front/quiSommesNous2.jpg')}}" alt="Syrian family">
				<div class="rectImgColorPink"></div>
			</div>
		</div>				
	</div>
	<div>
		<div class="bannerPageWhoAreYouFirstPosition">
			<div class="bannerPageWhoAreYouFirst text-center">
				<p class="marginTopBannerAboutUs">{!! Lang::get('about.education_for_all') !!}</p>
			</div>
			<div class="rectImgColorYellowBanner"></div>
		</div>
	</div>
	<div class="row justify-content-around marginTopContentPageWhoAreYou">
		<div class="col-xs-12 col-md-12 text-center">
			<h3 class="text-center styleTitleNotreStategie">{{Lang::get('about.strategy')}}</h3>
		</div>

		<div class="col-xs-12 col-md-3 text-center">
			<img class="alignBottomClassic" src="{{asset('img-layout/class-group-of-students-and-professor-in-front.svg')}}" alt="class picto">
			<h5 class="text-center fontWeightRegularDubai">{{Lang::get('about.benefit')}}</h5>
			<p class="paddingTopFix text-center"> {{Lang::get('about.benefit_p')}}</p>
		</div>
		<div class="col-xs-12 col-md-3 text-center">
			<img class="alignBottomClassic" src="{{asset('img-layout/world.svg')}}" alt="world picto">
			<h5 class="text-center fontWeightRegularDubai">{{Lang::get('about.creation')}}</h5>
			<p class="paddingTopFix text-center">{{Lang::get('about.creation_p')}}</p>
		</div>
		<div class="col-xs-12 col-md-3 text-center">
			<img class="alignBottomClassic" src="{{asset('img-layout/link.svg')}}" alt="chain picto">
			<h5 class="text-center fontWeightRegularDubai">{{Lang::get('about.respect')}}</h5>
			<p class="paddingTopFix text-center">{{Lang::get('about.respect_p')}}</p>
		</div>
	</div>
	<h3 class="col-xs-12 col-md-12 text-center marginTopContentPageWhoAreYou styleTitleLequipeBureau">{{Lang::get('about.team')}}</h3>
	<div class="row text-center">
		<div class="col-xs-12 offset-xs-0 col-md-3 offset-md-2 containerImgNotreStrategie">
			<img class="" src="{{asset('img-content/front/quiSommesNous4.jpg')}}" alt="Presidente association">
			<div class="rectImgColorRedStrategieOne"></div>
			<p>Mary LEMELAND-MELLIONEC, Présidente de l’association</p>
		</div>
		<div class="col-xs-12 offset-xs-0 col-md-3 offset-md-2 containerImgNotreStrategie">
			<img src="{{asset('img-content/front/quiSommesNous5.jpg')}}" alt="Presidente association">
			<div class="rectImgColorRedStrategieTwo"></div>
			<p>Mary LEMELAND-MELLIONEC, Présidente de l’association</p>
		</div>
	</div>
	<div class="row text-center marginTopContentPageWhoAreYou">
		<div class="col-xs-10 offset-xs-0 col-md-3 offset-md-2 containerImgNotreStrategie">
			<img class="" src="{{asset('img-content/front/quiSommesNous6.jpg')}}" alt="secretaire association">
			<div class="rectImgColorRedStrategieThree"></div>
			<p>Sophie FANUCCHI, Secrétaire et référente juridique</p>
		</div>
		<div class="col-xs-12 offset-xs-0 col-md-3 offset-md-2 containerImgNotreStrategie">
			<img class="" src="{{asset('img-content/front/quiSommesNous7.jpg')}}" alt="Trésorier">
			<div class="rectImgColorRedStrategieFour"></div>
			<p> Pierre LEMELAND, Trésorier </p>
		</div>
	</div>
	<div class="bannerPageWhoAreYou text-center">
		<p class="bannerPageWhoAreYouAlignTop">{!! Lang::get('home.help') !!}</p>
		<button>{{Lang::get('home.donate')}}</button>
	</div>
</div>
@endsection