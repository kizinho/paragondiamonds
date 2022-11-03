@section('title')
<title>{{ucfirst($settings['site_name'])}} :::Ecosystem </title>
<meta  name="description" content=":::Ecosystem">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - :::Ecosystem"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.app')
@section('content')


<div class="inner-banner has-base-color-overlay text-center" style="background: url(images/background/1.jpg);">
    <div class="container">
        <div class="box">
            <h3>Ecosystem</h3>
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
                       Ecosystem
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>


<section class="about-faq sec-padd">
    <div class="container">
        <div class="row">
      <section class="c-section c-section--has-skewed-bg">
        <div class="c-section-skewed-bg-container">
          <div class="c-section-skewed-bg"></div>
        </div>
      
      </section>
      <section class="c-section ecosystem-sec mt-6 mt-md-12">
        <div class="container">
          <div class="row ai-c">
              <div class="col-12 col-md-6"><img class="img-contain" src="frontend/img/eco.jpg" style="width:100%;height: 200px" alt=""></div>
            <div class="col-12 col-md-6 mt-6 mt-md-0">
              <h2 class="c-section-title">{{$settings['site_name']}} Blockchain</h2>
              <div class="c-section-content">
                <article class="article">
                  <p>The {{$settings['site_name']}} Blockchain will use distinctive cryptography that is resistant to attacks, even if they are carried out with the use of quantum computing processing power, and will allow avoiding the fundamental security weaknesses of the modern cryptographic methods. A globally integrated network of nodes and consensus mechanism used will ensure the efficiency of transactions performed within the blockchain network</p>
                </article>
              </div>
            </div>
          </div>
          <br>
          <div class="mt-6 mt-md-12">
            <div class="row ai-c">
              <div class="col-12 col-md-6"><img class="img-contain" src="frontend/img/bank.jpg" style="width:100%;height: 200px" alt=""></div>
              <div class="col-12 col-md-6 mt-6 mt-md-0">
                <h2 class="c-section-title">{{$settings['site_name']}} Digital Bank</h2>
                <div class="c-section-content">
                  <article class="article">
                    <p>It is no secret that the future of the financial world lies within complete digitalization of all financial processes, products and services. {{$settings['site_name']}} plans on developing its own Digital Bank based on the {{$settings['site_name']}} Blockchain platform, which will reduce the operational costs of the entire network and set new quality standards for financial services.</p>
                  </article>
                </div>
              </div>
            </div>
          </div>
           <br>
          <div class="mt-6 mt-md-12">
            <div class="row ai-c">
              <div class="col-12 col-md-6 order-md-last"><img class="img-contain" src="frontend/img/so.jpg" style="width:100%;height: 200px" alt=""></div>
              <div class="col-12 col-md-6 mt-6 mt-md-0">
                <h2 class="c-section-title">Socio-economic Platform</h2>
                <div class="c-section-content">
                  <article class="article">
                    <p>Thanks to the functionality offered by {{$settings['site_name']}} socio-economic platform, private clients and businesses from any part of the world will be able to maintain transparent terms of cooperation with business partners, and ensure profitability of transactions for the sale and purchase of businesses, goods and services. The platform will allow digitalization of business processes, and also offer decentralized public voting for state, commercial and social management institutions.</p>
                  </article>
                </div>
              </div>
            </div>
           </div>
    </div>
</section>
                </div>
    </div>
</section>
@endsection