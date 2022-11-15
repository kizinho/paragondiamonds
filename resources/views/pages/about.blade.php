@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; About Us</title>
<meta  name="description" content="About Us">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - About Us"/>
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
                        <h2  class="sub-caption" uk-scrollspy="cls:text-focus-in;delay: 500">About Us</h2>
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
                    <h1 style="color:#000" class="uk-margin-medium-bottom page-title">About Us</h1>
                    <div id="content">
                        <p> Paragon Diamonds is an international diamond production and distribution company and a consistent supplier of polished diamonds to the international market. We have an extensive portfolio incorporating interests in Lemphane project in Lesotho.
                        </p>
                        <p> Paragon Diamonds is regarded by industry experts to be one of the most innovative global diamond company in today’s quickly evolving industry. Our Lemphane Open-pit mine is among the biggest diamond producing mines in Lesotho. We have an experienced board and management team and operates transparently in accordance with international best practices in the areas of sustainability, health, safety, environment, and community relations. Our employees come from a very wide range of cultures, religions and ethnic backgrounds, each contributing to the rich tapestry that has formed our corporate culture.
                        </p>
                        <p>
                            Paragon's strategy is to focus on value rather than volume production by optimizing recoveries from its high-quality asset base inorder to maximize their efficiency and profitability. We have a significant resource base of ca. 243 million carats, which supports the potential for long- life operations.
                        </p>
                        <p> We conducts all operations according to the highest ethical standards . Our company aims to generate tangible value for each of our stakeholders, thereby contributing to the socio- economic development of our host countries and supporting long-term sustainable operations to the benefit of our employees, partners and communities. Paragon Diamonds offers unparalleled portfolio and risk management services to our registered clients in polished diamonds and crypto currency. Our in-depth knowledge and global commodity relationship benefits our clients in securing efficient commodity procurement , logistics and financial security across the globe.
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