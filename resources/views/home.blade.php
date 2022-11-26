  
@extends('layouts.dashboard')
<style>
    .progress {
    background-color: #d3c3c3!important;
}
    </style>
@section('content')
@can('isUser')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Dashboard</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Trading Balance</p>
                                            <h4 class="mb-0"> @if(empty(Auth::user()->earn))
                                                $0.0  USD
                                                @else
                                                ${{number_format(Auth::user()->earn->amount, 2)}} USD
                                                @endif</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                <span class="avatar-title">
                                                    <i class="fa fa-money font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Investment</p>
                                            <h4 class="mb-0">${{number_format($total_deposit, 2)}}</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center ">
                                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="fa fa-pie-chart font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Withdrawal</p>
                                            <h4 class="mb-0">${{number_format($completed_withdraw, 2)}}</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="fa fa-dollar font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->


                </div>
            </div>


            <div class="row">

                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Profit</p>
                                            <h4 class="mb-0"> 
                                                ${{number_format($earned, 2)}}

                                            </h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                <span class="avatar-title">
                                                    <i class="fa fa-credit-card font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Referral</p>
                                            <h4 class="mb-0">${{number_format($bonus, 2)}}</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center ">
                                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="fa fa-users font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Active Plan </p>
                                            <h4 class="mb-0">${{number_format($active_deposit, 2)}}</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-lock-open font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($deposits->isNotEmpty())
                    <div class="col-12">
                        <h4 class="card-title mb-4"><a href="{{url('deposit_history')}}">See All Plans</a></h4>
                    </div>
                    @endif



                </div>
            </div>

            <div class="col-xl-12">
                <div class="row">
                    @foreach($deposits as $d)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">{{$d->plan->name}}</h4>
                                <p class="card-title-desc">${{number_format($d->amount,1)}} 
                                    <code class="highlighter-rouge">invested</code></p>

                                <div class="">
                                    <div class="progress">
                                 <div class="progress-bar" role="progressbar" style="width: {{$d->cal()}}%;"
                                      aria-valuenow="{{$d->cal()}}" aria-valuemin="0" aria-valuemax="{{$d->calTotal()}}">
                                    {{$d->cal()}}%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
       
            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    @endcan

    @can('isAdmin') 
    <div class="page_title_section dashboard_title">

        <div class="page_header">
            <div class="container">
                <div class="row">

                    <div class="col-xl-9 col-lg-7 col-md-7 col-12 col-sm-7">

                        <h1>Dashboard </h1>
                    </div>
                    <div class="col-xl-3 col-lg-5 col-md-5 col-12 col-sm-5">
                        <div class="sub_title_section">
                            <ul class="sub_title">
                                <li> <a href="{{url('/')}}"> Home </a>&nbsp; / &nbsp; </li>
                                <li>My Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.nav_dashboard')
    <!-- Main section Start -->
    <div class="l-main mb-5 mt-5">     

        <div class="clearfix"></div>
        <br/>
        <!--  account wrapper start -->
        <div class="account_wrapper float_left mb-5">

            <div class="row">


                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="sv_heading_wraper">

                        <h3>Admin Statistics </h3>

                    </div>

                </div>
                <div class="col-md-4 col-lg-4 col-xl-3 col-sm-6 col-12">
                    <div class="investment_box_wrapper color_1 float_left card-new">
                        <a href="#">
                            <div class="investment_icon_wrapper float_left">
                                <i class="fa fa-money"></i>
                                <h1>All Balance</h1>
                            </div>

                            <div class="invest_details float_left ">
                                <table class="invest_table">
                                    <tbody>
                                        <tr>
                                            <td class="invest_td1">Total Balance</td>
                                            <td class="invest_td1"> : {{$all_total_balance}} USDT</td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4 col-xl-3 col-sm-6 col-12">
                    <div class="investment_box_wrapper color_2 float_left card-new">
                        <a href="{{url('manage-deposit')}}">
                            <div class="investment_icon_wrapper float_left">
                                <i class="fa fa-sort"></i>
                                <h1>Deposits</h1>
                            </div>

                            <div class="invest_details float_left ">
                                <div class="text-center">
                                    <a href="{{url('manage-deposit')}}"> view <i class="fa fa-eye"></i></a>
                                </div>
                                <div class="clearfix"></div>
                                <table class="invest_table">
                                    <tbody>
                                        <tr>
                                            <td class="invest_td1">Total Deposit</td>
                                            <td class="invest_td1"> : {{number_format($all_total_deposit,2)}} USDT</td>
                                        </tr>
                                        <tr>
                                            <td class="invest_td1">Active Deposit</td>
                                            <td class="invest_td1"> : {{number_format($all_active_deposit,2)}} USDT</td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4 col-xl-3 col-sm-6 col-12">
                    <div class="investment_box_wrapper color_3 float_left card-new">
                        <a href="{{url('users')}}">
                            <div class="investment_icon_wrapper float_left">
                                <i class="fa fa-users"></i>
                                <h1>Users</h1>
                            </div>

                            <div class="invest_details float_left ">
                                <div class="text-center">
                                    <a href="{{url('users')}}"> view <i class="fa fa-eye"></i></a>
                                </div>
                                <div class="clearfix"></div>
                                <table class="invest_table">
                                    <tbody>
                                        <tr>
                                            <td class="invest_td1">Total Users</td>
                                            <td class="invest_td1"> : {{number_format($users)}}</td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </a>
                    </div>
                </div>


                <div class="col-md-4 col-lg-4 col-xl-3 col-sm-6 col-12">
                    <div class="investment_box_wrapper color_4 float_left card-new">
                        <a href="{{url('plan-setting')}}">
                            <div class="investment_icon_wrapper float_left">
                                <i class="fa fa-box"></i>
                                <h1>Plans</h1>
                            </div>

                            <div class="invest_details float_left ">
                                <div class="text-center">
                                    <a href="{{url('plan-setting')}}"> view <i class="fa fa-eye"></i></a>
                                </div>
                                <div class="clearfix"></div>
                                <table class="invest_table">
                                    <tbody>
                                        <tr>
                                            <td class="invest_td1">Total Plans</td>
                                            <td class="invest_td1"> : {{number_format(count($plans))}}</td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </a>
                    </div>
                </div>



                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="sv_heading_wraper">

                        <h3>Deposits Statistics </h3>

                    </div>

                </div>




                <div class="col-md-4 col-lg-4 col-xl-3 col-sm-6 col-12">
                    <div class="investment_box_wrapper color_5 float_left card-new">
                        <a href="{{url('manage-deposit')}}">
                            <div class="investment_icon_wrapper float_left">
                                <i class="fa fa-line-chart"></i>
                                <h1>Deposits</h1>
                            </div>

                            <div class="invest_details float_left ">
                                <div class="text-center">
                                    <a href="{{url('manage-deposit')}}"> view <i class="fa fa-eye"></i></a>
                                </div>
                                <div class="clearfix"></div>
                                <table class="invest_table">
                                    <tbody>
                                        <tr>
                                            <td class="invest_td1">Total Deposits</td>
                                            <td class="invest_td1"> : {{number_format($all_deposits)}}</td>
                                        </tr>
                                        <tr>
                                            <td class="invest_td1"><a href="{{url('manage-deposit?type=running')}}">Active Investments</a></td>
                                            <td class="invest_td1"> : {{number_format($active_investment)}}</td>
                                        </tr>
                                        <tr>
                                            <td class="invest_td1"><a href="{{url('manage-deposit?type=completed')}}">Completed Investments</a></td>
                                            <td class="invest_td1"> : {{number_format($completed_investment)}}</td>
                                        </tr>
                                        <tr>
                                            <td class="invest_td1"><a href="{{url('manage-deposit?type=pending')}}">Pending Deposits</a></td>
                                            <td class="invest_td1"> : {{number_format($pending_investment)}}</td>
                                        </tr>
                                        <tr>
                                            <td class="invest_td1"><a href="{{url('manage-deposit?type=confirmed')}}">Confirmed Deposits</a></td>
                                            <td class="invest_td1"> : {{number_format($confirm_investment)}}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </a>
                    </div>
                </div>


                <div class="col-md-4 col-lg-4 col-xl-3 col-sm-6 col-12">
                    <div class="investment_box_wrapper color_6 float_left card-new">
                        <a href="{{url('manage-withdraw')}}">
                            <div class="investment_icon_wrapper float_left">

                                <h1>Payouts</h1>
                            </div>

                            <div class="invest_details float_left ">
                                <div class="text-center">
                                    <a href="{{url('manage-withdraw')}}"> view <i class="fa fa-eye"></i></a>
                                </div>
                                <div class="clearfix"></div>
                                <table class="invest_table">
                                    <tbody>
                                        <tr>
                                            <td class="invest_td1">Total Payouts</td>
                                            <td class="invest_td1"> : {{number_format($all_withdraws)}}</td>
                                        </tr>
                                        <tr>
                                            <td class="invest_td1"><a href="{{url('manage-withdraw?type=pending')}}">Pending Payouts</a></td>
                                            <td class="invest_td1"> : {{number_format($withdraws_pending)}}</td>
                                        </tr>
                                        <tr>
                                            <td class="invest_td1"><a href="{{url('manage-withdraw?type=completed')}}">Completed Payouts</a></td>
                                            <td class="invest_td1"> : {{number_format($withdraws_complete)}}</td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </a>
                    </div>
                </div>


                <div class="col-12">
                    <div class="box">
                        <div class="box-body">
                            <iframe src="https://www.exchangerates.org.uk/widget/ER-LRTICKER.php?w=auto&amp;s=1&amp;mc=GBP&amp;mbg=FFFFFF&amp;bs=no&amp;bc=000044&amp;f=helvetica&amp;fs=11px&amp;fc=000044&amp;lc=19335C&amp;lhc=faa31c&amp;vc=FE9A00&amp;vcu=008000&amp;vcd=FF0000&amp;" width="100%" height="30" frameborder="0" scrolling="no" marginwidth="0" marginheight="0"></iframe>

                        </div>
                    </div>
                </div>


                <!--  account wrapper end -->
                <!--  transactions wrapper start -->
                <div class="last_transaction_wrapper float_left">

                    <div class="row">

                        <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                            <div class="sv_heading_wraper">

                                <h3>LAST 5 TRANSACTIONS</h3>

                            </div>
                        </div>
                        <div class="crm_customer_table_main_wrapper float_left">
                            <div class="crm_ct_search_wrapper">
                                <div class="crm_ct_search_bottom_cont_Wrapper">
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="w table datatables cs-table crm_customer_table_inner_Wrapper">
                                    <thead>
                                        <tr>
                                            <th class="width_table1">transaction ID</th>
                                            <th class="width_table1">amount (USDT)</th>
                                            <th class="width_table1">description</th>
                                            <th class="width_table1">payment mode</th>
                                            <th class="width_table1">Status</th>
                                            <th class="width_table1">date</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($transactions_admin as $hi)
                                        <tr class="background_white">

                                            <td>
                                                <div class="media cs-media">

                                                    <div class="media-body">
                                                        <h5>{{$hi->transaction_id}}</h5>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="pretty p-svg p-curve">USDT{{number_format($hi->amount)}}</div>
                                            </td>
                                            <td>
                                                <div class="pretty p-svg p-curve">{{$hi->description}}</div>
                                            </td>
                                            <td>
                                                <div class="pretty p-svg p-curve">{{$hi->usercoin->coin->name}}</div>
                                            </td>
                                            <td>
                                                @if($hi->status == false)
                                                <div class="pretty p-svg p-curve badge deposit_pending">Pending</div>
                                                @else
                                                <div class="pretty p-svg p-curve badge deposit_active">Confirmed</div>
                                                @endif
                                            </td>
                                            <td class="flag">
                                                <div class="pretty p-svg p-curve">{{ date('F d, Y', strtotime($hi->created_at)) }} {{ date('g:i A', strtotime($hi->created_at)) }}</div>
                                            </td>

                                        </tr>
                                        @empty
                                        TRANSACTIONS
                                        @endforelse
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <!--  transactions wrapper end -->




            </div>
        </div>

        @endCan 
      



        @endsection
