
<footer>
    <div class="uk-container uk-container-large">
        <div class="grid">
            <div class="left-c">
                <div class="col">
                    {!! $settings['address'] !!}<br />
                    T: {{$settings['site_phone']}}<br />
                    E: <a href="mailto:{{$settings['site_email']}}">{{$settings['site_email']}}</a><br />
                    Contact: Investor and Public Relations
                </div>
            </div>
            <div class="right-c">
                <a class="btn-big" href="{{url('contact-us')}}">Contact Us</a>
                <!--                <ul class="social">
                                    <li class="facebook">
                                        <a
                                            href="http://facebook.com/{{$settings['site_name']}}"
                                            target="_blank"
                                            title="Visit our 
                                            Facebook Page"
                                            class="uk-icon"
                                            uk-icon="icon: facebook;ratio:2"
                                            ></a>
                                    </li>
                                    <li class="twitter"><a href="http://twitter.com/{{$settings['site_name']}}" target="_blank" title="Visit our Twitter Page" class="uk-icon" uk-icon="icon: twitter;ratio:2"></a></li>
                                    <li class="linkedin"><a href="http://linkedin.com/company/{{$settings['site_name']}}" target="_blank" title="Visit our LinkedIn Page" class="uk-icon" uk-icon="icon: linkedin;ratio:2"></a></li>
                                    <li class="instagram"><a href="http://instagram.com/{{$settings['site_name']}}" target="_blank" title="Visit our Instagram Page" class="uk-icon" uk-icon="icon: instagram;ratio:2"></a></li>
                                    <li class="youtube"><a href="http://youtube.com/channel/UCtCMNI07Qb3HxUbPWQ" target="_blank" title="Visit our YouTube Page" class="uk-icon" uk-icon="icon: youtube;ratio:2"></a></li>
                                </ul>-->
            </div>
        </div>
        <div class="bottom">
            <div class="links"><a href="{{url('login')}}">Login</a> | <a href="{{url('register')}}">Register</a></div>
            <p class="etc">{{$settings['copy_right']}} | <a class="adnet" href="{{url('/')}}" target="_blank">Designed & Powered by {{$settings['site_name']}}</a></p>
        </div>
    </div>
</footer>

<div class="in-progress"></div>
<div class="mobile-nav">
    <ul class="nav">
        <li class="has-sub">
            <a href="{{url('overview')}}">Overview</a>
            <ul class="sub">
                <li class=" "><a href="{{url('about-diamond')}}">About Diamonds</a></li>
                <li class=" "><a href="{{url('diamond-formation')}}">Diamond Formation</a></li>
                <li class=" "><a href="{{url('diamonds-mining')}}">Diamond Mining</a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="{{url('operations')}}">Operations</a>
            <ul class="sub">
                <li class=" "><a href="{{url('processing')}}">Processing</a></li>
                <li class=" "><a href="{{url('sorting-distribution')}}">Sorting and Distribution</a></li>
                <li class=" "><a href="{{url('cutting-polishing')}}">Cutting and Polishing</a></li>
                <li class=" "><a href="{{url('trading')}}">Trading</a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="{{url('sustainability')}}">Sustainability</a>
            <ul class="sub">
                <li class=" "><a href="{{url('sustainability')}}">Sustainability</a></li>
                <li class=" "><a href="{{url('environmental')}}">Environment</a></li>
                <li class=" "><a href="{{url('social')}}">Social</a></li>
                <li class=" "><a href="{{url('governance')}}">Governance</a></li>
            </ul>
        </li>
        <li class="@if(request()->path() == 'products') uk-active @endif ">
            <a href="{{url('products')}}">Products</a>
        </li>  
        <li class="@if(request()->path() == 'partnership') uk-active @endif ">
            <a href="{{url('partnership')}}">Partnership</a>
        </li> 
        <li class="@if(request()->path() == 'pricing') uk-active @endif ">
            <a href="{{url('pricing')}}">Finance</a>
        </li>
        <li class="has-sub">
            <a href="{{url('about-us')}}">About Us</a>
            <ul class="sub">
                <li class=" "><a href="{{url('about-overview')}}">Overview</a></li>
                <li class=" "><a href="{{url('about-vision-mission')}}">Vision and Mission</a></li>
                <li class=" "><a href="{{url('management')}}">Management</a></li>
            </ul>
        </li>

    </ul>
</div>

