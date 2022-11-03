<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ucfirst($settings['site_name'])}} - nft</title>
        <link rel="icon" href="{{asset($settings['favicon']) }}">
        <link rel="shortcut icon" href="{{asset($settings['favicon']) }}">
        <link rel="apple-touch-icon"   href="{{asset($settings['favicon']) }}">
        <link rel="apple-touch-icon"  href="{{asset($settings['favicon']) }}">
        <link rel="apple-touch-icon"  href="{{asset($settings['favicon']) }}">
        <link rel="apple-touch-icon"  href="{{asset($settings['favicon']) }}">

        <link rel="stylesheet" href="{{ asset("frontend/frontend/bootstrap/css/bootstrap.min.css")}}">
        <link rel="stylesheet" href="{{ asset("frontend/frontend/css/owl.carousel.min.css")}}">
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link rel="stylesheet" href="{{ asset("frontend/frontend/css/owl.theme.default.css")}}">

        <link rel="stylesheet" href="{{ asset("frontend/frontend/css/remixicon/remixicon.css")}}">

        <link rel="stylesheet" href="{{ asset("frontend/frontend/css/fonts/fonts.css")}}">
        <link rel="stylesheet" href="{{ asset("frontend/frontend/css/app.css")}}">
    </head>
    <body>


<div class="overlay-content">
    <div class="modal-content-inr">
        <div class="logo-main">
            <div class="logo-otr">
                <a href="{{url('/')}}" class="logo-a">
                    <img style="max-width:250px;" class="logo-img" src="{{asset($settings['logo']) }}" alt="brand-logo">
                   
                </a>
            </div>
            <br>
            <div class="close-icon-otr">
                   <i class="fa fa-remove" style="color: #fff!important"></i>
            </div>
        </div>
        <div class="accordion accordion-flush" id="accordionFlushExample">

           
            <div class="linkk-otr"><a class="linkk-home heading-h4" href="{{url('/')}}"> Home</a></div>
            <div class="linkk-otr"><a class="linkk-home heading-h4" href="{{url('about-us')}}"> About</a></div>
                           
            <div class="linkk-otr"><a class="linkk-home heading-h4" href="{{url('partnership')}}"> Partnership</a></div>

            <div class="linkk-otr"><a class="linkk-home heading-h4" href="{{url('nft')}}"> NFTs</a></div>
            <div class="linkk-otr"><a class="linkk-home heading-h4" href="{{url('pricing')}}"> Prices</a></div>
            <div class="linkk-otr"><a class="linkk-home heading-h4" href="{{url('products')}}"> Products/Services</a></div>

            <div class="linkk-otr"><a class="linkk-home heading-h4" href="{{url('contact')}}"> Contact</a></div>

                   

        </div>
        <div class="action">
            <a href="{{url('login')}}" style="background-color: #25c676 !important;" class="btn-primary-2 upload-btn heading-SB">Login</a>
        </div>
        <div class="action">
            <a href="{{url('register')}}" class="btn-primary-1 upload-btn heading-SB">Sign up</a>
        </div>

        <p class="copy-right heading-S">{{$settings['copy_right']}}</p>
    </div>
</div>
        <div class="navbar-main-2">
            <div class="container-fluid">
                <div class="wrapper">
                    <div class="logo-otr">
                        <a href="{{url('/')}}" class="logo-a">
                            <img style="max-width:250px;" class="logo-img" src="{{asset($settings['logo']) }}" alt="brand-logo">

                                       </a>
            </div>
            <div class="navigation-otr">
                <ul class="navigation-inr">
                           <li class="navigation-li nav-li3"><a class="nav-a heading-SB" href="{{url('/')}}"> Home</a></li>
                            <li class="navigation-li nav-li3"><a class="nav-a heading-SB" href="{{url('about-us')}}"> About</a></li>
                           
                            <li class="navigation-li nav-li3"><a class="nav-a heading-SB" href="{{url('partnership')}}"> Partnership</a></li>

                            <li class="navigation-li nav-li3"><a class="nav-a heading-SB" href="{{url('nft')}}"> NFTs</a></li>
                            <li class="navigation-li nav-li3"><a class="nav-a heading-SB" href="{{url('pricing')}}"> Prices</a></li>
                            <li class="navigation-li nav-li3"><a class="nav-a heading-SB" href="{{url('products')}}"> Products/Services</a></li>

                            <li class="navigation-li nav-li3"><a class="nav-a heading-SB" href="{{url('contact')}}"> Contact</a></li>

                   



                </ul>
            </div>
            <div class="action-nav">

                <div class="action right-space">
                    <a href="{{url('register')}}" class="btn-primary-1 heading-SB">Sign Up</a>
                </div>
                <div class="action right-space">
                    <a href="{{url('login')}}" class="btn-primary-2 heading-SB">Login</a>
                </div>
                <div class="burger-icon-otr">                            
                            <i class="fa fa-bars" style="color: #fff!important"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==================================
            Navbar End Here
    ===================================-->


    <!--==================================
        Hero Section Start Here
===================================-->

    <div class="hero3-main">
        <div class="container-fluid">
            <div class="row row-custom">
                <div class="col-lg-5 col-carousel-otr">
                    <div class="col-carousel-inr">
                        <div class="row-cover-img owl-carousel owl-theme" id="Hero3">
                            <div class=" col-img-otr">
                                <img class="img-cover" src="{{asset('frontend/cyberkong.png')}}" alt="Art">
                            </div>
                            <div class=" col-img-otr">
                                <img class="img-cover" src="{{asset('frontend/aquaape.webp')}}" alt="Art">
                            </div>
                            <div class=" col-img-otr">
                                <img class="img-cover" src="{{asset('frontend/Samoyed.webp')}}" alt="Art">
                            </div>
                            <div class=" col-img-otr">
                                <img class="img-cover" src="{{asset('frontend/lostinsea.webp')}}" alt="Art">
                            </div>
                            <div class=" col-img-otr">
                                <img class="img-cover" src="{{asset('frontend/Saint.webp')}}" alt="Art">
                            </div>
                            <div class=" col-img-otr">
                                <img class="img-cover" src="{{asset('frontend/slider2.png')}}" alt="Art">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-content-otr">
                    <div class="col-content-inr">
                        <p class="tag heading-L">NFT MARKETPLACE</p>
                        <h1 class="heading heading-h1">Discover The Latest / Best Performing NFT’s</h1>
                        <p class="desc heading-L">We help you analyze and buy out the best NFT with great return</p>
                        <div class="action">

                            <a href="{{url('register')}}" class="btn-primary-2 btn-hero heading-SB">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==================================
            Hero Section End Here
    ===================================-->

    <!--==================================
              Auction Start Here
    ===================================-->

    <div class="feature-main">
        <div class="container-fluid">
            <div class="wrapper">
                <h2 class="heading heading-h2">Featured Artwork</h2>
                <a href="{{url('login')}}" class="view-all">
                    <p class="view heading-SB">View All Artwork</p>
                    <i class="ri-arrow-right-line arrow-right"></i>
                </a>
            </div>
            <div class="row row-custom">
                <div class="col-lg-3 col-md-6 col-sm-6 col-otr">
                    <div class="col-inr box-8">
                        <div class="cover-img-otr">
                            <a href="{{url('login')}}">
                                <img class="cover-img" src="{{asset('frontend/1647944807.png')}}" alt="Artwork">
                            </a>

                        </div>
                        <a href="{{url('login')}}" class="art-name heading-MB-Mon">Peaceful Ape #1184</a>
                        <span style="margin-right: 5px;" class="heart-icon-otr2 heart8">
                            <i class="ri-heart-fill ">8676</i>
                        </span>
                        <span class="heart-icon-otr2 heart8">
                            <i class="ri-eye-2-fill ">60000</i>
                        </span>
                        <div class="bid-main">
                            <p class="bid heading-S">Current Bid</p>
                            <p class="Price heading-SB">8 ETH</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-otr">
                    <div class="col-inr box-8">
                        <div class="cover-img-otr">
                            <a href="{{url('login')}}">
                                <img class="cover-img" src="{{asset('frontend/1647943334.png')}}" alt="Artwork">
                            </a>



                        </div>
                        <a href="{{url('login')}}" class="art-name heading-MB-Mon">Hape Prime</a>
                        <span style="margin-right: 5px;" class="heart-icon-otr2 heart8">
                            <i class="ri-heart-fill ">1800</i>
                        </span>
                        <span class="heart-icon-otr2 heart8">
                            <i class="ri-eye-2-fill ">27000</i>
                        </span>
                        <div class="bid-main">
                            <p class="bid heading-S">Current Bid</p>
                            <p class="Price heading-SB">2 ETH</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-otr">
                    <div class="col-inr box-8">
                        <div class="cover-img-otr">
                            <a href="{{url('login')}}">
                                <img class="cover-img" src="{{asset('frontend/1644983994.jpg')}}" alt="Artwork">
                            </a>



                        </div>
                        <a href="{{url('login')}}" class="art-name heading-MB-Mon">Party Bear</a>
                        <span style="margin-right: 5px;" class="heart-icon-otr2 heart8">
                            <i class="ri-heart-fill ">200</i>
                        </span>
                        <span class="heart-icon-otr2 heart8">
                            <i class="ri-eye-2-fill ">100</i>
                        </span>
                        <div class="bid-main">
                            <p class="bid heading-S">Current Bid</p>
                            <p class="Price heading-SB">0.4 ETH</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-otr">
                    <div class="col-inr box-8">
                        <div class="cover-img-otr">
                            <a href="{{url('login')}}">
                                <img class="cover-img" src="{{asset('frontend/1644983051.webp')}}" alt="Artwork">
                            </a>



                        </div>
                        <a href="{{url('login')}}" class="art-name heading-MB-Mon">Team</a>
                        <span style="margin-right: 5px;" class="heart-icon-otr2 heart8">
                            <i class="ri-heart-fill ">200</i>
                        </span>
                        <span class="heart-icon-otr2 heart8">
                            <i class="ri-eye-2-fill ">170</i>
                        </span>
                        <div class="bid-main">
                            <p class="bid heading-S">Current Bid</p>
                            <p class="Price heading-SB">0.2 ETH</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-otr">
                    <div class="col-inr box-8">
                        <div class="cover-img-otr">
                            <a href="{{url('login')}}">
                                <img class="cover-img" src="{{asset('frontend/1644982670.webp')}}" alt="Artwork">
                            </a>



                        </div>
                        <a href="{{url('login')}}" class="art-name heading-MB-Mon">Samoyed</a>
                        <span style="margin-right: 5px;" class="heart-icon-otr2 heart8">
                            <i class="ri-heart-fill ">200</i>
                        </span>
                        <span class="heart-icon-otr2 heart8">
                            <i class="ri-eye-2-fill ">105</i>
                        </span>
                        <div class="bid-main">
                            <p class="bid heading-S">Current Bid</p>
                            <p class="Price heading-SB">0.4 ETH</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-otr">
                    <div class="col-inr box-8">
                        <div class="cover-img-otr">
                            <a href="{{url('login')}}">
                                <img class="cover-img" src="{{asset('frontend/1644982616.webp')}}" alt="Artwork">
                            </a>



                        </div>
                        <a href="{{url('login')}}" class="art-name heading-MB-Mon">Reindeer</a>
                        <span style="margin-right: 5px;" class="heart-icon-otr2 heart8">
                            <i class="ri-heart-fill ">500</i>
                        </span>
                        <span class="heart-icon-otr2 heart8">
                            <i class="ri-eye-2-fill ">400</i>
                        </span>
                        <div class="bid-main">
                            <p class="bid heading-S">Current Bid</p>
                            <p class="Price heading-SB">0.5 ETH</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-otr">
                    <div class="col-inr box-8">
                        <div class="cover-img-otr">
                            <a href="{{url('login')}}">
                                <img class="cover-img" src="{{asset('frontend/1644982525.png')}}" alt="Artwork">
                            </a>



                        </div>
                        <a href="{{url('login')}}" class="art-name heading-MB-Mon">Cold Blooded</a>
                        <span style="margin-right: 5px;" class="heart-icon-otr2 heart8">
                            <i class="ri-heart-fill ">100</i>
                        </span>
                        <span class="heart-icon-otr2 heart8">
                            <i class="ri-eye-2-fill ">90</i>
                        </span>
                        <div class="bid-main">
                            <p class="bid heading-S">Current Bid</p>
                            <p class="Price heading-SB">0.2 ETH</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-otr">
                    <div class="col-inr box-8">
                        <div class="cover-img-otr">
                            <a href="{{url('login')}}">
                                <img class="cover-img" src="{{asset('frontend/1644982398.webp')}}" alt="Artwork">
                            </a>



                        </div>
                        <a href="{{url('login')}}" class="art-name heading-MB-Mon">Reindeer</a>
                        <span style="margin-right: 5px;" class="heart-icon-otr2 heart8">
                            <i class="ri-heart-fill ">350</i>
                        </span>
                        <span class="heart-icon-otr2 heart8">
                            <i class="ri-eye-2-fill ">300</i>
                        </span>
                        <div class="bid-main">
                            <p class="bid heading-S">Current Bid</p>
                            <p class="Price heading-SB">0.4 ETH</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="responsive">
                <a href="{{url('login')}}" class="view-all">
                    <p class="view heading-SB">View All Artwork</p>
                    <i class="ri-arrow-right-line arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="auction-main">
        <div class="container-fluid">
            <div class="wrapper">
                <h2 class="heading heading-h2">Watch Out</h2>
            </div>
            <div class="row-auction owl-carousel owl-theme" id="live-auctions">
                <div class="col-otr">
                    <div class="col-inr box-1">

                        <div class="cover-img-otr">
                            <a >
                                <img class="cover-img" src="{{asset('frontend/Gorilla.webp')}}" alt="Artwork">
                            </a>
                            <div class="time-otr">
                                <span class="heading-SB timer" data-countdown="2023/11/11"></span>
                            </div>
                        </div>
                        <a  class="art-name heading-MB-Mon">Gorilla</a>
                    </div>
                </div>
                <div class="col-otr">
                    <div class="col-inr box-2">

                        <div class="cover-img-otr">
                            <a >
                                <img class="cover-img" src="{{asset('frontend/2.png')}}" alt="Artwork">
                            </a>
                            <div class="time-otr">
                                <span class="heading-SB timer" data-countdown="2022/01/01"></span>
                            </div>
                        </div>
                        <a  class="art-name heading-MB-Mon">Brain Vomit</a>
                    </div>
                </div>
                <div class="col-otr">
                    <div class="col-inr box-3">

                        <div class="cover-img-otr">
                            <a >
                                <img class="cover-img" src="{{asset('frontend/3.gif')}}" alt="Artwork">
                            </a>
                            <div class="time-otr">
                                <span class="heading-SB timer" data-countdown="2022/01/01"></span>
                            </div>

                        </div>
                        <a class="art-name heading-MB-Mon">NEKO</a>
                    </div>
                </div>
                <div class="col-otr">
                    <div class="col-inr box-4">

                        <div class="cover-img-otr">
                            <a >
                                <img class="cover-img" src="{{asset('frontend/4.png')}}" alt="Artwork">
                            </a>
                            <div class="time-otr">
                                <span class="heading-SB timer" data-countdown="2022/01/01"></span>
                            </div>

                        </div>
                        <a  class="art-name heading-MB-Mon">Wild One</a>

                    </div>
                </div>
                <div class="col-otr">
                    <div class="col-inr box-5">

                        <div class="cover-img-otr">
                            <a >
                                <img class="cover-img" src="{{asset('frontend/5.png')}}" alt="Artwork">
                            </a>
                            <div class="time-otr">
                                <span class="heading-SB timer" data-countdown="2022/01/01"></span>
                            </div>
                        </div>
                        <a  class="art-name heading-MB-Mon">Fame Lady</a>

                    </div>
                </div>
                <div class="col-otr">
                    <div class="col-inr box-6">

                        <div class="cover-img-otr">
                            <a >
                                <img class="cover-img" src="{{asset('frontend/Samoyed2.webp')}}" alt="Artwork">
                            </a>
                            <div class="time-otr">
                                <span class="heading-SB timer" data-countdown="2022/01/01"></span>
                            </div>

                        </div>
                        <a  class="art-name heading-MB-Mon">Samoyed</a>

                    </div>
                </div>
                <div class="col-otr">
                    <div class="col-inr box-7">

                        <div class="cover-img-otr">
                            <a >
                                <img class="cover-img" src="{{asset('frontend/7.gif')}}" alt="Artwork">
                            </a>
                            <div class="time-otr">
                                <span class="heading-SB timer" data-countdown="2022/01/01"></span>
                            </div>
                        </div>
                        <a  class="art-name heading-MB-Mon">Toxic SSOW</a>

                    </div>
                </div>
                <div class="col-otr">
                    <div class="col-inr box-8">

                        <div class="cover-img-otr">
                            <a >
                                <img class="cover-img" src="{{asset('frontend/8.jpg')}}" alt="Artwork">
                            </a>
                            <div class="time-otr">
                                <span class="heading-SB timer" data-countdown="2022/01/01"></span>
                            </div>

                        </div>
                        <a  class="art-name heading-MB-Mon">Chinese Zodiac</a>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--==================================
            Auction End Here
    ===================================-->

    <!--==================================
            Creator Start Here
    ===================================-->

    <div class="creator-home2-main">
        <div class="container-fluid">
            <div class="wrapper">
                <h2 class="heading heading-h2">Featured Analyse</h2>

            </div>
            <div class="row row-creator">
                <div class="col-lg-2 col-md-4 col-sm-6 col-otr">
                    <div class="col-inr box-1">
                        <a  class="col-box">
                            <div class="avtar-otr">
                                <img class="avatar" src="{{asset('frontend/avtar-10.png')}}" alt="creator">
                                <span class="check-icon-otr">
                                    <i class="ri-check-line check-icon"></i>
                                </span>
                            </div>
                            <div class="content-otr">
                                <p class="creator-name heading-MB-Mon">Wow Creates</p>
                                <p class="price heading-M">6.756 ETH</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-otr">
                    <div class="col-inr box-2">
                        <a  class="col-box">
                            <div class="avtar-otr">
                                <img class="avatar" src="{{asset('frontend/avtar-1.png')}}" alt="creator">
                                <span class="check-icon-otr">
                                    <i class="ri-check-line check-icon"></i>
                                </span>
                            </div>
                            <div class="content-otr">
                                <p class="creator-name heading-MB-Mon">Meta Boss</p>
                                <p class="price heading-M">3.756 ETH</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-otr">
                    <div class="col-inr box-3">
                        <a  class="col-box">
                            <div class="avtar-otr">
                                <img class="avatar" src="{{asset('frontend/avtar-2.png')}}" alt="creator">
                                <span class="check-icon-otr">
                                    <i class="ri-check-line check-icon"></i>
                                </span>
                            </div>
                            <div class="content-otr">
                                <p class="creator-name heading-MB-Mon">Usman An</p>
                                <p class="price heading-M">5.756 ETH</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-otr">
                    <div class="col-inr box-4">
                        <a  class="col-box">
                            <div class="avtar-otr">
                                <img class="avatar" src="{{asset('frontend/avtar-3.png')}}" alt="creator">
                            </div>
                            <div class="content-otr">
                                <p class="creator-name heading-MB-Mon">Rehman Zul</p>
                                <p class="price heading-M">1.756 ETH</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-otr">
                    <div class="col-inr box-5">
                        <a  class="col-box">
                            <div class="avtar-otr">
                                <img class="avatar" src="{{asset('frontend/avtar-4.png')}}" alt="creator">
                                <span class="check-icon-otr">
                                    <i class="ri-check-line check-icon"></i>
                                </span>
                            </div>
                            <div class="content-otr">
                                <p class="creator-name heading-MB-Mon">Big Bang</p>
                                <p class="price heading-M">3.956 ETH</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-otr">
                    <div class="col-inr box-6">
                        <a  class="col-box">
                            <div class="avtar-otr">
                                <img class="avatar" src="{{asset('frontend/avtar-5.png')}}" alt="creator">
                            </div>
                            <div class="content-otr">
                                <p class="creator-name heading-MB-Mon">Another User</p>
                                <p class="price heading-M">2.0 ETH</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-otr">
                    <div class="col-inr box-7">
                        <a  class="col-box">
                            <div class="avtar-otr">
                                <img class="avatar" src="{{asset('frontend/avtar-6.png')}}" alt="creator">
                                <span class="check-icon-otr">
                                    <i class="ri-check-line check-icon"></i>
                                </span>
                            </div>
                            <div class="content-otr">
                                <p class="creator-name heading-MB-Mon">Craftold</p>
                                <p class="price heading-M">9.756 ETH</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-otr">
                    <div class="col-inr box-8">
                        <a  class="col-box">
                            <div class="avtar-otr">
                                <img class="avatar" src="{{asset('frontend/avtar-7.png')}}" alt="creator">
                                <span class="check-icon-otr">
                                    <i class="ri-check-line check-icon"></i>
                                </span>
                            </div>
                            <div class="content-otr">
                                <p class="creator-name heading-MB-Mon">Meow Bits</p>
                                <p class="price heading-M">3.756 ETH</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-otr">
                    <div class="col-inr box-9">
                        <a  class="col-box">
                            <div class="avtar-otr">
                                <img class="avatar" src="{{asset('frontend/avtar-8.png')}}" alt="creator">
                            </div>
                            <div class="content-otr">
                                <p class="creator-name heading-MB-Mon">Young Artist</p>
                                <p class="price heading-M">7.756 ETH</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-otr">
                    <div class="col-inr box-10">
                        <a  class="col-box">
                            <div class="avtar-otr">
                                <img class="avatar" src="{{asset('frontend/avtar-9.png')}}" alt="creator">
                                <span class="check-icon-otr">
                                    <i class="ri-check-line check-icon"></i>
                                </span>
                            </div>
                            <div class="content-otr">
                                <p class="creator-name heading-MB-Mon">Ding Dong</p>
                                <p class="price heading-M">8.0 ETH</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-otr">
                    <div class="col-inr box-11">
                        <a  class="col-box">
                            <div class="avtar-otr">
                                <img class="avatar" src="{{asset('frontend/avtar-1.png')}}" alt="creator">
                                <span class="check-icon-otr">
                                    <i class="ri-check-line check-icon"></i>
                                </span>
                            </div>
                            <div class="content-otr">
                                <p class="creator-name heading-MB-Mon">Fantasy ETH</p>
                                <p class="price heading-M">3.0 ETH</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-otr">
                    <div class="col-inr box-12">
                        <a class="col-box">
                            <div class="avtar-otr">
                                <img class="avatar" src="{{asset('frontend/avtar-10.png')}}" alt="creator">
                            </div>
                            <div class="content-otr">
                                <p class="creator-name heading-MB-Mon">King Kong</p>
                                <p class="price heading-M">2.056 ETH</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--==================================
            Creator End Here
    ===================================-->

    <!--==================================
        Feature Artwork Start Here
    ===================================-->

    <div class="single-artwork-main">
        <div class="container-fluid">
            <div class="row row-custom">
                <div class="col-lg-6 col-content-otr">
                    <div class="col-content-inr">
                        <h2 class="heading heading-h2">The Pretty Fantasy World of NFT</h2>
                        <p class="desc heading-M">
                            MineonNFT specialize in discovering up-coming NFT projects, market trending NFT, Metaverse NFT Project.
                            We  also buy, mint, flip NFTs with better returns.
                        </p>

                        <div class="bid-main">
                            <h4 class="heading heading-h4">Bid Details</h4>
                            <div class="bid-otr">
                                <div class="bid-inr">
                                    <p class="text heading-M">Bid Volume</p>
                                    <h3 class="price heading-h3">91.83 ETH</h3>
                                    <p class="text heading-M">$349,000</p>
                                </div>
                                <div class="bid-inr bid-inr2">
                                    <p class="text heading-M">Auction </p>
                                    <div id="clock" class="timer">
                                        <div class="hours-main main">
                                            <p class="heading-h3 time-inr" id="hours"></p>
                                            <p class="hours-p time-text heading-M" data-countdown="2023/01/01">Hours</p>
                                        </div>
                                        <div class="minutes-main main">
                                            <p class="heading-h3 time-inr" id="minutes"></p>
                                            <p class="minutes-p time-text heading-M">Minutes</p>
                                        </div>
                                        <div class="seconds-main main">
                                            <p class="heading-h3 time-inr" id="seconds"></p>
                                            <p class="seconds-p time-text heading-M">Seconds</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="action">
                                <a href="{{url('login')}}" class="btn-primary-1 upload-btn heading-SB">Discover your first earning</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-art-otr">
                    <div class="col-art-inr">
                        <div class="art-img-otr">
                            <a class="img-inr">
                                <img class="cover-img" src="{{asset('frontend/slide.jpg')}}" alt="art-img">
                            </a>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--==================================
        Feature Artwork End Here
    ===================================-->

    <!--==================================
        Popular Collection Start Here
    ===================================-->

    <div class="collection-main">
        <div class="container-fluid">
            <div class="wrapper">
                <h2 class="heading heading-h2">Popular Collection</h2>
            </div>
            <div class="row-collection owl-carousel owl-theme" id="popular-artwork">
                <div class="col-otr">
                    <div class="col-inr box-1">
                        <div class="img-otr">
                            <img class="cover-img" src="{{asset('frontend/FancyBears.png')}}" alt="artwork">
                            <h2 class="text-white text-center">FancyBears</h2>
                        </div>

                    </div>
                </div>

                <div class="col-otr">
                    <div class="col-inr box-3">
                        <div class="img-otr">
                            <img class="cover-img" src="{{asset('frontend/Killergf.png')}}" alt="artwork">
                        </div>
                        <h2 class="text-white text-center">Killer GF #1993</h2>
                    </div>
                </div>

                <div class="col-otr">
                    <div class="col-inr box-2">
                        <div class="img-otr">
                            <img class="cover-img" src="{{asset('frontend/Coldblooded.png')}}" alt="artwork">
                        </div>
                        <h2 class="text-white text-center">Cold Blooded Creepz #7824</h2>
                    </div>
                </div>

                <div class="col-otr">
                    <div class="col-inr box-3">
                        <div class="img-otr">
                            <img class="cover-img" src="{{asset('frontend/mfer.png')}}" alt="artwork">

                        </div>
                        <h2 class="text-white text-center">mfer #5061</h2>
                    </div>
                </div>

                <div class="col-otr">
                    <div class="col-inr box-3">
                        <div class="img-otr">
                            <img class="cover-img" src="{{asset('frontend/Metaangle.jpg')}}" alt="artwork">
                        </div>
                        <h2 class="text-white text-center">Meta Angels #9823</h2>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--==================================
        Popular Collection End Here
    ===================================-->

    <!--==================================
            Call to action Start Here
    ===================================-->

    <div class="cal-to-action-main">
        <div class="container-fluid">
            <div class="row row-custom">
                <div class="col-lg-6 col-content-otr">
                    <div class="col-content-inr">
                        <h2 class="heading heading-h2">Collect, Invest & Earn <br> NFTs at <span class="heading-inr">{{$settings['site_name']}}</span></h2>
                        <p class="desc heading-M">We have professional market insight <br> We flip, collect and invest in NFT projects.</p>
                        <div class="btn-otr">



                            <div class="action">
                                <a href="{{url('register')}}" class="btn-primary-2 btn-action heading-SB">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img class="art-img" src="{{asset('frontend/slider.png')}}" alt="art-img">
        </div>
    </div>

    <!--==================================
            Call to action End Here
    ===================================-->


    <!--==================================
            Footer Start Here
    ===================================-->


    <div class="copyright-main">
        <div class="container-fluid">
            <div class="wrapper">
                <p class="copy-right heading-S">{{$settings['copy_right']}}</p>
                <div class="linkk-otr">

                </div>
            </div>
        </div>
    </div>

    <!--==================================
            Footer End Here
    ===================================-->
    <script src="{{ asset("frontend/frontend/js/jquery.min.js")}}"></script>
    <script src="{{ asset("frontend/frontend/js/jquery.countdown.min.js")}}"></script>
    <script src="{{ asset("frontend/frontend/js/owl.carousel.min.js")}}"></script>
    <script src="{{ asset("frontend/frontend/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{ asset("frontend/frontend/js/app.js")}}"></script>
</body>
</html>
