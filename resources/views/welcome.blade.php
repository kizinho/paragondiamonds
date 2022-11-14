@section('title')
<title>{{ucfirst($settings['site_name'])}} ::: Home page</title>
<meta name="description" content="{{ucfirst($settings['site_name'])}}  forex and trading.">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}}:: Home page"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.app')
@section('content')

<div class="slideshow uk-position-relative" uk-slideshow="autoplay: true;animation: fade;ratio:1920:650;'">
    <div class="uk-position-relative uk-visible-toggle uk-dark">
        <ul class="uk-slideshow-items">
            <li class="slide" style="background-image: url({{url('frontend/banner-diamond.jpeg')}}); background-repeat: no-repeat; background-position: 49.8% 48.7%;">
                <div class="uk-container uk-container-large uk-flex uk-height-1-1">
                    <div class="uk-flex uk-flex-middle uk-width-1-1 uk-flex-left">
                        <div class="caption dark">
                            <h3 style="color: #fff"
                                uk-scrollspy="cls:tracking-in-expand;delay: 
                                500"
                                >
                                {{$settings['site_name']}}
                            </h3>
                            <div uk-scrollspy="cls:text-focus-in;delay: 1000">
                                <p style="color: #fff">The Most Precious</p>
                                   <p style="color: #fff">  
                                    Commodity in </p>
                                   <p style="color: #fff">   the World, You</p>
                                   <p style="color: #fff"> can discover the </p>
                                         <p style="color: #fff"> diamond industry </p>
                                         <p style="color: #fff">   in absolute </p>
                                          <p style="color: #fff">transparencyMaking </p>
                               
                                <p>&nbsp;</p>
                            </div>
                        </div>
                    </div>
                    <div class="img-desc"><span style="color: #fff">JULY 2018 | 342 ct</span></div>
                </div>
            </li>
            <li class="slide" style="background-image: url({{url('frontend/maine_farm.jpeg')}}); background-repeat: no-repeat; background-position: 53.3% 55.8%;">
                <div class="uk-container uk-container-large uk-flex uk-height-1-1">
                    <div class="uk-flex uk-flex-middle uk-width-1-1 uk-flex-right">
                        <div class="caption light">
                            <h3 uk-scrollspy="cls:tracking-in-expand;delay: 500">{{$settings['site_name']}}</h3>
                            <div uk-scrollspy="cls:text-focus-in;delay: 1000">
                                <h2>Sustainability</h2>
                                <p>Is Fundamental to Our</p>
                                <p>Success as An Organization</p>
                                <p><a href="link pdf" rel="nofollow noreferrer noopener" target="_blank">Sustainability Report</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="slide" style="background-image: url({{url('frontend/ldc.jpeg')}}); background-repeat: no-repeat; background-position: 50% 50%;">
                <div class="uk-container uk-container-large uk-flex uk-height-1-1">
                    <div class="uk-flex uk-flex-middle uk-width-1-1 uk-flex-left">
                        <div class="caption light">
                            <h3  style="color: #fff"
                                uk-scrollspy="cls:tracking-in-expand;delay: 
                                500"
                                >
                                {{$settings['site_name']}}
                            </h3>
                            <div uk-scrollspy="cls:text-focus-in;delay: 1000">
                                <h2>Lemphane</h2>
                                <p>Underground Mine Expansion</p>
                                <p>Expanding mine-life to 2040</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
<!--            <li class="slide" style="background-image: url({{url('frontend/women-lead-here.jpg')}}); background-repeat: no-repeat; background-position: 50% 50%;">
                <div class="uk-container uk-container-large uk-flex uk-height-1-1">
                    <div class="uk-flex uk-flex-middle uk-width-1-1 uk-flex-left">
                        <div class="caption dark">
                            <h3 uk-scrollspy="cls:tracking-in-expand;delay: 500">{{$settings['site_name']}}</h3>
                            <div uk-scrollspy="cls:text-focus-in;delay: 1000">
                                <div class="md:w-2/3 w-full women-lead">
                                    <h3>
                                        Proud to be recognized by<br />
                                        Women Lead Here
                                    </h3>
                                    <p  class="leading-tight" style="color: #fff!important">An annual benchmark of executive gender diversity in corporate Canada</p>
                                    <p><a href="https://www.theglobeandmail.com/business/rob-magazine/article-introducing-the-2020-women-lead-here-honourees/" rel="noreferrer noopener" target="_blank" style="color: #fff">Learn More</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>-->
        </ul>
        <a class="uk-position-center-left uk-position-small" style="color: #fff" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a> <a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slideshow-item="next" style="color: #fff"></a>
        <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin uk-position-bottom-center"></ul>
    </div>
</div>


<div id="page-main" data-parents="0" data-siblings="1" data-children="10">
    <div id="page-body">
        <div id="feature-buttons">
            <div class="uk-container uk-container-large">
                <div class="uk-grid-collapse uk-child-width-1-2@m uk-child-width-1-4@l" uk-grid uk-height-match="target: >div > .slider-feature">
                    <div class="uk-relative">
                        <a class="slider-feature uk-flex uk-flex-middle uk-flex-center text-center h-full first" href="{{url('sustainability')}}">
                            <div class="uk-padding flex items-center h-full"><span class="uppercase">Sustainability</span></div>
                        </a>
                    </div>
                    <div class="uk-relative">
                        <a class="slider-feature uk-flex uk-flex-middle uk-flex-center text-center h-full" href="{{url('environmental')}}" target="_blank">
                            <div class="uk-padding flex items-center h-full"><span class="uppercase">Enviroment</span></div>
                        </a>
                    </div>
                    <div class="uk-relative">
                        <a class="slider-feature uk-flex uk-flex-middle uk-flex-center text-center h-full" href="{{url('social')}}">
                            <div class="uk-padding flex items-center h-full"><span class="uppercase">Social</span></div>
                        </a>
                    </div>
                    <div class="uk-relative">
                        <a class="slider-feature uk-flex uk-flex-middle uk-flex-center text-center h-full last fancybox-iframe" href="{{url('governance')}}">
                            <div class="uk-padding flex items-center h-full"><span class="uppercase">Governance</span></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="welcome">
    <div class="uk-container uk-container-large">
        <div uk-grid>
            <div class="uk-width-1-3@m image">
                <div>JUL 2015 | 342 ct</div>
                <img src="{{asset('frontend/diamond-dec.jpeg')}}" alt="JUL 2015 | 342 ct" />
            </div>
            <div class="uk-width-2-3@m verbage">
                <h1>{{$settings['site_name']}}</h1>
<p>  Paragon Diamonds is an international diamond production and distribution company and a consistent supplier of polished diamonds to the international market. We have an extensive portfolio incorporating interests in Lemphane project in Lesotho.
Paragon's strategy is to focus on value rather than volume production by optimizing recoveries from its high-quality asset base inorder to maximize their efficiency and profitability. We have a significant resource base of ca. 243 million carats, which supports the potential for long- life operations.
</p>
<p>
We conducts all operations according to the highest ethical standards . Our company aims to generate tangible value for each of our stakeholders, thereby contributing to the socio- economic development of our host countries and supporting long-term sustainable operations to the benefit of our employees, partners and communities.
</p>       
<br>
</div>
        </div>
    </div>
</div>

<div class="latest">
    <div class="uk-container uk-container-large">
        <div uk-grid>
        
            <div class="uk-flex-1" uk-grid>
                <div class="uk-width-1-3@m first">
                    <h3>Financial Partners</h3>
                   Adding transparency and liquidity to the diamond market will provide first time access to the financial and capital markets.<br />
                    
                </div>
                <div class="uk-width-1-3@m">
                    <h3>Investment Pricing</h3>
                  A self explanatory tool to display the criteria and benefits of our investments plan tailored for your financial aspirations.<br />
                
                </div>
                <div class="uk-width-1-3@m">
                    <h3>Diamond Products</h3>
                    Review our diamonds products traded on the international diamond exchange in Antwerp defined by the 4C’s.<br />
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="clara-slide">
    <div class="slide-0 lazyload">
<div class="video-container"><video autoplay loop muted playsinline>
<source src="frontend/site/templates/img/clara_diamond_spin.mp4" type="video/mp4"></video>
</div>
        <div class="content"><img src="{{asset($settings['logo']) }}" width="80" height="80" alt="{{$settings['site_name']}} Logo" class="uk-margin-bottom" />
<h1>WHY DIAMONDS?</h1>

<div class="process" 
uk-scrollspy="target: > div; cls: uk-animation-fade; delay: 800">
 
<div class="entry "><div><img src="frontend/site/templates/img/icon_truck.svg" alt=""></div>
</div><div class="entry"><div><img 
src="frontend/site/templates/img/icon_diamond_2.png" alt=""></div>
</div><div class="entry"><div><img src="frontend/site/templates/img/icon_diamond.svg" alt="">
</div></div><div class="entry clip"><video 
autoplay loop muted playsinline><source src="frontend/site/templates/img/clara_ring_small.mp4" type="video/mp4"></video>
</div></div><div class="uk-text-right uk-margin-top "><a 
href="{{url('register')}}" target="_blank">Create Account</a></div></div></div>
    <p class="uk-padding" style="color:#fff!important">Diamonds are a good investment for several reasons. More recently, these precious ‘everlasting’ gemstones have already proven their security aspect for investment purposes, as they offer protection against any credit risks of banks or financial institutions, currency fluctuations and inflation. Diamonds are not only considered as secure – crisis resistant – investments, moreover the macro-economic law of supply and demand indicates a structural increase of the diamond prices on the world market. Investing in diamonds offers a large variety of benefits. In general, diamonds are likely to increase in value. This value augmentation is caused by significant increase in demand and decrease in supply
</p>
</div><div class="features">
<div class="uk-grid-collapse" uk-grid><div class="uk-width-1-2@m feature-item" 
style="background-image: url(frontend/sustainability-photo.jpeg); box-shadow: inset 0 0 0 2000px  rgb(54 54 57 / 30%);"><div class="uk-width-1-1 uk-height-1-1 uk-flex uk-flex-middle">
<div class="uk-padding"><h2>OPERATIONS</h2>
    <p> Lemphane is a world class mine which benefits from state-of-the-art mining infrastructure, including a modern processing plant. It is a large-scale asset with tonnage and throughput upside and is one of world’s foremost producers of large, high quality, Type IIA diamonds in excess of 10.8 carats. Lemphane contains a world-class gross resource of 147.2 Mcts as at 30 June 2022, which suggests its mine life could be significantly longer than the current mine plan to 2040.&nbsp;
    </p></div></div>
</div><div class="uk-width-1-2@m uk-flex uk-flex-middle feature-list"><div 
class="uk-padding-large uk-width-1-1"><div class="feature f-0 uk-transition-toggle uk-margin-bottom">
<a href="{{url('processing')}}" class="uk-transition-scale-up 
uk-transition-opaque uk-flex uk-flex-middle"><div class="uk-width-1-1">Processing</div></a></div>
<div class="feature f-1 uk-transition-toggle uk-margin-bottom"><a 
href="{{url('sorting-distribution')}}" class="uk-transition-scale-up uk-transition-opaque uk-flex uk-flex-middle">
        <div class="uk-width-1-1">Sorting and Distribution</div></a>
</div><div 
class="feature f-2 uk-transition-toggle uk-margin-bottom"><a href="{{url('Cctting-polishing')}}" class="uk-transition-scale-up uk-transition-opaque uk-flex uk-flex-middle"><div 
class="uk-width-1-1">Cutting and Polishing</div></a></div><div class="feature f-3 uk-transition-toggle uk-margin-bottom">
<a href="{{url('trading')}}" class="uk-transition-scale-up 
uk-transition-opaque uk-flex uk-flex-middle">
<div class="uk-width-1-1">Trading</div></a></div></div></div></div></div></div></div>



@endsection