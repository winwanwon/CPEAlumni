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
          <input type="text" name="firstname" class="form-control" placeholder="First Name">
          <input type="text" name="lastname" class="form-control" placeholder="Last Name">
        </div>
      </div>
      <div class="form-group">
        <input type="text" name="username" class="form-control" placeholder="Username">
      </div>
      <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Password">
      </div>
      <div class="form-group">
        <input type="password" name="password_confirm" class="form-control" placeholder="Confirm Password">
      </div>
      <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Email">
      </div>
      <div class="form-group">
        Currently enrolled / Degree from CPE KMUTT
          <div class="checkbox">
            <label>
              <input type="checkbox" name="undergraduate" id="undergraduate" value="1">
              Undergraduate Degree
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="master" id="master" value="1">
              Master Degree
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="doctoral" id="doctoral" value="1">
              Doctoral Degree
            </label>
          </div>
      </div>
      <div id="undergraduate_form" style="display:none;">
        <div class="form-group">
            <div class="form-inline">
            <input name="generation" type="number" class="form-control" placeholder="Generation">
            <select name="program" class="form-control">
              <option value="REG">Regular Program</option>
              <option value="INT">International Program</option>
            </select>
          </div>
        </div>
      </div>

      <button id="register" class="g-recaptcha btn btn-lg btn-trans" data-sitekey="6LeklhoUAAAAAG7wghQfvhNofV032mGA5eIYCXLa" data-callback="register">
        Register
      </button>

    </form>

    <!--- form class="form-inline" id="undergrad_form"  style="display:none; margin: 8px auto;" >
    <div class="form-group">
    <label>Generation</label>
    <input type="number" id="gen" class="form-control input-sm" style="width: 100px;"placeholder="eg. 30">
    <label>or Year of Enrollment</label>
    <input type="number" id="year" class="form-control input-sm" style="width: 100px;"placeholder="BE eg. 2559">
  </div>
</form>
<div class="form-inline">
<div class="form-group">
I currently enrolled / I have following degree from CPE KMUTT
<br>
<div class="checkbox">
<label>
<input type="checkbox" id="undergraduate" value="">
Undergraduate Degree
</label>
</div>
<br>
<div class="checkbox">
<label>
<input type="checkbox" id="graduate" value="">
Graduate Degree
</label>
</div>
</div>
</div --->
</div>
</div>
</div>
</div>
