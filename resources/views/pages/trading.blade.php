@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Trading</title>
<meta  name="description" content="Trading">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Trading"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />
<style>
    .shadow{
        box-shadow: 0 2px 17px 0 rgb(0 0 0 / 30%); 
    }
</style>
@endsection
@extends('layouts.app')
@section('content')
<div class="slideshow uk-position-relative" uk-slideshow="autoplay: true;animation: fade;ratio:1920:450;'">
    <div class="uk-position-relative uk-visible-toggle uk-dark">
        <ul class="uk-slideshow-items">
            <li class="slide subpage" style="background-image: url({{url('frontend/operations.jpeg')}}); background-repeat: no-repeat; background-position: 50% 50%;">
                <div class="sub-banner uk-height-1-1">
                    <div class="uk-container uk-container-large uk-height-1-1 uk-flex uk-flex-middle">
                        <h2  class="sub-caption" uk-scrollspy="cls:text-focus-in;delay: 500">Operations</h2>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="uk-clearfix"></div>
<div id="page-main" data-parents="2" data-siblings="8" data-children="0">
    <div class="uk-container uk-container-large">
        <div class="uk-grid-collapse uk-margin-large-bottom" uk-grid>
            <div class="uk-width-3-4@m uk-flex-last@m uk-flex-first@s">
                <div id="page-body" class="uk-margin-large-left r-col">
                    <br> <br>

                    <div id="content">
                          <h1 style="color:grey">TRADING</h1>
                       
                        <h3> Trade Matching Rules</h3>
                        <p> Paragon Diamonds has implemented standard exchange based technology delivered by MarketGrid Systems. The MarketGrid team have extensive experience in the development of matching engines and automated trading systems for global financial markets. They have developed highly evolved next generation architecture, with the fastest commercially available matching engine that provides complete infrastructure for automated trading including execution, clearing, depository, surveillance and regulatory requirements.
                        </p>
                        <p>  Paragon Diamonds will employ both continuous matching and negotiated matching in our baskets and single stone products.
                        </p>
                        <h3> Negotiated Matching (Single Stones)</h3>
                        <p>  Paragon Diamonds will provide the trading of single stones through an electronically negotiated market with a customized matching methodology. Order books are presented by classes of diamonds characterized by the 4 C’s with multiple individual stones listed for sale, each identified by its own unique GIA Certificate ID.
                        </p>
                        <h3>Continuous Matching (Diamond Baskets)</h3>
                        <p>Paragon Diamonds will establish the first continuous price / time priority matching for the diamond industry parallel to other global commodity exchanges. True price discovery will be achieved through real-time full order book depth and market data available to all participants in real time. Automatic matching occurs at the best prevailing bid or offer.
                        </p>

                    </div>



                    <div></div>
                </div>
            </div>
            <div class="uk-width-1-4@m uk-flex-first@m uk-flex-last@s">
                <div class="aside">
                    <h2>Operations</h2>
                    <ul class="aside uk-nav">
                        <li class="level-2 "><a href="{{url('processing')}}">Processing</a></li>
                        <li class="level-2 "><a href="{{url('sorting-distribution')}}">Sorting and Distribution</a></li>
                        <li class="level-2 "><a href="{{url('cutting-polishing')}}">Cutting and Polishing</a></li>
                        <li class="level-2 "><a href="{{url('trading')}}">Trading</a></li>
                    </ul>
                                       <br>
                     <img class=" shadow"  src="{{asset('frontend/trading.jpeg')}}" alt="trading" />
                </div>
            </div>
        </div>
    </div>
</div>

@endsection