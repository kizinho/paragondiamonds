@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Management</title>
<meta  name="description" content="Management">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Management"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.app')
@section('content')
<div class="slideshow uk-position-relative" uk-slideshow="autoplay: true;animation: fade;ratio:1920:450;'">
    <div class="uk-position-relative uk-visible-toggle uk-dark">
        <ul class="uk-slideshow-items">
            <li class="slide subpage" style="background-image: url({{url('frontend/about.jpeg')}}); background-repeat: no-repeat; background-position: 50% 50%;">
                <div class="sub-banner uk-height-1-1">
                    <div class="uk-container uk-container-large uk-height-1-1 uk-flex uk-flex-middle">
                        <h2  class="sub-caption" uk-scrollspy="cls:text-focus-in;delay: 500">Management</h2>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="uk-clearfix"></div>
<div id="page-main" data-parents="2" data-siblings="8" data-children="0">
    <div class="uk-container uk-container-large">
        <div class="uk-grid-collapse uk-margin-large-bottom" uk-grid>
            <div class="uk-width-3-4@m uk-flex-last@m uk-flex-first@s">
                <div id="page-body" class="uk-margin-large-left r-col">
                    <br> <br>
                    
                    <div id="content">
                        <div uk-grid>
                            <div class="uk-width-1-3@m image text-center">

                                <img style="padding-left: 20px!important" src="{{asset('frontend/team1.jpeg')}}" alt=" Graham" />
                            </div>
                            <div class="uk-width-2-3@m verbage">
                                <h3 style=" margin: 0 0 0px 0 !important;">PAUL K. GRAHAM</h3>

                                Chairman & Director
                                <hr>
                                Mr. Graham is a serial entrepreneur and private investor with more than 20 years’ experience in exploration, development, project and corporate finance and management in the mining sector in Asia, North and South America and Europe. He is known for recognizing value and superior global investment opportunities in the natural resource sector. He has led several companies through highly profitable business acquisitions and mergers such as EuroZinc the $1.5 billion sale of Tanganyika Oil Company Ltd. Mr. Graham is a graduate of the New Mexico Institute of Mining and Technology. He currently sits on the Board of a number of publicly traded companies.
                            </div>
                        </div>
                    </div>
                      <br>
                    <div id="content">
                        <div uk-grid>
                            <div class="uk-width-1-3@m image text-center">

                                <img style="padding-left: 20px!important" src="{{asset('frontend/team2.jpeg')}}" alt="Boesten" />
                            </div>
                            <div class="uk-width-2-3@m verbage">
                                <h3 style=" margin: 0 0 0px 0 !important;">Larry H. Boesten</h3>

                                Chief Executive Officer (CEO)
                                <hr>
                                Mr. Boesten has over 30 years of experience in the mineral exploration, development and mining business in Europe and Asia. He has experience in strategy, corporate finance, company turnarounds and mergers and acquisitions. He has over 25 years of in-depth knowledge in regulatory, compliance and surveillance integrations having worked as Head of Compliance and Head of Participant Supervision with SGX. Mr. Boesten has previously held a number of senior positions in the private equity and venture capital industry including the Chairman of the Asia Pacific Venture Capital Private Equity Association.
                            </div>
                        </div>
                    </div>
                   
                   
                    <br>
                     <div id="content">
                        <div uk-grid>
                            <div class="uk-width-1-3@m image text-center">

                                <img style="padding-left: 20px!important" src="{{asset('frontend/team5.jpeg')}}" alt="BRANDON" />
                            </div>
                            <div class="uk-width-2-3@m verbage">
                                <h3 style=" margin: 0 0 0px 0 !important;"> GEORGE E. BRANDON</h3>

                               Chief Operating Officer (COO)
                                <hr>
                               Mr. Brandon has held public company executive management and director's positions with Tenke Mining Corp. where he was instrumental in progressing the world class Tenke Fungurume copper/cobalt project towards its current position as a major mining operation in Central Asia. His background includes 21 years of project and construction management across a diverse range of minerals projects encompassing base and precious metal, coal, uranium and potash investments.
                            </div>
                        </div>
                    </div>
                   
                    <br>
                    <div id="content">
                        <div uk-grid>
                            <div class="uk-width-1-3@m image text-center">

                                <img style="padding-left: 20px!important" src="{{asset('frontend/team4.jpeg')}}" alt="Reid" />
                            </div>
                            <div class="uk-width-2-3@m verbage">
                                <h3 style=" margin: 0 0 0px 0 !important;">Carolyn K. Reid</h3>

                                Chief Investment Officer (CIO)
                                <hr>
                                Mrs. Reid has more than 15 years of experience in public company financial management and reporting. She has held senior positions GBS Gold International Inc. and was appointed CFO of the company in 1997. From June 2002 to July 2008, She served as Vice President and Corporate Controller of Lionore Mining International Ltd. Prior to 2002. 
                                She held a position having responsibility for financial reporting with an international publicly traded technology company. 
                                She is a Chartered Professional Accountant and spent 5 years in public accounting with Deloitte Canada.
                            </div>
                        </div>
                    </div>
                    <div></div>
                </div>
            </div>
            <div class="uk-width-1-4@m uk-flex-first@m uk-flex-last@s">
                <div class="aside">
                    <h2>About Us</h2>
                    <ul class="aside uk-nav">
                      
                        <li class="level-2 "><a href="{{url('about-overview')}}">Overview</a></li>
                        <li class="level-2 "><a href="{{url('about-vision-mission')}}">Vision and Mission</a></li>
                        <li class=" level-2"><a href="{{url('management')}}">Management</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection