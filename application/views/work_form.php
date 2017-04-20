<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="row">
        <?php if($status): ?>
          <div class="alert alert-trans">
            <?php echo $status; ?>
          </div>
        <?php endif; ?>
        <div class="col-xs-12">
          <h2>Works Information</h2>
        </div>
      </div>


 <div class="row">

    <?php

      $count=1;
      foreach($career_show as $row){
        echo "<div class='col-md-6 '>
                <div class='panel panel-default'>
                  <div class='panel-heading'>".$count.
                   "<span class='pull-right'><form action='Work_page/index' method='POST'>
                      <input type='hidden' name='delbtn' value='".$row["id"]."'>
                       <button type='submit' class='btn btn-danger'>X</button>
                   </form></span>";
                    if($row["present"]==1){
                        echo "<span class='pull-right'><form action='Work_page/index' method='POST'>
                          <input type='hidden' name='togglebtnId' value='".$row["id"]."'>
                          <input type='hidden' name='togglebtnPresent' value='".$row["present"]."'>
                          <button type='submit' class='btn btn-primary'>Currently work</button>
                        </form></span>
                        </div>";
                    }
                    elseif($row["present"]==0){
                        echo "<span class='pull-right'><form action='Work_page/index' method='POST'>
                          <input type='hidden' name='togglebtnId' value='".$row["id"]."'>
                          <input type='hidden' name='togglebtnPresent' value='".$row["present"]."'>
                          <button type='submit' class='btn'>Currently work</button>
                        </form></span>
                        </div>";
                    }
                    else{
                        echo "</div>";
                    }
                  echo "<div class='panel-body'>
                    <b>Position:</b> ".$row["position"]."<br>
                    <b>Company:</b> ".$row["company"]."<br>
                    <b>Career:</b> ".$row["careerType"]."<br></div></div></div>";

        $count++;
      }
    ?>

  </div>

      <div class="row">
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
          <label class="col-sm-3 control-label">Career</label>
          <div class="col-sm-9">
            <div class="ui-widget" id="interest">
              <select class="form-control" name="career">
                <?php
                  foreach($career as $row){
                    echo "<option value='".$row["careerID"]."'>".$row["careerType"]."</option>";
                  }
                ?>
              </select>
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
      </div>
    </div>
  </form>
</div>
