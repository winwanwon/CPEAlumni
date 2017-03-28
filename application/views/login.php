<?php
$attr = array("class" => "");
echo form_open('login', $attr);
?>
<div class="container" >
  <div class="row">
    <div class="col-md-4 col-md-offset-4 text-center">
      <div class="page-header">
        <h2>เข้าสู่ระบบ CPE Alumni</h2>
      </div>
      <?php
      $attr = array("class" => "form-horizontal", "id" => "loginForm");
      echo form_open('login', $attr);
      ?>
      <?php
      if($error){
        echo "<div class='alert alert-trans'>".$error."</div>";
      }
      ?>
      <div class="form-group">
        <input type="text" name="username" class="form-control" placeholder="Username">
      </div>
      <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Password">
      </div>
      <div class="form-group">
        <button id="register" class="g-recaptcha btn btn-block btn-trans" data-sitekey="6LeklhoUAAAAAG7wghQfvhNofV032mGA5eIYCXLa" data-callback="login">
          Register
        </button>
      </div>
      <div class="form-group">
        <a href="/register">สมัครใช้งาน CPE Alumni</a>
      </div>
    </form>
  </div>
</div>
</div>
