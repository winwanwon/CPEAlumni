<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="row">
        <?php if($status): ?>
          <div class="alert alert-trans">
            <?php echo $status; ?>
          </div>
        <?php endif; ?>
        <div class="col-xs-6">
          <h2>Profile Information</h2>
        </div>
        <div class="col-xs-6 text-right">
          <?php if($new_regis == true): ?>
            <h5><a href="#" style="line-height: 50px;">กรอกข้อมูลภายหลัง ></a></h5>
          <?php endif;?>
        </div>

      </div>
      <!--- ใส่ Form ใต้บรรทัดนี้ -->
      <?php
      $attr = array("class" => "form-horizontal");
      echo form_open_multipart('profile', $attr);
      ?>
      <div class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-9 col-sm-offset-3">
            <h4>Contact and Basic Info</h4>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">First name <span class="text-red">*</span></label>
          <div class="col-sm-9">
            <input name="firstname" type="text" class="form-control" value = "<?php echo $content[0]["fname"]; ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Last name <span class="text-red">*</span></label>
          <div class="col-sm-9">
            <input name="lastname" type="text" class="form-control" value = "<?php echo $content[0]["lname"]; ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Profile Picture</label>
          <div class="col-sm-9">
            <?php if($content[0]["picture"]): ?>
              <img height="100" style="margin: 0 auto 15px auto;" src="<?php echo base_url()."/uploads/".$content[0]["picture"]; ?>" class="img-rounded">
            <?php endif; ?>
            <input name="profile_image" type="file" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Nickname</label>
          <div class="col-sm-9">
            <input name="nickname" type="text" class="form-control" value = "<?php echo $content[0]["nickname"]; ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">E-mail <span class="text-red">*</span></label>
          <div class="col-sm-9">
            <input name="email" type="text" class="form-control" value = "<?php echo $content[0]["email"]; ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Mobile Phone</label>
          <div class="col-sm-9">
            <input name="phone" type="text" class="form-control" value = "<?php echo $content[0]["phone"]; ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Facebook URL</label>
          <div class="col-sm-9">
            <input name="facebook" type="text" class="form-control" placeholder="e.g. www.facebook.com/username/"  value = "<?php echo $content[0]["facebook"]; ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Linkedin URL</label>
          <div class="col-sm-9">
            <input name="linkedin" type="text" class="form-control" placeholder="e.g. linkedin.com/in/username"  value = "<?php echo $content[0]["linkedin"]; ?>">
          </div>
        </div>
        <?php if(!$new_regis): ?>
          <hr>
          <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
              <h4>Education</h4>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Currently enrolled / Degree from CPE KMUTT</label>
            <div class="col-sm-9">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="undergraduate" id="undergraduate" value="true" <?php echo ($content[0]['generation'] ? 'checked' : '');?>>
                  Undergraduate Degree
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="master" id="master" value="true" <?php echo ($content[0]['master'] ? 'checked' : '');?>>
                  Master Degree
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="doctoral" id="doctoral" value="true" <?php echo ($content[0]['doctoral'] ? 'checked' : '');?>>
                  Doctoral Degree
                </label>
              </div>
            </div>
          </div>


          <div id="undergraduate_form" style="display:none;">
            <div class="form-group">
              <label class="col-sm-3 control-label">Generation</label>
              <div class="col-sm-9">
                <input name="generation" type="number" class="form-control" value="<?php if($content[0]['generation']!=0) echo $content[0]['generation']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Program</label>
              <div class="col-sm-9">
                <select name="program" class="form-control">
                  <option value="REG" <?php echo ($content[0]["programme"]=="REG" ? 'selected="selected"' : '');?> >Regular Program</option>
                  <option value="INT" <?php echo ($content[0]["programme"]=="INT" ? 'selected="selected"' : '');?> >International Program</option>
                </select>
              </div>
            </div>
          </div>
          <div id="master_form" style="display:none;">
            <div class="form-group">
              <label class="col-sm-3 control-label">Master degree's year of enrollment</label>
              <div class="col-sm-9">
                <input name="yoe_master" type="number" class="form-control" placeholder="B.E. Year (e.g. 2560)" size="4" maxlength="4" value="<?php if($content[0]['master']!=0)  echo $content[0]['master']; ?>">
              </div>
            </div>
          </div>

          <div id="doctoral_form" style="display:none;">
            <div class="form-group" >
              <label class="col-sm-3 control-label">Doctoral degree's year of enrollment</label>
              <div class="col-sm-9">
                <input name="yoe_doctoral" type="number" class="form-control" placeholder="B.E. Year (e.g. 2560)" size="4" maxlength="4" value="<?php if($content[0]['doctoral']!=0)  echo $content[0]['doctoral']; ?>">
              </div>
            </div>
          </div>
        <?php endif; ?>
        <hr>
        <div class="form-group">
          <div class="col-sm-9 col-sm-offset-3">
            <h4>Current Address</h4>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Country</label>
          <div class="col-sm-9">
            <select name="country" class="form-control">
              <?php if($content[0]['country']): ?>
                <option value="<?php echo $content[0]['country']; ?>" selected><?php echo $content[0]['country']; ?></option>
              <?php endif; ?>
              <option value="Afganistan">Afghanistan</option>
              <option value="Albania">Albania</option>
              <option value="Algeria">Algeria</option>
              <option value="American Samoa">American Samoa</option>
              <option value="Andorra">Andorra</option>
              <option value="Angola">Angola</option>
              <option value="Anguilla">Anguilla</option>
              <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
              <option value="Argentina">Argentina</option>
              <option value="Armenia">Armenia</option>
              <option value="Aruba">Aruba</option>
              <option value="Australia">Australia</option>
              <option value="Austria">Austria</option>
              <option value="Azerbaijan">Azerbaijan</option>
              <option value="Bahamas">Bahamas</option>
              <option value="Bahrain">Bahrain</option>
              <option value="Bangladesh">Bangladesh</option>
              <option value="Barbados">Barbados</option>
              <option value="Belarus">Belarus</option>
              <option value="Belgium">Belgium</option>
              <option value="Belize">Belize</option>
              <option value="Benin">Benin</option>
              <option value="Bermuda">Bermuda</option>
              <option value="Bhutan">Bhutan</option>
              <option value="Bolivia">Bolivia</option>
              <option value="Bonaire">Bonaire</option>
              <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
              <option value="Botswana">Botswana</option>
              <option value="Brazil">Brazil</option>
              <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
              <option value="Brunei">Brunei</option>
              <option value="Bulgaria">Bulgaria</option>
              <option value="Burkina Faso">Burkina Faso</option>
              <option value="Burundi">Burundi</option>
              <option value="Cambodia">Cambodia</option>
              <option value="Cameroon">Cameroon</option>
              <option value="Canada">Canada</option>
              <option value="Canary Islands">Canary Islands</option>
              <option value="Cape Verde">Cape Verde</option>
              <option value="Cayman Islands">Cayman Islands</option>
              <option value="Central African Republic">Central African Republic</option>
              <option value="Chad">Chad</option>
              <option value="Channel Islands">Channel Islands</option>
              <option value="Chile">Chile</option>
              <option value="China">China</option>
              <option value="Christmas Island">Christmas Island</option>
              <option value="Cocos Island">Cocos Island</option>
              <option value="Colombia">Colombia</option>
              <option value="Comoros">Comoros</option>
              <option value="Congo">Congo</option>
              <option value="Cook Islands">Cook Islands</option>
              <option value="Costa Rica">Costa Rica</option>
              <option value="Cote DIvoire">Cote D'Ivoire</option>
              <option value="Croatia">Croatia</option>
              <option value="Cuba">Cuba</option>
              <option value="Curaco">Curacao</option>
              <option value="Cyprus">Cyprus</option>
              <option value="Czech Republic">Czech Republic</option>
              <option value="Denmark">Denmark</option>
              <option value="Djibouti">Djibouti</option>
              <option value="Dominica">Dominica</option>
              <option value="Dominican Republic">Dominican Republic</option>
              <option value="East Timor">East Timor</option>
              <option value="Ecuador">Ecuador</option>
              <option value="Egypt">Egypt</option>
              <option value="El Salvador">El Salvador</option>
              <option value="Equatorial Guinea">Equatorial Guinea</option>
              <option value="Eritrea">Eritrea</option>
              <option value="Estonia">Estonia</option>
              <option value="Ethiopia">Ethiopia</option>
              <option value="Falkland Islands">Falkland Islands</option>
              <option value="Faroe Islands">Faroe Islands</option>
              <option value="Fiji">Fiji</option>
              <option value="Finland">Finland</option>
              <option value="France">France</option>
              <option value="French Guiana">French Guiana</option>
              <option value="French Polynesia">French Polynesia</option>
              <option value="French Southern Ter">French Southern Ter</option>
              <option value="Gabon">Gabon</option>
              <option value="Gambia">Gambia</option>
              <option value="Georgia">Georgia</option>
              <option value="Germany">Germany</option>
              <option value="Ghana">Ghana</option>
              <option value="Gibraltar">Gibraltar</option>
              <option value="Great Britain">Great Britain</option>
              <option value="Greece">Greece</option>
              <option value="Greenland">Greenland</option>
              <option value="Grenada">Grenada</option>
              <option value="Guadeloupe">Guadeloupe</option>
              <option value="Guam">Guam</option>
              <option value="Guatemala">Guatemala</option>
              <option value="Guinea">Guinea</option>
              <option value="Guyana">Guyana</option>
              <option value="Haiti">Haiti</option>
              <option value="Hawaii">Hawaii</option>
              <option value="Honduras">Honduras</option>
              <option value="Hong Kong">Hong Kong</option>
              <option value="Hungary">Hungary</option>
              <option value="Iceland">Iceland</option>
              <option value="India">India</option>
              <option value="Indonesia">Indonesia</option>
              <option value="Iran">Iran</option>
              <option value="Iraq">Iraq</option>
              <option value="Ireland">Ireland</option>
              <option value="Isle of Man">Isle of Man</option>
              <option value="Israel">Israel</option>
              <option value="Italy">Italy</option>
              <option value="Jamaica">Jamaica</option>
              <option value="Japan">Japan</option>
              <option value="Jordan">Jordan</option>
              <option value="Kazakhstan">Kazakhstan</option>
              <option value="Kenya">Kenya</option>
              <option value="Kiribati">Kiribati</option>
              <option value="Korea North">Korea North</option>
              <option value="Korea Sout">Korea South</option>
              <option value="Kuwait">Kuwait</option>
              <option value="Kyrgyzstan">Kyrgyzstan</option>
              <option value="Laos">Laos</option>
              <option value="Latvia">Latvia</option>
              <option value="Lebanon">Lebanon</option>
              <option value="Lesotho">Lesotho</option>
              <option value="Liberia">Liberia</option>
              <option value="Libya">Libya</option>
              <option value="Liechtenstein">Liechtenstein</option>
              <option value="Lithuania">Lithuania</option>
              <option value="Luxembourg">Luxembourg</option>
              <option value="Macau">Macau</option>
              <option value="Macedonia">Macedonia</option>
              <option value="Madagascar">Madagascar</option>
              <option value="Malaysia">Malaysia</option>
              <option value="Malawi">Malawi</option>
              <option value="Maldives">Maldives</option>
              <option value="Mali">Mali</option>
              <option value="Malta">Malta</option>
              <option value="Marshall Islands">Marshall Islands</option>
              <option value="Martinique">Martinique</option>
              <option value="Mauritania">Mauritania</option>
              <option value="Mauritius">Mauritius</option>
              <option value="Mayotte">Mayotte</option>
              <option value="Mexico">Mexico</option>
              <option value="Midway Islands">Midway Islands</option>
              <option value="Moldova">Moldova</option>
              <option value="Monaco">Monaco</option>
              <option value="Mongolia">Mongolia</option>
              <option value="Montserrat">Montserrat</option>
              <option value="Morocco">Morocco</option>
              <option value="Mozambique">Mozambique</option>
              <option value="Myanmar">Myanmar</option>
              <option value="Nambia">Nambia</option>
              <option value="Nauru">Nauru</option>
              <option value="Nepal">Nepal</option>
              <option value="Netherland Antilles">Netherland Antilles</option>
              <option value="Netherlands">Netherlands (Holland, Europe)</option>
              <option value="Nevis">Nevis</option>
              <option value="New Caledonia">New Caledonia</option>
              <option value="New Zealand">New Zealand</option>
              <option value="Nicaragua">Nicaragua</option>
              <option value="Niger">Niger</option>
              <option value="Nigeria">Nigeria</option>
              <option value="Niue">Niue</option>
              <option value="Norfolk Island">Norfolk Island</option>
              <option value="Norway">Norway</option>
              <option value="Oman">Oman</option>
              <option value="Pakistan">Pakistan</option>
              <option value="Palau Island">Palau Island</option>
              <option value="Palestine">Palestine</option>
              <option value="Panama">Panama</option>
              <option value="Papua New Guinea">Papua New Guinea</option>
              <option value="Paraguay">Paraguay</option>
              <option value="Peru">Peru</option>
              <option value="Phillipines">Philippines</option>
              <option value="Pitcairn Island">Pitcairn Island</option>
              <option value="Poland">Poland</option>
              <option value="Portugal">Portugal</option>
              <option value="Puerto Rico">Puerto Rico</option>
              <option value="Qatar">Qatar</option>
              <option value="Republic of Montenegro">Republic of Montenegro</option>
              <option value="Republic of Serbia">Republic of Serbia</option>
              <option value="Reunion">Reunion</option>
              <option value="Romania">Romania</option>
              <option value="Russia">Russia</option>
              <option value="Rwanda">Rwanda</option>
              <option value="St Barthelemy">St Barthelemy</option>
              <option value="St Eustatius">St Eustatius</option>
              <option value="St Helena">St Helena</option>
              <option value="St Kitts-Nevis">St Kitts-Nevis</option>
              <option value="St Lucia">St Lucia</option>
              <option value="St Maarten">St Maarten</option>
              <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
              <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
              <option value="Saipan">Saipan</option>
              <option value="Samoa">Samoa</option>
              <option value="Samoa American">Samoa American</option>
              <option value="San Marino">San Marino</option>
              <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
              <option value="Saudi Arabia">Saudi Arabia</option>
              <option value="Senegal">Senegal</option>
              <option value="Serbia">Serbia</option>
              <option value="Seychelles">Seychelles</option>
              <option value="Sierra Leone">Sierra Leone</option>
              <option value="Singapore">Singapore</option>
              <option value="Slovakia">Slovakia</option>
              <option value="Slovenia">Slovenia</option>
              <option value="Solomon Islands">Solomon Islands</option>
              <option value="Somalia">Somalia</option>
              <option value="South Africa">South Africa</option>
              <option value="Spain">Spain</option>
              <option value="Sri Lanka">Sri Lanka</option>
              <option value="Sudan">Sudan</option>
              <option value="Suriname">Suriname</option>
              <option value="Swaziland">Swaziland</option>
              <option value="Sweden">Sweden</option>
              <option value="Switzerland">Switzerland</option>
              <option value="Syria">Syria</option>
              <option value="Tahiti">Tahiti</option>
              <option value="Taiwan">Taiwan</option>
              <option value="Tajikistan">Tajikistan</option>
              <option value="Tanzania">Tanzania</option>
              <option value="Thailand">Thailand</option>
              <option value="Togo">Togo</option>
              <option value="Tokelau">Tokelau</option>
              <option value="Tonga">Tonga</option>
              <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
              <option value="Tunisia">Tunisia</option>
              <option value="Turkey">Turkey</option>
              <option value="Turkmenistan">Turkmenistan</option>
              <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
              <option value="Tuvalu">Tuvalu</option>
              <option value="Uganda">Uganda</option>
              <option value="Ukraine">Ukraine</option>
              <option value="United Arab Erimates">United Arab Emirates</option>
              <option value="United Kingdom">United Kingdom</option>
              <option value="United States of America">United States of America</option>
              <option value="Uraguay">Uruguay</option>
              <option value="Uzbekistan">Uzbekistan</option>
              <option value="Vanuatu">Vanuatu</option>
              <option value="Vatican City State">Vatican City State</option>
              <option value="Venezuela">Venezuela</option>
              <option value="Vietnam">Vietnam</option>
              <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
              <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
              <option value="Wake Island">Wake Island</option>
              <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
              <option value="Yemen">Yemen</option>
              <option value="Zaire">Zaire</option>
              <option value="Zambia">Zambia</option>
              <option value="Zimbabwe">Zimbabwe</option>
            </select>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-3 control-label">Province/State</label>
        <div class="col-sm-9">
          <input type="text" name="province" class="form-control" value="<?php echo $content[0]['province']; ?>">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-3 control-label">Street Address</label>
        <div class="col-sm-9">
          <textarea name="address" class="form-control" placeholder="Address"><?php echo $content[0]['address']; ?></textarea>
        </div>
      </div>
      <hr>
      <div class="form-group">
        <div class="col-sm-9 col-sm-offset-3">
          <h4>Others</h4>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Interests</label>
        <div class="col-sm-9">
          <input type="text" id="interests" name="interests" class="form-control" data-role="tagsinput" value="<?php echo $interests; ?>">
        </div>
      </div>
      <!-- div class="form-group">
      <label class="col-sm-3 control-label">Privacy</label>
      <div class="col-sm-6">
      <select name="privacy" class="form-control">
      <option value="all">Show all</option>
      <option value="no_contact">Hide contact info and street address</option>
      <option value="only_staff">Don't show anything</option>
    </select>
  </div>
</div -->
<hr>
<div class="form-group">
  <div class="col-sm-offset-3 col-sm-9">
    <input type="submit" value="Save" class="btn btn-lg btn-trans">
  </div>
</div>
</div>
</form>
</div>
</div>

<script>

$("#current_student").click( function(){
  if($(this).is(":checked")){
    $("#work-form").hide();
  } else {
    $("#work-form").show();
  }
})

</script>
