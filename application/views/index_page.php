<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h1>Events</h1>
      <img src="http://placehold.it/1600x900" class="img-responsive">
    </div>
    <div class="col-md-6">
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
        <input type="text" name="username" class="form-control" placeholder="Username" value="<?= set_value('username')?>">
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
            <input name="generation" type="number" class="form-control" placeholder="Cohort" min="1" max ="30" value="<?= set_value('generation')?>">
            <select name="program" class="form-control">
              <option value="REG">Regular Program</option>
              <option value="INT">International Program</option>
            </select>
          </div>
        </div>
      </div>
      <div id="master_form" style="display:none;">
        <div class="form-group" style="margin: 5px auto;">
          <div class="form-inline">
            <label>Master degree's year of enrollment</label>
            <input name="yoe_master" type="number" class="form-control" placeholder="B.E. Year (e.g. 2560)"  size="4" maxlength="4" value="<?= set_value('yoe_master')?>">
          </div>
        </div>
      </div>

      <div id="doctoral_form" style="display:none;">
        <div class="form-group" style="margin: 5px auto;">
          <div class="form-inline">
            <label>Doctoral degree's year of enrollment</label>
            <input name="yoe_doctoral" type="number" class="form-control" placeholder="B.E. Year (e.g. 2560)"  size="4" maxlength="4" value="<?= set_value('yoe_doctoral')?>">
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
