@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; partnership</title>
<meta  name="description" content="partnership">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - partnership"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.app')
@section('content')
<div class="vApp">
    <div class="vBannerWrapper w-100" style="background-image: url({{asset('frontend/partnership_banner_images.jpg')}}); background-size: cover;">
        <div class="container pb-100">
            <div class="row align-items-center pR">
                <div class="col-md-12">
                    <h1>Dumb Money Investment Partnership Program</h1>
                    <p>Dumb Money Investment has launched some of the industry&#039;s most attractive offers to enhance the growth prospects of our partners.</p>
                    <a href="{{url('register')}}" style="background-color: #25c676 !important;"  class="bBtn open-account">Open An Account</a>
                </div>
            </div>
        </div>
    </div>

    <div class="vBodyContent pt-30 aboutSection">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="{{asset('frontend/ib_images.jpg')}}" alt="About" />
                </div>
                <div class="col-md-6">
                    <div class="vBox shadow shadowHover mb-25 bg-light">
                        <h3 class="vF900 mt-15">Why We Created A Partnership Program</h3>
                        <p class="MsoNormal">
                            <span style="font-size: 12pt; line-height: 107%; mso-bidi-font-family: Calibri; mso-bidi-theme-font: minor-latin;">
                                Because we know there are lot of reasons for our investors to refer their friends and business partners, most of our new business now comes from valued, personal referrals provided by our happy investors. lue
                                to our clients, we are continuing to expand our services and offers.
                                <p>
                                    We decided to stop expensive marketing and advertising, and create an exclusive automated affiliate downline, focused on providing the very best passive income and care to our members. Rewarding our
                                    registered members for being our best advertisers.
                                </p>
                            </span>
                        </p>
                        <p class="MsoNormal"><b>Offerings at a glance:</b><br /></p>
                        <ul>
                            <li>Unlimited opportunities to earn commissions.</li>
                            <li>Massive growth opportunity for businesses.</li>
                            <li>24/7 support for clients.<br /></li>
                        </ul>
                        <a href="{{url('register')}}" style="background-color: #25c676 !important;"  class="bBtn open-account">Open An Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="vBodyContent pb-50 pt-70 vBodyBefore aboutSection-pt-70 blueLight">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-30">
                    <div class="bg-light pt-30 pb-30 pl-15 pr-15">
                        <img src="{{asset('frontend/white_label_images.jpg')}}" alt="White_label" />
                        <div class="borderTop mt-30"></div>
                        <h3 class="vF900 mt-15 text-uppercase">White Label</h3>
                        <p>We designed a trusted proven automated system to track record of all affiliates/referrals from your 1st generation down to your 10th generation.</p>
                        <p><span style="font-weight: bolder;">Offerings at a glance:</span><br /></p>
                        <ul>
                            <li>Fully branded and co-branded trading platform.</li>
                            <li>No extra development is required.</li>
                            <li>Low start-up cost.</li>
                            <li>24/5 technical support.</li>
                        </ul>
                        <a href="{{url('register')}}" style="background-color: #25c676 !important;"  class="bBtn open-account">START BROKERAGE</a>
                    </div>
                </div>
                <div class="col-md-6 mb-30">
                    <div class="shadow pt-30 pb-30 pl-15 pr-15">
                        <img src="{{asset('frontend/affiliate_images.png')}}" alt="" />
                        <div class="borderTop mt-30"></div>
                        <h3 class="vF900 text-uppercase">AFFILIATE</h3>
                        <p>
                            EARN 10% TO 1% REFERRAL COMMISSION. HOW DO I REFER A FRIEND? Kindly log into your account, go to affiliates to copy your unique referral link and share with new investor to earn commissions on their deposits. We
                            designed a trusted proven automated system to reward and track all affiliates/referrals from your 1st generation down to your 10th generation.
                        </p>
                        <p><span style="font-weight: bolder;">Offerings at a glance:</span><br /></p>
                        <ul>
                            <li>Limitless referral.</li>
                            <li>Attractive and rewarding packages for referrals.</li>
                            <li>Withdraw referral commission easily.</li>
                        </ul>
                        <a href="{{url('register')}}" style="background-color: #25c676 !important;"  class="bBtn open-account">EARN NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 mb-30">
    <div class="shadow pt-30 pb-30 pl-15 pr-15">
        <div class="borderTop mt-30"></div>
        <h3 class="vF900 text-uppercase">Are there any fees to be an affiliate? Absolutely not!</h3>
    </div>
</div>

@endsection