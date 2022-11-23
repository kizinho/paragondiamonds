@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Processing</title>
<meta  name="description" content="Processing">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Processing"/>
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
                        <h2  class="sub-caption" uk-scrollspy="cls:text-focus-in;delay: 500">Operations</h2>
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
                        <h1 style="color:grey">PROCESSING</h1>
                        <p> 

                            Once a diamond operation yields ore, the diamonds must be sorted from the other materials. Excavated ore is transported to a processing plant. The kimberlite is first crushed and then processed through the plant, which consists of a series of screens, jigs and scrubbers and a gravity pan or DMS plant to remove lighter particles and create a concentrate of heavy material, which includes the diamonds.
                            Diamonds are then extracted from this material by using an X-ray machine and/or grease table and checked by hand sorting. Most diamonds luminesce under X-rays and can therefore be identified and separated in final recovery. However, some diamonds – particularly more valuable Type II stones – do not respond well to X-rays, so grease tables are used to recover such stones. As diamonds are hydrophobic (meaning they repel water), they stick to the grease while the rest of the wet concentrate runs off.
                            <br><br>
                            The treatment of ROM kimberlite ore produces a sink (high density material in which diamonds are concentrated) and a float product. The float material (which may still contain diamonds) is discarded onto a coarse tailings dump. Once the sink material has been further treated and examined for diamonds it is also discarded onto a recovery tailings dump. The discarded material can then be mined and treated at a later stage if the diamond price renders it economically feasible.
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
                       <br>
                     <img class=" shadow"  src="{{asset('frontend/proccessing.jpeg')}}" alt="proccessing" />
                </div>
            </div>
        </div>
    </div>
</div>

@endsection