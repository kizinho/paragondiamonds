@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; About Diamonds</title>
<meta  name="description" content="About Diamonds">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - About Diamonds"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />
<style>
    .shadow{
        box-shadow: 0 2px 17px 0 rgb(0 0 0 / 30%); 
    }
</style>
@endsection
@extends('layouts.app')
@section('content')
<div class="slideshow uk-position-relative" uk-slideshow="autoplay: true;animation: fade;ratio:1920:450;'">
    <div class="uk-position-relative uk-visible-toggle uk-dark">
        <ul class="uk-slideshow-items">
            <li class="slide subpage" style="background-image: url({{url('frontend/diamond.jpeg')}}); background-repeat: no-repeat; background-position: 50% 50%;">
                <div class="sub-banner uk-height-1-1">
                    <div class="uk-container uk-container-large uk-height-1-1 uk-flex uk-flex-middle">
                        <h2  class="sub-caption" uk-scrollspy="cls:text-focus-in;delay: 500">About Diamonds</h2>
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

                            <div class=" verbage">
                                <h3 style=" margin: 0 0 0px 0 !important;">Color.</h3>

                                <p>
                                    In nature, diamonds usually have tints of color, most commonly yellow and brown. Only the rarest of diamonds are virtually colorless. Gem quality diamonds are graded for color using the letters of the alphabet from D on up.
                                    <br>D, E and F are considered colorless and because of their rarity they are more costly. As the letters go up, the diamond will have more of a yellow tint and be less valuable.
                                    <br>The exceptions to this rule are diamonds that have a vivid color. That puts them into the category of Fancy Color diamonds, and their natural color adds to their value.
                                </p>
                                
                                <img class="shadow"  src="{{asset('frontend/color.jpg')}}" alt="color" />
                            </div>

                          
                        </div>
                    </div>

                    <br><br>
                    <div id="content">
                        <div uk-grid>

                            <div class=" verbage">
                                <h3 style=" margin: 0 0 0px 0 !important;">Cut.</h3>

                                <p>
                                    Cut refers to the precise angles of the facets of the diamond. This, more than any other factor, determines how brilliant and sparkling a diamond will be.
                                    <br>While Color and Clarity are characteristics that depend on nature, Cut is in the hands of the artisan. A skilled diamond polisher will cut each diamond to bring out the maximum fire, sparkle and brilliance, while taking into account its natural imperfections and the desired carat weight.
                                    <br>The ultimate test of a well cut diamond is its return of light. While this has usually been determined visually, today it can be measured scientifically using a scanner developed by GemEx Systems.  </p>
                          
                                <img class=" shadow"  src="{{asset('frontend/cut.jpg')}}" alt="cut" />
                            </div>

                       
                        </div>
                    </div>
                    <br><br>
                    <div id="content">
                        <div uk-grid>

                            <div class=" verbage">
                                <h3 style=" margin: 0 0 0px 0 !important;">Clarity.</h3>

                                <p>
                                    As a natural substance, diamonds are rarely pure and flawless. They will usually have imperfections called inclusions that may affect the appearance of the diamond, depending on the nature of the inclusions, their size, their position in the diamond and the distance from the surface. Since the brilliance of a diamond is the result of light rays bouncing through the diamond’s facets and returning through its crown, any imperfection that blocks the passage of light through the diamond will have some effect on its brilliance.
                                    <br>Diamond laboratories grade the clarity of a diamond using a scale that ranges from Flawless to I3. Flawless diamonds are extremely rare and beautiful, so they are the most valuable.
                                </p>
                                
                                <img class=" shadow"  src="{{asset('frontend/clarity.jpg')}}" alt="Clarity" />
                            </div>

                        
                        </div>
                    </div>

                    <br><br>
                    <div id="content">
                        <div uk-grid>

                            <div class=" verbage">
                                <h3 style=" margin: 0 0 0px 0 !important;">Carat Weight.</h3>

                                <p>
                                    A carat is a weight measurement originally derived from the carob seed, which weighs approximately one carat.
                                    <br>Diamonds are very rare in nature, and larger diamond crystals are extremely rare, so the larger the diamond, the more valuable it will be. As a diamond’s size increases, its value rises in a steep curve. A 2-carat diamond, for example, will cost much more than twice the cost of a 1 carat diamond.
                                    <br>While a bigger diamond may not be more beautiful than a smaller diamond, its value will always be affected by its carat weight. The scale at the right shows the comparative sizes of round diamonds of different carat weights.
                                </p>
                                
                                <img class=" shadow"  src="{{asset('frontend/carat.jpg')}}" alt="Carat" />
                            </div>

                          
                        </div>
                    </div> <br><br>
                    <div id="content">
                        <div uk-grid>

                            <div class=" verbage">
                                <h3 style=" margin: 0 0 0px 0 !important;">Certification.</h3>

                                <p>
                                    When you buy or sell a diamond, a certificate by an independent laboratory is your assurance of its quality and its Four Cs grading. The most prominent gemological labs are the GIA, IGI, AGS, EGL and IGL.
                                    <br>In addition to these, there are labs that grade specific aspects of the diamond, such as GemEx, which uses technology to measure the light performance of a diamond.  </p>
                                <img class=" shadow"  src="{{asset('frontend/certification.jpg')}}" alt="Certification" />
                           
                            </div>

                           
                        </div>
                    </div>


                    <div></div>
                </div>
            </div>
            <div class="uk-width-1-4@m uk-flex-first@m uk-flex-last@s">
                <div class="aside">
                    <h2>Overview</h2>
                    <ul class="aside uk-nav">
                        <li class="level-2 "><a href="{{url('about-diamond')}}">About Diamonds</a></li>
                        <li class="level-2 "><a href="{{url('diamond-formation')}}">Diamond Formation</a></li>
                        <li class="level-2 "><a href="{{url('diamonds-mining')}}">Diamond Mining</a></li>
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection