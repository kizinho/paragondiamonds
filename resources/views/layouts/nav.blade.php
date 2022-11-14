<header>
    <div class="uk-container uk-container-large">
        <div class="grid">
            <a href="{{url('/')}}" title="Back to Home Page" class="logo">
                <img src="{{asset($settings['logo']) }}"   alt="{{$settings['site_name']}}" /></a>
            <div class="right-c" uk-navbar="offset: 0">
                <div class="topinfo">
                        <div class="stockinfo"><div class="symbol"><a href="{{url('login')}}">Login</a>/<a href="{{url('register')}}">Register</a></div></div>
            </div>
            <div class="industry-logo">
                <a href="https://www.naturaldiamonds.com/about/" target="_blank">
                    <img src="{{ asset("frontend/site/assets/files/1/ndc_naturaldiamondcouncil_web-1.png")}}" 
                         alt="Natural Diamond Council" /> </a>
                    <a href="" target="_blank">
                        <img src="{{ asset("frontend/site/assets/files/1/0000_3510_certified_member_logo_eu_us1_white_jewellery.jpg")}}" alt="" /> </a>
                    <a href="https://www.kimberleyprocess.com/" target="_blank"> 
                        <img src="{{ asset("frontend/site/assets/files/1/partnership_0000s_0002_kimberly-process-1.png")}}" alt="The Kimberley Process" /> </a>
                    <a href="https://www.unglobalcompact.org/" target="_blank"> <img src="{{ asset("frontend/site/assets/files/1/ungc.png")}}" alt="UN Global Compact" /> </a>
                    <a href="https://www.theglobeandmail.com/business/rob-magazine/article-gender-diversity-executives-canada-survey/" target="_blank">
                        <img src="{{ asset("frontend/site/assets/files/1/women_lead_here_2021_hor_logo-01.png")}}" alt="Report On Business" />
                    </a>
                </div>
                <ul class="main-nav uk-navbar-nav">
                    <li class="@if(request()->path() == 'overview') uk-active @endif ">
                        <a href="{{url('overview')}}">Overview</a>
                    </li>
                    <li class="@if(request()->path() == 'operations') uk-active @endif ">
                        <a href="{{url('operations')}}">Operations</a>
                    </li>

                    <li class="@if(request()->path() == 'sustainability') uk-active @endif ">
                        <a href="{{url('sustainability')}}">Sustainability</a>
                        <div uk-dropdown>
                            <ul class="uk-nav uk-dropdown-nav">
                                <li class=" "><a href="{{url('environmental')}}">Environment</a></li>
                                <li class=" "><a href="{{url('social')}}">Social</a></li>
                                <li class=" "><a href="{{url('governance')}}">Governance</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="@if(request()->path() == 'products') uk-active @endif ">
                        <a href="{{url('products')}}">Products</a>
                    </li>  
                    <li class="@if(request()->path() == 'partnership') uk-active @endif ">
                        <a href="{{url('partnership')}}">Partnership</a>
                    </li> 
                    <li class="@if(request()->path() == 'pricing') uk-active @endif ">
                        <a href="{{url('pricing')}}">Pricing</a>
                    </li>

                    <li class="@if(request()->path() == 'about-us') uk-active @endif ">
                        <a href="{{url('about-us')}}">About Us</a>
                    </li>



                </ul>
                <a class="mobile-nav-btn" href="#"> <span>Menu</span></a>
            </div>
        </div>
    </div>
</header>























































<!--<script src="https://widgets.coingecko.com/coingecko-coin-price-marquee-widget.js"></script>
<coingecko-coin-price-marquee-widget coin-ids="bitcoin,ethereum,eos,ripple,litecoin" currency="usd" background-color="#ffffff" locale="en"></coingecko-coin-price-marquee-widget>
<header class="header">
<div class="vHeaderTop header-top">
<div class="container-fluid">
<div class="row align-items-center">
<div class="col-lg-6 col-md-6">
<div class="vHeaderTopLeft ">
<p><i class="fas fa-phone-alt"></i> VIP</p>
<p><i class="far fa-envelope-open"></i> <a href="mailto:{{$settings['site_email']}}" </a>{{$settings['site_email']}}</p>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="vHeaderTopRight text-right">
<ul class="vHeaderSocial">
<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
</li>
<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
</li>
<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
</li>
<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
</li>
<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a>
</li>
<li><a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
    <div class="vHeaderNav  pt-15 pb-15 header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="vLogo">
                        <a href="{{url('/')}}">
                            <img style="max-width:250px;" src="{{asset($settings['logo']) }}" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="vMenu">
                        <ul>
                            <li><a href="{{url('/')}}"> Home</a></li>
                            <li><a href="{{url('about-us')}}"> About</a></li>
                            <li><a  style="pointer-events: none" href="#"> Trading</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{url('platform')}}"> Trading Tools</a>
                                    </li>
                                    <li>
                                        <a href="{{url('accounts')}}"> Accounts</a>
                                    </li>

                                </ul>
                            </li>
                            <li><a href="{{url('partnership')}}"> Partnership</a></li>

                            <li><a href="{{url('nft')}}"> NFTs</a></li>
                            <li><a href="{{url('pricing')}}"> Prices</a></li>
                            <li><a href="{{url('products')}}"> Products/Services</a></li>

                            <li><a href="{{url('contact')}}"> Contact</a></li>

                            <li class="mBtn bg-primary client-login">
                                <a href="{{url('login')}}" class="mBtn">Client Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="vMMenu">
                        <div class="mobile-menu-active"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>-->
