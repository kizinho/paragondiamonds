@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Trading Platform</title>
<meta  name="description" content="Trading Platform">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Trading Platform"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.app')
@section('content')
<div class="vApp">
    <div class="rv-platform">
        <div class="vBannerWrapper" style="background-image: url({{url('frontend/platform_banner_images.jpg')}}); background-size: cover;">
            <div class="container">
                <div class="row align-items-center pR">
                    <div class="col-md-7">
                        <h1>Powerful Trading Tools</h1>
                        <p>OUR POWERUL TRADING TOOLS. We have made investing simple and easy here</p>
                        <a href="{{url('register')}}" style="background-color: #25c676 !important;" class="bBtn open-account">Get Started</a>
                    </div>
                    <div class="col-md-5">
                        <img src="{{asset('frontend/banner_title_images.png')}}" alt="Banner Img" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rv-platform pt-50 ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 text-center">
                    <img src="{{asset('frontend/market.jpg')}}" alt="mt5_logo" />
                </div>
                <div class="col-md-7 shadow rv-mt5Box mt-10">
                    <h4 class="text-uppercase mb-15 vF700 rv-MBtextInfo">Market Analysis</h4>
                    <p>
                        <font color="#344055" face="Lato, sans-serif">
                        <b>
                            Using fundamental and technical analysis to detect change before others and using this strategy to our advantage. We analyze and invest in start-ups with future potentials high gains. We diversify invested
                            capitals into different market opportunities depending on the capitals invested.
                        </b>
                        </font>
                    </p>
                </div>
            </div>
        </div>
<br><br>
        <div class="rv-multiBox pt-50 pb-50" style="background-image: url({{url('frontend/platform_box_background_images.jpg')}}); background-size: cover;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mt-30">
                        <div class="rv-multiBox-item text-center">
                            <i class="fas fa-globe-americas rv-MBtextInfo"></i>
                            <h4 class="text-uppercase mb-15 vF700 rv-MBtextInfo">FULL MARKET ACCESS</h4>
                            <hr />
                            <p class="text-white">Get diversified. We have removed some of the pressure from picking individual stocks and markets. Invest in a group of companies all at once.</p>
                        </div>
                    </div>
                    <div class="col-md-6 mt-30">
                        <div class="rv-multiBox-item text-center">
                            <i class="fab fa-ioxhost rv-MBtextSuccess"></i>
                            <h4 class="text-uppercase mb-15 vF700 rv-MBtextSuccess">DUMBMONEY TRADING BOT</h4>
                            <hr />
                            <p class="text-white">We have designed a trading bot that provides excellent daily results, it has the feature of trailing stop losses within seconds which gives it an advantage in making more profits..</p>
                        </div>
                    </div>
                    <div class="col-md-6 mt-30">
                        <div class="rv-multiBox-item text-center">
                            <i class="fab fa-artstation rv-MBtextWarning"></i>
                            <h4 class="text-uppercase mb-15 vF700 rv-MBtextWarning">TICKERTAGS</h4>
                            <hr />
                            <p class="text-white">
                                This our social arbitrage trading tool developed by our CEO Chris Camillo for scrutinizing trending topics that gives us the ability to monitor the conversation around keywords pertinent to publicly traded
                                securities and other investable assets on social media platforms. Everything we do with investing is about early identification of change and connect that change to investment opportunities with
                                individualized financial plan.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 mt-30">
                        <div class="rv-multiBox-item text-center">
                            <i class="fab fa-soundcloud rv-MBtextFocus"></i>
                            <h4 class="text-uppercase mb-15 vF700 rv-MBtextFocus">Risk management</h4>
                            <hr />
                            <p class="text-white">
                                We identify, evaluate, prioritize, monitor, and control the probability or impact of unfortunate events or to maximize the realization of market opportunities. Our disciplined and process-driven approach
                                allows us to deliver on time and on budget, while maximizing returns and minimizing risk..
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection