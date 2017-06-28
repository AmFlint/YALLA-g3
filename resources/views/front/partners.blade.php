@extends('front.layout_front')

@section('content')
<div class="pagePartners">
	<h1 class="text-center">Nos partenaires</h1>
	<h2 class="text-center">Que nous tenons à remercier</h2>	
</div>
<div class="row justify-content-around text-center pagePartners">
	<div class="col-md-3">
		<a href="">
			<img src="{{asset('img-content/front/partenaire-01.png')}}" alt="">
		</a>
	</div>
	<div class="col-md-3">
		<a href="">
			<img src="{{asset('img-content/front/partenaire-02.png')}}" alt="">
		</a>
	</div>
	<div class="col-md-3">
		<a href="">
			<img src="{{asset('img-content/front/partenaire-03.png')}}" alt="">
		</a>
	</div>
</div>
<div class="row justify-content-around text-center pagePartners">
	<div class="col-md-3">
		<a href="">
			<img src="{{asset('img-content/front/partenaire-04.png')}}" alt="">
		</a>
	</div>
	<div class="col-md-3">
		<a href="">
			<img src="{{asset('img-content/front/partenaire-05.png')}}" alt="">
		</a>
	</div>
	<div class="col-md-3">
		<a href="">
			<img src="{{asset('img-content/front/partenaire-06.png')}}" alt="">
		</a>
	</div>
</div>
<div class="row justify-content-around text-center pagePartners">
	<div class="col-md-3">
		<a href="">
			<img src="{{asset('img-content/front/partenaire-07.png')}}" alt="">
		</a>
	</div>
	<div class="col-md-3">
		<a href="">
			<img src="{{asset('img-content/front/partenaire-08.png')}}" alt="">
		</a>
	</div>
	<div class="col-md-3">
		<a href="">
			<img src="{{asset('img-content/front/partenaire-09.png')}}" alt="">
		</a>
	</div>
</div>

@endsection