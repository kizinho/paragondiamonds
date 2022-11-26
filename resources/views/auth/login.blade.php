@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; User Login Account</title>
<meta  name="description" content="User Login Account">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - User Login Account"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.app')
@section('content')

<div class="slideshow uk-position-relative" uk-slideshow="autoplay: true;animation: fade;ratio:1920:450;'">
    <div class="uk-position-relative uk-visible-toggle uk-dark">
        <ul class="uk-slideshow-items">
            <li class="slide subpage" style="background-image: url({{url('frontend/auth.jpeg')}}); background-repeat: no-repeat; background-position: 50% 50%;">
                <div class="sub-banner uk-height-1-1">
                    <div class="uk-container uk-container-large uk-height-1-1 uk-flex uk-flex-middle">
                        <h2  class="sub-caption" uk-scrollspy="cls:text-focus-in;delay: 500">Login</h2>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="uk-clearfix"></div>
<div id="page-main" data-parents="2" data-siblings="8" data-children="0">
<!-- Container -->

<div class="container mx-auto">
    <div class="flex justify-center items-center">
        <!-- Row -->
        <div class="flex">
            <!-- Col -->
            <div
                class="w-full h-auto bg-gray-400 hidden lg:block lg:w-5/12 bg-cover rounded-l-lg"
                style="background-image: url({{url('frontend/auth1.png')}});width: 600px;height: 800px"
                ></div>
            <!-- Col -->
            <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
                <h3 class="pt-4 text-2xl text-center">PARTNER Login</h3>
            
                    <form method="POST" action="{{ route('login') }}"  class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                            @csrf 
                      <div class="mb-4 md:flex md:justify-between">
                        <div class="mb-4 md:mr-2 md:mb-0">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="Email">
                                Email
                            </label>
                            <input
                                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                name="email"
                                type="email"
                                placeholder="Email"
                                />
                        </div>
                        <div class="md:ml-2">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="Mobile Number">
                                Password
                            </label>
                           <div class="relative mb-3 w-full flex flex-wrap items-stretch">
                                        <input  name="password"
                                                id="password"
                                    type="password"
                                    placeholder="******************" class="relative px-3 py-2 pr-10 w-full mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" />
                                        <span class="absolute right-0 z-10 py-3 pr-1 w-8 h-full leading-snug bg-transparent rounded text-base font-normal text-gray-400 text-center  items-center justify-center">
                                            <i class="fa fa-eye toggle-password"></i>
                                        </span>
                                    </div>
                        </div>
                    </div>
                    
                    <div class="mb-6 text-center">
                        <button id="control"
                            class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                            type="submit"
                            >
                            Login
                        </button>
                       
                    </div>
                    <hr class="mb-6 border-t" />
                    <div class="text-center">
                        <a
                            class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                            href="{{route('password.request')}}"
                            >
                            Forgot Password?
                        </a>
                    </div>
                    <div class="text-center">
                        <a
                            class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                            href="{{url('register')}}"
                            >
                            Don't have an account
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>

<div class="uk-clearfix"></div>

@section('script')

<script>
    $("body").on('click', '.toggle-password', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $("#password");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});


</script>

@endsection

@endsection