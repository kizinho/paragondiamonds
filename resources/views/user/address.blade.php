
@extends('layouts.dashboard')
@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">WALLET</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="text-center">
                <button type="button" class="btn btn-info mb-5" data-bs-toggle="modal" data-bs-target="#addWallet"
                        data-bs-whatever="@newWallet">Add New Wallet</button>


            </div>
            <div class="modal fade" id="addWallet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: #49749a29  !important">
                <div class="modal-dialog">
                    <form method="post" action="{{url('confirm-wallet')}}">
                        @csrf 
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Wallet for Withdraw</h5>
                            </div>
                            <div class="modal-body">
                                <div class="mb-4">
                                    <label for="message-text" class="col-form-label">Wallet Type:</label>
                                    <select name="wallet_type" class="form-control" id="id_wallet_type">
                                        <option value="" selected disabled>Choose wallet</option>
                                        @foreach($coinsEnable as $coin_c)
                                        @if(empty($coin_c->usercoinUser))
                                        <option value="{{$coin_c->id}}"> {{$coin_c->name}}
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3" id="show" style="display:none">
                                    <label for="message-text" class="col-form-label">Wallet Address:</label>
                                    <input type="text" name="address" class="form-control "  value="" placeholder="Wallet Address" class="">

                                </div>

                                <div id="bank" style="display:none">
                                    <div class="mb-3" >
                                        <label for="message-text" class="col-form-label">Bank name:</label>
                                        <input type="text" name="bank_name" class="form-control "  value="" placeholder="Bank name"  class="">

                                    </div>



                                    <div class="mb-3" >
                                        <label for="message-text" class="col-form-label">Account name:</label>
                                        <input type="text" name="account_name" class="form-control "  value="" placeholder="Account name "  class="">

                                    </div>
                                    <div class="mb-3" >
                                        <label for="message-text" class="col-form-label">Account number:</label>
                                        <input type="number" name="account_number" class="form-control "  value="" placeholder="Account number"  class="">

                                    </div>
                                    <div class="mb-3" >
                                        <label for="message-text" class="col-form-label">Wire routing number:</label>
                                        <input type="text" name="wire_routing_number" class="form-control "  value="" placeholder="Wire routing number" class="">

                                    </div>
                                    <div class="mb-3" >
                                        <label for="message-text" class="col-form-label">ACH routing number:</label>
                                        <input type="text" name="ach_routing_number" class="form-control "  value="" placeholder="ACH routing number"  class="">

                                    </div>
                                    <div class="mb-3" >
                                        <label for="message-text" class="col-form-label">SWIFT code:</label>
                                        <input type="text" name="swift_code" class="form-control "  value="" placeholder="SWIFT code"  class="">

                                    </div>

                                    <div class="mb-3" >
                                        <label for="message-text" class="col-form-label">Bank address:</label>
                                        <textarea type="text" name="bank_address" class="form-control "  value="" placeholder="Bank address"  class=""></textarea>

                                    </div>

                                </div>


                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Preferred withdraw method:</label>
                                    <select name="preferable" class="form-control">
                                        <option value="" selected disabled>Choose preferred</option>
                                        <option value="1">Yes
                                        </option>
                                        <option value="0">No
                                        </option>

                                    </select>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info">Add Wallet</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end preview-->
    @if(!$user->coin->isEmpty())

    <div class="card mt-5">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" style="width: 70px;">#</th>

                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user->coin as $coins)
                        <tr>
                            <td>
                                <div>
                                    <a href="/account/remove-withdraw-address/{{$coins->id}}" > <li class="fas fa-remove w-r text-danger"></li> </a> &nbsp; 
                                    <img class="rounded-circle avatar-xs" style="width:30px;height: 30px" src="{{asset($coins->coin->photo)}}" alt="">
                                </div>
                            </td>
                            <td>
                                <p class="text-muted mb-0">@if($coins->coin_id == 1) BTC wallet @elseif($coins->coin_id == 3) Bank Wire @else ETH wallet @endif </p>
                            </td>
                            <td>
                                <p class="text-muted mb-0">
                                  
                                    @if($coins->coin_id == 3)
                                    {{$coins->account_number}}
                                    @else
                                    {{$coins->address}}

                                    @endif

                                </p>
                            </td>

                            <td>
                                <ul class="list-inline font-size-20 contact-links mb-0">
                                    <li class="list-inline-item px-2">
                                        <div>
                                            <span style="color: red; float: right;font-size: 12px"> @if($coins->preferable == true)
                                                preferable <span class="b-wallet2-label">Yes      <a href="/account/remove/{{$coins->id}}" class="b-wallet2-delete w-p">
                                                        <img src="{{asset('wallet-delete.png')}}" style="width: 20px;height: 20px">
                                                    </a></span>
                                                @else preferable <span class="b-wallet2-label">No   <a href="/account/add/{{$coins->id}}" class="b-wallet2-delete w-p">
                                                        <img src="{{asset('wallet-add.png')}}" style="width: 20px;height: 20px">
                                                    </a></span>  @endif</span>
                                        </div>
                                    </li>
                                    <li class="list-inline-item px-2">
                                        <div>
                                            <a href="{{url('account/capital')}}" class="btn btn-warning btn-xs text-white cap">Take Capital </a>
                                        </div>
                                    </li>

                                </ul>
                            </td>
                        </tr>
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
    $("#id_wallet_type").change(function () {
        var valueName = $(this).val();
        if (valueName === '3') {
            $("#show").hide();
            $("#bank").show();

        } else {
            $("#show").show();
            $("#bank").hide();

        }

    });

</script>

@endsection




@endsection

