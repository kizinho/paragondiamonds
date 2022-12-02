@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Pricing</title>
<meta  name="description" content="Pricing">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Pricing"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />
<style>
    .pricing-plan {
        &:hover {
            .pricing-amount {
                background-color: #4c51bf;
                color: #fff;
            }
        }
    }
    .bg-pink-500 {
    background-color: #0691ab!important;
}
.bg-indigo-500 {
     background-color: #0691ab!important;
}
</style>
@endsection
@extends('layouts.app')
@section('content')
<div class="slideshow uk-position-relative" uk-slideshow="autoplay: true;animation: fade;ratio:1920:450;'">
    <div class="uk-position-relative uk-visible-toggle uk-dark">
        <ul class="uk-slideshow-items">
            <li class="slide subpage" style="background-image: url({{url('frontend/pricing.jpeg')}}); background-repeat: no-repeat; background-position: 50% 50%;">
                <div class="sub-banner uk-height-1-1">
                    <div class="uk-container uk-container-large uk-height-1-1 uk-flex uk-flex-middle">
                        <h2  class="sub-caption" uk-scrollspy="cls:text-focus-in;delay: 500">FINANCE</h2>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="uk-clearfix"></div>
<div id="page-main" data-parents="2" data-siblings="8" data-children="0">
    <div class="uk-container uk-container-large">
        <div class="uk-grid-collapse uk-margin-large-bottom" uk-grid>
            <div class="uk-flex-last@m uk-flex-first@s">
                <div id="page-body" class="">
                

                    <div >
                        <div >

                            <div class=" ">
                                <section class=""> 
                                    <div class="container max-w-full mx-auto py-12 px-6">


                                        <div class="max-w-full md:max-w-6xl mx-auto my-3 md:px-8">
                                            <div class="relative block flex flex-col md:flex-row items-center">
                                                @foreach($plans as $plan)
                                                <div class="w-11/12 max-w-sm sm:w-3/5 lg:w-1/3 sm:my-5 my-8 relative z-0 rounded-lg shadow-lg md:-mr-4">
                                                    <div class="bg-white text-black rounded-lg border-t border-gray-100 shadow-lg overflow-hidden">
                                                        <div class="block text-left text-sm sm:text-md max-w-sm mx-auto mt-2 text-black px-8 lg:px-6">
                                                            <h3 class="text-lg font-medium uppercase p-3 pb-0 text-center tracking-wide">
                                                                {{strtoupper($plan->name)}}
                                                            </h3>
                                                            <h2 class=" text-gray-500 text-center">${{number_format($plan->min)}}</h2>
                                                            <div class="text-center"> Minimum</div>
                                                        </div>

                                                        <div class="flex flex-wrap mt-3 px-6">
                                                            <ul>
                                                                <li class="flex items-center">
                                                                    <div class=" rounded-full p-2 fill-current text-green-700">
                                                                        <svg class="w-6 h-6 align-middle" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                        <path
                                                                            d="M22 11.08V12a10 10 0 1 1-5.93-9.14"
                                                                            ></path>
                                                                        <polyline
                                                                            points="22 4 12 14.01 9 11.01"
                                                                            ></polyline>
                                                                        </svg>
                                                                    </div>
                                                                    <span class="text-gray-700 text-sm ml-3">Monthly ROI - {{number_format($plan->percentage)}}%</span
                                                                    >
                                                                </li>
                                                                <li class="flex items-center">
                                                                    <div
                                                                        class=" rounded-full p-2 fill-current text-green-700"
                                                                        >
                                                                        <svg
                                                                            class="w-6 h-6 align-middle"
                                                                            width="24"
                                                                            height="24"
                                                                            viewBox="0 0 24 24"
                                                                            fill="none"
                                                                            stroke="currentColor"
                                                                            stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            >
                                                                        <path
                                                                            d="M22 11.08V12a10 10 0 1 1-5.93-9.14"
                                                                            ></path>
                                                                        <polyline
                                                                            points="22 4 12 14.01 9 11.01"
                                                                            ></polyline>
                                                                        </svg>
                                                                    </div>
                                                                    <span class="text-gray-700 text-sm ml-3"
                                                                          >Affiliate Bonus - {{number_format($plan->ref)}}%</span
                                                                    >
                                                                </li>
                                                                <li class="flex items-center">
                                                                    <div class=" rounded-full p-2 fill-current text-green-700">
                                                                        <svg class="w-6 h-6 align-middle" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                        <path
                                                                            d="M22 11.08V12a10 10 0 1 1-5.93-9.14"
                                                                            ></path>
                                                                        <polyline
                                                                            points="22 4 12 14.01 9 11.01"
                                                                            ></polyline>
                                                                        </svg>
                                                                    </div>
                                                                    <span class="text-gray-700 text-sm ml-3">Trading Commission - {{number_format($plan->trading_commision)}}%</span>
                                                                </li>
 <li class="flex items-center">
                                                                    <div class=" rounded-full p-2 fill-current text-green-700">
                                                                        <svg class="w-6 h-6 align-middle" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                        <path
                                                                            d="M22 11.08V12a10 10 0 1 1-5.93-9.14"
                                                                            ></path>
                                                                        <polyline
                                                                            points="22 4 12 14.01 9 11.01"
                                                                            ></polyline>
                                                                        </svg>
                                                                    </div>
                                                                   <span class="text-gray-700 text-sm ml-3">100% Guaranteed</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="block flex items-center p-8  uppercase">
                                                            <a href="/register" class="mt-3 text-sm font-semibold bg-indigo-500 w-full text-white rounded-lg px-6 py-3 block shadow-xl hover:bg-indigo-600 text-center">Get Started</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach

                                                <div class="w-full max-w-md sm:w-2/3 lg:w-1/3 sm:my-5 my-8 relative z-10 bg-white rounded-lg shadow-lg">
                                                    <div class="text-sm leading-none rounded-t-lg bg-pink-500 text-white font-semibold uppercase py-4 text-center tracking-wide">
                                                        Each plan includes
                                                    </div>

                                                    <div class="flex pl-12 justify-start sm:justify-start mt-3">
                                                        <ul>
                                                            <li class="flex items-center">
                                                                <div class="rounded-full p-2 fill-current text-green-700">
                                                                    <svg class="w-6 h-6 align-middle" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                                    </svg>
                                                                </div>
                                                                <span class="text-gray-700 text-sm ml-3">10% trading commission( taxes included )</span>
                                                            </li>
                                                            <li class="flex items-center">
                                                                <div class=" rounded-full p-2 fill-current text-green-700">
                                                                    <svg class="w-6 h-6 align-middle" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                                    </svg>
                                                                </div>
                                                                <span class="text-gray-700 text-sm ml-3">Monthly withdrawal</span
                                                                >
                                                            </li>
                                                            <li class="flex items-center">
                                                                <div class=" rounded-full p-2 fill-current text-green-700">
                                                                    <svg class="w-6 h-6 align-middle" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                                    </svg>
                                                                </div>
                                                                <span class="text-gray-700 text-sm ml-3">Altcoins Accepted</span>
                                                            </li>
                                                        </ul>

                                                    </div>
                                                    <div class="block text-left text-sm sm:text-md max-w-sm mx-auto mt-2 text-black px-8 lg:px-6">
                                                        You need more information about services and plans?
                                                    </div>
                                                    <div class="block flex items-center p-8 ">

                                                        <a href="{{url('contact-us')}}" class="mt-3 text-lg font-semibold bg-indigo-500 w-full text-white rounded-lg px-6 py-3 block shadow-xl hover:bg-indigo-600 text-center">CONTACT US</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>









                            </div>
                        </div>
                    </div>
                    <br>



                    <div></div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection