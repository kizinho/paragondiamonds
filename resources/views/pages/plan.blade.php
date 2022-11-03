@section('title')
<title>{{ucfirst($settings['site_name'])}} :::PLAN</title>
<meta  name="description" content="PLAN">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - PLAN"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />
<link href="{{ asset('frontend/css/plan.css')}}" rel="stylesheet">
@endsection
@extends('layouts.app')
@section('content')
@section('sub')
 <div class="uk-width-1-1 in-breadcrumb">
                        <ul class="uk-breadcrumb uk-text-uppercase"><li><a href="{{url('/')}}">Home</a></li><li><a href="#"></a></li>
                          </ul>
                    </div>
@endsection
<main>
   <div class="uk-section uk-padding-large">
        <div class="uk-container in-wave-4">
            <div class="uk-grid uk-flex uk-flex-center">
                <div class="uk-width-1-1 uk-text-center">
                    <h1 class="uk-margin-medium-bottom"><span class="in-highlight">Our</span> Portfolios</h1>
                </div>
                <div class="uk-width-3-4@m">
                    <div class="uk-grid-collapse  uk-child-width-1-2@m in-wave-pricing" data-uk-grid>
                          @foreach($plans as $key=> $plan)
                        <div>
                            <div class="uk-card uk-card-default uk-card-body @if($key == 1) uk-box-shadow-large @else uk-box-shadow-medium @endif">
                                <p class="uk-text-small uk-text-uppercase">Minimum funding <span class="uk-label uk-border-pill uk-text-small uk-margin-small-left">${{number_format($plan->min)}}</span></p>
                                <h2 class="uk-margin-top uk-margin-remove-bottom">{{$plan->name}}</h2>

                                <hr>
                                <ul class="uk-list uk-list-bullet">
                                    <li>Max Deposit: ${{number_format($plan->max)}}</li>
                                    <li> {{number_format($plan->percentage,1)}}% ROI Weekly
                                    </li>
                                      <li>Contract duration of {{$plan->compound->name}}
                                    </li>
                                    <li>{{number_format($settings['level_1'] + $settings['level_2'],1)}}% Referral Commssion
                                    </li>
                                    
                                    <li>Full access to all features</li>
                                    
                                     <li>24/7 support</li>
                                      <li>@if($key == 0) No @endif personal account manager</li>
                                  
                                </ul>
                                <a href="{{url('account/deposit')}}" class="uk-button @if($key == 1) uk-button-primary @else uk-button-default @endif uk-border-rounded uk-align-center">Sign Up<i class="fas fa-chevron-circle-right fa-xs uk-margin-small-left"></i></a>
                            </div>
                        </div>
                       
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>




@endsection