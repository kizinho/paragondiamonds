@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; About Us</title>
<meta  name="description" content="About Us">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - About Us"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.app')
@section('content')
<div class="vApp">
    <div class="vBannerWrapper w-100" style="background-image: url({{url('frontend/about.jpg')}}); background-size: cover;">
        <div class="container pb-100">
            <div class="row align-items-center pR">
                <div class="col-md-12">
                    <h1>Superior Trading</h1>
                    <p>Solid Trading Experience with {{$settings['site_name']}}. Trade Global Markets on the most advanced MT5 trading platform.</p>
                    <a href="{{url('register')}}" style="background-color: #25c676 !important;" class="bBtn open-account">Open An Account</a>
                </div>
            </div>
        </div>
    </div>

    <div class="vBodyContent pt-30 aboutSection">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="{{asset('frontend/about_body_images.jpg')}}" alt="About" />
                    <div class="borderTop"></div>
                    <h3 class="vF900 mt-15">Who We Are</h3>
                    <p>
                        A reputable trading company that aims to provide the greatest trading services &amp; facilities, enabling both beginners and seasoned traders to benefit from our expert advisors &amp; generate higher profits. Our
                        vision is to become a market leader recognized for outstanding customer support and exemplary services. We strive for excellence.
                    </p>
                    <a href="{{url('register')}}" style="background-color: #25c676 !important;" class="bBtn open-account">Open An Account</a>
                </div>
                <div class="col-md-6">
                    <div class="vBox shadow shadowHover mb-25 bg-light">
                        <h3 class="vF900 mt-15">What We Provide</h3>
                        <p>
                            For trading Crypto, indices, precious metal, CFD’s online, we offer various account options, the latest trading software, &amp; tools. All clients can access a range of spreads &amp; liquidity via latest trading
                            platform.
                        </p>
                    </div>
                    <div class="vBox shadow shadowHover mb-25 bg-gradient text-white">
                        <h3 class="vF900 mt-15">What More We Offer</h3>
                        <p>Enjoy the healthy leverage ratio we offer. We provide all of the tools and tricks required for clients of any level to achieve their trading goals, along with excellent trading conditions and swift execution.</p>
                    </div>
                    <div class="vBox shadow shadowHover mb-25 blueLight">
                        <h3 class="vF900 mt-15">Best Client Service</h3>
                        <p>
                            Our goal is to create an excellent client-centric culture in order to give the best customer experience to our clients. In this way, we can secure our position as a market leader known for superior customer
                            services.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="vBodyContent pb-50 vBodyBefore aboutSection-pt-70">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-30">
                    <div class="borderTop"></div>
                    <h3 class="vF900 text-uppercase">Why {{$settings['site_name']}}</h3>
                    <p><span style="color: rgb(52, 64, 85); font-family: Lato, sans-serif;">Enhance your trading experience like no other. We provide all the trading tools and support you need to achieve success.</span></p>
                    <p>
                        <font color="#344055" face="Lato, sans-serif"><b>Catering to your trading requirements, we provide:</b></font>
                    </p>
                    <ul>
                        <li>
                            <font color="#344055" face="Lato, sans-serif"><b>Powerful Trading platform:</b> Most powerful trading Platform designed to suit traders of all styles on any device. </font>
                        </li>
                        <li>
                            <font color="#344055" face="Lato, sans-serif"><b>60+ Trading Products:</b> Elevate your trading experience and diversify your investment portfolio. </font>
                        </li>
                        <li>
                            <font color="#344055" face="Lato, sans-serif"><b>24/5 Qualified Support:</b> Always present to resolve issues and ensure you get the best trading conditions.</font>
                        </li>
                    </ul>
                    <p>
                        <span style="color: rgb(34, 34, 34); font-family: Lato, sans-serif;">Since we are customer-centric, delivering the best service is our highest priority</span>
                        <font color="#344055" face="Lato, sans-serif"><br /></font>
                    </p>
                    <p><br /></p>
                    <a href="{{url('register')}}" style="background-color: #25c676 !important;" class="bBtn open-account">Open An Account</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection