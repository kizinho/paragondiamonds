

<title>{{ucfirst($settings['site_name'])}} :::One-Time Password</title>
<meta  name="description" content=" :::One-Time Password">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}}  :::One-Time Password"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{ asset('frontend/css/auth.css')}}" rel="stylesheet">















<style>

    #snackbar_error {
        visibility: hidden;
        min-width: 250px;
        margin-left: -125px;
        background-color: red;
        color: #fff;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 2000;
        left: 50%;
        bottom: 30px;
        font-size: 17px;
    }

    #snackbar_error.show {
        visibility: visible;
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }
    #snackbar_success {
        visibility: hidden;
        min-width: 250px;
        margin-left: -125px;
        background-color: green;
        color: #fff;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 2000;
        left: 50%;
        bottom: 30px;
        font-size: 17px;
    }

    #snackbar_success.show {
        visibility: visible;
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    #google_translate_element {
        position: relative;
    }

    .goog-logo-link {
        display: none !important;
    }

    .goog-logo-link #text {
        display: none !important;
    }

    .goog-te-gadget {
        font-size: 0px !important;
    }

    .goog-te-gadget div {
        display: inline;
    }

    .goog-te-gadget div select {
        width: 130px;
        height: 40px;
        border: 1px solid #41c321 !important;
        color: #59bfdd;
        outline: none;
        border: none;
    }

    .goog-te-gadget div select option {
        border: 1px solid #41c321 !important;
    }

    .goog-te-gadget div select option:hover {
        cursor: pointer;
    }

    .goog-te-gadget div select:hover {
        border: 1px solid #41c321 !important;
        cursor: pointer;
    }
</style>  

<div class="holder">
    <div class="main">
        <div class="main-item logo-h">

            <div class="auth-help">
                <a href="/" class="auth-help__logo">
                    <img src="{{asset($settings['logo']) }}" class="logo">
                </a>

            </div>

        </div>
        <div class="main-item">
            <a href="/">
                <img src="{{asset($settings['logo']) }}" class="logo-m">
            </a>
            <div class="auth --a">

                <form  method="POST" action="{{url('2fa/validate') }}" class="form">

                            @csrf
                   
                    <div class="auth-item">
                        <input type=text name="totp" value="{{ $totp ?? old('totp') }}" required placeholder="OTP code" />

                    </div>
                   
                   
                    <button type="submit" style="margin: 0 0 20px 0">Validate</button>


                </form>

            </div>
            <div class="push"></div>
            <footer class="footer">



                <div class="b-header__lang js-header__lang">
                    <div class="tbl">
                        <div class="cll">
                            <div class="tbl b-header__lang-h js-header__lang-h">
                                <div class="cll">
                                    <div class="b-header__lang-text"> </div>
                                </div>
                                <div class="cll">

                                    <span id="google_translate_element" class=""></span>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="b-header__lang-items js-header__lang-items">





                    </div>
                </div>




                <div class="tbl tbl--xs w100p">
                    <div class="cll">
                        <div class="copy">©{{$settings['site_name']}}</div>
                    </div>
                    <div class="cll">
                        <div class="footer-nav">
                            <a href="{{url('terms-of-use')}}">Terms of Use</a>
                            <a href="{{url('privacy-policy')}}">Privacy Policy</a>
                        </div>
                    </div>

                </div>
            </footer>
        </div>
    </div>
</div>









<div id="snackbar_error"></div>
<div id="snackbar_success"></div>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script src="{{ asset('frontend/js/vendors/jquery.min.js')}}"></script>
<script>
    $(".deleted-list").on("submit", function () {

        return confirm("Are you sure?");
    });

    function messageAlertError() {
        var x = document.getElementById("snackbar_error");
        x.className = "show";
        setTimeout(function () {
            x.className = x.className.replace("show", "");
        }, 5000);
        $(".modal").hide();
    }
    function messageAlertSuccess() {
        var x = document.getElementById("snackbar_success");
        x.className = "show";
        setTimeout(function () {
            x.className = x.className.replace("show", "");
        }, 5000);
        $(".modal").hide();
    }

</script>



  @if(session()->has('message.level'))
    <script type="text/javascript">
        var message = "{!! session('message.content') !!}";
        $("#snackbar_error").html(message);
                @if (session('message.level') == 'error')
        messageAlertError();
                @else
        $("#snackbar_success").html(message);
        messageAlertSuccess();
        @endif

    </script>

    @endif
     @if ($errors->has('totp'))
 <script type="text/javascript">
    var message = "{!!  $errors->first('totp') !!}";
    $("#snackbar_error").html(message);
    messageAlertError();
          
</script>
 
 @endif

    @if (session('status'))
 <script type="text/javascript">
    var message = "{!!  session('status') !!}";
    $("#snackbar_success").html(message);
    messageAlertSuccess();
</script>
 
 @endif