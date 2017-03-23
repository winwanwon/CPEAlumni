<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="row">
      <div class="col-md-6 text-center">
        <img src="http://placehold.it/1600x900" class="img-responsive">
      </div>
      <div class="col-md-6">
        <h2>Current Student / Alumni Registration</h2>
        <hr>
        <form class="form-inline">
          <div class="form-group">
            <select class="form-control">
              <option value="1">Mr.</option>
              <option value="2">Ms.</option>
              <option value="3">Mrs.</option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" id="firstname" class="form-control" placeholder="First Name">
          </div>
          <div class="form-group">
            <input type="text" id="lastname" class="form-control" placeholder="Surname">
          </div>
        </form>
        <br>
        <form>
          <div class="form-group">
            <input type="text" id="username" class="form-control" placeholder="Username">
          </div>
          <div class="form-group">
            <input type="password" id="password" class="form-control" placeholder="Password">
          </div>
          <!-- div class="form-group">
          <input type="password" class="form-control" placeholder="Confirm Password">
        </div -->
        <div class="form-group">
          <input type="email" id="email" class="form-control" placeholder="Email">
        </div>
      </form>

      <form class="form-inline" id="undergrad_form"  style="display:none; margin: 8px auto;" >
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
      </div>

      <div class="g-recaptcha" style="margin: 15px auto;" data-sitekey="6LfmSBUUAAAAAC0gZyHkWOyivEoS8tZPbI6B0STa"></div>
      <a href="info_regis.php" class="btn btn-primary btn-lg disabled" id="registerBtn" href="http://aiaicougar.in.th/alumni_prototype/header.php" role="button">Register</a>

    </div>
  </div>
</div>

</body>
</html>