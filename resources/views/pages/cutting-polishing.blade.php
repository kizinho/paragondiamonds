@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Cutting and Polishing</title>
<meta  name="description" content="Cutting and Polishing">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Cutting and Polishing"/>
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
                        <h2  class="sub-caption" uk-scrollspy="cls:text-focus-in;delay: 500">Cutting and Polishing</h2>
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

                     A well-cut diamond reflects light within itself, from one facet to another, as well as through the top of the diamond, bringing out its spectral brilliance. The cutting and polishing of a diamond crystal always results in a dramatic loss of weight; rarely is it less than 50%. Sometimes the cutters compromise and accept lesser proportions and symmetry in order to avoid inclusions or to preserve the carat rating.
<br><br>After a stone has been cut, it is then polished and classified again, according to the 4Cs: Colour, Carat, Clarity and Cut. Due to each stone having its own unique characteristics, diamonds are non-fungible and their value can vary significantly based upon the many variances of the 4Cs mentioned above.
<br><br>
The most popular cut favoured by jewelers is the round ‘brilliant’ cut, which maximizes light reflectivity from the facets. The brilliant cut also utilities the natural octahedral shape of most diamonds, so the cutter can take advantage of the planes of weakness to cleave the diamond and minimise cutting and polishing time. Brilliant cut gem diamonds are particularly favoured in diamond engagement rings.
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection