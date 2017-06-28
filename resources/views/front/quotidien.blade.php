@extends('front.layout_front')
@section('title', Lang::get('quotidien.title'))
@section('meta')
	<meta name="description" content="{{Lang::get('quotidien.meta_description')}}">
	<meta property="og:title" content="{{Lang::get('quotidien.title')}}">
	<meta property="og:type" content="article">
	<meta property="og:url" content="{{route('quotidien')}}">
	<meta property="og:image" content="{{asset('img-content/front/backgroundPageNotreQuotidien.jpg')}}">
	<meta name="twitter:card" content="summary" />
@endsection
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
			<h2>{{Lang::get('quotidien.artistic')}}</h2>
			<p>{{Lang::get('quotidien.artistic_p')}}</p>
		</div>
		<div class="col-md-4">
			<div class="text-center">
				<img src="{{asset('img-layout/ping-pong.svg')}}" alt="">
			</div>
			<h2>{{Lang::get('quotidien.activities')}}</h2>
			<p>{{Lang::get('quotidien.activities_p')}}</p>
		</div>
	</div>
</div>
@endsection