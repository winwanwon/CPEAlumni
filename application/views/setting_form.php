<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="row">
        <div class="col-xs-12">
          <?php if($status): ?>
            <div class="alert alert-trans">
              <?php echo $status; ?>
            </div>
          <?php endif; ?>
          <h2>Account Setting</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
        <?php
        $attr = array("class" => "form-horizontal");
        echo form_open('setting', $attr);
        ?>
        <div class="form-group">
          <div class="col-sm-9 col-sm-offset-3">
            <h4>Change Password</h4>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Old Password</label>
          <div class="col-sm-9">
            <input type="password" minlength="8" maxlength="32" class="form-control" name="old_password">
            <h5>
              <span class="text-red">*</span> จำเป็นต้องกรอกรหัสผ่านเก่าให้ถูกต้องเพื่อทำการเปลี่ยนแปลงข้อมูลอื่นๆ
            </h5>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">New Password</label>
          <div class="col-sm-9">
            <input type="password" minlength="8" maxlength="32" class="form-control" name="new_password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Confirm New Password</label>
          <div class="col-sm-9">
            <input type="password" minlength="8" maxlength="32" class="form-control" name="new_password_conf">
          </div>
        </div>
        <hr>
        <div class="form-group">
          <div class="col-sm-9 col-sm-offset-3">
            <h4>Privacy</h4>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Privacy</label>
          <div class="col-sm-9">
            <select class="form-control" name="privacy">
              <option value="PA" <?php if($content[0]["privacy"] == "PA") echo "selected"; ?>>Public (Show all information)</option>
              <option value="PH" <?php if($content[0]["privacy"] == "PH") echo "selected"; ?>>Public (Hide contact information)</option>
              <option value="UL" <?php if($content[0]["privacy"] == "UL") echo "selected"; ?>>Unlisted</option>
            </select>
            <h5>
              หมายเหตุ: คุณสามารถปกปิดข้อมูลบางส่วนแก่ผู้ใช้งานท่านอื่นได้ แต่ข้อมูลจะยังสามารถเข้าถึงได้โดยเจ้าหน้าที่ภาควิชาวิศวกรรมคอมพิวเตอร์
            </h5>
          </div>
        </div>

        <hr>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
            <input type="submit" value="Save Changes" class="btn btn-lg btn-trans">
          </div>
        </div>
      </div>
      </div>
    </div>
  <?php echo form_close();?>
</div>
