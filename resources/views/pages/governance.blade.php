@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Governance</title>
<meta  name="description" content="Governance">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Governance"/>
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
                        <h2  class="sub-caption" uk-scrollspy="cls:text-focus-in;delay: 500">Governance</h2>
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
                        We adopted and apply good international corporate governance principles aligned with our values and the requirements of publicly listed mining companies. Corporate responsibility is central to our strategic and operational thinking. We cannot sustain good financial and operational performance without simultaneously achieving our objectives in health and safety, environmental stewardship, human resource development, and community investment. We believe our transparent approach to doing business is the only way to fully engage our stakeholders in a meaningful and mutually beneficial relationship.
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