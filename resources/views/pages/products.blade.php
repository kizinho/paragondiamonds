@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Products</title>
<meta  name="description" content="Products">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Products"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.app')
@section('content')
<div class="vApp">
    <div class="vBannerWrapper" style="background-image: url({{asset('frontend/1622443028.jpg')}}); background-size: cover;">
        <div class="container">
            <div class="row align-items-center pR">
                <div class="col-md-7">
                    <h1>Products {{$settings['site_name']}} Offers</h1>
                    <p>Products {{$settings['site_name']}} Offers {{$settings['site_name']}} is a multi-asset broker which provides the trading opportunity to the clients in a wide range of products in the financial market.</p>
                    <a href="{{url('register')}}" style="background-color: #25c676 !important;" class="bBtn open-account">Open An Account</a>
                </div>
                <div class="col-md-5">
                    <img src="{{asset('frontend/1622443029.png')}}" alt="platforms" />
                </div>
            </div>
        </div>
    </div>

    <div class="rv-submenu pt-20 pb-20">
        <div class="container ulBeforeNone">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item m-auto mb-5 pt-5" role="presentation">
                    <a class="vF700 text-uppercase active" data-toggle="pill" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true"> <i class="fas fa-random mr-2"></i>Arbitrage Trading</a>
                </li>
                <li class="nav-item m-auto mb-5 pt-5" role="presentation">
                    <a class="vF700 text-uppercase" data-toggle="pill" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"> <i class="fas fa-cubes mr-2"></i>Energy</a>
                </li>
                <li class="nav-item m-auto mb-5 pt-5" role="presentation">
                    <a class="vF700 text-uppercase" data-toggle="pill" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"> <i class="fas fa-chart-line mr-2"></i>NFTS</a>
                </li>
                <li class="nav-item m-auto mb-5 pt-5" role="presentation">
                    <a class="vF700 text-uppercase" data-toggle="pill" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false"> <i class="fas fa-chart-pie mr-2"></i>CBD</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="tab-content text-center" id="pills-tabContent">
        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="pills-tab1">
            <div class="pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <img class="mt-40 mb-40" src="{{asset('frontend/1622444345.jfif')}}" alt="Crypto_trade" />
                            <div class="shadow p-3">
                                <h2 class="text-uppercase mt-20 mb-20 vF900">Arbitrage Trading</h2>
                                <p class="MsoNormal">
                                    This is a quick wholesale purchase at a lower price and a higher price sale can make a quick decent profit for a trader with eagle eyes. This concept captures the essence of arbitrage and is relatively
                                    low risk compared to other straggles. Put simply, an asset is bought and sold simultaneously in two markets - often because it is sold at slightly different prices. For example: Bitcoin may be sold to
                                    Table A for $100, but is available for $150 at Table B. Sure, the difference may be small- but this represents a phenomenal 50%gain on one exchange.
                                </p>
                                <p class="MsoNormal">
                                    <span style="font-size: 12pt; line-height: 107%;"><o:p></o:p></span>
                                </p>
                                <p class="MsoNormal">
                                    <span style="font-size: 12pt; line-height: 107%;"><o:p></o:p></span>
                                </p>
                            </div>
                            <div class="shadow p-3">
                                <h2 class="text-uppercase mt-20 mb-20 vF900">CRYPTO TRADING (OVER THE COUNTER)</h2>
                                <p class="MsoNormal">
                                    Bulk buying and selling of cryptocurrencies. Over the counter (OTC) digital currency trading for individual and institutional buyers and sellers. {{$settings['site_name']}} provides the access to block size
                                    liquidity for high net worth individuals or institutions looking to buy or sell digital currency. We sell at +5% above market price. Discount prices are rarely in stock but exclusively available for our
                                    tier 1 partners.
                                </p>
                                <p class="MsoNormal">
                                    <span style="font-size: 12pt; line-height: 107%;"><o:p></o:p></span>
                                </p>
                                <p class="MsoNormal">
                                    <span style="font-size: 12pt; line-height: 107%;"><o:p></o:p></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="vBannerWrapper" style="background-image: url({{asset('frontend/1622700860.png')}}); background-size: cover;">
                <div class="container">
                    <div class="row">
                        <div class="rv-chart col-sm-8 ml-auto mr-auto shadow">
                            <h3 class="text-center vF700 mt-40 mb-40 text-white">Popular Crypto pairs</h3>
                            <div style="height: 800px;">
                                <!-- TradingView Widget BEGIN -->
                                <div class="tradingview-widget-container">
                                    <div class="tradingview-widget-container__widget"></div>
                                    <div class="tradingview-widget-copyright">
                                        <a href="https://www.tradingview.com/markets/cryptocurrencies/prices-all/" rel="noopener" target="_blank"><span class="blue-text">Cryptocurrency Markets</span></a>
                                    </div>
                                    <script type="text/javascript" src="//s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                                          {
                                          "width": "100%",
                                          "height": "100%",
                                          "defaultColumn": "overview",
                                          "screener_type": "crypto_mkt",
                                          "displayCurrency": "USD",
                                          "colorTheme": "light",
                                          "locale": "en"
                                        }
                                    </script>
                                </div>
                                <!-- TradingView Widget END -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rv-fxBenefit text-center pt-50 pb-50">
                <div class="container">
                    <div class="text-center mt-40">
                        <a href="{{url('register')}}" style="background-color: #25c676 !important;" class="bBtn open-account">Open An Account</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="pills-tab2">
            <div class="pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 m-auto">
                            <img class="mt-40 mb-40" src="{{asset('frontend/1622448042.jpg')}}" alt="Metal_trade" />
                            <div class="shadow p-3">
                                <h2 class="mt-20 mb-40 vF700">Energy</h2>
                                <p class="MsoNormal">
                                    <span style="font-size: 12pt; line-height: 107%;">
                                        Investing in energy can provide decades of passive income and strong ROI potential.With crude oil and natural gas prices on the rise, direct participation in oil and gas investments can be a great way
                                        for partners to potentially benefit from returns that outpace most market-based investments. Nearly 98% of everything you do is in some way related to crude oil. Heat for your home, gas for your car,
                                        plastic bottles and cosmetics are just a few examples of the thousands of petroleum-based products you use every day. At {{$settings['site_name']}}, we understand that the basic needs of people will always
                                        be in demand and we have ventured to welcome investors to partner with us in this lucrative industry by supporting research, oil drilling and other sectors within the industry. Investing in this
                                        program is like owning an asset that produces 20% ROI every month, which you can decide to sell or liquidate your asset at any point in time you wish to and your account manager will evaluate your
                                        portfolio worth to pay you 70% of the worth of your investment. Only 30% goes back to the company for their services.<o:p></o:p>
                                    </span>
                                </p>
                                <p class="MsoNormal">
                                    <span style="font-size: 12pt; line-height: 107%;"><o:p></o:p></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="vBannerWrapper" style="background-image: url({{asset('frontend/1622700860.jpg')}}); background-size: cover;">
                <div class="container">
                    <div class="row">
                        <div class="rv-chart col-sm-8 ml-auto mr-auto shadow">
                            <h3 class="text-center vF700 mt-40 mb-40 text-white">View the market</h3>

                            <div style="height: 800px;">
                                <!-- TradingView Widget BEGIN -->
                                <div class="tradingview-widget-container">
                                    <div class="tradingview-widget-container__widget"></div>
                                    <div class="tradingview-widget-copyright">
                                        <a href="https://www.tradingview.com/markets/cryptocurrencies/prices-all/" rel="noopener" target="_blank"><span class="blue-text">Cryptocurrency Markets</span></a>
                                    </div>
                                    <script type="text/javascript" src="//s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                                          {
                                          "width": "100%",
                                          "height": "100%",
                                          "defaultColumn": "overview",
                                          "screener_type": "crypto_mkt",
                                          "displayCurrency": "USD",
                                          "colorTheme": "light",
                                          "locale": "en"
                                        }
                                    </script>
                                </div>
                                <!-- TradingView Widget END -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rv-fxBenefit text-center pt-50 pb-50">
                <div class="container">
                    <div class="text-center mt-40">
                        <a href="{{url('register')}}" style="background-color: #25c676 !important;" class="bBtn open-account">Open An Account</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="pills-tab3">
            <div class="pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 m-auto text-center">
                            <img class="mt-40 mb-40" src="{{asset('frontend/p3.jpg')}}" alt="Crypto_trade" />
                            <div class="shadow p-3">
                                <h2 class="mt-20 mb-40 vF700">NFTS</h2>
                                <p>
                                    NFTs are the Future! NFT stands for ‘Non Fungible Token’, but what does that mean? Well, it helps to first understand what a ‘Fungible Token’ is. If we think of it in terms of money: a 100 dollar bill can
                                    be swapped for five 20 dollar bills and still hold the same value, which means a 100 dollar bill is a fungible token. If this 100 dollar bill is signed by Banksy, it becomes a totally unique product. Its
                                    value is then much harder to determine, as it’s no longer simply worth five 20 dollar bills. This means a Non Fungible Token cannot be swapped for any equivalent value. It also means that, like any
                                    investment, its value can increase or decrease in the future depending on the circumstances. NFTs have exploded in popularity during the pandemic, leading many investors to wonder how to buy them or even
                                    more, invest in them. We are here to connect you to the Metaverse! NFTs: Digital ID and property rights. 2021 volume of $23 billion+. We have the best social media analytic devices to give the best future
                                    meta verse insight on the best Artworks to purchase, with access to the world best Art Works to purchase digitally. We are {{$settings['site_name']}}, Your gateways to the world’s largest NFT market. We help our
                                    investors to buy and invest in the next big NFT projects with our special skills of analyzing start-ups with high potential future gains. Metaverse: 3D virtual cities built in game-like environments. 2021
                                    Volume of almost a billion dollar. DeFi: Smart Contract based Financial services without the need for a bank. $244 bn on deposits by millions of users. P2E: The migration of gaming to crypto. 2021 volume
                                    of $4.5 billion. Crypto Staking: The environmentally friendly way to validate blocks. All new tokens are built on the staking platform. Helping investors to invest in the next big NFT projects with our
                                    special skills of analyzing start-ups with potential future high gains.<br />
                                </p>

                                <div class="rv-fxBenefit text-center pt-50 pb-50">
                                    <div class="container">
                                        <div class="text-center mt-40">
                                            <a href="{{url('nft')}}" class="bBtn open-account"> Discover The Latest and Best Performing NFTs</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="vBannerWrapper" style="background-image: url({{asset('frontend/p3_b.jpg')}}); background-size: cover;">
                <div class="container">
                    <div class="row">
                        <div class="rv-chart col-sm-8 ml-auto mr-auto shadow">
                            <h3 class="text-center vF700 mt-40 mb-40 text-white">Top popular Crypto</h3>

                            <div style="height: 800px;">
                                <!-- TradingView Widget BEGIN -->
                                <div class="tradingview-widget-container">
                                    <div class="tradingview-widget-container__widget"></div>
                                    <div class="tradingview-widget-copyright">
                                        <a href="https://www.tradingview.com/markets/cryptocurrencies/prices-all/" rel="noopener" target="_blank"><span class="blue-text">Cryptocurrency Markets</span></a> 
                                    </div>
                                    <script type="text/javascript" src="//s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                                          {
                                          "width": "100%",
                                          "height": "100%",
                                          "defaultColumn": "overview",
                                          "screener_type": "crypto_mkt",
                                          "displayCurrency": "USD",
                                          "colorTheme": "light",
                                          "locale": "en"
                                        }
                                    </script>
                                </div>
                                <!-- TradingView Widget END -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rv-fxBenefit text-center pt-50 pb-50">
                <div class="container">
                    <div class="text-center mt-40">
                        <a href="{{url('register')}}" style="background-color: #25c676 !important;" class="bBtn open-account">Open An Account</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="pills-tab4">
            <div class="pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 m-auto">
                            <img class="mt-40 mb-40" src="{{asset('frontend/p4.jpg')}}" alt="Crypto_trade" />
                            <div class="shadow p-3">
                                <h2 class="mt-20 mb-40 vF700">CBD</h2>
                                <p>
                                    {{$settings['site_name']}} invests in cannabis facility where the Flowr Corporation grows and cultivates its non-irradiated marijuana in Kelowna, Canada. The company produces cannabis that meets Canada's strict standards
                                    without the radiation process used by most Canadian producers. Irradiated marijuana is easier to produce, but has modified or destroyed terpenes which Canadian consumers are just beginning to experience
                                    post-legalization. Determining Flowr's ability to create a "non-irradiated" product at scale and educate consumers about the difference are essential factors for us to decide whether we take our profits
                                    or invest more in Flowr (FLWR.V) $FLWR {{$settings['site_name']}} generates amazing profits on daily basis after exploring the Canadian marijuana stocks and country’s budding cannabis industry with an insider
                                    tour of The Flowr Corporation's ($FLWR) state of the art cannabis grow facility.
                                </p>
                                <p></p>
                            </div>

                            <div class="shadow p-3">
                                <h2 class="mt-20 mb-40 vF700">TOKENIZATION OF CANNABIS</h2>
                                <p>
                                    Our technology allows for cannabis-related companies to fractionally sell equity in their business, or shares in crop futures, opening a new market for investors hungry to tap into the booming cannabis
                                    industry. Farmers can chose to use our Open Source Leaf Area, Bud Area, and Count. Companies would be able to use Motion Logs to automatically track and record fertilization or spraying events on the
                                    blockchain system. This mean they can now build a seed-to-harvest focused offering of a Decentralized AI App and deploy as Compliant Smart Camera offering with ease. These Open Source projects will double
                                    as workable instructions for developers to use the Crypto Smart Cameras and for the farmers to try our AI features out of the box. Cultivators can easily install and uninstall services from different 3rd
                                    party AI providers, without hardware or configuration changes. What we’re talking about is a platform for cannabis companies to monetize their data.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rv-fxBenefit text-center pt-50 pb-50">
                    <div class="container">
                        <div class="text-center mt-40">
                            <a href="{{url('register')}}" style="background-color: #25c676 !important;" class="bBtn open-account">Open An Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection