@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; User Login Account</title>
<meta  name="description" content="User Login Account">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - User Login Account"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.auth')
@section('content')


<section class=" auth">
    <div class="container">
        <div class="pb-3 row justify-content-center">

            <div class="col-12 col-md-6 col-lg-6 col-sm-10 col-xl-6">
                <div class="text-center">
                    <a href="{{url('/')}}">
                        <img src="{{asset($settings['logo']) }}" alt="" class="mb-3 img-fluid auth__logo"></a> 
                </div>

                <div class="bg-white shadow card login-page roundedd border-1 ">
                    <div class="card-body">
                        <h4 class="text-center card-title">User Login</h4>
                        <form method="POST" action="{{ route('login') }}"  class="mt-4 login-form">
                            @csrf              
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Your Email <span class="text-danger">*</span></label>
                                        <div class="position-relative">
                                            <i data-feather="mail" class="fea icon-sm icons"></i>
                                            <input type="email" class="pl-5 form-control" name ="email" value="" id="email" placeholder="name@example.com" required>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Password <span class="text-danger">*</span></label>
                                        <div class="position-relative">
                                            <i data-feather="key" class="fea icon-sm icons"></i>
                                            <input type="password" class="pl-5 form-control" name="password" id="password" placeholder="Enter Password" required>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="customCheck1" name="remember">
                                                <label class="custom-control-label" for="customCheck1">Remember
                                                    me</label>
                                            </div>
                                        </div>
                                        <p class="mb-0 forgot-pass"><a href="{{route('password.request')}}"
                                                                       class="text-dark font-weight-bold">Forgot password ?</a></p>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="mb-0 col-lg-12">
                                    <button class="btn btn-primary btn-block pad" type="submit">Sign in</button>
                                </div>
                                <!--end col-->

                                <div class="mt-4 text-center col-lg-12">
                                </div>
                                <!--end col-->
                                <!--end col-->

                                <div class="text-center col-12">
                                    <p class="mt-3 mb-0"><small class="mr-2 text-dark">Don't have an account
                                            ?</small> <a href="{{url('register')}}"
                                                     class="text-dark font-weight-bold">Sign Up</a></p>
                                </div>
                                <!--end col-->

                                <div class="text-center col-12">
                                    <p class="mt-4 mb-0"><small class="mr-2 text-dark">     {{$settings['copy_right']}}</small>
                                    </p>
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