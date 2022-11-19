@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Diamond Formation</title>
<meta  name="description" content="Diamond Formation">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Diamond Formation"/>
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
                        <h2  class="sub-caption" uk-scrollspy="cls:text-focus-in;delay: 500">Diamond Formation</h2>
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
                            
                         Diamonds are formed in the upper mantle of the Earth, around 100 miles below surface, by a combination of extremely high temperatures and pressures which enable the growth of diamond crystals from carbon. These crystals are then brought to the surface from the upper mantle by a volcanic eruption, when the cooling molten magma forms a diamond-bearing kimberlite or lamproite. Kimberlites occur in clusters of up to five or more, in close proximity to each other. They are not necessarily all the consequence of a single volcanic event. Indeed, they may have resulted from several different events over a period of time, adding to the complexity of sampling and proving their economic potential. These are the source of the majority of diamonds mined today but are increasingly rare with only circa 30 diamond mines of scale in operation today.
                         
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