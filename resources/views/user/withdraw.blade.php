


@extends('layouts.dashboard')
@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Withdraw</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="card mt-5">
                <div class="card-body">

                    <form method="post" action="{{url('withdraw')}}">
                        @csrf 
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Avaliable Balance 
                                    <span class="badge badge-pill badge-soft-success">
                                        @if(empty(Auth::user()->earn))
                                        $0.0
                                        @else
                                        ${{number_format(Auth::user()->earn->amount)}}
                                        @endif
                                    </span></h5>
                            </div>
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Amount:</label>
                                    <input type="text" name="amount" class="form-control "  class="">

                                </div>





                            </div>
                            <div class="text-center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Compound</button>
                                <button type="submit" class="btn btn-info">Process Withdraw</button>
                                <br>  <br>
                            </div>
                    </form>    


                </div>
            </div>




        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    @endsection

