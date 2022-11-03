@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Withdrawal</title>
<meta  name="description" content="Withdrawal">
<meta itemprop="keywords" name="keywords" content="Withdrawal"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.dashboard')
@section('content')


<div class="page_title_section dashboard_title">

    <div class="page_header">
        <div class="container">
            <div class="row">

                <div class="col-xl-9 col-lg-7 col-md-7 col-12 col-sm-7">

                    <h1>Make Payout </h1>
                </div>
                <div class="col-xl-3 col-lg-5 col-md-5 col-12 col-sm-5">
                    <div class="sub_title_section">
                        <ul class="sub_title">
                            <li> <a href="{{url('/')}}"> Home </a>&nbsp; / &nbsp; </li>
                            <li>Make Payout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.nav_dashboard')
<!-- Main section Start -->
<div class="l-main">         
    @include('layouts.account')
    <div class="payment_transfer_Wrapper float_left">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                <div class="sv_heading_wraper heading_center">
                    <h3>Make Payout</h3>

                </div>
            </div>
        </div>    
        <style>
            .change_password_wrapper::-webkit-scrollbar
            {
                width: 10px;
                background-color: #F5F5F5;
            }
            .change_password_wrapper::-webkit-scrollbar-thumb
            {
                border-radius: 10px;
                background-color: #FFF;
                background-image: -webkit-gradient(linear,
                    40% 0%,
                    75% 84%,
                    from(#4D9C41),
                    to(#19911D),
                    color-stop(.6,#54DE5D))
            }

        </style>
        <div class="row">
            <div class="col-md-12 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-sm-12 col-12">
                <div class="change_password_wrapper float_left" style="height: 600px!important;overflow: auto;">
                    @forelse($user_withdraw as $withdraw)
                    <div class="change_pass_field text-center mb-5">	
                        <div class="mb-4"> 

                            <span class=""> {{$withdraw->usercoin->coin->name}}</span>  <span class="deposit_pending p-1"> {{$withdraw->type}}</span>
                            &mdash;   <span class="deposit_active p-1"> ${{number_format($withdraw->amount,2)}}</span>
                            <span class="float-right"> 
                                {{ date('F d, Y', strtotime($withdraw->created_at)) }}
                            </span>
                        </div>
                        <form   method="POST" action="{{route('withdraw')}}" enctype="multipart/form-data" style="display:inline-block">
                            @csrf
                            <input value="{{$withdraw->id}}" type="hidden" name="id">
                            <button class="btn btn-rounded btn-outline-success  btn-sm w">Withdraw</button> 
                        </form>
                        <form   method="POST" action="{{route('reinvest')}}" enctype="multipart/form-data" style="display:inline-block">
                            @csrf
                            <input value="{{$withdraw->id}}" type="hidden" name="id">
                        <button class="btn btn-rounded btn-outline-primary btn-sm w">Re-Invest</button>
                        </form>
                    </div>
                    <hr>
                    @empty
                    <div class="text-center">
                        <h3> Nothing to withdraw or re-invest</h3>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    @section('script')
    <script>
        $('form').submit(function (event) {
           $(".w").css("opacity", "0.2");
        });
       
    </script>
    @endsection
    @endsection

