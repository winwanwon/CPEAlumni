<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="row">
        <div class="col-xs-6">
          <h2>Works</h2>
        </div>
        <div class="col-xs-6 text-right">
        <?php if($new_regis == true): ?>
          <h5><a href="#" style="line-height: 50px;">กรอกข้อมูลภายหลัง ></a></h5>
        <?php endif;?>
        </div>

      </div>
      <!--- ใส่ Form ใต้บรรทัดนี้ -->
      <div class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-9 col-sm-offset-3">
            <h4>Current Work</h4>
          </div>
        </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Position</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="position" >
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Company</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="company">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Industry</label>
                <div class="col-sm-9">
                  <div class="ui-widget" id="interest">
                    <select class="form-control" name="industry">
                      <option value="">Education</option>
                      <option value="">Banking</option>
                      <option value="">Entertainment</option>
                      <option value="">Others</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Business Type</label>
                <div class="col-sm-9">
                  <div class = "ui-widget" id="interest">
                    <input id = "automplete-1" class="form-control" placeholder="Business Type" name="business_type">
                  </div>
                </div>
              </div>
        <hr>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
            <a href="dashboard.php" class="btn btn-lg btn-trans">Save</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
