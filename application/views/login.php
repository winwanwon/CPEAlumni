<?php
$attr = array("class" => "");
echo form_open(base_url('login'), $attr);
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
        <input type="submit" class="btn btn-block btn-trans" value="Login">
      </div>
      <div class="form-group">
        <a href="<?php echo base_url(); ?>register">สมัครใช้งาน CPE Alumni</a>
      </div>
    <?php echo form_close();?>
  </div>
</div>
</div>
