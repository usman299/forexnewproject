@extends(Config::theme().'layout.auth')


@section('content')
     <div class="row">
            <div class="col-md-12">
                <div class="sp_site_card">
                    <div class="card-header d-flex flex-wrap align-items-center justify-content-between">
                        <h4>{{ __('Profile Settings') }}</h4>
                        <a href="{{ route('user.change.password') }}" class="btn sp_theme_btn mb-2">{{ __('Change Password') }}</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.profileupdate') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4 justify-content-center">
                                <div class="col-md-4 pe-lg-5 pe-md-4 justify-content-center">
                                    <div class="img-choose-div text-center">
                                        <p class="mb-4">{{ __('Profile Picture') }}</p>

                                            <img class=" rounded file-id-preview" id="file-id-preview"
                                                src="{{ Config::getFile('user', Auth::user()->image, true) }}" alt="pp">

                                        <input type="file" name="image" id="imageUpload" class="upload"
                                            accept=".png, .jpg, .jpeg" hidden>

                                        <label for="imageUpload"
                                            class="editImg btn sp_theme_btn w-100">{{ _('Choose file') }}</label>


                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label>{{ __('First Name') }}</label>
                                            <input type="text" class="form-control text-white" name="first_name"
                                                   value="{{ Auth::user()->first_name ?? ' ' }}"
                                                   placeholder="{{ __('Enter User Name') }}" >
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label>{{ __('Last Name') }}</label>
                                            <input type="text" class="form-control text-white" name="last_name"
                                                   value="{{ Auth::user()->last_name ?? ' ' }}"
                                                   placeholder="{{ __('Enter User Name') }}" >
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label>{{ __('Unique ID') }}</label>
                                            <input type="text" class="form-control text-white" name="username"
                                                value="{{ Auth::user()->username }}"
                                                placeholder="{{ __('Enter User Name') }}" disabled>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label>{{ __('Username') }}</label>
                                            <input type="text" class="form-control text-white" name="username"
                                                   value="{{ Auth::user()->username2 }}"
                                                   placeholder="{{ __('Enter User Name') }}" disabled>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label>{{ __('Email address') }}</label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ Auth::user()->email }}" placeholder="{{ __('Enter Email') }}" disabled>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label>{{ __('Country Code') }}</label>
                                            <select name="code" id="" class="form-select">

                                                <option {{ Auth::user()->code == '213' ? 'selected' : '' }} data-countryCode="DZ"  value="213">Algeria (+213)</option>
                                                <option {{ Auth::user()->code == '376' ? 'selected' : '' }} data-countryCode="AD" value="376">Andorra (+376)</option>
                                                <option {{ Auth::user()->code == '244' ? 'selected' : '' }} data-countryCode="AO" value="244">Angola (+244)</option>
                                                <option {{ Auth::user()->code == '1264' ? 'selected' : '' }} data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                                                <option {{ Auth::user()->code == '1268' ? 'selected' : '' }} data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
                                                <option {{ Auth::user()->code == '54' ? 'selected' : '' }} data-countryCode="AR" value="54">Argentina (+54)</option>
                                                <option {{ Auth::user()->code == '374' ? 'selected' : '' }} data-countryCode="AM" value="374">Armenia (+374)</option>
                                                <option {{ Auth::user()->code == '297' ? 'selected' : '' }} data-countryCode="AW" value="297">Aruba (+297)</option>
                                                <option {{ Auth::user()->code == '61' ? 'selected' : '' }} data-countryCode="AU" value="61">Australia (+61)</option>
                                                <option {{ Auth::user()->code == '43' ? 'selected' : '' }} data-countryCode="AT" value="43">Austria (+43)</option>
                                                <option {{ Auth::user()->code == '994' ? 'selected' : '' }} data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
                                                <option {{ Auth::user()->code == '1242' ? 'selected' : '' }} data-countryCode="BS" value="1242">Bahamas (+1242)</option>
                                                <option {{ Auth::user()->code == '973' ? 'selected' : '' }} data-countryCode="BH" value="973">Bahrain (+973)</option>
                                                <option {{ Auth::user()->code == '880' ? 'selected' : '' }} data-countryCode="BD" value="880">Bangladesh (+880)</option>
                                                <option {{ Auth::user()->code == '1246' ? 'selected' : '' }} data-countryCode="BB" value="1246">Barbados (+1246)</option>
                                                <option {{ Auth::user()->code == '375' ? 'selected' : '' }} data-countryCode="BY" value="375">Belarus (+375)</option>
                                                <option {{ Auth::user()->code == '32' ? 'selected' : '' }} data-countryCode="BE" value="32">Belgium (+32)</option>
                                                <option {{ Auth::user()->code == '501' ? 'selected' : '' }} data-countryCode="BZ" value="501">Belize (+501)</option>
                                                <option {{ Auth::user()->code == '229' ? 'selected' : '' }} data-countryCode="BJ" value="229">Benin (+229)</option>
                                                <option {{ Auth::user()->code == '1441' ? 'selected' : '' }} data-countryCode="BM" value="1441">Bermuda (+1441)</option>
                                                <option {{ Auth::user()->code == '975' ? 'selected' : '' }} data-countryCode="BT" value="975">Bhutan (+975)</option>
                                                <option {{ Auth::user()->code == '591' ? 'selected' : '' }} data-countryCode="BO" value="591">Bolivia (+591)</option>
                                                <option {{ Auth::user()->code == '387' ? 'selected' : '' }} data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
                                                <option {{ Auth::user()->code == '267' ? 'selected' : '' }} data-countryCode="BW" value="267">Botswana (+267)</option>
                                                <option {{ Auth::user()->code == '55' ? 'selected' : '' }} data-countryCode="BR" value="55">Brazil (+55)</option>
                                                <option {{ Auth::user()->code == '673' ? 'selected' : '' }} data-countryCode="BN" value="673">Brunei (+673)</option>
                                                <option {{ Auth::user()->code == '359' ? 'selected' : '' }} data-countryCode="BG" value="359">Bulgaria (+359)</option>
                                                <option {{ Auth::user()->code == '226' ? 'selected' : '' }} data-countryCode="BF" value="226">Burkina Faso (+226)</option>
                                                <option {{ Auth::user()->code == '257' ? 'selected' : '' }} data-countryCode="BI" value="257">Burundi (+257)</option>
                                                <option {{ Auth::user()->code == '855' ? 'selected' : '' }} data-countryCode="KH" value="855">Cambodia (+855)</option>
                                                <option {{ Auth::user()->code == '237' ? 'selected' : '' }} data-countryCode="CM" value="237">Cameroon (+237)</option>
                                                <option {{ Auth::user()->code == '1' ? 'selected' : '' }} data-countryCode="CA" value="1">Canada (+1)</option>
                                                <option {{ Auth::user()->code == '238' ? 'selected' : '' }} data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
                                                <option {{ Auth::user()->code == '1345' ? 'selected' : '' }} data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
                                                <option {{ Auth::user()->code == '236' ? 'selected' : '' }} data-countryCode="CF" value="236">Central African Republic (+236)</option>
                                                <option {{ Auth::user()->code == '56' ? 'selected' : '' }} data-countryCode="CL" value="56">Chile (+56)</option>
                                                <option {{ Auth::user()->code == '86' ? 'selected' : '' }} data-countryCode="CN" value="86">China (+86)</option>
                                                <option {{ Auth::user()->code == '57' ? 'selected' : '' }} data-countryCode="CO" value="57">Colombia (+57)</option>
                                                <option {{ Auth::user()->code == '269' ? 'selected' : '' }} data-countryCode="KM" value="269">Comoros (+269)</option>
                                                <option {{ Auth::user()->code == '242' ? 'selected' : '' }} data-countryCode="CG" value="242">Congo (+242)</option>
                                                <option {{ Auth::user()->code == '682' ? 'selected' : '' }} data-countryCode="CK" value="682">Cook Islands (+682)</option>
                                                <option {{ Auth::user()->code == '506' ? 'selected' : '' }} data-countryCode="CR" value="506">Costa Rica (+506)</option>
                                                <option {{ Auth::user()->code == '385' ? 'selected' : '' }} data-countryCode="HR" value="385">Croatia (+385)</option>
                                                <option {{ Auth::user()->code == '53' ? 'selected' : '' }} data-countryCode="CU" value="53">Cuba (+53)</option>
                                                <option {{ Auth::user()->code == '90392' ? 'selected' : '' }} data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
                                                <option {{ Auth::user()->code == '357' ? 'selected' : '' }} data-countryCode="CY" value="357">Cyprus South (+357)</option>
                                                <option {{ Auth::user()->code == '42' ? 'selected' : '' }} data-countryCode="CZ" value="42">Czech Republic (+42)</option>
                                                <option {{ Auth::user()->code == '45' ? 'selected' : '' }} data-countryCode="DK" value="45">Denmark (+45)</option>
                                                <option {{ Auth::user()->code == '253' ? 'selected' : '' }} data-countryCode="DJ" value="253">Djibouti (+253)</option>
                                                <option {{ Auth::user()->code == '1809' ? 'selected' : '' }} data-countryCode="DM" value="1809">Dominica (+1809)</option>
                                                <option {{ Auth::user()->code == '1809' ? 'selected' : '' }} data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
                                                <option {{ Auth::user()->code == '593' ? 'selected' : '' }} data-countryCode="EC" value="593">Ecuador (+593)</option>
                                                <option {{ Auth::user()->code == '20' ? 'selected' : '' }} data-countryCode="EG" value="20">Egypt (+20)</option>
                                                <option {{ Auth::user()->code == '503' ? 'selected' : '' }} data-countryCode="SV" value="503">El Salvador (+503)</option>
                                                <option {{ Auth::user()->code == '240' ? 'selected' : '' }} data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
                                                <option {{ Auth::user()->code == '291' ? 'selected' : '' }} data-countryCode="ER" value="291">Eritrea (+291)</option>
                                                <option {{ Auth::user()->code == '372' ? 'selected' : '' }} data-countryCode="EE" value="372">Estonia (+372)</option>
                                                <option {{ Auth::user()->code == '251' ? 'selected' : '' }} data-countryCode="ET" value="251">Ethiopia (+251)</option>
                                                <option {{ Auth::user()->code == '500' ? 'selected' : '' }} data-countryCode="FK" value="500">Falkland Islands (+500)</option>
                                                <option {{ Auth::user()->code == '298' ? 'selected' : '' }} data-countryCode="FO" value="298">Faroe Islands (+298)</option>
                                                <option {{ Auth::user()->code == '679' ? 'selected' : '' }} data-countryCode="FJ" value="679">Fiji (+679)</option>
                                                <option {{ Auth::user()->code == '358' ? 'selected' : '' }} data-countryCode="FI" value="358">Finland (+358)</option>
                                                <option {{ Auth::user()->code == '33' ? 'selected' : '' }} data-countryCode="FR" value="33">France (+33)</option>
                                                <option {{ Auth::user()->code == '594' ? 'selected' : '' }} data-countryCode="GF" value="594">French Guiana (+594)</option>
                                                <option {{ Auth::user()->code == '689' ? 'selected' : '' }} data-countryCode="PF" value="689">French Polynesia (+689)</option>
                                                <option {{ Auth::user()->code == '241' ? 'selected' : '' }} data-countryCode="GA" value="241">Gabon (+241)</option>
                                                <option {{ Auth::user()->code == '220' ? 'selected' : '' }} data-countryCode="GM" value="220">Gambia (+220)</option>
                                                <option {{ Auth::user()->code == '7880' ? 'selected' : '' }} data-countryCode="GE" value="7880">Georgia (+7880)</option>
                                                <option {{ Auth::user()->code == '49' ? 'selected' : '' }} data-countryCode="DE" value="49">Germany (+49)</option>
                                                <option {{ Auth::user()->code == '233' ? 'selected' : '' }} data-countryCode="GH" value="233">Ghana (+233)</option>
                                                <option {{ Auth::user()->code == '350' ? 'selected' : '' }} data-countryCode="GI" value="350">Gibraltar (+350)</option>
                                                <option {{ Auth::user()->code == '30' ? 'selected' : '' }} data-countryCode="GR" value="30">Greece (+30)</option>
                                                <option {{ Auth::user()->code == '299' ? 'selected' : '' }} data-countryCode="GL" value="299">Greenland (+299)</option>
                                                <option {{ Auth::user()->code == '1473' ? 'selected' : '' }} data-countryCode="GD" value="1473">Grenada (+1473)</option>
                                                <option {{ Auth::user()->code == '590' ? 'selected' : '' }} data-countryCode="GP" value="590">Guadeloupe (+590)</option>
                                                <option {{ Auth::user()->code == '671' ? 'selected' : '' }} data-countryCode="GU" value="671">Guam (+671)</option>
                                                <option {{ Auth::user()->code == '502' ? 'selected' : '' }} data-countryCode="GT" value="502">Guatemala (+502)</option>
                                                <option {{ Auth::user()->code == '224' ? 'selected' : '' }} data-countryCode="GN" value="224">Guinea (+224)</option>
                                                <option {{ Auth::user()->code == '245' ? 'selected' : '' }} data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
                                                <option {{ Auth::user()->code == '592' ? 'selected' : '' }} data-countryCode="GY" value="592">Guyana (+592)</option>
                                                <option {{ Auth::user()->code == '509' ? 'selected' : '' }} data-countryCode="HT" value="509">Haiti (+509)</option>
                                                <option {{ Auth::user()->code == '504' ? 'selected' : '' }} data-countryCode="HN" value="504">Honduras (+504)</option>
                                                <option {{ Auth::user()->code == '852' ? 'selected' : '' }} data-countryCode="HK" value="852">Hong Kong (+852)</option>
                                                <option {{ Auth::user()->code == '36' ? 'selected' : '' }} data-countryCode="HU" value="36">Hungary (+36)</option>
                                                <option {{ Auth::user()->code == '354' ? 'selected' : '' }} data-countryCode="IS" value="354">Iceland (+354)</option>
                                                <option {{ Auth::user()->code == '91' ? 'selected' : '' }} data-countryCode="IN" value="91">India (+91)</option>
                                                <option {{ Auth::user()->code == '62' ? 'selected' : '' }} data-countryCode="ID" value="62">Indonesia (+62)</option>
                                                <option {{ Auth::user()->code == '98' ? 'selected' : '' }} data-countryCode="IR" value="98">Iran (+98)</option>
                                                <option {{ Auth::user()->code == '964' ? 'selected' : '' }} data-countryCode="IQ" value="964">Iraq (+964)</option>
                                                <option {{ Auth::user()->code == '353' ? 'selected' : '' }} data-countryCode="IE" value="353">Ireland (+353)</option>
                                                <option {{ Auth::user()->code == '972' ? 'selected' : '' }} data-countryCode="IL" value="972">Israel (+972)</option>
                                                <option {{ Auth::user()->code == '39' ? 'selected' : '' }} data-countryCode="IT" value="39">Italy (+39)</option>
                                                <option {{ Auth::user()->code == '1876' ? 'selected' : '' }} data-countryCode="JM" value="1876">Jamaica (+1876)</option>
                                                <option {{ Auth::user()->code == '81' ? 'selected' : '' }} data-countryCode="JP" value="81">Japan (+81)</option>
                                                <option {{ Auth::user()->code == '962' ? 'selected' : '' }} data-countryCode="JO" value="962">Jordan (+962)</option>
                                                <option {{ Auth::user()->code == '7' ? 'selected' : '' }} data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                                                <option {{ Auth::user()->code == '254' ? 'selected' : '' }} data-countryCode="KE" value="254">Kenya (+254)</option>
                                                <option {{ Auth::user()->code == '686' ? 'selected' : '' }} data-countryCode="KI" value="686">Kiribati (+686)</option>
                                                <option {{ Auth::user()->code == '850' ? 'selected' : '' }} data-countryCode="KP" value="850">Korea North (+850)</option>
                                                <option {{ Auth::user()->code == '82' ? 'selected' : '' }} data-countryCode="KR" value="82">Korea South (+82)</option>
                                                <option {{ Auth::user()->code == '965' ? 'selected' : '' }} data-countryCode="KW" value="965">Kuwait (+965)</option>
                                                <option {{ Auth::user()->code == '996' ? 'selected' : '' }} data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
                                                <option {{ Auth::user()->code == '856' ? 'selected' : '' }} data-countryCode="LA" value="856">Laos (+856)</option>
                                                <option {{ Auth::user()->code == '371' ? 'selected' : '' }} data-countryCode="LV" value="371">Latvia (+371)</option>
                                                <option {{ Auth::user()->code == '961' ? 'selected' : '' }} data-countryCode="LB" value="961">Lebanon (+961)</option>
                                                <option {{ Auth::user()->code == '266' ? 'selected' : '' }} data-countryCode="LS" value="266">Lesotho (+266)</option>
                                                <option {{ Auth::user()->code == '231' ? 'selected' : '' }} data-countryCode="LR" value="231">Liberia (+231)</option>
                                                <option {{ Auth::user()->code == '218' ? 'selected' : '' }} data-countryCode="LY" value="218">Libya (+218)</option>
                                                <option {{ Auth::user()->code == '417' ? 'selected' : '' }} data-countryCode="LI" value="417">Liechtenstein (+417)</option>
                                                <option {{ Auth::user()->code == '370' ? 'selected' : '' }} data-countryCode="LT" value="370">Lithuania (+370)</option>
                                                <option {{ Auth::user()->code == '352' ? 'selected' : '' }} data-countryCode="LU" value="352">Luxembourg (+352)</option>
                                                <option {{ Auth::user()->code == '853' ? 'selected' : '' }} data-countryCode="MO" value="853">Macao (+853)</option>
                                                <option {{ Auth::user()->code == '389' ? 'selected' : '' }} data-countryCode="MK" value="389">Macedonia (+389)</option>
                                                <option {{ Auth::user()->code == '261' ? 'selected' : '' }} data-countryCode="MG" value="261">Madagascar (+261)</option>
                                                <option {{ Auth::user()->code == '265' ? 'selected' : '' }} data-countryCode="MW" value="265">Malawi (+265)</option>
                                                <option {{ Auth::user()->code == '60' ? 'selected' : '' }} data-countryCode="MY" value="60">Malaysia (+60)</option>
                                                <option {{ Auth::user()->code == '960' ? 'selected' : '' }} data-countryCode="MV" value="960">Maldives (+960)</option>
                                                <option {{ Auth::user()->code == '223' ? 'selected' : '' }} data-countryCode="ML" value="223">Mali (+223)</option>
                                                <option {{ Auth::user()->code == '356' ? 'selected' : '' }} data-countryCode="MT" value="356">Malta (+356)</option>
                                                <option {{ Auth::user()->code == '692' ? 'selected' : '' }} data-countryCode="MH" value="692">Marshall Islands (+692)</option>
                                                <option {{ Auth::user()->code == '596' ? 'selected' : '' }} data-countryCode="MQ" value="596">Martinique (+596)</option>
                                                <option {{ Auth::user()->code == '222' ? 'selected' : '' }} data-countryCode="MR" value="222">Mauritania (+222)</option>
                                                <option {{ Auth::user()->code == '269' ? 'selected' : '' }} data-countryCode="YT" value="269">Mayotte (+269)</option>
                                                <option {{ Auth::user()->code == '52' ? 'selected' : '' }} data-countryCode="MX" value="52">Mexico (+52)</option>
                                                <option {{ Auth::user()->code == '691' ? 'selected' : '' }} data-countryCode="FM" value="691">Micronesia (+691)</option>
                                                <option {{ Auth::user()->code == '373' ? 'selected' : '' }} data-countryCode="MD" value="373">Moldova (+373)</option>
                                                <option {{ Auth::user()->code == '377' ? 'selected' : '' }} data-countryCode="MC" value="377">Monaco (+377)</option>
                                                <option {{ Auth::user()->code == '976' ? 'selected' : '' }} data-countryCode="MN" value="976">Mongolia (+976)</option>
                                                <option {{ Auth::user()->code == '1664' ? 'selected' : '' }} data-countryCode="MS" value="1664">Montserrat (+1664)</option>
                                                <option {{ Auth::user()->code == '212' ? 'selected' : '' }} data-countryCode="MA" value="212">Morocco (+212)</option>
                                                <option {{ Auth::user()->code == '258' ? 'selected' : '' }} data-countryCode="MZ" value="258">Mozambique (+258)</option>
                                                <option {{ Auth::user()->code == '95' ? 'selected' : '' }} data-countryCode="MN" value="95">Myanmar (+95)</option>
                                                <option {{ Auth::user()->code == '264' ? 'selected' : '' }} data-countryCode="NA" value="264">Namibia (+264)</option>
                                                <option {{ Auth::user()->code == '674' ? 'selected' : '' }} data-countryCode="NR" value="674">Nauru (+674)</option>
                                                <option {{ Auth::user()->code == '977' ? 'selected' : '' }} data-countryCode="NP" value="977">Nepal (+977)</option>
                                                <option {{ Auth::user()->code == '31' ? 'selected' : '' }} data-countryCode="NL" value="31">Netherlands (+31)</option>
                                                <option {{ Auth::user()->code == '687' ? 'selected' : '' }} data-countryCode="NC" value="687">New Caledonia (+687)</option>
                                                <option {{ Auth::user()->code == '64' ? 'selected' : '' }} data-countryCode="NZ" value="64">New Zealand (+64)</option>
                                                <option {{ Auth::user()->code == '505' ? 'selected' : '' }} data-countryCode="NI" value="505">Nicaragua (+505)</option>
                                                <option {{ Auth::user()->code == '227' ? 'selected' : '' }} data-countryCode="NE" value="227">Niger (+227)</option>
                                                <option {{ Auth::user()->code == '234' ? 'selected' : '' }} data-countryCode="NG" value="234">Nigeria (+234)</option>
                                                <option {{ Auth::user()->code == '683' ? 'selected' : '' }} data-countryCode="NU" value="683">Niue (+683)</option>
                                                <option {{ Auth::user()->code == '672' ? 'selected' : '' }} data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                                                <option {{ Auth::user()->code == '670' ? 'selected' : '' }} data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                                                <option {{ Auth::user()->code == '47' ? 'selected' : '' }} data-countryCode="NO" value="47">Norway (+47)</option>
                                                <option {{ Auth::user()->code == '968' ? 'selected' : '' }} data-countryCode="OM" value="968">Oman (+968)</option>
                                                <option {{ Auth::user()->code == '92' ? 'selected' : '' }} data-countryCode="PKR" value="92">Pakistan (+92)</option>
                                                <option {{ Auth::user()->code == '680' ? 'selected' : '' }} data-countryCode="PW" value="680">Palau (+680)</option>
                                                <option {{ Auth::user()->code == '507' ? 'selected' : '' }} data-countryCode="PA" value="507">Panama (+507)</option>
                                                <option {{ Auth::user()->code == '675' ? 'selected' : '' }} data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                                                <option {{ Auth::user()->code == '595' ? 'selected' : '' }} data-countryCode="PY" value="595">Paraguay (+595)</option>
                                                <option {{ Auth::user()->code == '51' ? 'selected' : '' }} data-countryCode="PE" value="51">Peru (+51)</option>
                                                <option {{ Auth::user()->code == '63' ? 'selected' : '' }} data-countryCode="PH" value="63">Philippines (+63)</option>
                                                <option {{ Auth::user()->code == '48' ? 'selected' : '' }} data-countryCode="PL" value="48">Poland (+48)</option>
                                                <option {{ Auth::user()->code == '351' ? 'selected' : '' }} data-countryCode="PT" value="351">Portugal (+351)</option>
                                                <option {{ Auth::user()->code == '1787' ? 'selected' : '' }} data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
                                                <option {{ Auth::user()->code == '974' ? 'selected' : '' }} data-countryCode="QA" value="974">Qatar (+974)</option>
                                                <option {{ Auth::user()->code == '262' ? 'selected' : '' }} data-countryCode="RE" value="262">Reunion (+262)</option>
                                                <option {{ Auth::user()->code == '40' ? 'selected' : '' }} data-countryCode="RO" value="40">Romania (+40)</option>
                                                <option {{ Auth::user()->code == '7' ? 'selected' : '' }} data-countryCode="RU" value="7">Russia (+7)</option>
                                                <option {{ Auth::user()->code == '250' ? 'selected' : '' }} data-countryCode="RW" value="250">Rwanda (+250)</option>
                                                <option {{ Auth::user()->code == '378' ? 'selected' : '' }} data-countryCode="SM" value="378">San Marino (+378)</option>
                                                <option {{ Auth::user()->code == '239' ? 'selected' : '' }} data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
                                                <option {{ Auth::user()->code == '966' ? 'selected' : '' }} data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
                                                <option {{ Auth::user()->code == '221' ? 'selected' : '' }} data-countryCode="SN" value="221">Senegal (+221)</option>
                                                <option {{ Auth::user()->code == '381' ? 'selected' : '' }} data-countryCode="CS" value="381">Serbia (+381)</option>
                                                <option {{ Auth::user()->code == '248' ? 'selected' : '' }} data-countryCode="SC" value="248">Seychelles (+248)</option>
                                                <option {{ Auth::user()->code == '232' ? 'selected' : '' }} data-countryCode="SL" value="232">Sierra Leone (+232)</option>
                                                <option {{ Auth::user()->code == '65' ? 'selected' : '' }} data-countryCode="SG" value="65">Singapore (+65)</option>
                                                <option {{ Auth::user()->code == '421' ? 'selected' : '' }} data-countryCode="SK" value="421">Slovak Republic (+421)</option>
                                                <option {{ Auth::user()->code == '386' ? 'selected' : '' }} data-countryCode="SI" value="386">Slovenia (+386)</option>
                                                <option {{ Auth::user()->code == '677' ? 'selected' : '' }} data-countryCode="SB" value="677">Solomon Islands (+677)</option>
                                                <option {{ Auth::user()->code == '252' ? 'selected' : '' }} data-countryCode="SO" value="252">Somalia (+252)</option>
                                                <option {{ Auth::user()->code == '27' ? 'selected' : '' }} data-countryCode="ZA" value="27">South Africa (+27)</option>
                                                <option {{ Auth::user()->code == '34' ? 'selected' : '' }} data-countryCode="ES" value="34">Spain (+34)</option>
                                                <option {{ Auth::user()->code == '94' ? 'selected' : '' }} data-countryCode="LK" value="94">Sri Lanka (+94)</option>
                                                <option {{ Auth::user()->code == '290' ? 'selected' : '' }} data-countryCode="SH" value="290">St. Helena (+290)</option>
                                                <option {{ Auth::user()->code == '1869' ? 'selected' : '' }} data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
                                                <option {{ Auth::user()->code == '1758' ? 'selected' : '' }} data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
                                                <option {{ Auth::user()->code == '249' ? 'selected' : '' }} data-countryCode="SD" value="249">Sudan (+249)</option>
                                                <option {{ Auth::user()->code == '597' ? 'selected' : '' }} data-countryCode="SR" value="597">Suriname (+597)</option>
                                                <option {{ Auth::user()->code == '268' ? 'selected' : '' }} data-countryCode="SZ" value="268">Swaziland (+268)</option>
                                                <option {{ Auth::user()->code == '46' ? 'selected' : '' }} data-countryCode="SE" value="46">Sweden (+46)</option>
                                                <option {{ Auth::user()->code == '41' ? 'selected' : '' }} data-countryCode="CH" value="41">Switzerland (+41)</option>
                                                <option {{ Auth::user()->code == '963' ? 'selected' : '' }} data-countryCode="SI" value="963">Syria (+963)</option>
                                                <option {{ Auth::user()->code == '886' ? 'selected' : '' }} data-countryCode="TW" value="886">Taiwan (+886)</option>
                                                <option {{ Auth::user()->code == '7' ? 'selected' : '' }} data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                                                <option {{ Auth::user()->code == '66' ? 'selected' : '' }} data-countryCode="TH" value="66">Thailand (+66)</option>
                                                <option {{ Auth::user()->code == '228' ? 'selected' : '' }} data-countryCode="TG" value="228">Togo (+228)</option>
                                                <option {{ Auth::user()->code == '676' ? 'selected' : '' }} data-countryCode="TO" value="676">Tonga (+676)</option>
                                                <option {{ Auth::user()->code == '1868' ? 'selected' : '' }} data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
                                                <option {{ Auth::user()->code == '216' ? 'selected' : '' }} data-countryCode="TN" value="216">Tunisia (+216)</option>
                                                <option {{ Auth::user()->code == '90' ? 'selected' : '' }} data-countryCode="TR" value="90">Turkey (+90)</option>
                                                <option {{ Auth::user()->code == '7' ? 'selected' : '' }} data-countryCode="TM" value="7">Turkmenistan (+7)</option>
                                                <option {{ Auth::user()->code == '993' ? 'selected' : '' }} data-countryCode="TM" value="993">Turkmenistan (+993)</option>
                                                <option {{ Auth::user()->code == '1649' ? 'selected' : '' }} data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
                                                <option {{ Auth::user()->code == '668' ? 'selected' : '' }} data-countryCode="TV" value="688">Tuvalu (+688)</option>
                                                <option {{ Auth::user()->code == '256' ? 'selected' : '' }} data-countryCode="UG" value="256">Uganda (+256)</option>
                                                <option {{ Auth::user()->code == '44' ? 'selected' : '' }} data-countryCode="GB" value="44">UK (+44)</option>
                                                <option {{ Auth::user()->code == '380' ? 'selected' : '' }} data-countryCode="UA" value="380">Ukraine (+380)</option>
                                                <option {{ Auth::user()->code == '971' ? 'selected' : '' }} data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
                                                <option {{ Auth::user()->code == '598' ? 'selected' : '' }} data-countryCode="UY" value="598">Uruguay (+598)</option>
                                                <option {{ Auth::user()->code == '1' ? 'selected' : '' }} data-countryCode="US" value="1">USA (+1)</option>
                                                <option {{ Auth::user()->code == '7' ? 'selected' : '' }} data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                                                <option {{ Auth::user()->code == '678' ? 'selected' : '' }} data-countryCode="VU" value="678">Vanuatu (+678)</option>
                                                <option {{ Auth::user()->code == '379' ? 'selected' : '' }} data-countryCode="VA" value="379">Vatican City (+379)</option>
                                                <option {{ Auth::user()->code == '58' ? 'selected' : '' }} data-countryCode="VE" value="58">Venezuela (+58)</option>
                                                <option {{ Auth::user()->code == '84' ? 'selected' : '' }} data-countryCode="VN" value="84">Vietnam (+84)</option>
                                                <option {{ Auth::user()->code == '84' ? 'selected' : '' }} data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                                                <option {{ Auth::user()->code == '84' ? 'selected' : '' }} data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                                                <option {{ Auth::user()->code == '681' ? 'selected' : '' }} data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                                                <option {{ Auth::user()->code == '969' ? 'selected' : '' }} data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                                                <option {{ Auth::user()->code == '967' ? 'selected' : '' }} data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                                                <option {{ Auth::user()->code == '260' ? 'selected' : '' }} data-countryCode="ZM" value="260">Zambia (+260)</option>
                                                <option {{ Auth::user()->code == '263' ? 'selected' : '' }} data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label>{{ __('Phone') }}</label>
                                            @php
                                                $phoneNumber = Auth::user()->phone; // Assuming Auth::user()->phone contains the phone number with country code
                                                $countryCodeLength =  strlen(Auth::user()->code);; // Assuming the country code length is 4 characters, including the '+' sign
                                                $substring = substr($phoneNumber, $countryCodeLength);
                                            @endphp
                                            <input type="number" class="form-control" name="phone"
                                                value="{{ (int)$substring }}" placeholder="{{ __('Enter Phone') }}">
                                        </div>



