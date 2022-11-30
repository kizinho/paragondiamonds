@extends('layouts.dashboard')
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Profile</h4>


                    </div>
                </div>
            </div>

            <!-- end page title -->

            <div class="row">

                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <h4 class="card-title">Change Profile image</h4>
                                            <img class="rounded-circle header-profile-user pull-right" src="@if(empty(Auth::user()->photo)){{asset('user/img/avatar-default.png')}} @else {{url(Auth::user()->photo)}} @endif"
                                                 alt="Header Avatar">
                                            <br>
                                            <h4 class="mb-5 mt-5">
                                                <div class="text-center">
                                                    <form action="{{url('profile/personal')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{Auth::user()->id}}" style="display:none">
                                                        <div id="profile" onclick="getFile()">click to upload new Avatar</div>
                                                        <div style='height: 0px;width: 0px; overflow:hidden;'>
                                                            <input id="upfile" type="file" name="avatar" value="upload" onchange="sub(this)" /></div>
                                                        <button type="submit" style="display:none" class=" profile btn btn-info btn-rounded waves-effect waves-light mt-4">Change Avatar</button>
                                                    </form>
                                                </div>

                                            </h4>
                                        </div>
                                        <br>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                                 <h4 class="card-title">2factor Authenticator</h4>

                                            <div class="text-muted pull-right"><li class="fas fa-barcode"></li></div> 
                                            <div class="mb-3 mt-5 text-center">
                                                @if(Auth::user()->google2fa_secret_status == false)
                                                <p class="text-muted "> <small>Please make sure you have 2fa mobile app to complete it</small></p>
                                               
                                                <a href="{{url('2fa/enable')}}" class="btn btn-success waves-effect btn-label waves-light"><i class="bx bx-check-double label-icon"></i> click to Enable</a>
                                                @else
                                             
                                                <a href="{{url('2fa/disable')}}" class="btn btn-danger waves-effect waves-light">
                                                    <i class="bx bx-block font-size-16 align-middle me-2"></i> click to Disable
                                                </a>
                                                @endif
                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->


                </div>
            </div>

            <!-- End Page-content -->
            <div class="row">

                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Change Password</h4>
                                    <p class="card-title-desc">Easily change your password at any time.</p>

                                    <form action="{{url('profile/personal')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{Auth::user()->id}}" style="display:none">
                                        <div class="mb-3">
                                            <label class="form-label">Old Password</label>

                                            <div class="input-group">
                                                <input  type="password" name="old" class="form-control">

                                                <span class="input-group-text"><i class="mdi mdi-lock"></i></span>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">New Password</label>

                                            <div class="input-group">
                                                <input  type="password" name="password" class="form-control">

                                                <span class="input-group-text"><i class="mdi mdi-key"></i></span>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-info waves-effect waves-light">Change</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Details</h4>
                                    <p class="card-title-desc">Manage your details here at anytime.</p>

                                    <form action="{{url('profile/personal')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{Auth::user()->id}}" style="display:none">

                                        <div class="mb-4">
                                            <label>Full Name</label>
                                            <div class="input-group" >
                                                <input type="text" name="full_name" value="{{Auth::user()->full_name}}" class="form-control">

                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div><!-- input-group -->
                                        </div>

                                        <div class="mb-4">
                                            <label>Username</label>
                                            <div class="input-group" >
                                                <input type="text" name="username" value="{{Auth::user()->username}}" class="form-control">

                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div><!-- input-group -->
                                        </div>
                                        <div class="mb-4">
                                            <label>Email</label>
                                            <div class="input-group" >
                                                <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control">

                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div><!-- input-group -->
                                        </div>
                                        <div class="mb-4">
                                            <label>Mobile Number</label>
                                            <div class="input-group" >
                                                <input type="text" name="phone_no" value="{{Auth::user()->phone_no}}" class="form-control">

                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div><!-- input-group -->
                                        </div>
                                        <div class="mb-4">
                                            <label>Country</label>
                                            <div class="input-group" >
                                                <select name="country"  class="form-control">
                                                    <option value="{{Auth::user()->country}}" selected>{{Auth::user()->country}}</option>
                                                    <option value="">Country</option>

                                                    <option value="AF">Afghanistan</option>

                                                    <option value="AX">Åland Islands</option>

                                                    <option value="AL">Albania</option>

                                                    <option value="DZ">Algeria</option>

                                                    <option value="AS">American Samoa</option>

                                                    <option value="AD">Andorra</option>

                                                    <option value="AO">Angola</option>

                                                    <option value="AI">Anguilla</option>

                                                    <option value="AQ">Antarctica</option>

                                                    <option value="AG">Antigua and Barbuda</option>

                                                    <option value="AR">Argentina</option>

                                                    <option value="AM">Armenia</option>

                                                    <option value="AW">Aruba</option>

                                                    <option value="AU">Australia</option>

                                                    <option value="AT">Austria</option>

                                                    <option value="AZ">Azerbaijan</option>

                                                    <option value="BS">Bahamas</option>

                                                    <option value="BH">Bahrain</option>

                                                    <option value="BD">Bangladesh</option>

                                                    <option value="BB">Barbados</option>

                                                    <option value="BY">Belarus</option>

                                                    <option value="BE">Belgium</option>

                                                    <option value="BZ">Belize</option>

                                                    <option value="BJ">Benin</option>

                                                    <option value="BM">Bermuda</option>

                                                    <option value="BT">Bhutan</option>

                                                    <option value="BO">Bolivia</option>

                                                    <option value="BQ">Bonaire, Sint Eustatius and Saba</option>

                                                    <option value="BA">Bosnia and Herzegovina</option>

                                                    <option value="BW">Botswana</option>

                                                    <option value="BV">Bouvet Island</option>

                                                    <option value="BR">Brazil</option>

                                                    <option value="IO">British Indian Ocean Territory</option>

                                                    <option value="BN">Brunei</option>

                                                    <option value="BG">Bulgaria</option>

                                                    <option value="BF">Burkina Faso</option>

                                                    <option value="BI">Burundi</option>

                                                    <option value="CV">Cabo Verde</option>

                                                    <option value="KH">Cambodia</option>

                                                    <option value="CM">Cameroon</option>

                                                    <option value="CA">Canada</option>

                                                    <option value="KY">Cayman Islands</option>

                                                    <option value="CF">Central African Republic</option>

                                                    <option value="TD">Chad</option>

                                                    <option value="CL">Chile</option>

                                                    <option value="CN">China</option>

                                                    <option value="CX">Christmas Island</option>

                                                    <option value="CC">Cocos (Keeling) Islands</option>

                                                    <option value="CO">Colombia</option>

                                                    <option value="KM">Comoros</option>

                                                    <option value="CG">Congo</option>

                                                    <option value="CD">Congo (the Democratic Republic of the)</option>

                                                    <option value="CK">Cook Islands</option>

                                                    <option value="CR">Costa Rica</option>

                                                    <option value="CI">Côte d'Ivoire</option>

                                                    <option value="HR">Croatia</option>

                                                    <option value="CU">Cuba</option>

                                                    <option value="CW">Curaçao</option>

                                                    <option value="CY">Cyprus</option>

                                                    <option value="CZ">Czechia</option>

                                                    <option value="DK">Denmark</option>

                                                    <option value="DJ">Djibouti</option>

                                                    <option value="DM">Dominica</option>

                                                    <option value="DO">Dominican Republic</option>

                                                    <option value="EC">Ecuador</option>

                                                    <option value="EG">Egypt</option>

                                                    <option value="SV">El Salvador</option>

                                                    <option value="GQ">Equatorial Guinea</option>

                                                    <option value="ER">Eritrea</option>

                                                    <option value="EE">Estonia</option>

                                                    <option value="ET">Ethiopia</option>

                                                    <option value="FK">Falkland Islands  [Malvinas]</option>

                                                    <option value="FO">Faroe Islands</option>

                                                    <option value="FJ">Fiji</option>

                                                    <option value="FI">Finland</option>

                                                    <option value="FR">France</option>

                                                    <option value="GF">French Guiana</option>

                                                    <option value="PF">French Polynesia</option>

                                                    <option value="TF">French Southern Territories</option>

                                                    <option value="GA">Gabon</option>

                                                    <option value="GM">Gambia</option>

                                                    <option value="GE">Georgia</option>

                                                    <option value="DE">Germany</option>

                                                    <option value="GH">Ghana</option>

                                                    <option value="GI">Gibraltar</option>

                                                    <option value="GR">Greece</option>

                                                    <option value="GL">Greenland</option>

                                                    <option value="GD">Grenada</option>

                                                    <option value="GP">Guadeloupe</option>

                                                    <option value="GU">Guam</option>

                                                    <option value="GT">Guatemala</option>

                                                    <option value="GG">Guernsey</option>

                                                    <option value="GN">Guinea</option>

                                                    <option value="GW">Guinea-Bissau</option>

                                                    <option value="GY">Guyana</option>

                                                    <option value="HT">Haiti</option>

                                                    <option value="HM">Heard Island and McDonald Islands</option>

                                                    <option value="VA">Holy See</option>

                                                    <option value="HN">Honduras</option>

                                                    <option value="HK">Hong Kong</option>

                                                    <option value="HU">Hungary</option>

                                                    <option value="IS">Iceland</option>

                                                    <option value="IN">India</option>

                                                    <option value="ID">Indonesia</option>

                                                    <option value="IR">Iran</option>

                                                    <option value="IQ">Iraq</option>

                                                    <option value="IE">Ireland</option>

                                                    <option value="IM">Isle of Man</option>

                                                    <option value="IL">Israel</option>

                                                    <option value="IT">Italy</option>

                                                    <option value="JM">Jamaica</option>

                                                    <option value="JP">Japan</option>

                                                    <option value="JE">Jersey</option>

                                                    <option value="JO">Jordan</option>

                                                    <option value="KZ">Kazakhstan</option>

                                                    <option value="KE">Kenya</option>

                                                    <option value="KI">Kiribati</option>

                                                    <option value="KW">Kuwait</option>

                                                    <option value="KG">Kyrgyzstan</option>

                                                    <option value="LA">Laos</option>

                                                    <option value="LV">Latvia</option>

                                                    <option value="LB">Lebanon</option>

                                                    <option value="LS">Lesotho</option>

                                                    <option value="LR">Liberia</option>

                                                    <option value="LY">Libya</option>

                                                    <option value="LI">Liechtenstein</option>

                                                    <option value="LT">Lithuania</option>

                                                    <option value="LU">Luxembourg</option>

                                                    <option value="MO">Macao</option>

                                                    <option value="MK">Macedonia</option>

                                                    <option value="MG">Madagascar</option>

                                                    <option value="MW">Malawi</option>

                                                    <option value="MY">Malaysia</option>

                                                    <option value="MV">Maldives</option>

                                                    <option value="ML">Mali</option>

                                                    <option value="MT">Malta</option>

                                                    <option value="MH">Marshall Islands</option>

                                                    <option value="MQ">Martinique</option>

                                                    <option value="MR">Mauritania</option>

                                                    <option value="MU">Mauritius</option>

                                                    <option value="YT">Mayotte</option>

                                                    <option value="MX">Mexico</option>

                                                    <option value="FM">Micronesia (Federated States of)</option>

                                                    <option value="MD">Moldova</option>

                                                    <option value="MC">Monaco</option>

                                                    <option value="MN">Mongolia</option>

                                                    <option value="ME">Montenegro</option>

                                                    <option value="MS">Montserrat</option>

                                                    <option value="MA">Morocco</option>

                                                    <option value="MZ">Mozambique</option>

                                                    <option value="MM">Myanmar</option>

                                                    <option value="NA">Namibia</option>

                                                    <option value="NR">Nauru</option>

                                                    <option value="NP">Nepal</option>

                                                    <option value="NL">Netherlands</option>

                                                    <option value="NC">New Caledonia</option>

                                                    <option value="NZ">New Zealand</option>

                                                    <option value="NI">Nicaragua</option>

                                                    <option value="NE">Niger</option>

                                                    <option value="NG">Nigeria</option>

                                                    <option value="NU">Niue</option>

                                                    <option value="NF">Norfolk Island</option>

                                                    <option value="KP">North Korea</option>

                                                    <option value="MP">Northern Mariana Islands</option>

                                                    <option value="NO">Norway</option>

                                                    <option value="OM">Oman</option>

                                                    <option value="PK">Pakistan</option>

                                                    <option value="PW">Palau</option>

                                                    <option value="PS">Palestine, State of</option>

                                                    <option value="PA">Panama</option>

                                                    <option value="PG">Papua New Guinea</option>

                                                    <option value="PY">Paraguay</option>

                                                    <option value="PE">Peru</option>

                                                    <option value="PH">Philippines</option>

                                                    <option value="PN">Pitcairn</option>

                                                    <option value="PL">Poland</option>

                                                    <option value="PT">Portugal</option>

                                                    <option value="PR">Puerto Rico</option>

                                                    <option value="QA">Qatar</option>

                                                    <option value="RE">Réunion</option>

                                                    <option value="RO">Romania</option>

                                                    <option value="RU">Russia</option>

                                                    <option value="RW">Rwanda</option>

                                                    <option value="BL">Saint Barthélemy</option>

                                                    <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>

                                                    <option value="KN">Saint Kitts and Nevis</option>

                                                    <option value="LC">Saint Lucia</option>

                                                    <option value="MF">Saint Martin (French part)</option>

                                                    <option value="PM">Saint Pierre and Miquelon</option>

                                                    <option value="VC">Saint Vincent and the Grenadines</option>

                                                    <option value="WS">Samoa</option>

                                                    <option value="SM">San Marino</option>

                                                    <option value="ST">Sao Tome and Principe</option>

                                                    <option value="SA">Saudi Arabia</option>

                                                    <option value="SN">Senegal</option>

                                                    <option value="RS">Serbia</option>

                                                    <option value="SC">Seychelles</option>

                                                    <option value="SL">Sierra Leone</option>

                                                    <option value="SG">Singapore</option>

                                                    <option value="SX">Sint Maarten (Dutch part)</option>

                                                    <option value="SK">Slovakia</option>

                                                    <option value="SI">Slovenia</option>

                                                    <option value="SB">Solomon Islands</option>

                                                    <option value="SO">Somalia</option>

                                                    <option value="ZA">South Africa</option>

                                                    <option value="GS">South Georgia and the South Sandwich Islands</option>

                                                    <option value="KR">South Korea</option>

                                                    <option value="SS">South Sudan</option>

                                                    <option value="ES">Spain</option>

                                                    <option value="LK">Sri Lanka</option>

                                                    <option value="SD">Sudan</option>

                                                    <option value="SR">Suriname</option>

                                                    <option value="SJ">Svalbard and Jan Mayen</option>

                                                    <option value="SZ">Swaziland</option>

                                                    <option value="SE">Sweden</option>

                                                    <option value="CH">Switzerland</option>

                                                    <option value="SY">Syria</option>

                                                    <option value="TW">Taiwan</option>

                                                    <option value="TJ">Tajikistan</option>

                                                    <option value="TZ">Tanzania</option>

                                                    <option value="TH">Thailand</option>

                                                    <option value="TL">Timor-Leste</option>

                                                    <option value="TG">Togo</option>

                                                    <option value="TK">Tokelau</option>

                                                    <option value="TO">Tonga</option>

                                                    <option value="TT">Trinidad and Tobago</option>

                                                    <option value="TN">Tunisia</option>

                                                    <option value="TR">Turkey</option>

                                                    <option value="TM">Turkmenistan</option>

                                                    <option value="TC">Turks and Caicos Islands</option>

                                                    <option value="TV">Tuvalu</option>

                                                    <option value="UG">Uganda</option>

                                                    <option value="UA">Ukraine</option>

                                                    <option value="AE">United Arab Emirates</option>

                                                    <option value="GB">United Kingdom</option>

                                                    <option value="UM">United States Minor Outlying Islands</option>

                                                    <option value="UY">Uruguay</option>

                                                    <option value="UZ">Uzbekistan</option>

                                                    <option value="VU">Vanuatu</option>

                                                    <option value="VE">Venezuela</option>

                                                    <option value="VN">Vietnam</option>

                                                    <option value="VG">Virgin Islands (British)</option>

                                                    <option value="VI">Virgin Islands (U.S.)</option>

                                                    <option value="WF">Wallis and Futuna</option>

                                                    <option value="EH">Western Sahara</option>

                                                    <option value="YE">Yemen</option>

                                                    <option value="ZM">Zambia</option>

                                                    <option value="ZW">Zimbabwe</option>

                                                </select>

                                                <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                            </div><!-- input-group -->
                                        </div>

 <div class="text-center">
                                            <button type="submit" class="btn btn-info waves-effect waves-light">Change</button>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>





        </div> <!-- container-fluid -->
    </div>




    @endsection

