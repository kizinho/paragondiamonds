<header>
    <div class="uk-container uk-container-large">
        <div class="grid">
            <a href="{{url('/')}}" title="Back to Home Page" class="logo">
                <img src="{{asset($settings['logo']) }}"   alt="{{$settings['site_name']}}" /></a>
            <div class="right-c" uk-navbar="offset: 0">
                
                <div class="topinfo">
                
                    <div class="stockinfo">
                        
                        <div class="symbol">
                           
                       
                            <div id="google_translate_element" class="" style="display:inline-block!important"></div>&nbsp;     <a href="{{url('login')}}">Login</a>/<a href="{{url('register')}}">Register</a>
                        </div>
                    </div>
                </div>
                <div class="industry-logo">
                    <a href="https://www.naturaldiamonds.com/about/" target="_blank">
                        <img src="{{ asset("frontend/site/assets/files/1/ndc_naturaldiamondcouncil_web-1.png")}}" 
                             alt="Natural Diamond Council" /> </a>
                    <a href="" target="_blank">
                        <img src="{{ asset("frontend/site/assets/files/1/0000_3510_certified_member_logo_eu_us1_white_jewellery.jpg")}}" alt="" /> </a>
                    <a href="https://www.kimberleyprocess.com/" target="_blank"> 
                        <img src="{{ asset("frontend/site/assets/files/1/partnership_0000s_0002_kimberly-process-1.png")}}" alt="The Kimberley Process" /> </a>
                    <a href="https://www.unglobalcompact.org/" target="_blank"> <img src="{{ asset("frontend/site/assets/files/1/ungc.png")}}" alt="UN Global Compact" /> </a>
                    <a href="https://www.theglobeandmail.com/business/rob-magazine/article-gender-diversity-executives-canada-survey/" target="_blank">
                        <img src="{{ asset("frontend/site/assets/files/1/women_lead_here_2021_hor_logo-01.png")}}" alt="Report On Business" />
                    </a>
                </div>
                <ul class="main-nav uk-navbar-nav">
                    <li class="@if(request()->path() == 'overview') uk-active @endif ">
                        <a href="{{url('overview')}}">Overview</a>
                        <div uk-dropdown>
                            <ul class="uk-nav uk-dropdown-nav">
                                <li class=" "><a href="{{url('about-diamond')}}">About Diamonds</a></li>
                                <li class=" "><a href="{{url('diamond-formation')}}">Diamond Formation</a></li>
                                <li class=" "><a href="{{url('diamonds-mining')}}">Diamond Mining</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="@if(request()->path() == 'operations') uk-active @endif ">
                        <a href="{{url('operations')}}">Operations</a>
                        <div uk-dropdown>
                            <ul class="uk-nav uk-dropdown-nav">
                                <li class=" "><a href="{{url('processing')}}">Processing</a></li>
                                <li class=" "><a href="{{url('sorting-distribution')}}">Sorting and Distribution</a></li>
                                <li class=" "><a href="{{url('cutting-polishing')}}">Cutting and Polishing</a></li>
                                <li class=" "><a href="{{url('trading')}}">Trading</a></li>
                            </ul>
                        </div>
                    </li>


                    <li class="@if(request()->path() == 'sustainability') uk-active @endif ">
                        <a href="{{url('sustainability')}}">Sustainability</a>
                        <div uk-dropdown>
                            <ul class="uk-nav uk-dropdown-nav">
                                <li class=" "><a href="{{url('environmental')}}">Environment</a></li>
                                <li class=" "><a href="{{url('social')}}">Social</a></li>
                                <li class=" "><a href="{{url('governance')}}">Governance</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="@if(request()->path() == 'products') uk-active @endif ">
                        <a href="{{url('products')}}">Products</a>
                    </li>  
                    <li class="@if(request()->path() == 'partnership') uk-active @endif ">
                        <a href="{{url('partnership')}}">Partnership</a>
                    </li> 
                    <li class="@if(request()->path() == 'pricing') uk-active @endif ">
                        <a href="{{url('pricing')}}">Pricing</a>
                    </li>
                    <li class="@if(request()->path() == 'about-us') uk-active @endif ">
                        <a href="{{url('about-us')}}">About Us</a>
                        <div uk-dropdown>
                            <ul class="uk-nav uk-dropdown-nav">
                                <li class=" "><a href="{{url('about-overview')}}">Overview</a></li>
                                <li class=" "><a href="{{url('about-Vision-mission')}}">Vision and Mission</a></li>
                                <li class=" "><a href="{{url('management')}}">Management</a></li>
                            </ul>
                        </div>
                    </li>




                </ul>
                <a class="mobile-nav-btn" href="#"> <span>Menu</span></a>
            </div>
        </div>
    </div>
</header>




