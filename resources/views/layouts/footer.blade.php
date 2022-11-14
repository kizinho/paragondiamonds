
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
            <div class="links"><a href="{{url('legal/disclaimer')}}">Legal</a> | <a href="{{url('register')}}">Register</a></div>
            <p class="etc">{{$settings['copy_right']}} | <a class="adnet" href="{{url('/')}}" target="_blank">Designed & Powered by {{$settings['site_name']}}</a></p>
        </div>
    </div>
</footer>

<div class="in-progress"></div>
<div class="mobile-nav">
    <ul class="nav">
        <li class="has-sub">
            <a href="{{url('about-us')}}">About Us</a>
            <ul class="sub">
                <li><a href="{{url('about-us')}}">About Us</a></li>
                <li class=" "><a href="{{url('mission-vision-values')}}">Mission, Values &amp; Priorities</a></li>
                <li class=" "><a href="{{url('management')}}">Management</a></li>
                <li class=" "><a href="{{url('directors')}}">Directors</a></li>
                <li class=" "><a href="{{url('history')}}">History</a></li>
                <li class=" "><a href="{{url('corporate-governance')}}">Corporate Governance</a></li>
                <li class=" "><a href="{{url('careers')}}">Careers</a></li>
                <li class=" "><a href="{{url('corporate-info')}}">Corporate Info</a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="{{url('operations')}}">Operations</a>
            <ul class="sub">
                <li class=""><a href="{{url('karowe-mine')}}">Karowe Mine</a></li>
                <li class=""><a href="{{url('exploration')}}">Exploration</a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="{{url('sustainability')}}">Sustainability</a>
            <ul class="sub">
                <li class=""><a href="{{url('overview')}}">Overview</a></li>
                <li class=" "><a href="{{url('environmental')}}">Environment</a></li>
                <li class=" "><a href="{{url('social')}}">Social</a></li>
                <li class=" "><a href="{{url('governance')}}">Governance</a></li>
                <li class=" "><a href="{{url('sustainability-reports')}}">Reports</a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="{{url('investors')}}">Investors</a>
            <ul class="sub">
                <li class=""><a href="{{url('investors/overview')}}">Overview</a></li>
                <li class=" "><a href="{{url('investors/news')}}">News</a></li>
                <li class=" "><a href="{{url('investors/financials')}}">Financials</a></li>
                <li class=" "><a href="{{url('investors/stock-info')}}">Stock Information</a></li>
                <li class=" "><a href="{{url('investors/share-structure')}}">Share Structure</a></li>
                <li class=" "><a href="{{url('investors/upcoming-events')}}">Upcoming Events</a></li>
                <li class=" "><a href="{{url('investors/dividends')}}">Dividends</a></li>
                <li class=" "><a href="{{url('investors/corporate-presentations')}}">Corporate Presentations</a></li>
                <li class=" "><a href="{{url('investors/analyst-coverage')}}">Analyst Coverage</a></li>
                <li class=" "><a href="{{url('investors/agm-materials')}}">AGM Materials</a></li>
                <li class=" "><a href="{{url('investors/investor-reports')}}">Investor Reports</a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="{{url('newsroom')}}">Newsroom</a>
            <ul class="sub">
                <li class=""><a href="{{url('newsroom/news-releases')}}">News Releases</a></li>
                <li class=" "><a href="{{url('newsroom/presentations')}}">Presentations</a></li>
                <li class=" "><a href="{{url('newsroom/photo-gallery')}}">Photo Gallery</a></li>
                <li class=" "><a href="{{url('newsroom/video')}}">Video</a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="{{url('sales')}}">Sales</a>
            <ul class="sub">
                <li class=""><a href="{{url('sales/diamond-sales')}}">Diamond Sales</a></li>
                <li class=" "><a href="{{url('sales/how-to-bid')}}">How To Bid</a></li>
                <li class=" "><a href="{{url('sales/catalogues')}}">Catalogues</a></li>
                <li class=" "><a href="{{url('sales/provenance-claim')}}">Provenance Claim</a></li>
            </ul>
        </li>
        <li class=" "><a href="{{url('login')}}">Login</a></li>
        <li class="has-sub">
            <a href="{{url('contact-us')}}">Contact</a>
            <ul class="sub">
                <li class=""><a href="{{url('contact-us')}}">Contact Info</a></li>
                <li class=""><a href="{{url('contact/email-alert')}}">Email Alerts</a></li>
                <li class=""><a href="{{url('contact/careers')}}">Careers</a></li>
            </ul>
        </li>
    </ul>
</div>

