@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Social</title>
<meta  name="description" content="Social">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Social"/>
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
            <li class="slide subpage" style="background-image: url({{url('frontend/sustainability.jpeg')}}); background-repeat: no-repeat; background-position: 50% 50%;">
                <div class="sub-banner uk-height-1-1">
                    <div class="uk-container uk-container-large uk-height-1-1 uk-flex uk-flex-middle">
                        <h2  class="sub-caption" uk-scrollspy="cls:text-focus-in;delay: 500">Social</h2>
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
                        <p>
                          We are committed to maintaining strong working relationships with our workforce, suppliers, communities and stakeholders. Paragon Diamonds recognises that any mining project is finite, and therefore works to provide lasting, sustainable benefits in the communities where we live and work. Our contributions to the development of our local communities goes beyond the creation of jobs, generation of taxes and payment of royalties, we also invest in sustainable, community-driven projects and initiatives that advance our commitments.
                        </p>
                       
                    </div>



                    <div></div>
                </div>
            </div>
            <div class="uk-width-1-4@m uk-flex-first@m uk-flex-last@s">
                <div class="aside">
                    <h2>Sustainability</h2>
                    <ul class="aside uk-nav">
                        <li class=" level-2"><a href="{{url('sustainability')}}">Sustainability</a></li>
                        <li class="level-2 "><a href="{{url('environmental')}}">Environment</a></li>
                        <li class=" level-2"><a href="{{url('social')}}">Social</a></li>
                        <li class="level-2 "><a href="{{url('governance')}}">Governance</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection