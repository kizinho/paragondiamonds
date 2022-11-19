@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Environment</title>
<meta  name="description" content="Environment">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Environment"/>
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
                        <h2  class="sub-caption" uk-scrollspy="cls:text-focus-in;delay: 500">Environment</h2>
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
                        <p> We are committed to responsible development and continuous improvement. We apply the precautionary principle in all of our planning. Thorough environmental and social impact assessments have assisted us in developing robust management systems, policies, plans and procedures all aimed at minimizing adverse impacts and maximizing opportunities for sustainable investments.
                        </p>
                        <p>
                            We promote environmental education and awareness in our operations and our local communities. We expect our employees, contractors and visitors will behave and conduct themselves in ways that protect the environment and actively seek to mitigate potential adverse impacts to the environment, through effective and efficient waste management, water use, energy use and biodiversity conservation practices.
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