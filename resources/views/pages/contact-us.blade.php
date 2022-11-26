@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Contact us</title>
<meta  name="description" content="Contact us">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Contact us"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />
<style>
    .shadow{
        box-shadow: 0 2px 17px 0 rgb(0 0 0 / 30%); 
    }
    .border-green-500 {
        border-color: #2596be!important;
        color: #2596be!important;
    }
    .hover\:bg-green-500:hover{
        background: #2596be!important;
        color: #fff!important;
    }
</style>
@endsection
@extends('layouts.app')
@section('content')
<div class="slideshow uk-position-relative" uk-slideshow="autoplay: true;animation: fade;ratio:1920:450;'">
    <div class="uk-position-relative uk-visible-toggle uk-dark">
        <ul class="uk-slideshow-items">
            <li class="slide subpage" style="background-image: url({{url('frontend/contact.jpeg')}}); background-repeat: no-repeat; background-position: 50% 50%;">
                <div class="sub-banner uk-height-1-1">
                    <div class="uk-container uk-container-large uk-height-1-1 uk-flex uk-flex-middle">
                        <h2  class="sub-caption" uk-scrollspy="cls:text-focus-in;delay: 500">Contact</h2>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="uk-clearfix"></div>

<div id="page-main" data-parents="2" data-siblings="3" data-children="0">
    <div class="uk-container uk-container-large">
        <div class="uk-grid-collapse uk-margin-large-bottom uk-grid uk-grid-stack" uk-grid="">
          
            <div class="uk-width-3-4@m uk-flex-last@m uk-flex-first@s uk-first-column">
                <div id="page-body" class="uk-margin-large-left r-col">
                      <br>   <br>
                     <h1 style="color:grey">Contact Info</h1>
                    <div></div>
                      <br> 
                    <div class="uk-grid uk-grid-stack" uk-grid="" uk-height-match="target: > div > .uk-card">
                        <div class="uk-width-1-2@m uk-first-column">
                            <div class="uk-card uk-card-default uk-card-body uk-card-small" style="">
                                <h3>Come Visit</h3>
                                <p>
                                  {!! $settings['address'] !!}
                                </p>
                               
                            </div>
                        </div>
                        <div class="uk-width-1-2@m uk-grid-margin uk-first-column">
                            <div class="uk-card uk-card-default uk-card-body uk-card-small">
                                <h3>Give Us a call</h3>
                               
                                <p>  {{ $settings['site_phone'] }}</p>
                            </div>
                        </div>
                        <div class="uk-width-1-2@m uk-grid-margin uk-first-column">
                            <div class="uk-card uk-card-default uk-card-body uk-card-small" style="">
                                <h3>Email Us</h3>
                                <p>
                                  <p>
                                 <a href="mailto:{{ $settings['site_email'] }}"> {{ $settings['site_email'] }}</a><br />
                                  
                                </p>
                                </p>
                            </div>
                        </div>
                        <div class="uk-width-1-2@m uk-grid-margin uk-first-column">
                            <div class="uk-card uk-card-default uk-card-body uk-card-small">
                                <h3>Email Us</h3>
                                <p>
                                  <a href="mailto:Georgebrandon@paragondiamonds.co.uk">Georgebrandon@paragondiamonds.co.uk</a><br />
                                    
                                </p>
                                <p>
                                  <a href="mailto:Carolynreid@paragondiamonds.co.uk">Carolynreid@paragondiamonds.co.uk</a><br />
                                    
                                </p>
                            </div>
                        </div>
                 
                       
                    </div>
                    <div></div>
                </div>
            </div>
            <div class="uk-width-1-4@m uk-flex-first@m uk-flex-last@s uk-first-column uk-grid-margin">
                <div class="aside">
                    
                     <form id="contact" method="POST"  class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                      
                 
                     
                     <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                           Name
                        </label>
                          <input
                                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="name"
                                type="text"
                                placeholder="Your name"
                                />
                       
                    </div>
                      
                        <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                          Email
                        </label>
                          <input
                                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                               id="email"
                                type=email"
                                placeholder="Your email"
                                />
                       
                    </div>
                   
                       <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                          Subject
                        </label>
                          <input
                                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                               id="subject"
                                type="text"
                                placeholder="subject"
                                />
                       
                    </div>
                        <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                          Message
                        </label>
                            <textarea
                                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                               id="message"
                                type="text"
                                placeholder="message"></textarea>
                       
                    </div>
                    <div class="mb-6 text-center">
                        <button id="control"
                            class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                            type="submit"
                            >
                          Submit
                        </button>
                         <button id="control-name"
                            class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                            type="button" style="display:none"
                            >
                          Sending message ....
                        </button>
                    </div>
                    
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
<script>

    $('#contact').submit(function (event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                $("#control-name").show();
                $("#control").hide();
            },
            complete: function () {
                $("#control-name").hide();
                $("#control").show();
            }
        });
        jQuery.ajax({
            url: "{{url('/contact')}}",
            type: 'POST',
            data: {
                name: jQuery('#name').val(),
                email: jQuery('#email').val(),
                message: jQuery('#message').val(),
                subject: jQuery('#subject').val()


            },
            success: function (data) {
                if (data.status === 401) {
                    var message = data.message;
                        $("#snackbar_error").html(message);
                        messageAlertError();
                   
                    return false;
                }
                if (data.status === 200) {
                    var message = data.message;
                    $("#snackbar_success").html(message);
                    messageAlertSuccess();
                    $("#contact")[0].reset();
                    return false;
                }
            }

        });
    });

</script> 
@endsection
@endsection