@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; User Verify Account</title>
<meta  name="description" content="User Verify Account">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - User Verify Account"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.auth')
@section('content')


<section class="y auth">
    <div class="container">
        <div class="pb-3 row justify-content-center">

            <div class="col-12 col-md-6 col-lg-6 col-sm-10 col-xl-6">
                <div class="text-center">
                    <a href="{{url('/')}}">
                        <img src="{{asset($settings['logo']) }}" alt="" class="mb-3 img-fluid auth__logo"></a>
                </div>


                <div class="bg-white shadow card login-page roundedd border-1 ">
                    <div class="card-body">
                        <h4 class="text-center card-title">Verify your Account</h4>
                        <form  id="register-user"  class="mt-4 login-form">                           
                            <div class="row">
                                <div class="text-center col-12">
                                    <p class="mt-3 mb-0"><small class="mr-2 text-dark">Check your email for activation link was sent or check your spam inbox.
                                        </small></p>
                                </div>
                                <br>
                                <!--end col-->

                                <div class="mb-0 col-lg-12">
                                      <a href="{{url('resend')}}" class="btn btn-primary btn-block pad">Resend Code</a>
                                </div>
                                <!--end col-->

                                <div class="mt-4 text-center col-lg-12">
                                </div>


                              
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                </div>
                <!---->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>




@endsection

