@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Deposit Investment</title>
<meta  name="description" content="Deposit Investment">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Deposit Investment"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.dashboard')
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Choose Plan </h4>


                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">

            @foreach($plans as $key => $plan)
            <div class="col-xl-3 col-md-6">
                <div class="card plan-box">
                    <div class="card-body p-4">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <h5>{{$plan->name}}</h5>
                            </div>

                        </div>

                        <hr>
                        <div class="plan-features mt-5">
                            
                            <p><i class="bx bx-checkbox-square text-info me-2"></i> Minimum - ${{number_format($plan->min)}}</p>
                           <p><i class="bx bx-checkbox-square text-info me-2"></i> Monthly ROI - {{number_format($plan->percentage,1)}}% </p>
                                 <p><i class="bx bx-checkbox-square text-info me-2"></i>  Affiliate Bonus - {{number_format($plan->ref)}}% </p>
                           
                            <p><i class="bx bx-checkbox-square text-info me-2"></i> Trading Commission - {{number_format($plan->trading_commision)}}% </p>
                            <p><i class="bx bx-checkbox-square text-info me-2"></i> 100% Guaranteed</p>
                  
                        </div>
                        <div class="text-center ">
                            <a a data-plan="{{$plan->id}}" href="javascript: void(0);" class="btn btn-info btn-sm  select_plan">Invest Now</a>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach

        </div>   





        <div class="col-xl-12 col-lg-12 show "style="display:none">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Deposit Amount</h4>
                </div>
                <div class="card-body">
                    <form method="POST" id="p" action="{{route('select-gateway')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="p_id" name="plan" class="form-control">
                        <div class="dd input-group bootstrap-touchspin bootstrap-touchspin-injected">
                            <span class="input-group-btn input-group-prepend"><button class="btn btn-info bootstrap-touchspin-down" type="button">Amount</button>
                            </span><span class="input-group-addon bootstrap-touchspin-prefix input-group-prepend">
                                <span class="input-group-text"id="amount" ></span></span>
                            <input data-toggle="touchspin" type="text" name="amount" placeholder="enter amount" class="form-control">
                            <span class="input-group-btn input-group-append"><button class="btn btn-info bootstrap-touchspin-up" type="button">$</button></span>
                        </div>


                        <div class="text-center">
                            <button class="btn btn-info btn-block mt-3" id="sp">Continue</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




    </div> <!-- container-fluid -->
</div>











@section('script')

<script>

    $('#p').submit(function (event) {
        let disable = document.getElementById('sp');
        disable.setAttribute('disabled', 'true');
    });


    $('.select_plan').click(function () {
        var planID = $(this).attr('data-plan');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                $(".mmodal").show();
            },
            complete: function () {
                $(".mmodal").hide();
            }

        });
        if (planID) {
            $.ajax({
                type: "GET",
                url: "{{url('get-plan')}}?plan_id=" + planID,
                success: function (res) {
                    if (res) {
                        $('#p_id').val('');
                        $('#plan_value').val('');
                        $('#amount').val('');
                        $('#sign').val('');
                        $('#plan_compound').val('');
                        $('.plan_profit').val('');
                        $("#plan_value").val($("#plan_value").val() + res.min);
                        $("#amount").html('$' + res.amount);
                        $("#plan_compound").val($("#plan_compound").val() + res.percentage);
                        $(".plan_profit").html(res.profit);
                        $("#p_id").val($("#p_id").val() + res.p_id);
                        $("#sign").html(res.sign);
                        $(".show").show();
                        $('html, body').animate({
                            scrollTop: $(".dd").offset().top
                        });
                    } else {
                        $('#plan_value').val('');
                        $('#sign').val('');
                        $('#plan_compound').val('');
                        $('#plan_profit').val('');
                        $('#p_id').val('');
                        $(".show").hide();
                        $('#amount').val('');
                    }
                }
            });
        } else {
            $('#plan_value').val('');
            $('#sign').val('');
            $('#plan_compound').val('');
            $('.plan_profit').val('');
            $('#p_id').val('');
            $(".show").hide();
            $('#amount').val('');
        }
    });
</script>

@endsection
@endsection
