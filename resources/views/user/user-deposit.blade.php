
@extends('layouts.dashboard')
@section('content')
<form method="post"action="{{url('account/deposit')}}">
                           @csrf
    <section class="b-sec">
        <div class="container --a">
            <div class="b-profile">
                <div class="b-payment">
                    <div class="b-profile__header">Deposit</div>
                    <div class="tbl tbl--xs tbl--auto w100p">
                        <div class="cll b-payment-l">

                            <div class="b-payment-amount dont-break-out">fund your account</div>

                        </div>
                        <div class="cll b-payment-r">
                            <div class="b-profile__item">
                                <input type="text" name="amount" value="" placeholder="Amount" required="" class="js-invest-value ">

                            </div>
                            <div class="b-profile__item" style="display:none">
                                <div class="b-profile-select js-investment-period">

                                </div>

                            </div>
                            <button type="submit">Deposit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

@endsection

