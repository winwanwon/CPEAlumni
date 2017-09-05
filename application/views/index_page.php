<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=215231288903283";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="container">
  <div class="row">
    <div class="col-md-6 hidden-xs">
      <h1>News & Information</h1>
      <div class="fb-page" height="400" data-href="https://www.facebook.com/cpe.kmutt" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/cpe.kmutt" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/cpe.kmutt">CPE &#064; KMUTT</a></blockquote></div>
    </div>
    <div class="col-md-6" id="registration_index">
      <h1>Registration</h1>
      <?php
      $attr = array("id" => "registerForm");
      if($error){
        echo "<div class='alert alert-trans'>".$error."</div>";
      }
      echo form_open('register', $attr);

      //<form action="register" class="form-inline">

      ?>
      <div class="form-group">
        <div class="form-inline">
          <select name="prefix" class="form-control">
            <option value="Mr">Mr.</option>
            <option value="Ms">Ms.</option>
            <option value="Mrs">Mrs.</option>
          </select>
          <input type="text" name="firstname" class="form-control" placeholder="First Name" value="<?= set_value('firstname')?>">
          <input type="text" name="lastname" class="form-control" placeholder="Last Name"value="<?= set_value('lastname')?>">
        </div>
      </div>

      <div class="form-group">
        <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?= set_value('username')?>">
      </div>
      <div class="form-group">
        <input type="password" minlength="8" maxlength="32" name="password" class="form-control" placeholder="Password" value="">
      </div>
      <div class="form-group">
        <input type="password" minlength="8" maxlength="32" name="password_confirm" class="form-control" placeholder="Confirm Password" value="">
      </div>
      <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email')?>">
      </div>
      <div class="form-group">
        I currently enrolled / I have following degree from CPE KMUTT
          <div class="checkbox">
            <label>
              <input type="checkbox" name="undergraduate" id="undergraduate" value="1" <?php echo set_checkbox('undergraduate', '1'); ?>  />
              Bachelor Degree
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="master" id="master" value="1" <?php echo set_checkbox('master', '1'); ?>  />
              Master Degree
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="doctoral" id="doctoral" value="1" <?php echo set_checkbox('doctoral', '1'); ?>  />
              Doctoral Degree
            </label>
          </div>
      </div>
      <div id="undergraduate_form" style="display:none;">
        <div class="form-group" style="margin: 5px auto;">
            <div class="form-inline">
              <label>Cohort</label>
            <input name="generation" id="gen_login" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" placeholder="Cohort (e.g. 28)" min="1" value="<?= set_value('generation')?>">
            <select name="program" class="form-control">
              <option value="REG">Regular Program</option>
              <option value="INT">International Program</option>
            </select>
          </div>
        </div>
        <div class="form-group" style="margin: 5px auto;">
          <div class="form-inline">
            <label>Bachelor degree's year of enrollment</label>
            <input name="yoe_under" id="yoe_under" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" placeholder="B.E. Year (e.g. 2560)"   maxlength="4" min="2530" value="<?= set_value('yoe_under')?>">
          </div>
        </div>
      </div>
      <div id="master_form" style="display:none;">
        <div class="form-group" style="margin: 5px auto;">
          <div class="form-inline">
            <label>Master degree's year of enrollment</label>
            <input name="yoe_master" type="text" class="form-control" placeholder="B.E. Year (e.g. 2560)"  maxlength="4" value="<?= set_value('yoe_master')?>">
          </div>
        </div>
      </div>

      <div id="doctoral_form" style="display:none;">
        <div class="form-group" style="margin: 5px auto;">
          <div class="form-inline">
            <label>Doctoral degree's year of enrollment</label>
            <input name="yoe_doctoral" type="text" class="form-control" placeholder="B.E. Year (e.g. 2560)" maxlength="4" value="<?= set_value('yoe_doctoral')?>">
          </div>
        </div>
      </div>

      <div class="form-group" style="margin-top: 15px;">
        <button id="register" class="g-recaptcha btn btn-lg btn-trans" data-sitekey="6LeklhoUAAAAAG7wghQfvhNofV032mGA5eIYCXLa" data-callback="register">
          Register
        </button>
      </div>

    <?php echo form_close();?>
</div>
</div>
</div>
</div>
