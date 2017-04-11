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
          <h2>Works Information</h2>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">

          <?php
          $attr = array("class" => "form-horizontal");
          echo form_open('work', $attr);
          ?>
          <div class="form-group">
            <label class="col-sm-3 control-label">Position</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="position">
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
                  <?php
                  foreach($business_type as $row){
                    echo "<option value='".$row["businessID"]."'>".$row["businessType"]."</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Business Type</label>
            <div class="col-sm-9">
              <div class = "ui-widget" id="interest">
                <input id="automplete-1" class="form-control" placeholder="Business Type" name="business_type">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <input type="checkbox" name="present" value="1"> I currently work here
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <input type="submit" class="btn btn-lg btn-trans" value="Add Workplace">
            </div>
          </div>
          <hr>
        </div>
      </div>

      <div class="row">
        <?php
        $count = 1;
        foreach($career_list as $row){
          echo "<div class='col-md-6 '>
          <div class='panel panel-default'>
          <div class='panel-heading'>".$count."</div>
          <div class='panel-body' style='color: black;'>
          <b>Position:</b> ".$row["position"]."<br>
          <b>Company:</b> ".$row["company"]."<br></div></div></div>";
          if($row["position"]==1){
            echo "<div class='checkbox'>
            <label><input type='checkbox' checked='checked'>currently work </label>
            </div>";
          }
          $count++;
        }
        ?>

      </div>

    </div>
  </form>
</div>
