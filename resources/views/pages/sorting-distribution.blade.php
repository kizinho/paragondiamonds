@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Sorting and Distribution</title>
<meta  name="description" content="Sorting and Distribution">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Sorting and Distribution"/>
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
                        <h2  class="sub-caption" uk-scrollspy="cls:text-focus-in;delay: 500">Sorting and Distribution</h2>
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

                      At the end of each production cycle, the diamonds produced at our mines are delivered to our sorting facility, where they are cleaned and acidized, before being sorted into international sales assortments. The rough diamonds are first sorted by size (carat weight) and then each size faction is sorted into quality ranges, depending on each stone’s colour and clarity. High quality larger stones or coloured stones are sold as single lots. Individual mine production is kept separate, providing buyers with an additional level of knowledge about the goods they are purchasing based upon each mine’s unique diamond characteristics. Our tenders last between four to six working days, during which participants view the assortments and place a confidential electronic bid on the parcel of their choice.
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