@section('title')
<title>{{ucfirst($settings['site_name'])}} :::Contact Us</title>
<meta  name="description" content="Contact Us">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Contact Us"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.app')
@section('content')
<div class="vApp">
    <div class="vBannerWrapper w-100 beforeNone" style="background-image: url({{asset('frontend/banner-contact-us.jpg')}}); background-size: cover;">
        <div class="container">
            <div class="row align-items-center pR">
                <div class="col-md-12">
                    <h1>Contact {{$settings['site_name']}}</h1>
                    <p>We are here for your assistance. If you have any queries or for more information, feel free to reach out to us. We are ready to help you 24/5.</p>
                    <a href="{{url('register')}}" style="background-color: #25c676 !important;" class="bBtn open-account">Open An Account</a>
                </div>
            </div>
        </div>
    </div>

    <div class="vBodyContent pt-50 pb-50 contact">
        <div class="container">
            <div class="row flex-column-reverse flex-md-row">
                <div class="col-md-5 mt-30">
                    <h2 class="vF900 text-uppercase">Reach Us</h2>
                    <p>We are available 24/5 for your assistance. Please contact us if you have any questions or would like more details.</p>
                    <hr />
                    <div class="cBox">
                        <i class="fas fa-map-marker-alt bg-dark"></i>
                        <h3>Location</h3>
                        <p>{{$settings['address']}}</p>
                    </div>
                    <hr />
                    <div class="cBox">
                        <i class="far fa-envelope-open bg-info"></i>
                        <h3 class="text-info">Contact info</h3>
                        <span class="text-info d-block"><a href="mailto:{{$settings['site_email']}}" class="__cf_email__">{{$settings['site_email']}}</a></span>
                    </div>
                    <hr />
                    <div class="cBox">
                        <i class="fa fa-clock bg-warning"></i>
                        <h3 class="text-warning">Office hours</h3>
                        <p class="text-warning">Mon-Fri: 10am – 5pm, Sat-Sun: Closed</p>
                    </div>
                    <hr />
                    <div class="cBox">
                        <h3>Social Link</h3>
                        <ul class="vBSocial">
                            <li>
                                <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="fab fa-dribbble"></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-7 mt-30">
                    <form id="contact"  method="post">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" placeholder="Write your full name" name="contact_name"  id="name" value="" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" placeholder="Write your email address" name="contact_email" id="email" value="" />
                        </div>
                        <div class="form-group">
                            <label for="phoneNumber">Phone Number</label>
                            <input type="tel" class="form-control" placeholder="Write your phone number" name="contact_no" id="phone_no" value="" />
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" placeholder="Write your subject" name="subject" id="subject" value="" />
                        </div>
                        <div class="form-group">
                            <label for="option">Select Type</label>
                            <select name="service" id="service" class="form-control">
                                <option value="">Select Services</option>
                                <option value="Open Account"> Open Account </option>
                                <option value="Deposit Fund">
                                    Deposit Fund
                                </option>
                                <option value="Start Trading">
                                    Start Trading
                                </option>
                                <option value="PAM"> PAM</option>
                                <option value="MAMM"> MAMM</option>
                                <option value="Risk Management System"> Risk Management System </option>
                                <option value="Payment Getway">
                                    Payment Getway
                                </option>
                                <option value="Other"> Other</option>
                            </select>
                            <input type="text" class="form-control" placeholder="Write other services" name="service" id="others" value="" />
                        </div>
                        <div class="form-group">
                            <label for="message">Your Message</label>
                            <textarea class="form-control" name="message" id="message" placeholder="Type your message..."></textarea>
                        </div>
                        <button id="control" type="submit" class="form-control bg-dark text-white vF900 text-uppercase">Send Message</button>
                        
                        <button id="control-name" style="display:none"class="form-control bg-dark text-white vF900 text-uppercase">sending please wait ...</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="vBodyContent iFrame">
        <p>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4600488.248796287!2d-5.2384652730914745!3d53.38073345814533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2sbd!4v1620714100205!5m2!1sen!2sbd"
                width="100%"
                height="450"
                style="border: 0;"
                allowfullscreen=""
                loading="lazy"
            ></iframe>
            <br />
        </p>
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
                action: jQuery('#action').val(),
                message: jQuery('#message').val(),
                phone_no: jQuery('#phone_no').val(),
                subject: jQuery('#subject').val(),
                service: jQuery('#service').val(),
                others: jQuery('#others').val()


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