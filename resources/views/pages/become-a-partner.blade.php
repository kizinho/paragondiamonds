@section('title')
<title>{{ucfirst($settings['site_name'])}} :::Become Partner </title>
<meta  name="description" content=":::Become Partner">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - :::Become Partner"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.app')
@section('content')

<div class="inner-banner has-base-color-overlay text-center" style="background: url(images/background/1.jpg);">
    <div class="container">
        <div class="box">
            <h3> Affiliate</h3>
        </div>
    </div>
    <div class="breadcumb-wrapper">
        <div class="container">
            <div class="pull-left">
                <ul class="list-inline link-list">
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li>
                        Affiliate
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>
<section class="contact_us sec-padd">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-sm-6 col-xs-12">
                <div class="item">
                    <img class="img-contain" src="frontend/img/partner1.jpg" style="height:200px;width: 100%"  alt="">
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="item">
                    <p>   {{$settings['site_name']}} offers users a whole new level of advantages, unmatched in the market of Forex. Any {{$settings['site_name']}}'s member can become a platform affiliate user by just simply registering an account and activating Affiliate Program Dashboard. </p>
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
             <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="item">
                    <img class="img-contain" src="frontend/img/partner.jpg" style="height:300px;width: 100%" alt="">
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="item">
                <p>And we’ve a two referral-level program: 
                    </p>
                    <p>*Level 1:(direct referral 1x1 5%)</p>

                    <p>*Level 2: (indirect referral 1x2 3%)</p>
                    <p>*Level 3: (indirect referral 1x3 2%)</p>

                    <p>And this bonuses are paid instantly once the customer gets involved, If you refer a customer
                        you earn 5% referral bonus instantly of the amount deposited (level 1) 
                        and if the customer you refer brings in another customer you earn 3% 
                        referral bonuses from the customer your direct referral brings along( level 2) and stops at level 3 which is 2%.
                    </p>
                    <p>
                        And the more this people re-invests the more you earn a referral commission depending on the referral level the customer falls in.></p>

                </div>
            </div>
            
            <div class="clearfix"></div>
            <br>
             <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="item">
                    <img class="img-contain" src="frontend/img/partner2.jpg" style="height:300px;width: 100%" alt="">
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="item">
                <p>Become our affiliate user today, and seize limitless opportunities offered by {{$settings['site_name']}}.
                    </p>
                    <p>Create your affiliate network by recommending {{$settings['site_name']}}'s platform to potential users. </p>

                    <p>The bigger your Affiliate network - the more bonuses and rewards you receive. </p>

                    <p>
                        Affiliate program bonuses are distributed from the platform's resources received through its operations on the Forex market. </p>
                    <p>
                        Our platform users are part of the {{$settings['site_name']}} community.</p>
              </div>
            </div>

          
        </div>
    </div>
</section>
@endsection