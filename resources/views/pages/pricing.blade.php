@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Pricing</title>
<meta  name="description" content="Pricing">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Pricing"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.app')
@section('content')

<div class="vApp">

<div class="vBannerWrapper w-100 beforeNone" style="background-image:url(storage/img/feature_banner_images/1622450314.jpg);background-size: cover">
<div class="container">
<div class="row align-items-center pR">
<div class="col-md-12">
<h1>Current Market Prices</h1>

<a href="{{url('register')}}" style="background-color: #25c676 !important;" class="bBtn open-account">Open An Account</a>
</div>
</div>
</div>
</div>

<script src="//widgets.coingecko.com/coingecko-coin-market-ticker-list-widget.js"></script>
<coingecko-coin-market-ticker-list-widget  coin-id="bitcoin" currency="usd" locale="en" background-color="#ffffff"></coingecko-coin-market-ticker-list-widget>


@endsection