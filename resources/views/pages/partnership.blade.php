@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Partnership</title>
<meta  name="description" content="Partnership">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Partnership"/>
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
            <li class="slide subpage" style="background-image: url({{url('frontend/pp.jpeg')}}); background-repeat: no-repeat; background-position: 50% 50%;">
                <div class="sub-banner uk-height-1-1">
                    <div class="uk-container uk-container-large uk-height-1-1 uk-flex uk-flex-middle">
                        <h2  class="sub-caption" uk-scrollspy="cls:text-focus-in;delay: 500">Partnership</h2>
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
            <div class=" uk-flex-last@m uk-flex-first@s">
                <div id="page-body" class="uk-margin-large-left r-col">
                    <br> <br>

                    <div id="content">
                        <h3>  Paragon Diamonds Partnership</h3>
                        <p>
                            Paragon Diamonds has multiple membership opportunities. Paragon Diamonds is open to all investors and companies that meet the relevant criteria, as established by the Company’s Rules and Regulations and subject to the application procedures.

                        </p>
                    </div>
                    <br>
                    <div id="content">
                        <h3>  Economy Partner</h3>
                        <p>
                            This partnership is strictly for exclusive investors who intend to alleviate and proliferate their finances through our colossal aid from the diamond exchange market.   
                        </p>
                    </div>
                    <br>
                    <div id="content">
                        <h3>  Business Partner</h3>
                        <p>
                            This partnership is strictly for companies which have interest in the expansion and augmentation of their business through our quintessential benefits from the diamond exchange market.
                        </p>
                    </div>
                    <div></div>
                </div>
            </div>
          
        </div>
    </div>
</div>
@endsection