@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; User Password Reset Link</title>
<meta  name="description" content="User Password Reset Link">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - User Password Reset Link"/>
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
                        <h2  class="sub-caption" uk-scrollspy="cls:text-focus-in;delay: 500">Password Reset</h2>
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
                <h3 class="pt-4 text-2xl text-center">Password Reset</h3>
                <form method="POST" action="{{ route('password.email') }}" class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                      @csrf 
                 
                     
                     <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                           Email
                        </label>
                          <input
                                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                name="email"
                                type="email"
                                placeholder="Email"
                                />
                       
                    </div>
                   
                    <div class="mb-6 text-center">
                        <button id="control"
                            class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                            type="submit"
                            >
                            Get reset link
                        </button>
                       
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

</div>

<div class="uk-clearfix"></div>






@endsection