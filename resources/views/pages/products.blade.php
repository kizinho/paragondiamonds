@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Products</title>
<meta  name="description" content="Products">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Products"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />
<style>
    .shadow{
        box-shadow: 0 2px 17px 0 rgb(0 0 0 / 30%); 
    }
    .border-green-500 {
        border-color: #2596be!important;
        color: #2596be!important;
    }
    .hover\:bg-green-500:hover{
        background: #2596be!important;
        color: #fff!important;
    }
</style>
@endsection
@extends('layouts.app')
@section('content')
<div class="slideshow uk-position-relative" uk-slideshow="autoplay: true;animation: fade;ratio:1920:450;'">
    <div class="uk-position-relative uk-visible-toggle uk-dark">
        <ul class="uk-slideshow-items">
            <li class="slide subpage" style="background-image: url({{url('frontend/products.jpeg')}}); background-repeat: no-repeat; background-position: 50% 50%;">
                <div class="sub-banner uk-height-1-1">
                    <div class="uk-container uk-container-large uk-height-1-1 uk-flex uk-flex-middle">
                        <h2  class="sub-caption" uk-scrollspy="cls:text-focus-in;delay: 500">Products</h2>
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
            <div class="uk-flex-last@m uk-flex-first@s">
                <div id="page-body" class="uk-margin-large-left r-col">
                    <br> <br>

                    <div id="content">
                        <div uk-grid>
                            <div class="uk-width-1-3@m image text-center">

                                <img style="padding-left: 20px!important;height: 400px!important" src="{{asset('frontend/single-stones.jpg')}}" alt="single-stones" />
                            </div>
                            <div class="uk-width-2-3@m verbage">

                                <h3>Single Stones</h3>
                                <p> Immobilized single stones traded individually in an electronically negotiated market with prompt settlement.
                                </p>
                                <ul>
                                    <p> <li class="fa fa-check"> Stones are Traded individually</li></p>
                                    <p><li class="fa fa-check"> Order books are defined and grouped by the 4 C’s into categories
                                        (eg. All 3 carat, round, D color, IF stones are shown in one group)</li></p>
                                    <p><li class="fa fa-check"> Identified by unique GIA certificate number</li></p>
                                    <p><li class="fa fa-check"> Trades are electronically negotiated</li></p>
                                    <p> <li class="fa fa-check"> Buyers can place indicative price bids by diamond category</li></p>
                                    <p><li class="fa fa-check"> GIA lab graded</li></p>
                                </ul>

                                 <a target="_black" href="{{url('single-stone-pdf')}}"> <button class="border-2 border-green-500 px-4 py-2  hover:bg-green-500 hover:text-white">SINGLE STONE PRODUCT SPEC</button>
                                 </a>
                             <br>   <br>
                            </div>
                        </div>
                    </div>
                    <br>
                     <div id="content">
                        <div uk-grid>
                            <div class="uk-width-1-3@m image text-center">

                                <img style="padding-left: 20px!important;height: 400px!important"  src="{{asset('frontend/diamond-baskets.jpg')}}" alt="single-stones" />
                             </div>
                             <div class="uk-width-2-3@m verbage">

                                 <h3>Diamond Baskets</h3>
                                 <p> Immobilized and fungible baskets to be traded on a price/time priority in a continuous market.
                                 </p>
                                 <ul>
                                     <p> <li class="fa fa-check"> A collection of GIA lab graded diamonds</li></p>
                                     <p><li class="fa fa-check"> All baskets are fungible</li></p>
                                     <p><li class="fa fa-check"> Baskets are traded electronically on price / time priority</li></p>
                                     <p><li class="fa fa-check"> Baskets are defined by the 4 C’s</li></p>
                                     <p> <li class="fa fa-check"> Each basket has identical number of stones and total weight</li></p>
                                     <p><li class="fa fa-check"> Each basket includes stones of identical cut</li></p>
                                     <p><li class="fa fa-check"> Each basket includes stones of identical clarity</li></p>
                                     <p><li class="fa fa-check"> Each basket includes stones of identical color</li></p>

                                 </ul>
                                   <a target="_black" href="{{url('diamond-baskets-pdf')}}"> <button class="border-2 border-green-500 px-4 py-2  hover:bg-green-500 hover:text-white">DIAMOND BASKETS PRODUCT SPEC</button>
                                 </a>
                             <br>   <br>
                             </div>
                        </div>
                    </div>


                    <div></div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection