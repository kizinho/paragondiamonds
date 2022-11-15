@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Mission and Vision</title>
<meta  name="description" content="Mission and Vision">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Mission and Vision"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.app')
@section('content')
<div class="slideshow uk-position-relative" uk-slideshow="autoplay: true;animation: fade;ratio:1920:450;'">
    <div class="uk-position-relative uk-visible-toggle uk-dark">
        <ul class="uk-slideshow-items">
            <li class="slide subpage" style="background-image: url({{url('frontend/about.jpeg')}}); background-repeat: no-repeat; background-position: 50% 50%;">
                <div class="sub-banner uk-height-1-1">
                    <div class="uk-container uk-container-large uk-height-1-1 uk-flex uk-flex-middle">
                        <h2  class="sub-caption" uk-scrollspy="cls:text-focus-in;delay: 500">Mission and Vision</h2>
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
                    <br>
                    <h3  class="uk-margin-medium-bottom page-title ">Our Vision</h3>
                    <div id="content">
                        <p>
                      Our vision is to be the best consumer-centric diamond company in the world, to deliver insight, innovation and business solutions that will make us the bedrock of our customers' success.  </p>
                   
                    </div>
                      <h3  class="uk-margin-medium-bottom page-title ">Our Mission</h3>
                    <div id="content">
                        <p>
                      Our mission is to focus on value rather than volume production by optimising recoveries from its assets in order to maximize their efficiency and profitability. The company aims to generate tangible value for each of its stakeholders thereby contributing to the socio-economic development of its host countries and supporting long-term sustainable operations to the benefit of its employees, partners and communities
                        </p>
                   
                    </div>
                    <div></div>
                </div>
            </div>
            <div class="uk-width-1-4@m uk-flex-first@m uk-flex-last@s">
                <div class="aside">
                    <h2>About Us</h2>
                    <ul class="aside uk-nav">
                        <li class="level-2 uk-active"><a href="{{url('about-us')}}">About Us</a></li>
                        <li class="level-2 "><a href="{{url('about-overview')}}">Overview</a></li>
                        <li class="level-2 "><a href="{{url('about-vision-mission')}}">Vision and Mission</a></li>
                        <li class=" level-2"><a href="{{url('management')}}">Management</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection