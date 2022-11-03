@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; REFERRAL</title>
<meta  name="description" content="REFERRAL">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - REFERRAL"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.app')
@section('content')

<!-- Breadcrumbs -->
<section class="breadcrumbs-custom bg-image context-dark" style="background:linear-gradient(180deg, rgba(196, 196, 196, 21) 0%, rgba(196, 196, 196, 0) 100%),url({{asset('front/images/ref.jpg')}}); background-repeat: no-repeat;
         background-size: 100% 100%;">
    <div class="container">
        <div class="breadcrumbs-custom__main">
            <h1 class="breadcrumbs-custom-title">REFERRAL</h1>
            <div class="breadcrumbs-custom__text">
                <h4>Guides on our referral - {{ucfirst($settings['site_name'])}}</h4>
            </div>
        </div>
        <ul class="breadcrumbs-custom__path">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="#">Pages</a></li>
            <li class="active">REFERRAL</li>
        </ul>
    </div>
</section>

<!-- Most Popular Guides-->
<section class="section section-lg text-center mycolor">
    <div class="container">
        <div class="tabs-custom tabs-horizontal tabs-light" id="tabs-faq">
            <!-- Nav tabs-->
            <ul class="nav nav-tabs">
                <li class="nav-item" role="presentation"><a class="nav-link active text-white" href="#tabs-faq-1" data-toggle="tab">General questions</a></li>

            </ul>
            <!-- Tab panes-->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tabs-faq-1">
                    <!-- Bootstrap collapse-->
                    <div class="card-group-custom card-group-line" id="accordion-faq-1" role="tablist" aria-multiselectable="true">
                        <div class="row row-5 justify-content-center">
                            <div class="col-sm-10 col-lg-6">
                                <!-- Bootstrap card-->
                                <article class="card card-custom card-line">
                                    <div class="card-header" id="accordion-faq-1Heading1" role="tab">
                                        <div class="card-title"><a class="text-white" role="button" data-toggle="collapse" data-parent="#accordion-faq-1" href="#accordion-faq-1Collapse1" aria-controls="accordion-faq-1Collapse1" aria-expanded="true">
                                                How can I participate in your referral program?
                                                <div class="card-arrow"></div></a>
                                        </div>
                                    </div>
                                    <div class="collapse show" id="accordion-faq-1Collapse1" role="tabpanel" aria-labelledby="accordion-faq-1Heading1">
                                        <div class="card-body">
                                            <p class="text-white">
                                                You can simply participate in Brickbilt Investment limited referral program by creating your account and start inviting investors by sharing your personal referral link.

                                            </p>
                                        </div>
                                    </div>
                                </article>
                                <!-- Bootstrap card-->
                                <article class="card card-custom card-line">
                                    <div class="card-header" id="accordion-faq-1Heading2" role="tab">
                                        <div class="card-title"><a class="text-white collapsed" role="button" data-toggle="collapse" data-parent="#accordion-faq-1" href="#accordion-faq-1Collapse2" aria-controls="accordion-faq-1Collapse2">
                                                Do I have to have active investment to receive commissions?
                                                <div class="card-arrow"></div></a>
                                        </div>
                                    </div>
                                    <div class="collapse" id="accordion-faq-1Collapse2" role="tabpanel" aria-labelledby="accordion-faq-1Heading2">
                                        <div class="card-body">
                                            <p class="text-center">No, you are not obligated to make a deposit in order to participate referral program and earning commissions.</p>
                                        </div>
                                    </div>
                                </article>
                                <!-- Bootstrap card-->
                                <article class="card card-custom card-line">
                                    <div class="card-header" id="accordion-faq-1Heading3" role="tab">
                                        <div class="card-title"><a class="text-white collapsed" role="button" data-toggle="collapse" data-parent="#accordion-faq-1" href="#accordion-faq-1Collapse3" aria-controls="accordion-faq-1Collapse3">
                                                Can I promote Brickbilt Investment limited in more than one place?
                                                <div class="card-arrow"></div></a>
                                        </div>
                                    </div>
                                    <div class="collapse" id="accordion-faq-1Collapse3" role="tabpanel" aria-labelledby="accordion-faq-1Heading3">
                                        <div class="card-body">
                                            <p class="text-white">You can promote Brickbilt Investment limited in as many places as you wish. We actually encourage our affiliates to be active as it maximizes their income. However, the way you promote Brickbilt Investment limited cannot violate the governing law. Please note, it also cannot affect the company's image negatively.</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-10 col-lg-6">
                                <!-- Bootstrap card-->
                                <article class="card card-custom card-line">
                                    <div class="card-header" id="accordion-faq-1Heading4" role="tab">
                                        <div class="card-title"><a class="text-white collapsed" role="button" data-toggle="collapse" data-parent="#accordion-faq-1" href="#accordion-faq-1Collapse4" aria-controls="accordion-faq-1Collapse4">
                                                What are the benefits to be a regional representative of Brickbilt Investment company?
                                                <div class="card-arrow"></div></a>
                                        </div>
                                    </div>
                                    <div class="collapse" id="accordion-faq-1Collapse4" role="tabpanel" aria-labelledby="accordion-faq-1Heading4">
                                        <div class="card-body">
                                            <p class="text-white">As a regional representation, you will have an increased amount of referral commissions for the investors you refer to the platform.
                                                Representatives’ commission rates is %30</p>
                                        </div>
                                    </div>
                                </article>
                                <!-- Bootstrap card-->
                                <article class="card card-custom card-line">
                                    <div class="card-header" id="accordion-faq-1Heading5" role="tab">
                                        <div class="card-title"><a class="text-white collapsed" role="button" data-toggle="collapse" data-parent="#accordion-faq-1" href="#accordion-faq-1Collapse5" aria-controls="accordion-faq-1Collapse5">
                                                How can I be a Brickbilt Investment limited regional representative?
                                                <div class="card-arrow"></div></a>
                                        </div>
                                    </div>
                                    <div class="collapse" id="accordion-faq-1Collapse5" role="tabpanel" aria-labelledby="accordion-faq-1Heading5">
                                        <div class="card-body">
                                            <p class="text-white">Please use the Contact form and send us your application request including how do you plan to promote Brickbilt Investment company. An active deposit is not required to become our representative.</p>
                                        </div>
                                    </div>
                                </article>
                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 mb-4 text-white">
                    <h5 class="text-white text-center"  style="font-family: cursive"> REFERRAL PROGRAM! </h5>
                </div>

                <p class="text-white">What is the best way to spread the word about our services than spreading it by you? Refer your friends and earn up to 4% to 30% on ALL of your referral's investments including all their future invests!
With our referral program, you will have the opportunity to promote Brickbilt  Investment limited and generate commission!</p>

<p class="text-white">Cryptocurrency will change our future. Take a part in this revolution today.</p>

<p class="text-white">
As a personal partner, you are able to earn 30% commission. You can share your referral link also by email, Facebook or Twitter. If you got a blog or a website, you can download our dynamic banners to integrate easily...As a regional representative, you have opportunity to be a Brickbilt investment limited exclusive agent in your city or country. We also serve over than 188 countries worldwide, so you can promote Brickbilt Investment limited in any country you want! 
</p>

<div class="text-center text-white mb-4 mt-5">
    <div class="row offset-sm-2">
        <div class="col-md-5 col-sm-6 col-6" >
            <h5 class="mb-3 text-white"  style="font-family: cursive"> Referral Bonus</h5>
            <span  style="font-family: serif"> 4% </span>
            
        </div>
        
        <div class="col-md-5 col-sm-6 col-6">
          <h5 class="mb-3 text-white"  style="font-family: cursive">  Regional Representative Bonus</h5>
               <span  style="font-family: serif"> 30% </span>
            
            
        </div>
    </div>
                     
</div>

<div class="justify-content-center mt-5 mb-5">
<strong class="text-center text-white" style="font-family: cursive"> How to apply as Regional Representative? </strong>

    <p class="text-white">Please use the Contact form and send us your application request including how do you plan to promote Brickbilt Investment company. An active deposit is not required to become our representative</p>
            </div>
        </div>
    </div>
</section>
@endsection