{{--                                        <div class="form-group col-md-6 mb-3 ">--}}
{{--                                            <label>{{ __('Country') }}</label>--}}
{{--                                            <input type="text" name="country" class="form-control"--}}
{{--                                                value="{{optional( Auth::user()->address)->country }}">--}}
{{--                                        </div>--}}
{{--        --}}
{{--                                        <div class="col-md-6 mb-3">--}}
{{--        --}}
{{--                                            <label>{{ __('city') }}</label>--}}
{{--                                            <input type="text" name="city" class="form-control form_control"--}}
{{--                                                value="{{optional( Auth::user()->address)->city }}">--}}
{{--        --}}
{{--                                        </div>--}}
{{--        --}}
{{--                                        <div class="col-md-6 mb-3">--}}
{{--        --}}
{{--                                            <label>{{ __('zip') }}</label>--}}
{{--                                            <input type="text" name="zip" class="form-control form_control"--}}
{{--                                                value="{{optional( Auth::user()->address)->zip }}">--}}
{{--        --}}
{{--                                        </div>--}}

{{--                                        <div class="col-md-6 mb-3">--}}
{{--        --}}
{{--                                            <label>{{ __('state') }}</label>--}}
{{--                                            <input type="text" name="state" class="form-control form_control"--}}
{{--                                                value="{{optional( Auth::user()->address)->state }}">--}}
{{--        --}}
{{--                                        </div>--}}


                                        <div class="col-md-6 mb-3">

                                            <label>{{ __('Telegram Username') }}</label>
                                            <input type="text" name="telegram_id" class="form-control form_control"
                                                value="{{Auth::user()->telegram_id }}" required>

                                        </div>

                                    </div>

                                    <button class="btn sp_theme_btn mt-3 w-100">{{ __('Update') }}</button>
                                </div>




                        </form>
                    </div>

                </div>
            </div>
        </div>
@endsection


@push('style')
    <style>
        .file-id-preview {
            max-height: 300px;
            display: inline-block !important;
        }
    </style>
@endpush


@push('script')
    <script>
        'use strict'

        document.getElementById("imageUpload").onchange = function() {
            show();
        };

        function show() {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-id-preview");
                preview.src = src;
                preview.style.display = "block";
                document.getElementById("file-id-preview").style.visibility = "visible";
            }
        }
    </script>
@endpush
