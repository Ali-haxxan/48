@include('48-h/head')
@include('48-h/header')

<div class="banner-sec">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 innerpage-banner">
				<div class="inner-banner-heading">Free Alert Service</div>
				<ul class="breadcum">
					<li><a href="index.html">Home</a></li>
					<li><a href="#">Free Alert Service</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- message area-->
<!-- content section -->
<div class="content-sec mb-3">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-9 col-md-9 pt-0 pl-md-0 ">
				<div class="register-content-sec">
					<!-- heading section -->
					<div class="left-heading-sec">
						<h2 class="larg-heading">Free Alert Service </h2>
					</div>
					<form action="http://48-h.com/home/freeAlert" enctype="multipart/form-data" method="post"  id="userreg">
						<input type="hidden" name="csrftestname" value="6f96ecada0f77497aa76a9a5374f4a6e">
						<div class="Register-form-sec pt-0">
							<div class="row">
								<div class="col-12 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" class="form-control custm-input" id="usercode" name="usercode" value="" required placeholder="User Code " />										
									</div>
								</div>
							<div class="col-12 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="email" id="email" name="email" onkeypress="return RestrictSpace();" value="" required class="form-control custm-input" placeholder="E-mail Address" />
								</div>
							</div>
							<div class="dj-space">&nbsp;</div>
							<div class="dj-space">&nbsp;</div>							
							<div class="col-12 col-sm-12 col-md-12">
									 <h5>  <img src="assets/site/main/images/art.png">  &nbsp;Item Art(s)</h5>				
							</div>								
							<div class="col-12 col-sm-12 col-md-12">
								<div class="form-group">
									<input type="text" class="form-control custm-input" id="artist_name" name="artist_name" value="" required  placeholder="Artist Name" />
								</div>
							</div>
							<div class="dj-space">&nbsp;</div>
							<div class="dj-space">&nbsp;</div>
							<div class="col-12 col-sm-12 col-md-12">
								<h5>   <img src="assets/site/main/images/stamp.png">  Item Stamp(s)</h5>				
							</div>
														<div class="col-12 col-sm-12 col-md-12">
									<div class="form-group">
										<select class="form-control custm-input" id="stamp_country_id" name="stamp_country_id" required  style="border-radius: 30px;" />
										<option value="">Select Country</option>
																					<option "" value="1">Afghanistan</option>
																					<option "" value="2">Aland Islands</option>
																					<option "" value="3">Albania</option>
																					<option "" value="4">Algeria</option>
																					<option "" value="5">American Samoa</option>
																					<option "" value="6">Andorra</option>
																					<option "" value="7">Angola</option>
																					<option "" value="8">Anguilla</option>
																					<option "" value="9">Antarctica</option>
																					<option "" value="10">Antigua and Barbuda</option>
																					<option "" value="11">Argentina</option>
																					<option "" value="12">Armenia</option>
																					<option "" value="13">Aruba</option>
																					<option "" value="14">Australia</option>
																					<option "" value="15">Austria</option>
																					<option "" value="16">Azerbaijan</option>
																					<option "" value="18">Bahamas</option>
																					<option "" value="17">Bahrain</option>
																					<option "" value="19">Bangladesh</option>
																					<option "" value="20">Barbados</option>
																					<option "" value="21">Belarus</option>
																					<option "" value="22">Belgium</option>
																					<option "" value="23">Belize</option>
																					<option "" value="24">Benin</option>
																					<option "" value="25">Bermuda</option>
																					<option "" value="26">Bhutan</option>
																					<option "" value="27">Bolivia, Plurinational State of</option>
																					<option "" value="28">Bonaire, Sint Eustatius and Saba</option>
																					<option "" value="29">Bosnia and Herzegovina</option>
																					<option "" value="30">Botswana</option>
																					<option "" value="31">Bouvet Island</option>
																					<option "" value="32">Brazil</option>
																					<option "" value="33">British Indian Ocean Territory</option>
																					<option "" value="34">Brunei Darussalam</option>
																					<option "" value="35">Bulgaria</option>
																					<option "" value="36">Burkina Faso</option>
																					<option "" value="37">Burundi</option>
																					<option "" value="38">Cambodia</option>
																					<option "" value="39">Cameroon</option>
																					<option "" value="40">Canada</option>
																					<option "" value="41">Cape Verde</option>
																					<option "" value="42">Cayman Islands</option>
																					<option "" value="43">Central African Republic</option>
																					<option "" value="44">Chad</option>
																					<option "" value="45">Chile</option>
																					<option "" value="46">China</option>
																					<option "" value="47">Christmas Island</option>
																					<option "" value="48">Cocos (Keeling) Islands</option>
																					<option "" value="49">Colombia</option>
																					<option "" value="50">Comoros</option>
																					<option "" value="51">Congo</option>
																					<option "" value="52">Congo, the Democratic Republic of the</option>
																					<option "" value="53">Cook Islands</option>
																					<option "" value="54">Costa Rica</option>
																					<option "" value="55">Côte d'Ivoire</option>
																					<option "" value="56">Croatia</option>
																					<option "" value="57">Cuba</option>
																					<option "" value="58">Curaçao</option>
																					<option "" value="59">Cyprus</option>
																					<option "" value="60">Czech Republic</option>
																					<option "" value="61">Denmark</option>
																					<option "" value="62">Djibouti</option>
																					<option "" value="63">Dominica</option>
																					<option "" value="64">Dominican Republic</option>
																					<option "" value="65">Ecuador</option>
																					<option "" value="66">Egypt</option>
																					<option "" value="67">El Salvador</option>
																					<option "" value="68">Equatorial Guinea</option>
																					<option "" value="69">Eritrea</option>
																					<option "" value="70">Estonia</option>
																					<option "" value="71">Ethiopia</option>
																					<option "" value="72">Falkland Islands (Malvinas)</option>
																					<option "" value="73">Faroe Islands</option>
																					<option "" value="74">Fiji</option>
																					<option "" value="75">Finland</option>
																					<option "" value="76">France</option>
																					<option "" value="77">French Guiana</option>
																					<option "" value="78">French Polynesia</option>
																					<option "" value="79">French Southern Territories</option>
																					<option "" value="80">Gabon</option>
																					<option "" value="81">Gambia</option>
																					<option "" value="82">Georgia</option>
																					<option "" value="83">Germany</option>
																					<option "" value="84">Ghana</option>
																					<option "" value="85">Gibraltar</option>
																					<option "" value="86">Greece</option>
																					<option "" value="87">Greenland</option>
																					<option "" value="88">Grenada</option>
																					<option "" value="89">Guadeloupe</option>
																					<option "" value="90">Guam</option>
																					<option "" value="91">Guatemala</option>
																					<option "" value="92">Guernsey</option>
																					<option "" value="93">Guinea</option>
																					<option "" value="94">Guinea-Bissau</option>
																					<option "" value="95">Guyana</option>
																					<option "" value="96">Haiti</option>
																					<option "" value="97">Heard Island and McDonald Islands</option>
																					<option "" value="98">Holy See (Vatican City State)</option>
																					<option "" value="99">Honduras</option>
																					<option "" value="100">Hong Kong</option>
																					<option "" value="101">Hungary</option>
																					<option "" value="102">Iceland</option>
																					<option "" value="103">India</option>
																					<option "" value="104">Indonesia</option>
																					<option "" value="105">Iran, Islamic Republic of</option>
																					<option "" value="106">Iraq</option>
																					<option "" value="107">Ireland</option>
																					<option "" value="108">Isle of Man</option>
																					<option "" value="109">Israel</option>
																					<option "" value="110">Italy</option>
																					<option "" value="111">Jamaica</option>
																					<option "" value="112">Japan</option>
																					<option "" value="113">Jersey</option>
																					<option "" value="114">Jordan</option>
																					<option "" value="115">Kazakhstan</option>
																					<option "" value="116">Kenya</option>
																					<option "" value="117">Kiribati</option>
																					<option "" value="118">Korea, Democratic People's Republic of</option>
																					<option "" value="119">Korea, Republic of</option>
																					<option "" value="120">Kuwait</option>
																					<option "" value="121">Kyrgyzstan</option>
																					<option "" value="122">Lao People's Democratic Republic</option>
																					<option "" value="123">Latvia</option>
																					<option "" value="124">Lebanon</option>
																					<option "" value="125">Lesotho</option>
																					<option "" value="126">Liberia</option>
																					<option "" value="127">Libya</option>
																					<option "" value="128">Liechtenstein</option>
																					<option "" value="129">Lithuania</option>
																					<option "" value="130">Luxembourg</option>
																					<option "" value="131">Macao</option>
																					<option "" value="132">Macedonia, the Former Yugoslav Republic </option>
																					<option "" value="133">Madagascar</option>
																					<option "" value="134">Malawi</option>
																					<option "" value="135">Malaysia</option>
																					<option "" value="136">Maldives</option>
																					<option "" value="137">Mali</option>
																					<option "" value="138">Malta</option>
																					<option "" value="139">Marshall Islands</option>
																					<option "" value="140">Martinique</option>
																					<option "" value="141">Mauritania</option>
																					<option "" value="142">Mauritius</option>
																					<option "" value="143">Mayotte</option>
																					<option "" value="144">Mexico</option>
																					<option "" value="145">Micronesia, Federated States of</option>
																					<option "" value="146">Moldova, Republic of</option>
																					<option "" value="147">Monaco</option>
																					<option "" value="148">Mongolia</option>
																					<option "" value="149">Montenegro</option>
																					<option "" value="150">Montserrat</option>
																					<option "" value="151">Morocco</option>
																					<option "" value="152">Mozambique</option>
																					<option "" value="153">Myanmar</option>
																					<option "" value="154">Namibia</option>
																					<option "" value="155">Nauru</option>
																					<option "" value="156">Nepal</option>
																					<option "" value="157">Netherlands</option>
																					<option "" value="158">New Caledonia</option>
																					<option "" value="159">New Zealand</option>
																					<option "" value="160">Nicaragua</option>
																					<option "" value="161">Niger</option>
																					<option "" value="162">Nigeria</option>
																					<option "" value="163">Niue</option>
																					<option "" value="164">Norfolk Island</option>
																					<option "" value="165">Northern Mariana Islands</option>
																					<option "" value="166">Norway</option>
																					<option "" value="167">Oman</option>
																					<option "" value="168">Pakistan</option>
																					<option "" value="169">Palau</option>
																					<option "" value="170">Palestine, State of</option>
																					<option "" value="171">Panama</option>
																					<option "" value="172">Papua New Guinea</option>
																					<option "" value="173">Paraguay</option>
																					<option "" value="174">Peru</option>
																					<option "" value="175">Philippines</option>
																					<option "" value="176">Pitcairn</option>
																					<option "" value="177">Poland</option>
																					<option "" value="178">Portugal</option>
																					<option "" value="179">Puerto Rico</option>
																					<option "" value="180">Qatar</option>
																					<option "" value="181">Réunion</option>
																					<option "" value="182">Romania</option>
																					<option "" value="183">Russian Federation</option>
																					<option "" value="184">Rwanda</option>
																					<option "" value="185">Saint Barthélemy</option>
																					<option "" value="186">Saint Helena, Ascension and Tristan da C</option>
																					<option "" value="187">Saint Kitts and Nevis</option>
																					<option "" value="188">Saint Lucia</option>
																					<option "" value="189">Saint Martin (French part)</option>
																					<option "" value="190">Saint Pierre and Miquelon</option>
																					<option "" value="191">Saint Vincent and the Grenadines</option>
																					<option "" value="192">Samoa</option>
																					<option "" value="193">San Marino</option>
																					<option "" value="194">Sao Tome and Principe</option>
																					<option "" value="195">Saudi Arabia</option>
																					<option "" value="196">Senegal</option>
																					<option "" value="197">Serbia</option>
																					<option "" value="198">Seychelles</option>
																					<option "" value="199">Sierra Leone</option>
																					<option "" value="200">Singapore</option>
																					<option "" value="201">Sint Maarten (Dutch part)</option>
																					<option "" value="202">Slovakia</option>
																					<option "" value="203">Slovenia</option>
																					<option "" value="204">Solomon Islands</option>
																					<option "" value="205">Somalia</option>
																					<option "" value="206">South Africa</option>
																					<option "" value="207">South Georgia and the South Sandwich Isl</option>
																					<option "" value="208">South Sudan</option>
																					<option "" value="209">Spain</option>
																					<option "" value="210">Sri Lanka</option>
																					<option "" value="211">Sudan</option>
																					<option "" value="212">Suriname</option>
																					<option "" value="213">Svalbard and Jan Mayen</option>
																					<option "" value="214">Swaziland</option>
																					<option "" value="215">Sweden</option>
																					<option "" value="216">Switzerland</option>
																					<option "" value="217">Syrian Arab Republic</option>
																					<option "" value="218">Taiwan, Province of China</option>
																					<option "" value="219">Tajikistan</option>
																					<option "" value="220">Tanzania, United Republic of</option>
																					<option "" value="221">Thailand</option>
																					<option "" value="222">Timor-Leste</option>
																					<option "" value="223">Togo</option>
																					<option "" value="224">Tokelau</option>
																					<option "" value="225">Tonga</option>
																					<option "" value="226">Trinidad and Tobago</option>
																					<option "" value="227">Tunisia</option>
																					<option "" value="228">Turkey</option>
																					<option "" value="229">Turkmenistan</option>
																					<option "" value="230">Turks and Caicos Islands</option>
																					<option "" value="231">Tuvalu</option>
																					<option "" value="232">Uganda</option>
																					<option "" value="233">Ukraine</option>
																					<option "" value="234">United Arab Emirates</option>
																					<option "" value="235">United Kingdom</option>
																					<option "" value="236">United States</option>
																					<option "" value="237">United States Minor Outlying Islands</option>
																					<option "" value="238">Uruguay</option>
																					<option "" value="239">Uzbekistan</option>
																					<option "" value="240">Vanuatu</option>
																					<option "" value="241">Venezuela, Bolivarian Republic of</option>
																					<option "" value="242">Viet Nam</option>
																					<option "" value="243">Virgin Islands, British</option>
																					<option "" value="244">Virgin Islands, U.S.</option>
																					<option "" value="245">Wallis and Futuna</option>
																					<option "" value="246">Western Sahara</option>
																					<option "" value="247">Yemen</option>
																					<option "" value="248">Zambia</option>
																					<option "" value="249">Zimbabwe</option>
																			</select> 
								</div>
							</div>
														<div class="col-12 col-sm-12 col-md-12">
									<div class="form-group">
										<select class="form-control custm-input" id="scott_volumn_id" name="scott_volumn_id" required  style="border-radius: 30px;" />
										<option value="">Select Scott Catalogue</option>
																					<option "" value="1">Afghanistan</option>
																					<option "" value="2">Aland Islands</option>
																					<option "" value="3">Albania</option>
																					<option "" value="4">Algeria</option>
																					<option "" value="5">American Samoa</option>
																					<option "" value="6">Andorra</option>
																					<option "" value="7">Angola</option>
																					<option "" value="8">Anguilla</option>
																					<option "" value="9">Antarctica</option>
																					<option "" value="10">Antigua and Barbuda</option>
																					<option "" value="11">Argentina</option>
																					<option "" value="12">Armenia</option>
																					<option "" value="13">Aruba</option>
																					<option "" value="14">Australia</option>
																					<option "" value="15">Austria</option>
																					<option "" value="16">Azerbaijan</option>
																					<option "" value="18">Bahamas</option>
																					<option "" value="17">Bahrain</option>
																					<option "" value="19">Bangladesh</option>
																					<option "" value="20">Barbados</option>
																					<option "" value="21">Belarus</option>
																					<option "" value="22">Belgium</option>
																					<option "" value="23">Belize</option>
																					<option "" value="24">Benin</option>
																					<option "" value="25">Bermuda</option>
																					<option "" value="26">Bhutan</option>
																					<option "" value="27">Bolivia, Plurinational State of</option>
																					<option "" value="28">Bonaire, Sint Eustatius and Saba</option>
																					<option "" value="29">Bosnia and Herzegovina</option>
																					<option "" value="30">Botswana</option>
																					<option "" value="31">Bouvet Island</option>
																					<option "" value="32">Brazil</option>
																					<option "" value="33">British Indian Ocean Territory</option>
																					<option "" value="34">Brunei Darussalam</option>
																					<option "" value="35">Bulgaria</option>
																					<option "" value="36">Burkina Faso</option>
																					<option "" value="37">Burundi</option>
																					<option "" value="38">Cambodia</option>
																					<option "" value="39">Cameroon</option>
																					<option "" value="40">Canada</option>
																					<option "" value="41">Cape Verde</option>
																					<option "" value="42">Cayman Islands</option>
																					<option "" value="43">Central African Republic</option>
																					<option "" value="44">Chad</option>
																					<option "" value="45">Chile</option>
																					<option "" value="46">China</option>
																					<option "" value="47">Christmas Island</option>
																					<option "" value="48">Cocos (Keeling) Islands</option>
																					<option "" value="49">Colombia</option>
																					<option "" value="50">Comoros</option>
																					<option "" value="51">Congo</option>
																					<option "" value="52">Congo, the Democratic Republic of the</option>
																					<option "" value="53">Cook Islands</option>
																					<option "" value="54">Costa Rica</option>
																					<option "" value="55">Côte d'Ivoire</option>
																					<option "" value="56">Croatia</option>
																					<option "" value="57">Cuba</option>
																					<option "" value="58">Curaçao</option>
																					<option "" value="59">Cyprus</option>
																					<option "" value="60">Czech Republic</option>
																					<option "" value="61">Denmark</option>
																					<option "" value="62">Djibouti</option>
																					<option "" value="63">Dominica</option>
																					<option "" value="64">Dominican Republic</option>
																					<option "" value="65">Ecuador</option>
																					<option "" value="66">Egypt</option>
																					<option "" value="67">El Salvador</option>
																					<option "" value="68">Equatorial Guinea</option>
																					<option "" value="69">Eritrea</option>
																					<option "" value="70">Estonia</option>
																					<option "" value="71">Ethiopia</option>
																					<option "" value="72">Falkland Islands (Malvinas)</option>
																					<option "" value="73">Faroe Islands</option>
																					<option "" value="74">Fiji</option>
																					<option "" value="75">Finland</option>
																					<option "" value="76">France</option>
																					<option "" value="77">French Guiana</option>
																					<option "" value="78">French Polynesia</option>
																					<option "" value="79">French Southern Territories</option>
																					<option "" value="80">Gabon</option>
																					<option "" value="81">Gambia</option>
																					<option "" value="82">Georgia</option>
																					<option "" value="83">Germany</option>
																					<option "" value="84">Ghana</option>
																					<option "" value="85">Gibraltar</option>
																					<option "" value="86">Greece</option>
																					<option "" value="87">Greenland</option>
																					<option "" value="88">Grenada</option>
																					<option "" value="89">Guadeloupe</option>
																					<option "" value="90">Guam</option>
																					<option "" value="91">Guatemala</option>
																					<option "" value="92">Guernsey</option>
																					<option "" value="93">Guinea</option>
																					<option "" value="94">Guinea-Bissau</option>
																					<option "" value="95">Guyana</option>
																					<option "" value="96">Haiti</option>
																					<option "" value="97">Heard Island and McDonald Islands</option>
																					<option "" value="98">Holy See (Vatican City State)</option>
																					<option "" value="99">Honduras</option>
																					<option "" value="100">Hong Kong</option>
																					<option "" value="101">Hungary</option>
																					<option "" value="102">Iceland</option>
																					<option "" value="103">India</option>
																					<option "" value="104">Indonesia</option>
																					<option "" value="105">Iran, Islamic Republic of</option>
																					<option "" value="106">Iraq</option>
																					<option "" value="107">Ireland</option>
																					<option "" value="108">Isle of Man</option>
																					<option "" value="109">Israel</option>
																					<option "" value="110">Italy</option>
																					<option "" value="111">Jamaica</option>
																					<option "" value="112">Japan</option>
																					<option "" value="113">Jersey</option>
																					<option "" value="114">Jordan</option>
																					<option "" value="115">Kazakhstan</option>
																					<option "" value="116">Kenya</option>
																					<option "" value="117">Kiribati</option>
																					<option "" value="118">Korea, Democratic People's Republic of</option>
																					<option "" value="119">Korea, Republic of</option>
																					<option "" value="120">Kuwait</option>
																					<option "" value="121">Kyrgyzstan</option>
																					<option "" value="122">Lao People's Democratic Republic</option>
																					<option "" value="123">Latvia</option>
																					<option "" value="124">Lebanon</option>
																					<option "" value="125">Lesotho</option>
																					<option "" value="126">Liberia</option>
																					<option "" value="127">Libya</option>
																					<option "" value="128">Liechtenstein</option>
																					<option "" value="129">Lithuania</option>
																					<option "" value="130">Luxembourg</option>
																					<option "" value="131">Macao</option>
																					<option "" value="132">Macedonia, the Former Yugoslav Republic </option>
																					<option "" value="133">Madagascar</option>
																					<option "" value="134">Malawi</option>
																					<option "" value="135">Malaysia</option>
																					<option "" value="136">Maldives</option>
																					<option "" value="137">Mali</option>
																					<option "" value="138">Malta</option>
																					<option "" value="139">Marshall Islands</option>
																					<option "" value="140">Martinique</option>
																					<option "" value="141">Mauritania</option>
																					<option "" value="142">Mauritius</option>
																					<option "" value="143">Mayotte</option>
																					<option "" value="144">Mexico</option>
																					<option "" value="145">Micronesia, Federated States of</option>
																					<option "" value="146">Moldova, Republic of</option>
																					<option "" value="147">Monaco</option>
																					<option "" value="148">Mongolia</option>
																					<option "" value="149">Montenegro</option>
																					<option "" value="150">Montserrat</option>
																					<option "" value="151">Morocco</option>
																					<option "" value="152">Mozambique</option>
																					<option "" value="153">Myanmar</option>
																					<option "" value="154">Namibia</option>
																					<option "" value="155">Nauru</option>
																					<option "" value="156">Nepal</option>
																					<option "" value="157">Netherlands</option>
																					<option "" value="158">New Caledonia</option>
																					<option "" value="159">New Zealand</option>
																					<option "" value="160">Nicaragua</option>
																					<option "" value="161">Niger</option>
																					<option "" value="162">Nigeria</option>
																					<option "" value="163">Niue</option>
																					<option "" value="164">Norfolk Island</option>
																					<option "" value="165">Northern Mariana Islands</option>
																					<option "" value="166">Norway</option>
																					<option "" value="167">Oman</option>
																					<option "" value="168">Pakistan</option>
																					<option "" value="169">Palau</option>
																					<option "" value="170">Palestine, State of</option>
																					<option "" value="171">Panama</option>
																					<option "" value="172">Papua New Guinea</option>
																					<option "" value="173">Paraguay</option>
																					<option "" value="174">Peru</option>
																					<option "" value="175">Philippines</option>
																					<option "" value="176">Pitcairn</option>
																					<option "" value="177">Poland</option>
																					<option "" value="178">Portugal</option>
																					<option "" value="179">Puerto Rico</option>
																					<option "" value="180">Qatar</option>
																					<option "" value="181">Réunion</option>
																					<option "" value="182">Romania</option>
																					<option "" value="183">Russian Federation</option>
																					<option "" value="184">Rwanda</option>
																					<option "" value="185">Saint Barthélemy</option>
																					<option "" value="186">Saint Helena, Ascension and Tristan da C</option>
																					<option "" value="187">Saint Kitts and Nevis</option>
																					<option "" value="188">Saint Lucia</option>
																					<option "" value="189">Saint Martin (French part)</option>
																					<option "" value="190">Saint Pierre and Miquelon</option>
																					<option "" value="191">Saint Vincent and the Grenadines</option>
																					<option "" value="192">Samoa</option>
																					<option "" value="193">San Marino</option>
																					<option "" value="194">Sao Tome and Principe</option>
																					<option "" value="195">Saudi Arabia</option>
																					<option "" value="196">Senegal</option>
																					<option "" value="197">Serbia</option>
																					<option "" value="198">Seychelles</option>
																					<option "" value="199">Sierra Leone</option>
																					<option "" value="200">Singapore</option>
																					<option "" value="201">Sint Maarten (Dutch part)</option>
																					<option "" value="202">Slovakia</option>
																					<option "" value="203">Slovenia</option>
																					<option "" value="204">Solomon Islands</option>
																					<option "" value="205">Somalia</option>
																					<option "" value="206">South Africa</option>
																					<option "" value="207">South Georgia and the South Sandwich Isl</option>
																					<option "" value="208">South Sudan</option>
																					<option "" value="209">Spain</option>
																					<option "" value="210">Sri Lanka</option>
																					<option "" value="211">Sudan</option>
																					<option "" value="212">Suriname</option>
																					<option "" value="213">Svalbard and Jan Mayen</option>
																					<option "" value="214">Swaziland</option>
																					<option "" value="215">Sweden</option>
																					<option "" value="216">Switzerland</option>
																					<option "" value="217">Syrian Arab Republic</option>
																					<option "" value="218">Taiwan, Province of China</option>
																					<option "" value="219">Tajikistan</option>
																					<option "" value="220">Tanzania, United Republic of</option>
																					<option "" value="221">Thailand</option>
																					<option "" value="222">Timor-Leste</option>
																					<option "" value="223">Togo</option>
																					<option "" value="224">Tokelau</option>
																					<option "" value="225">Tonga</option>
																					<option "" value="226">Trinidad and Tobago</option>
																					<option "" value="227">Tunisia</option>
																					<option "" value="228">Turkey</option>
																					<option "" value="229">Turkmenistan</option>
																					<option "" value="230">Turks and Caicos Islands</option>
																					<option "" value="231">Tuvalu</option>
																					<option "" value="232">Uganda</option>
																					<option "" value="233">Ukraine</option>
																					<option "" value="234">United Arab Emirates</option>
																					<option "" value="235">United Kingdom</option>
																					<option "" value="236">United States</option>
																					<option "" value="237">United States Minor Outlying Islands</option>
																					<option "" value="238">Uruguay</option>
																					<option "" value="239">Uzbekistan</option>
																					<option "" value="240">Vanuatu</option>
																					<option "" value="241">Venezuela, Bolivarian Republic of</option>
																					<option "" value="242">Viet Nam</option>
																					<option "" value="243">Virgin Islands, British</option>
																					<option "" value="244">Virgin Islands, U.S.</option>
																					<option "" value="245">Wallis and Futuna</option>
																					<option "" value="246">Western Sahara</option>
																					<option "" value="247">Yemen</option>
																					<option "" value="248">Zambia</option>
																					<option "" value="249">Zimbabwe</option>
																				
										
									</select> 
								</div>
							</div>								
														<div class="col-12 col-sm-12 col-md-12">
									<div class="form-group">
										<select class="form-control custm-input" id="ref_michal_cat_id" name="ref_michal_cat_id" required  style="border-radius: 30px;" />
										<option value="">Select Michal Catalogue</option>
																					<option "" value="1">Afghanistan</option>
																					<option "" value="2">Aland Islands</option>
																					<option "" value="3">Albania</option>
																					<option "" value="4">Algeria</option>
																					<option "" value="5">American Samoa</option>
																					<option "" value="6">Andorra</option>
																					<option "" value="7">Angola</option>
																					<option "" value="8">Anguilla</option>
																					<option "" value="9">Antarctica</option>
																					<option "" value="10">Antigua and Barbuda</option>
																					<option "" value="11">Argentina</option>
																					<option "" value="12">Armenia</option>
																					<option "" value="13">Aruba</option>
																					<option "" value="14">Australia</option>
																					<option "" value="15">Austria</option>
																					<option "" value="16">Azerbaijan</option>
																					<option "" value="18">Bahamas</option>
																					<option "" value="17">Bahrain</option>
																					<option "" value="19">Bangladesh</option>
																					<option "" value="20">Barbados</option>
																					<option "" value="21">Belarus</option>
																					<option "" value="22">Belgium</option>
																					<option "" value="23">Belize</option>
																					<option "" value="24">Benin</option>
																					<option "" value="25">Bermuda</option>
																					<option "" value="26">Bhutan</option>
																					<option "" value="27">Bolivia, Plurinational State of</option>
																					<option "" value="28">Bonaire, Sint Eustatius and Saba</option>
																					<option "" value="29">Bosnia and Herzegovina</option>
																					<option "" value="30">Botswana</option>
																					<option "" value="31">Bouvet Island</option>
																					<option "" value="32">Brazil</option>
																					<option "" value="33">British Indian Ocean Territory</option>
																					<option "" value="34">Brunei Darussalam</option>
																					<option "" value="35">Bulgaria</option>
																					<option "" value="36">Burkina Faso</option>
																					<option "" value="37">Burundi</option>
																					<option "" value="38">Cambodia</option>
																					<option "" value="39">Cameroon</option>
																					<option "" value="40">Canada</option>
																					<option "" value="41">Cape Verde</option>
																					<option "" value="42">Cayman Islands</option>
																					<option "" value="43">Central African Republic</option>
																					<option "" value="44">Chad</option>
																					<option "" value="45">Chile</option>
																					<option "" value="46">China</option>
																					<option "" value="47">Christmas Island</option>
																					<option "" value="48">Cocos (Keeling) Islands</option>
																					<option "" value="49">Colombia</option>
																					<option "" value="50">Comoros</option>
																					<option "" value="51">Congo</option>
																					<option "" value="52">Congo, the Democratic Republic of the</option>
																					<option "" value="53">Cook Islands</option>
																					<option "" value="54">Costa Rica</option>
																					<option "" value="55">Côte d'Ivoire</option>
																					<option "" value="56">Croatia</option>
																					<option "" value="57">Cuba</option>
																					<option "" value="58">Curaçao</option>
																					<option "" value="59">Cyprus</option>
																					<option "" value="60">Czech Republic</option>
																					<option "" value="61">Denmark</option>
																					<option "" value="62">Djibouti</option>
																					<option "" value="63">Dominica</option>
																					<option "" value="64">Dominican Republic</option>
																					<option "" value="65">Ecuador</option>
																					<option "" value="66">Egypt</option>
																					<option "" value="67">El Salvador</option>
																					<option "" value="68">Equatorial Guinea</option>
																					<option "" value="69">Eritrea</option>
																					<option "" value="70">Estonia</option>
																					<option "" value="71">Ethiopia</option>
																					<option "" value="72">Falkland Islands (Malvinas)</option>
																					<option "" value="73">Faroe Islands</option>
																					<option "" value="74">Fiji</option>
																					<option "" value="75">Finland</option>
																					<option "" value="76">France</option>
																					<option "" value="77">French Guiana</option>
																					<option "" value="78">French Polynesia</option>
																					<option "" value="79">French Southern Territories</option>
																					<option "" value="80">Gabon</option>
																					<option "" value="81">Gambia</option>
																					<option "" value="82">Georgia</option>
																					<option "" value="83">Germany</option>
																					<option "" value="84">Ghana</option>
																					<option "" value="85">Gibraltar</option>
																					<option "" value="86">Greece</option>
																					<option "" value="87">Greenland</option>
																					<option "" value="88">Grenada</option>
																					<option "" value="89">Guadeloupe</option>
																					<option "" value="90">Guam</option>
																					<option "" value="91">Guatemala</option>
																					<option "" value="92">Guernsey</option>
																					<option "" value="93">Guinea</option>
																					<option "" value="94">Guinea-Bissau</option>
																					<option "" value="95">Guyana</option>
																					<option "" value="96">Haiti</option>
																					<option "" value="97">Heard Island and McDonald Islands</option>
																					<option "" value="98">Holy See (Vatican City State)</option>
																					<option "" value="99">Honduras</option>
																					<option "" value="100">Hong Kong</option>
																					<option "" value="101">Hungary</option>
																					<option "" value="102">Iceland</option>
																					<option "" value="103">India</option>
																					<option "" value="104">Indonesia</option>
																					<option "" value="105">Iran, Islamic Republic of</option>
																					<option "" value="106">Iraq</option>
																					<option "" value="107">Ireland</option>
																					<option "" value="108">Isle of Man</option>
																					<option "" value="109">Israel</option>
																					<option "" value="110">Italy</option>
																					<option "" value="111">Jamaica</option>
																					<option "" value="112">Japan</option>
																					<option "" value="113">Jersey</option>
																					<option "" value="114">Jordan</option>
																					<option "" value="115">Kazakhstan</option>
																					<option "" value="116">Kenya</option>
																					<option "" value="117">Kiribati</option>
																					<option "" value="118">Korea, Democratic People's Republic of</option>
																					<option "" value="119">Korea, Republic of</option>
																					<option "" value="120">Kuwait</option>
																					<option "" value="121">Kyrgyzstan</option>
																					<option "" value="122">Lao People's Democratic Republic</option>
																					<option "" value="123">Latvia</option>
																					<option "" value="124">Lebanon</option>
																					<option "" value="125">Lesotho</option>
																					<option "" value="126">Liberia</option>
																					<option "" value="127">Libya</option>
																					<option "" value="128">Liechtenstein</option>
																					<option "" value="129">Lithuania</option>
																					<option "" value="130">Luxembourg</option>
																					<option "" value="131">Macao</option>
																					<option "" value="132">Macedonia, the Former Yugoslav Republic </option>
																					<option "" value="133">Madagascar</option>
																					<option "" value="134">Malawi</option>
																					<option "" value="135">Malaysia</option>
																					<option "" value="136">Maldives</option>
																					<option "" value="137">Mali</option>
																					<option "" value="138">Malta</option>
																					<option "" value="139">Marshall Islands</option>
																					<option "" value="140">Martinique</option>
																					<option "" value="141">Mauritania</option>
																					<option "" value="142">Mauritius</option>
																					<option "" value="143">Mayotte</option>
																					<option "" value="144">Mexico</option>
																					<option "" value="145">Micronesia, Federated States of</option>
																					<option "" value="146">Moldova, Republic of</option>
																					<option "" value="147">Monaco</option>
																					<option "" value="148">Mongolia</option>
																					<option "" value="149">Montenegro</option>
																					<option "" value="150">Montserrat</option>
																					<option "" value="151">Morocco</option>
																					<option "" value="152">Mozambique</option>
																					<option "" value="153">Myanmar</option>
																					<option "" value="154">Namibia</option>
																					<option "" value="155">Nauru</option>
																					<option "" value="156">Nepal</option>
																					<option "" value="157">Netherlands</option>
																					<option "" value="158">New Caledonia</option>
																					<option "" value="159">New Zealand</option>
																					<option "" value="160">Nicaragua</option>
																					<option "" value="161">Niger</option>
																					<option "" value="162">Nigeria</option>
																					<option "" value="163">Niue</option>
																					<option "" value="164">Norfolk Island</option>
																					<option "" value="165">Northern Mariana Islands</option>
																					<option "" value="166">Norway</option>
																					<option "" value="167">Oman</option>
																					<option "" value="168">Pakistan</option>
																					<option "" value="169">Palau</option>
																					<option "" value="170">Palestine, State of</option>
																					<option "" value="171">Panama</option>
																					<option "" value="172">Papua New Guinea</option>
																					<option "" value="173">Paraguay</option>
																					<option "" value="174">Peru</option>
																					<option "" value="175">Philippines</option>
																					<option "" value="176">Pitcairn</option>
																					<option "" value="177">Poland</option>
																					<option "" value="178">Portugal</option>
																					<option "" value="179">Puerto Rico</option>
																					<option "" value="180">Qatar</option>
																					<option "" value="181">Réunion</option>
																					<option "" value="182">Romania</option>
																					<option "" value="183">Russian Federation</option>
																					<option "" value="184">Rwanda</option>
																					<option "" value="185">Saint Barthélemy</option>
																					<option "" value="186">Saint Helena, Ascension and Tristan da C</option>
																					<option "" value="187">Saint Kitts and Nevis</option>
																					<option "" value="188">Saint Lucia</option>
																					<option "" value="189">Saint Martin (French part)</option>
																					<option "" value="190">Saint Pierre and Miquelon</option>
																					<option "" value="191">Saint Vincent and the Grenadines</option>
																					<option "" value="192">Samoa</option>
																					<option "" value="193">San Marino</option>
																					<option "" value="194">Sao Tome and Principe</option>
																					<option "" value="195">Saudi Arabia</option>
																					<option "" value="196">Senegal</option>
																					<option "" value="197">Serbia</option>
																					<option "" value="198">Seychelles</option>
																					<option "" value="199">Sierra Leone</option>
																					<option "" value="200">Singapore</option>
																					<option "" value="201">Sint Maarten (Dutch part)</option>
																					<option "" value="202">Slovakia</option>
																					<option "" value="203">Slovenia</option>
																					<option "" value="204">Solomon Islands</option>
																					<option "" value="205">Somalia</option>
																					<option "" value="206">South Africa</option>
																					<option "" value="207">South Georgia and the South Sandwich Isl</option>
																					<option "" value="208">South Sudan</option>
																					<option "" value="209">Spain</option>
																					<option "" value="210">Sri Lanka</option>
																					<option "" value="211">Sudan</option>
																					<option "" value="212">Suriname</option>
																					<option "" value="213">Svalbard and Jan Mayen</option>
																					<option "" value="214">Swaziland</option>
																					<option "" value="215">Sweden</option>
																					<option "" value="216">Switzerland</option>
																					<option "" value="217">Syrian Arab Republic</option>
																					<option "" value="218">Taiwan, Province of China</option>
																					<option "" value="219">Tajikistan</option>
																					<option "" value="220">Tanzania, United Republic of</option>
																					<option "" value="221">Thailand</option>
																					<option "" value="222">Timor-Leste</option>
																					<option "" value="223">Togo</option>
																					<option "" value="224">Tokelau</option>
																					<option "" value="225">Tonga</option>
																					<option "" value="226">Trinidad and Tobago</option>
																					<option "" value="227">Tunisia</option>
																					<option "" value="228">Turkey</option>
																					<option "" value="229">Turkmenistan</option>
																					<option "" value="230">Turks and Caicos Islands</option>
																					<option "" value="231">Tuvalu</option>
																					<option "" value="232">Uganda</option>
																					<option "" value="233">Ukraine</option>
																					<option "" value="234">United Arab Emirates</option>
																					<option "" value="235">United Kingdom</option>
																					<option "" value="236">United States</option>
																					<option "" value="237">United States Minor Outlying Islands</option>
																					<option "" value="238">Uruguay</option>
																					<option "" value="239">Uzbekistan</option>
																					<option "" value="240">Vanuatu</option>
																					<option "" value="241">Venezuela, Bolivarian Republic of</option>
																					<option "" value="242">Viet Nam</option>
																					<option "" value="243">Virgin Islands, British</option>
																					<option "" value="244">Virgin Islands, U.S.</option>
																					<option "" value="245">Wallis and Futuna</option>
																					<option "" value="246">Western Sahara</option>
																					<option "" value="247">Yemen</option>
																					<option "" value="248">Zambia</option>
																					<option "" value="249">Zimbabwe</option>
																			</select> 
								</div>
							</div>
							<div class="dj-space">&nbsp;</div>
							<div class="dj-space">&nbsp;</div>
							<div class="col-12 col-sm-12 col-md-12">
									 <h5>  <img src="assets/site/main/images/coins.png">  &nbsp;Item Coin(s)</h5>				
							</div>
														<div class="col-12 col-sm-12 col-md-12">
									<div class="form-group">
										<select class="form-control custm-input" id="item_country_id" name="item_country_id" required  style="border-radius: 30px;" />
										<option value="">Select Country</option>
																					<option "" value="1">Afghanistan</option>
																					<option "" value="2">Aland Islands</option>
																					<option "" value="3">Albania</option>
																					<option "" value="4">Algeria</option>
																					<option "" value="5">American Samoa</option>
																					<option "" value="6">Andorra</option>
																					<option "" value="7">Angola</option>
																					<option "" value="8">Anguilla</option>
																					<option "" value="9">Antarctica</option>
																					<option "" value="10">Antigua and Barbuda</option>
																					<option "" value="11">Argentina</option>
																					<option "" value="12">Armenia</option>
																					<option "" value="13">Aruba</option>
																					<option "" value="14">Australia</option>
																					<option "" value="15">Austria</option>
																					<option "" value="16">Azerbaijan</option>
																					<option "" value="18">Bahamas</option>
																					<option "" value="17">Bahrain</option>
																					<option "" value="19">Bangladesh</option>
																					<option "" value="20">Barbados</option>
																					<option "" value="21">Belarus</option>
																					<option "" value="22">Belgium</option>
																					<option "" value="23">Belize</option>
																					<option "" value="24">Benin</option>
																					<option "" value="25">Bermuda</option>
																					<option "" value="26">Bhutan</option>
																					<option "" value="27">Bolivia, Plurinational State of</option>
																					<option "" value="28">Bonaire, Sint Eustatius and Saba</option>
																					<option "" value="29">Bosnia and Herzegovina</option>
																					<option "" value="30">Botswana</option>
																					<option "" value="31">Bouvet Island</option>
																					<option "" value="32">Brazil</option>
																					<option "" value="33">British Indian Ocean Territory</option>
																					<option "" value="34">Brunei Darussalam</option>
																					<option "" value="35">Bulgaria</option>
																					<option "" value="36">Burkina Faso</option>
																					<option "" value="37">Burundi</option>
																					<option "" value="38">Cambodia</option>
																					<option "" value="39">Cameroon</option>
																					<option "" value="40">Canada</option>
																					<option "" value="41">Cape Verde</option>
																					<option "" value="42">Cayman Islands</option>
																					<option "" value="43">Central African Republic</option>
																					<option "" value="44">Chad</option>
																					<option "" value="45">Chile</option>
																					<option "" value="46">China</option>
																					<option "" value="47">Christmas Island</option>
																					<option "" value="48">Cocos (Keeling) Islands</option>
																					<option "" value="49">Colombia</option>
																					<option "" value="50">Comoros</option>
																					<option "" value="51">Congo</option>
																					<option "" value="52">Congo, the Democratic Republic of the</option>
																					<option "" value="53">Cook Islands</option>
																					<option "" value="54">Costa Rica</option>
																					<option "" value="55">Côte d'Ivoire</option>
																					<option "" value="56">Croatia</option>
																					<option "" value="57">Cuba</option>
																					<option "" value="58">Curaçao</option>
																					<option "" value="59">Cyprus</option>
																					<option "" value="60">Czech Republic</option>
																					<option "" value="61">Denmark</option>
																					<option "" value="62">Djibouti</option>
																					<option "" value="63">Dominica</option>
																					<option "" value="64">Dominican Republic</option>
																					<option "" value="65">Ecuador</option>
																					<option "" value="66">Egypt</option>
																					<option "" value="67">El Salvador</option>
																					<option "" value="68">Equatorial Guinea</option>
																					<option "" value="69">Eritrea</option>
																					<option "" value="70">Estonia</option>
																					<option "" value="71">Ethiopia</option>
																					<option "" value="72">Falkland Islands (Malvinas)</option>
																					<option "" value="73">Faroe Islands</option>
																					<option "" value="74">Fiji</option>
																					<option "" value="75">Finland</option>
																					<option "" value="76">France</option>
																					<option "" value="77">French Guiana</option>
																					<option "" value="78">French Polynesia</option>
																					<option "" value="79">French Southern Territories</option>
																					<option "" value="80">Gabon</option>
																					<option "" value="81">Gambia</option>
																					<option "" value="82">Georgia</option>
																					<option "" value="83">Germany</option>
																					<option "" value="84">Ghana</option>
																					<option "" value="85">Gibraltar</option>
																					<option "" value="86">Greece</option>
																					<option "" value="87">Greenland</option>
																					<option "" value="88">Grenada</option>
																					<option "" value="89">Guadeloupe</option>
																					<option "" value="90">Guam</option>
																					<option "" value="91">Guatemala</option>
																					<option "" value="92">Guernsey</option>
																					<option "" value="93">Guinea</option>
																					<option "" value="94">Guinea-Bissau</option>
																					<option "" value="95">Guyana</option>
																					<option "" value="96">Haiti</option>
																					<option "" value="97">Heard Island and McDonald Islands</option>
																					<option "" value="98">Holy See (Vatican City State)</option>
																					<option "" value="99">Honduras</option>
																					<option "" value="100">Hong Kong</option>
																					<option "" value="101">Hungary</option>
																					<option "" value="102">Iceland</option>
																					<option "" value="103">India</option>
																					<option "" value="104">Indonesia</option>
																					<option "" value="105">Iran, Islamic Republic of</option>
																					<option "" value="106">Iraq</option>
																					<option "" value="107">Ireland</option>
																					<option "" value="108">Isle of Man</option>
																					<option "" value="109">Israel</option>
																					<option "" value="110">Italy</option>
																					<option "" value="111">Jamaica</option>
																					<option "" value="112">Japan</option>
																					<option "" value="113">Jersey</option>
																					<option "" value="114">Jordan</option>
																					<option "" value="115">Kazakhstan</option>
																					<option "" value="116">Kenya</option>
																					<option "" value="117">Kiribati</option>
																					<option "" value="118">Korea, Democratic People's Republic of</option>
																					<option "" value="119">Korea, Republic of</option>
																					<option "" value="120">Kuwait</option>
																					<option "" value="121">Kyrgyzstan</option>
																					<option "" value="122">Lao People's Democratic Republic</option>
																					<option "" value="123">Latvia</option>
																					<option "" value="124">Lebanon</option>
																					<option "" value="125">Lesotho</option>
																					<option "" value="126">Liberia</option>
																					<option "" value="127">Libya</option>
																					<option "" value="128">Liechtenstein</option>
																					<option "" value="129">Lithuania</option>
																					<option "" value="130">Luxembourg</option>
																					<option "" value="131">Macao</option>
																					<option "" value="132">Macedonia, the Former Yugoslav Republic </option>
																					<option "" value="133">Madagascar</option>
																					<option "" value="134">Malawi</option>
																					<option "" value="135">Malaysia</option>
																					<option "" value="136">Maldives</option>
																					<option "" value="137">Mali</option>
																					<option "" value="138">Malta</option>
																					<option "" value="139">Marshall Islands</option>
																					<option "" value="140">Martinique</option>
																					<option "" value="141">Mauritania</option>
																					<option "" value="142">Mauritius</option>
																					<option "" value="143">Mayotte</option>
																					<option "" value="144">Mexico</option>
																					<option "" value="145">Micronesia, Federated States of</option>
																					<option "" value="146">Moldova, Republic of</option>
																					<option "" value="147">Monaco</option>
																					<option "" value="148">Mongolia</option>
																					<option "" value="149">Montenegro</option>
																					<option "" value="150">Montserrat</option>
																					<option "" value="151">Morocco</option>
																					<option "" value="152">Mozambique</option>
																					<option "" value="153">Myanmar</option>
																					<option "" value="154">Namibia</option>
																					<option "" value="155">Nauru</option>
																					<option "" value="156">Nepal</option>
																					<option "" value="157">Netherlands</option>
																					<option "" value="158">New Caledonia</option>
																					<option "" value="159">New Zealand</option>
																					<option "" value="160">Nicaragua</option>
																					<option "" value="161">Niger</option>
																					<option "" value="162">Nigeria</option>
																					<option "" value="163">Niue</option>
																					<option "" value="164">Norfolk Island</option>
																					<option "" value="165">Northern Mariana Islands</option>
																					<option "" value="166">Norway</option>
																					<option "" value="167">Oman</option>
																					<option "" value="168">Pakistan</option>
																					<option "" value="169">Palau</option>
																					<option "" value="170">Palestine, State of</option>
																					<option "" value="171">Panama</option>
																					<option "" value="172">Papua New Guinea</option>
																					<option "" value="173">Paraguay</option>
																					<option "" value="174">Peru</option>
																					<option "" value="175">Philippines</option>
																					<option "" value="176">Pitcairn</option>
																					<option "" value="177">Poland</option>
																					<option "" value="178">Portugal</option>
																					<option "" value="179">Puerto Rico</option>
																					<option "" value="180">Qatar</option>
																					<option "" value="181">Réunion</option>
																					<option "" value="182">Romania</option>
																					<option "" value="183">Russian Federation</option>
																					<option "" value="184">Rwanda</option>
																					<option "" value="185">Saint Barthélemy</option>
																					<option "" value="186">Saint Helena, Ascension and Tristan da C</option>
																					<option "" value="187">Saint Kitts and Nevis</option>
																					<option "" value="188">Saint Lucia</option>
																					<option "" value="189">Saint Martin (French part)</option>
																					<option "" value="190">Saint Pierre and Miquelon</option>
																					<option "" value="191">Saint Vincent and the Grenadines</option>
																					<option "" value="192">Samoa</option>
																					<option "" value="193">San Marino</option>
																					<option "" value="194">Sao Tome and Principe</option>
																					<option "" value="195">Saudi Arabia</option>
																					<option "" value="196">Senegal</option>
																					<option "" value="197">Serbia</option>
																					<option "" value="198">Seychelles</option>
																					<option "" value="199">Sierra Leone</option>
																					<option "" value="200">Singapore</option>
																					<option "" value="201">Sint Maarten (Dutch part)</option>
																					<option "" value="202">Slovakia</option>
																					<option "" value="203">Slovenia</option>
																					<option "" value="204">Solomon Islands</option>
																					<option "" value="205">Somalia</option>
																					<option "" value="206">South Africa</option>
																					<option "" value="207">South Georgia and the South Sandwich Isl</option>
																					<option "" value="208">South Sudan</option>
																					<option "" value="209">Spain</option>
																					<option "" value="210">Sri Lanka</option>
																					<option "" value="211">Sudan</option>
																					<option "" value="212">Suriname</option>
																					<option "" value="213">Svalbard and Jan Mayen</option>
																					<option "" value="214">Swaziland</option>
																					<option "" value="215">Sweden</option>
																					<option "" value="216">Switzerland</option>
																					<option "" value="217">Syrian Arab Republic</option>
																					<option "" value="218">Taiwan, Province of China</option>
																					<option "" value="219">Tajikistan</option>
																					<option "" value="220">Tanzania, United Republic of</option>
																					<option "" value="221">Thailand</option>
																					<option "" value="222">Timor-Leste</option>
																					<option "" value="223">Togo</option>
																					<option "" value="224">Tokelau</option>
																					<option "" value="225">Tonga</option>
																					<option "" value="226">Trinidad and Tobago</option>
																					<option "" value="227">Tunisia</option>
																					<option "" value="228">Turkey</option>
																					<option "" value="229">Turkmenistan</option>
																					<option "" value="230">Turks and Caicos Islands</option>
																					<option "" value="231">Tuvalu</option>
																					<option "" value="232">Uganda</option>
																					<option "" value="233">Ukraine</option>
																					<option "" value="234">United Arab Emirates</option>
																					<option "" value="235">United Kingdom</option>
																					<option "" value="236">United States</option>
																					<option "" value="237">United States Minor Outlying Islands</option>
																					<option "" value="238">Uruguay</option>
																					<option "" value="239">Uzbekistan</option>
																					<option "" value="240">Vanuatu</option>
																					<option "" value="241">Venezuela, Bolivarian Republic of</option>
																					<option "" value="242">Viet Nam</option>
																					<option "" value="243">Virgin Islands, British</option>
																					<option "" value="244">Virgin Islands, U.S.</option>
																					<option "" value="245">Wallis and Futuna</option>
																					<option "" value="246">Western Sahara</option>
																					<option "" value="247">Yemen</option>
																					<option "" value="248">Zambia</option>
																					<option "" value="249">Zimbabwe</option>
																			</select> 
								</div>
							</div>
																<div class="col-12 col-sm-12 col-md-12">
										<div class="form-group">
											<select class="form-control custm-input" id="ref_krause_id" name="ref_krause_id" required  style="border-radius: 30px;" />
											<option value="">Select Krause Catalogue</option>
																							<option "" value="8">Alluminium</option>
																							<option "" value="7">Brass, Cu/Zn, copper/zinc</option>
																							<option "" value="5">Bronze</option>
																							<option "" value="6">Copper</option>
																							<option "" value="1">Gold</option>
																							<option "" value="4">Nickel          </option>
																							<option "" value="2">Platina           </option>
																							<option "" value="3">Silver          </option>
																							<option "" value="9">Zinc</option>
																						
											
										</select> 
									</div>
								</div>
								<div class="dj-space">&nbsp;</div>
								<div class="dj-space">&nbsp;</div>		
							<div class="col-12 col-sm-12 col-md-12">
								<div class="form-group">
											<textarea  class="form-control custm-input" id="miscellaneous" name="miscellaneous" rows="4" cols="50" required placeholder="Miscellaneous" style="border-radius: 30px;height: 60px;"></textarea>
								</div>
							</div>						
							<div class="col-12 col-sm-12 col-md-12">
								<div class="form-group cutum-check">
									<input type="checkbox" id="accept" value="1" name="term_condition"  required>
									<label for="accept"><span class="custm-radio-label">Accept terms & conditions of 48hrs  :</span></label>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="Submit" class="btn-subs-custm form-control" value="Submit" style="width: 32%; border-radius: 30px;">
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-12 col-sm-3 col-md-3 pr-md-0 ">
			<!-- tata sky add -->
<!--								<div class="advertise">-->
<!--						<img src="assets/site/main/advertise/1569845067_secondad.png" alt="Solution of Outstanding results" />-->
<!--					</div>-->
								<!-- tata sky add -->
		</div>
	</div>
</div>
</div>	
<script type="text/javascript" src="assets/site/main/js/sha.js"></script>
<script type="text/javascript">
	function RestrictSpace() 
	{
		if (event.keyCode == 32) 
		{
			event.returnValue = false;
			return false;
		}
	}
	
	function validatePassword() 
	{
		var user_password = document.getElementById("user_password").value;
		var confirmPassword = document.getElementById("cpassword").value;
		if((user_password == '') && (confirmPassword ==''))
		{
			
			("#user_password").val('');
			("#cpassword").val('');
			return false;
		}
		var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,50}$/;
		
		/*if (!regex.test(user_password)) {
			alert("Password field must be at least one lowercase letter,one Upperase, one number,one special character and minium length 8 character.");
			return false;
		}*/
		var confirmPassword = document.getElementById("cpassword").value;
		if (user_password != confirmPassword) {
			alert("Choose Password and Confirm Password did not match. Please try again");
			return false;
		}
		
		var secret = $('#user_password').val();
		var shaObj = new jsSHA("SHA-1", "TEXT");
		shaObj.update(secret);   
		var hash = shaObj.getHash("HEX");
		$('#user_password').val(hash);	
		
		var secret1 = $('#cpassword').val();
		var shaObj1 = new jsSHA("SHA-1", "TEXT");
		shaObj1.update(secret1);   
		var hash1 = shaObj1.getHash("HEX");
		$('#cpassword').val(hash1);	
		
		return true;
		
	}
	
	$(function() {
		$('#email').on('keypress', function(e) {
			if (e.which == 32)
			return false;
		});
	});
	$(document).ready(function () {
		//called when key is pressed in textbox
		$(".numberOnly").keypress(function (e) {
			
			//if the letter is not digit then display error and don't type anything
			if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				//display error message
				//$("#errmsg").html("Digits Only").show().fadeOut("slow");
				return false;
			}
		});
		
	});
	function validation()
	{
		if($('input[type=radio][name=gender]:checked').length == 0)
		{
			$('input[type=radio]').css('border-color','green');
			alert("Please select gender");
			return false;
		}
		if($('input[type=radio][name=user_type]:checked').length == 0)
		{
			alert("Please select Register as Buyer,Seller and Both");
			return false;
		}
		if($('input[type=checkbox][name=term_condition]:checked').length == 0)
		{
			alert("Please accept terms & conditions of 48hrs  :");
			return false;
		}
		return true;
		
	}
	
	</script>	
