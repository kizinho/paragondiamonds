
@extends('layouts.dashboard')
@section('content')


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">AFFILIATE</h4>


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
                                            <p class="text-muted pull-left ">Affiliate Link</p>

                                            <h4 class="mb-5 mt-5">
                                                <div class="text-center">
                                                    <img  src="        {{$image_qrcode}}"/>
                                                </div>
                                                <div class="text-center mt-4">
                                                    <input id="inputReferralLink" value="{{url('/')}}/{{Auth::user()->ref_check}}" class="form-control text-center" readonly>
                                                    <div class="mt-2">
                                                        <label for="inputReferralLink" style="color:red">Copy</label> 
                                                        <span class="fa fa-copy text-success  embd-btn" style="cursor: pointer; color: green"></span>
                                                    </div>

                                                </div>
                                            </h4>
                                        </div>
                                        <br>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted pull-left ">Total Affiliate</p>

                                            <h4 class="mb-5 mt-5">
                                                <div class="text-center">
                                                    @if(!empty($second_refs))
                                                    @php
                                                    $second = $second_refs->count();
                                                    @endphp
                                                    @else
                                                    @php
                                                    $second = 0;
                                                    @endphp
                                                    @endif
                                                    @if(!empty($third_refs))
                                                    @php
                                                    $third = $third_refs->count();
                                                    @endphp
                                                    @else
                                                    @php
                                                    $third = 0;
                                                    @endphp
                                                    @endif
                                                    {{number_format($refs->count())}}
                                                </div>

                                            </h4>
                                        </div>
                                        <br>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted pull-left ">Total Bonus</p>

                                            <h4 class="mb-5 mt-5">
                                                <div class="text-center">
                                                    ${{number_format($commission,2)}}
                                                </div>

                                            </h4>
                                        </div>
                                        <br>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @if(!$refs->isEmpty())     
            <div class="card mt-5">
                <div class="card-body">
                    <h4 class="card-title">Users</h4>
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 70px;">#</th>

                                    <th scope="col">Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date Joined</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($refs as $refUser)
                                @foreach($refUser->userRef as $ref)
                                <tr>
                                    <td>
                                        {{$loop->iteration}}
                                    </td>
                                    <td>
                                        <p class="text-muted mb-0">{{$ref->username}}</p>
                                    </td>
                                    <td>
                                        @if(empty($ref->activeIn))
                                        <span class="badge badge-pill badge-soft-danger font-size-11">Pending</span>
                                        @else
                                        <span class="badge badge-pill badge-soft-success font-size-11">Active</span>
                                        @endif
                                    </td>

                                    <td>
                                        {{ date('F d, Y', strtotime($ref->created_at)) }} {{ date('g:i A', strtotime($ref->created_at)) }}
                                    </td>
                                </tr>
                                @endforeach
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            @endif   
           
          
        </div> <!-- container-fluid -->
    </div>


















    @section('script')


    <script>
        $('.embd-btn').click(function () {
            var copyInput = document.getElementById("inputReferralLink");
            copyInput.select();
            document.execCommand("copy");
            let message = "Referral link Copied Successfully: " + copyInput.value;
            $("#snackbar_success").html(message);
            messageAlertSuccess();
        });

    </script>

    @endsection

    @endsection

