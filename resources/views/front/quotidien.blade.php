@extends('front.layout_front')
@section('title', Lang::get('about.title'))
@section('body_class', 'site')
@section('nav')
    <div class="backgroundPageNotreQuotidien">
@endsection
@section('navClass', 'navWhite')
	@section('content')
<div class="homePage">
	<div class="row">
		<div class="col-xs-12 col-md-12">
			<h2 class="text-center">Un <span class="fontWeightBoldDubai">quotidien</span> Des <span class="fontWeightBoldDubai">objectifs Des projets</span></h2>
		</div>
	</div>
</div>
</div>
<div class="contentQuotidien container">
	<div class="row quotidientRowMarginTop justify-content-around">
		<div class="col-md-4">
			<div class="text-center">
				<img src="{{asset('img-layout/mortarboard.svg')}}" alt="">
			</div>
			<h2>Le droit à l’éducation</h2>
			<ul>
				<li>- Remettre l’enfant à niveau et le réhabituer au rythme scolaire</li>
				<li>- Intégrer l’enfant au sein du système scolaire classique afin qu’il puisse obtenir un diplôme et lui donner toutes les chances de succès dans sa vie future</li>
				<li>- De mars à juillet 2014, Yalla! a ouvert une école informelle accueillant 50 enfants syriens réfugiés dans le quartier de Karam Zeitoun à Beyrouth. L’équipe pédagogique, composée d’une directrice des études libanaise et de trois professeurs syriens réfugiés, ont remis à niveau 50 enfants syriens réfugiés en arabe, mathématiques et anglais.</li>
			</ul>
		</div>
		<div class="col-md-4">
			<div class="text-center">
				<img src="{{asset('img-layout/idea.svg')}}" alt="">
			</div>
			<h2>Un développement personel</h2>
			<p>Permettre le développement de l’enfant dans un environnement sécurisé et adapté afin qu’il retrouve confiance en lui et panse ses blessures liées à l’exil et au conflit.
			</p>				
		</div>
	</div>
	<div class="row quotidientRowMarginTop justify-content-around">
		<div class="col-md-4">
			<div class="text-center">
				<img src="{{asset('img-layout/palette.svg')}}" alt="">
			</div>
			<h2>Plusieurs ateliers artistiques</h2>
			<p>Les enfants ont bénéficié d’activités psycho-pédagogiques, animés par des bénévoles syriens, qui leur ont permis de se développer dans un environnement serein. Chaque jour, des ateliers de dessins et de chants ont participé à leur épanouissement.</p>
		</div>
		<div class="col-md-4">
			<div class="text-center">
				<img src="{{asset('img-layout/ping-pong.svg')}}" alt="">
			</div>
			<h2>Des activités sportives</h2>
			<p>Les enfants bénéficient de plusieurs activités sportive, animés par nos bénévoles, ce qui leur permet de se défouler et de s’épanouir.</p>
		</div>
	</div>
</div>
@endsection