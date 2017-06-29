@extends('front.layout_front')
@section('title', Lang::get('donate.title'))
@section('meta')
  <meta name="description" content="{{Lang::get('donate.meta_description')}}">
  <meta property="og:title" content="{{Lang::get('donate.title')}}">
  <meta property="og:type" content="article">
  <meta property="og:url" content="{{route('donate')}}">
  <meta property="og:image" content="{{asset('img-content/front/don-2.png')}}">
  <meta name="twitter:card" content="summary" />
@endsection
@section('content')
    <link rel="stylesheet" href="{{asset('css/screen-2.css')}}">
  <h1 class="text-center h1-don">{{Lang::get('donate.support')}}</h1>
  <div class="offset-md-1">
  <h2>{{Lang::get('donate.donate-to-yalla')}}</h2>
</div>
  <div class="row margin">
    <div class="col-md-3 col-xs-12 col-lg-3 offset-md-1">
      <ul>
        <li class="font-bold">{{Lang::get('donate.donate-any-time')}}</li>
        <li class="margin">{{Lang::get('donate.bank-check')}}</li>
        <li class="margin">{{Lang::get('donate.bank-transfer')}}</li>
        <li class="margin">{{Lang::get('donate.online-donation')}}</li>
      </ul>
    </div>
    <div class="col-md-6 col-xs-12 col-lg-6 offset-md-1">
      <img class="img-fluid rounded" src="{{asset('img-content/front/don-1.png')}}" alt="">
      <div class="rectImgColorYellowDonate"></div>
    </div>
  </div>
    <h2 class="h3-don text-center" style="font-size: 2.5em">{{Lang::get('donate.importance')}}</h2>

    <div class="container">
      <div class="col-md-12 col-xs-12 col-lg-12 row">
        <img class="img-fluid rounded" src="{{asset('img-content/front/don-2.png')}}" alt="" style="position: relative">
        <div class="rectImgColorGreenDonate"></div>
      </div>
      <div class="col-md-12 col-xs-12 col-lg-12 row">
        <ul class="col-md-6 margin" style="border-right: 1px solid lightgrey; line-height: 200%">
          <li>{{Lang::get('donate.regular-donation')}}</li>
          <li class="margin">{{Lang::get('donate.automatic-payement')}}</li>
        </ul>

        <ul class="font-bold col-md-6 margin col-lg-6 col-xs-12">
          <li>{{Lang::get('donate.bank-details')}}</li>
          <li class="margin">{{Lang::get('donate.credit')}}</li>
          <li class="margin">{{Lang::get('donate.RIB')}}</li>
          <li class="margin">{{Lang::get('donate.IBAN')}}</li>
          <li class="margin">{{Lang::get('donate.BIC')}}</li>
        </ul>
      </div>
</div>
@endsection