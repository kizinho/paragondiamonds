@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Trading Accounts</title>
<meta  name="description" content="Trading Accounts">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Trading Accounts"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.app')
@section('content')

<div class="vApp">

    <div class="vBannerEducation">
        <div class="container">
            <div class="row align-items-center pR">
                <div class="col-md-5 shadow pt-15 pb-15">
                    <img src="{{asset('frontend/accounts_banner_images.jpg')}}" alt="Education">
                </div>
                <div class="col-md-7">
                    <div class="borderTop"></div>
                    <h1 class="vF900"> Accounts <span class="text-info"> To Suit All </span>Investors </h1>
                    <p>Whatever your level of trading experience or demands, we believe we have the right portfolio for you.</p>
                    <h2 class="vF900">
                        <span class="text-danger">Start your trading</span> <span class="text-success">with</span> <span class="text-warning">{{$settings['site_name']}}</span><br>
                    </h2>
                    <a href="{{url('register')}}" style="background-color: #25c676 !important;" class="bBtn open-account">Open Account</a>
                </div>
            </div>
        </div>
    </div>

    <div class="vBodyContent pt-50 ">
        <div class="container-fluid">
            <div class="row align-items-center bg-gradient pt-15 pb-10 text-white text-center">
                <div class="col-md-12">
                    <div class="cBox">
                        <h3>Start Your investment journey</h3>
                        <p>It only takes a few moments to get your account set up. Follow these easy steps:</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="vBodyContent pt-50 pb-50 blueLight">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-12 col-sm-6 mb-10 mt-10">
                    <div class="shadow mw-400 vAccountBox bg-gradient text-white">
                        <b>01.</b>
                        <i class="fas fa-file"></i>
                        <h3>Open an Account</h3>
                        <p>Complete registration form via {{$settings['site_name']}} website.</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 mb-10 mt-10">
                    <div class="shadow mw-400 vAccountBox bg-info text-white ">
                        <b>02.</b>
                        <i class="fas fa-certificate"></i>
                        <h3>Verify Information</h3>
                        <p>Verify your identity &amp; activate your portfolio.</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 mb-10 mt-10">
                    <div class="shadow mw-400 vAccountBox  bg-danger text-white">
                        <b>03.</b>
                        <i class="fas fa-search-dollar"></i>
                        <h3>Deposit Funds</h3>
                        <p>Deposit funds in your portfolio</p>
                    </div>
                </div>
                <div class="col-md-12 col-sm-6 mb-10 mt-10">
                    <div class="shadow mw-400 vAccountBox blueLight">
                        <b>04.</b>
                        <i class="fas fa-wave-square"></i>
                        <h3>Client Area</h3>
                        <p>Access to your client area.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="vBodyContent pt-30 pb-50">
        <div class="container ">
            <div class="row align-items-center ">
                <div class="col-md-12 shadow p-3">
                    <div class="mw-900 vType">
                        <img src="{{asset('frontend/benefit.png')}}" alt="bodyimage">
                        <h3 class="vF900 mt-15">MAXIMUM BENEFITS </h3>
                        <p>You don't even have to work for your earnings in an office or workspace; let us to do all of that</p></ul>
                        <a href="{{url('register')}}" style="background-color: #25c676 !important;" class="bBtn open-account">Open An Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="vBodyContent pt-30 pb-50">
        <div class="container ">
            <div class="row align-items-center">
                <div class="col-md-6 shadow p-3">
                    <div class="mw-900 vType">
                        <img src="{{asset('frontend/one_account.png')}}" alt="bodyimage">
                        <h3 class="vF900 mt-15">JUST ONE ACCOUNT</h3>
                        <p>Just one account is all it takes to begin reaping your tens of thousands and tens of millions. </p>
                        <a  href="{{url('register')}}" style="background-color: #25c676 !important;" class="bBtn open-account">Open An Account</a>
                    </div>
                </div>
                <div class="col-md-6 shadow p-3">
                    <div class="mw-900 vType">
                        <img src="{{asset('frontend/expert.png')}}" alt="bodyimage">
                        <h3 class="vF900 mt-15">Expert Portfolio</h3>
                        <p> Watch your investment grow and withdraw profits at the due date!</p>
                        <a href="{{url('register')}}" style="background-color: #25c676 !important;" class="bBtn open-account">Open An Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection