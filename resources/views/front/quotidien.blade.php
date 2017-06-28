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
			<h2 class="text-center">{!! Lang::get('quotidien.main_title') !!}</h2>
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
			<h2>{{Lang::get('quotidien.education')}}</h2>
			<ul>
				{!! Lang::get('quotidien.education_lis') !!}
			</ul>
		</div>
		<div class="col-md-4">
			<div class="text-center">
				<img src="{{asset('img-layout/idea.svg')}}" alt="">
			</div>
			<h2>{{Lang::get('quotidien.personal')}}</h2>
			<p>{{Lang::get('quotidien.personal_lis')}}</p>
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