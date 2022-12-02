
@extends('layouts.dashboard')
@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Confirm Withdraw</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="card mt-5">
                <div class="card-body">


                    <div class="table-responsive">
                        <form   method="POST" action="{{route('withdraw-fund')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$withdraw['transaction_id']}}" name="transaction_id">
                            <table class="table align-middle table-nowrap results-hi">
                                <thead class="table-light">

                                </thead>
                                <tbody>

                                    <tr>
                                        <th>Account:</th>
                                        <td>  <span class="badge badge-pill badge-soft-success">
                                                {{$name_full}}
                                            </span>  
                                            @if($address->coin_id == 3)
                                            {{$address->account_number}}
                                            @else
                                            {{$address->address}}
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Debit Amount:</th>
                                        <td>${{number_format($withdraw['total_amount'],2)}}</td>
                                    </tr>

                                    <tr>
                                        <th>Withdraw Fee:</th>
                                        <td>
                                            ${{number_format($withdraw['withdraw_charge'],2)}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Credit Amount:</th>
                                        <td>${{number_format($withdraw['amount'],2)}}</td>
                                    </tr>

                                    <tr>

                                        <td colspan="2">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-info mb-3">Confirm</button>
                                            </div>
                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                        </form>
                    </div> 



                </div>
            </div>




        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    @endsection

