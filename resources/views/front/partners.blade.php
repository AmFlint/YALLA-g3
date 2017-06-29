@extends('front.layout_front')
@section('title', Lang::get('partners.title'))
@section('meta')
	<meta name="description" content="{{Lang::get('partners.meta_description')}}">
	<meta property="og:title" content="{{Lang::get('partners.title')}}">
	<meta property="og:type" content="article">
	<meta property="og:url" content="{{route('partners')}}">
	<meta property="og:image" content="{{asset('img-content/front/homePage1.jpg')}}">
	<meta name="twitter:card" content="summary" />
@endsection
@section('content')
<div class="pagePartners">
	<h1 class="text-center fontWeightBoldDubai">Nos partenaires</h1>
	<h2 class="text-center">Que nous tenons à remercier</h2>	
</div>
<div class="row justify-content-around text-center pagePartners">
	<div class="col-md-3">
		<a href="">
			<img src="{{asset('img-content/front/partenaire-01.png')}}" alt="institut francais du liban">
		</a>
	</div>
	<div class="col-md-3">
		<a href="">
			<img src="{{asset('img-content/front/partenaire-02.png')}}" alt="women's worldwide web">
		</a>
	</div>
	<div class="col-md-3">
		<a href="">
			<img src="{{asset('img-content/front/partenaire-03.png')}}" alt="kitabna">
		</a>
	</div>
</div>
<div class="row justify-content-around text-center pagePartners">
	<div class="col-md-3">
		<a href="">
			<img src="{{asset('img-content/front/partenaire-04.png')}}" alt="collectif de develloppement et secours syrien">
		</a>
	</div>
	<div class="col-md-3">
		<a href="">
			<img src="{{asset('img-content/front/partenaire-05.png')}}" alt="le bistro syrien">
		</a>
	</div>
	<div class="col-md-3">
		<a href="">
			<img src="{{asset('img-content/front/partenaire-06.png')}}" alt="offra">
		</a>
	</div>
</div>
<div class="row justify-content-around text-center pagePartners">
	<div class="col-md-3">
		<a href="">
			<img src="{{asset('img-content/front/partenaire-07.png')}}" alt="offra">
		</a>
	</div>
	<div class="col-md-3">
		<a href="">
			<img src="{{asset('img-content/front/partenaire-08.png')}}" alt="microdon donnez un peu plus souvent">
		</a>
	</div>
	<div class="col-md-3">
		<a href="">
			<img src="{{asset('img-content/front/partenaire-09.png')}}" alt="rotary">
		</a>
	</div>
</div>

@endsection