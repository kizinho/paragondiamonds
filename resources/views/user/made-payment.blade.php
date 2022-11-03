  
@extends('layouts.dashboard')

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Make Payment</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="card">
                <div class="bg-dark bg-soft">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-white p-3">
                                <h5 class="text-success">
                                    Pay with  @if($coin->id == 1) Bitcoin @else Ethereum @endif</h5>
                                @if($type == "deposit")
                                @elseif($type == "EducationLicense")
                                
                                <p>{{$user_education_license->amount_check}} @if($coin->id == 1) BTC @else ETH @endif </p>
                                @else

                                <p>{{$invest->amount_check}} @if($coin->id == 1) BTC @else ETH @endif </p>
                                @endif
                            </div>
                        </div>
                      
                    </div>
                </div>

                <div class="card-body pt-0 mt-3">
                    <div class="row">
                        <div class="col-xl-6 col-md-6">

                            <img class="img-fluid" src="{{$image_qrcode}}"/>
                        </div>

                        <div class="col-xl-6 col-md-6">
                            <div class="pt-4">

                                @if($type == "deposit")
                                @elseif($type == "EducationLicense")

                                <div class="mb-2"><small>Transaction #{{$user_education_license->transaction_id}} created successfully.</small></div>
                                <h5>Transfer <span class="text-success">{{$user_education_license->amount_check}}</span> @if($coin->id == 1) BTC @else ETH @endif to the wallet listed below</h5>
                                @else

                                <div class="mb-2">Transaction #{{$invest->transaction_id}} created successfully.</div>
                                <h5>Transfer <span class="text-success">{{$invest->amount_check}}</span> @if($coin->id == 1) BTC @else ETH @endif to the wallet listed below</h5>
                                @endif
                                <div class="text-warning"><small>Transaction will be confirmed 3 times in Blockchain.</small></div>

                                <div class="text-danger mb-4"><small>Attention! Blockchain fee is collected while using network.</small></div>
                                <input type="text" id="inputReferralLink" value="{{$sendaddress}}" readonly="" class="form-control font-14">
                                <div class="mt-2 text-center">
                                    <label for="inputReferralLink" style="color:red">Copy</label> 
                                    <span class="fa fa-copy text-success  embd-btn" style="cursor: pointer; color: green"></span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>































        </div> <!-- container-fluid -->
    </div>   
    @section('script')


    <script>
        $('.embd-btn').click(function () {
            var copyInput = document.getElementById("inputReferralLink");
            copyInput.select();
            document.execCommand("copy");
            let message = "Address Copied Successfully: " + copyInput.value;
            $("#snackbar_success").html(message);
            messageAlertSuccess();
        });

    </script>

    @endsection



    @endsection
