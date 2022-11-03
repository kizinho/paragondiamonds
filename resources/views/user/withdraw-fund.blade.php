@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Confirm Withdrawal</title>
<meta  name="description" content="Confirm Withdrawal">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Confirm Withdrawal"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.dashboard')
@section('content')


<div class="page_title_section dashboard_title">

    <div class="page_header">
        <div class="container">
            <div class="row">

                <div class="col-xl-9 col-lg-7 col-md-7 col-12 col-sm-7">

                    <h1>Confirm Payout </h1>
                </div>
                <div class="col-xl-3 col-lg-5 col-md-5 col-12 col-sm-5">
                    <div class="sub_title_section">
                        <ul class="sub_title">
                            <li> <a href="{{url('/')}}"> Home </a>&nbsp; / &nbsp; </li>
                            <li>Confirm Payout</li>
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
             <div class="sv_heading_wraper">
                    <h3>Payout Confirmation details</h3>

                </div>
            </div>
        </div>    

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">

              
                        <div class="alert light-warning input-text text-center">
                         
                            <span><span class="deposit_active p-1">Payout charges</span>  <b>{{number_format($settings['withdraw_charge'])}}%</b></span>
                        </div>
                            <div class="table-responsive">
                                <form   method="POST" action="{{route('withdraw-fund')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{$withdraw['transaction_id']}}" name="transaction_id">
                                    <table class="table table-striped mb-0">
                                        <thead class="thead-light">

                                        </thead>
                                        <tbody>
                                          
                                           <tr>
                                                <th>Account:</th>
                                                <td>       <span class="deposit_active p-1">{{$coin}}</span>  {{$address}}</td>
                                            </tr>
                                             
                                            <tr>
                                                <th>Debit Amount:</th>
                                                <td>${{number_format($withdraw['total_amount'],2)}}</td>
                                            </tr>

                                            <tr>
                                                <th>Payout Fee:</th>
                                                <td>
                                              ${{number_format($withdraw['withdraw_charge'],2)}}
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Credit Amount:</th>
                                                <td>${{number_format($withdraw['amount'] - $withdraw['withdraw_charge'],2)}}</td>
                                            </tr>
                                           
                                         <tr>

                                                <td colspan="2">
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-outline-success mb-5">Confirm</button>
                                                    </div>
                                                </td>

                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div><br>





                    </div>
                </section>

                <!-- /.content -->	  
            </div>
        </div>

    </div>
    
</div>

        @endsection


