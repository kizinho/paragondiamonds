@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Diamond Mining</title>
<meta  name="description" content="Diamond Mining">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Diamond Mining"/>
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
            <li class="slide subpage" style="background-image: url({{url('frontend/diamond.jpeg')}}); background-repeat: no-repeat; background-position: 50% 50%;">
                <div class="sub-banner uk-height-1-1">
                    <div class="uk-container uk-container-large uk-height-1-1 uk-flex uk-flex-middle">
                        <h2  class="sub-caption" uk-scrollspy="cls:text-focus-in;delay: 500">Diamond Mining</h2>
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
                            
                        Paragon Diamonds is employing open pit mining at the Lemphane mine in Lesotho. Mining of a diamond-bearing kimberlite generally starts with the excavation of a pit into the kimberlite pipe. In this process, called ‘‘open-pit’’ or ‘‘open-cast’’ mining, the initially weathered ore material is removed with large hydraulic shovels and ore trucks. Hard rock is drilled and blasted with explosives so the broken material can be removed.
Open pits are excavated until the strip ratio (the amount of host rock that must be stripped away in order to access new ore) becomes prohibitive to the mine’s operating cost. It is now used extensively as an underground mining method as it allows for the bulk mining of large orebodies and enables a higher ore extraction percentage compared to other underground mining methods. It can be applied to mine massive orebodies which have large, regular “footprints” and either dip steeply or are of large vertical extent.

                        </p>
                        

                    </div>

                   

                    <div></div>
                </div>
            </div>
            <div class="uk-width-1-4@m uk-flex-first@m uk-flex-last@s">
                <div class="aside">
                    <h2>Overview</h2>
                    <ul class="aside uk-nav">
                        <li class="level-2 "><a href="{{url('about-diamond')}}">About Diamonds</a></li>
                        <li class="level-2 "><a href="{{url('diamond-formation')}}">Diamond Formation</a></li>
                        <li class="level-2 "><a href="{{url('diamonds-mining')}}">Diamond Mining</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection