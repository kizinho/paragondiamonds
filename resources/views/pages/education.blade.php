@section('title')
<title>{{ucfirst($settings['site_name'])}} :::EDUCATION</title>
<meta  name="description" content="EDUCATION">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - EDUCATION"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />
<link href="{{ asset('frontend/css/plan.css')}}" rel="stylesheet">
@endsection
@extends('layouts.app')
@section('content')
<div class="inner-banner has-base-color-overlay text-center" style="background: url(images/background/1.jpg);">
    <div class="container">
        <div class="box">
            <h3>   Education License</h3>
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
                       Education License
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>
<section class="contact_us sec-padd">
    <div class="container">
        <div class="row">
<div class="page-content pb-0">
    <section class="c-section c-section--has-skewed-bg">
        <div class="c-section-skewed-bg-container">
            <div class="c-section-skewed-bg"></div>
        </div>
        <div class="container relative">
         
            <div class="c-section-content">
                <p><strong> <h4> Affiliate Compensation Plan</h4></strong> </p>

                <p>Every sale of a monthly subscription generates different commissions that are available to Affiliates once the subscription is confirmed. Commission processing is in real time. Per Subscription, there are 1 Direct Commission, 7 Indirect Commissions and 1 Top Affiliate Commission. The only qualification is to have an active account with {{$settings['site_name']}}. Subscription renewals will also pay the same commissions. Commissions are paid in BITCOINS AND ETHEREUM at the stated rate below in USD.
                </p>
   <br>
                <p><strong> <h4> Direct Commissions</h4></strong> </p>
                <p>For each subscription that you sell / refer you receive a $23 commission known as a Direct Commission. You make unlimited first generation sales and referrals. (Unlimited width)
                </p>
                   <br>
                <p><strong> <h4> Indirect Commissions</h4></strong> </p>
                <p>Making a second subscription sale will unlock Levels 2-7 for $8 Indirect Commissions as well as commission compression. Compression occurs when an Affiliate is no longer active. We pay the next active Affiliate in the line of sponsorship, effectively paying out all available commissions.
                </p>
                   <br>
                <p><strong> <h4> Top Affiliate Infinity Bonus</h4></strong> </p>
                <p>This bonus commission is paid out to people that qualify by having at least 15 current subscribers that have also enrolled at least 5 subscribers each. It is a $11 bonus given to the first Top Affiliate in the line of referral sponsorship, regardless if the sale occurred directly, indirectly or on ANY indefinite number of generations in the network. In other words, it can turn a $23 Direct Commission into $34, a $8 commission to $19 or be a $11 commission from a subscription sale from any level from the first Affiliate ranking Top Affiliate. 
                </p>
                <br>
                <a href="{{url('account/education-license')}}">        <button class="thm-btn thm-color" type="button">
                        <div class="btn__content">Purchase Now
                        </div>
                    </button>
                </a>    
                <br/>
            </div>
        </div>
    </section>

</div>



        </div>
    </div>
</section>

@endsection