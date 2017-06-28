@extends('front.layout_front')
@section('title', Lang::get('about.title'))
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
				<h2 class="text-center"><span class="fontWeightBoldDubai">{{Lang::get('about.title')}}</span></h2>
				<p>{{Lang::get('about.heading_p')}}</p>
			</div>
		</div>
	</div>
</div>
<!-- Début du contenu en dessous de la ligne de floataison -->
<div class="contentPageWhoAreYou">
	<div class="row">
		<div class="col-xs-12 col-md-5 offset-md-1">
			<div class="containerImgPageWhoAreYou displayNone">
				{{--<img class="imgRotatePageWhoAreYou positionnement" src="{{asset('img-content/front/quiSommesNous9.png')}}" alt="">--}}
				<div class="rectImgColorRed"></div>
			</div>
		</div>
		<div class="col-xs-12 col-md-5">
			<p>{{Lang::get('about.composition')}}</p>
		</div>				
	</div>
	<div class="row marginTopContentPageWhoAreYou">
		<div class="col-xs-12 col-md-4 offset-md-2 orderPlusOne">
			<p class="">{{Lang::get('about.volunteer')}}</p>
		</div>
		<div class="col-xs-12 col-md-5 offset-md-1">
			<div>
				<img class="positionnement widthImgSectionTwo" src="{{asset('img-content/front/quiSommesNous2.jpg')}}" alt="">
				<div class="rectImgColorPink"></div>
			</div>
		</div>				
	</div>
	<div>
		<div class="bannerPageWhoAreYouFirstPosition">
			<div class="bannerPageWhoAreYouFirst"></div>
			<div class="rectImgColorYellowBanner"></div>
		</div>
	</div>
	<div class="row justify-content-around marginTopContentPageWhoAreYou">
		<div class="col-xs-12 col-md-12 text-center">
			<h3 class="text-center styleTitleNotreStategie">{{Lang::get('about.strategy')}}</h3>
		</div>

		<div class="col-xs-12 col-md-3 text-center">
			<img class="alignBottomClassic" src="{{asset('img-layout/class-group-of-students-and-professor-in-front.svg')}}" alt="">
			<h5 class="text-center">{{Lang::get('about.benefit')}}</h5>
			<p class="paddingTopFix text-center"> {{Lang::get('about.benefit_p')}}</p>
		</div>
		<div class="col-xs-12 col-md-3 text-center">
			<img class="alignBottomClassic" src="{{asset('img-layout/world.svg')}}" alt="">
			<h5 class="text-center">{{Lang::get('about.creation')}}</h5>
			<p class="paddingTopFix text-center">{{Lang::get('about.creation_p')}}</p>
		</div>
		<div class="col-xs-12 col-md-3 text-center">
			<img class="alignBottomClassic" src="{{asset('img-layout/link.svg')}}" alt="">
			<h5 class="text-center">{{Lang::get('about.respect')}}</h5>
			<p class="paddingTopFix text-center">{{Lang::get('about.respect_p')}}</p>
		</div>
	</div>
	<h3 class="col-xs-12 col-md-12 text-center marginTopContentPageWhoAreYou styleTitleLequipeBureau">{{Lang::get('about.team')}}</h3>
	<div class="row text-center">
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
		<p class="bannerPageWhoAreYouAlignTop">{!! Lang::get('home.help') !!}</p>
		<button>{{Lang::get('home.donate')}}</button>
	</div>
</div>
@endsection