<footer>
	<div class="container">
		<div class="row foot-bg">
			<div class="col-sm-12 col-md-12 col-lg-3">
				<div class="48-img"><img src="assets/site/main/images/48.jpg" alt="48-logo" class="img-fluid"></div>
				<ul class="address-details">
					<li><span class="font-icon"><i class="fa fa-map-marker"></i></span>0123  Main Road, New City, London </li>
					<li><span class="font-icon"><i class="fa fa-phone"></i></span>(000) 2345 - 6789</li>
					<li><span class="font-icon"><i class="fa fa-envelope"></i></span> Contact Us</li>
				</ul>
				<div class="invitefriend"><a href="#"><span><i class="fa fa-user-plus" aria-hidden="true"></i></span>Invite a Friend</a></div>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-2">
				<div class="sitemap-box">
					<h6>SiteMap</h6>
					<ul>
						<li><a href="index.html">Home</a></li>
															<li><a href="contentSection/MQ%3d%3d.html">About Us</a></li>
																	<li><a href="contentSection/MTQ%3d.html">Contact Us</a></li>
																	<li><a href="contentSection/MTc%3d.html">How it works</a></li>
																	<li><a href="contentSection/MTg%3d.html">Expl. Abbrev.</a></li>
															<li><a href="contentSection/MTU%3d.html">FAQ</a></li>
							<li><a href="index.html">Registration</a></li>
							<li><a href="index.html">My 4<sup><b>8</sup>-</b>h account</a></li>
					</ul>
				</div>
			</div>
			
									<div class="col-sm-12 col-md-12 col-lg-2">
				<div class="sitemap-box">
					<h6>External Links</h6>
					<ul>
						<li><a target="_blank" href="http://fair-tradedeal.com/">fair-tradedeal.com</a></li>
						<li><a target="_blank" href="http://akopost.com/">akopost.com</a></li>
						<li><a target="_blank" href="http://fair-trade.org/">fair-trade.org </a></li>
						<li><a target="_blank" href="http://micro-startup.com/">micro-startup.com</a></li>
						<li><a target="_blank" href="http://room-agent.com/cgi-sys/suspendedpage.cgi">room-agent.com </a></li>
						<li><a target="_blank" href="http://pabaq.com/">pabaq.com</a></li>
					</ul>
				</div>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-2">
				<div class="sitemap-box">
					<h6>Social Media</h6>
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
							<div class="social">
																			<li><span class="font-icon"><i class="fa fa-facebook"></i></span><a target="_blank" href="https://www.facebook.com/">Facebook</a></li>
																						<li><span class="font-icon"><i class="fa fa-twitter"></i></span><a target="_blank" href="https://twitter.com/login">Twitter</a></li>
																						<li><span class="font-icon"><i class="fa fa-youtube"></i></span><a target="_blank" href="https://www.youtube.com/">YouTube</a></li>
																	</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-2">
				<div class="sitemap-box payment">
					<h6>Payment Option</h6>
					<ul>
						<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
						<li><a href="#"><i class="fa  fa-cc-discover"></i></a></li>
						<li><a href="#"><i class="fa  fa-cc-visa"></i></a></li>
						<li><a href="#"><i class="fa  fa-cc-paypal"></i></a></li>
					</ul>
					
				</div>
			</div>
		</div>
	</div>            	

@include('48-h/footer')