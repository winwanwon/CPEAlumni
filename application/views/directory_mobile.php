

<body>
	<div class="container">
		<div class="row">
        <div class="text-center">
            <a class="btn btn-link" style="background: rgba(0,0,0,0.5); width: 90%; margin: 10px auto;" role="button" data-toggle="collapse" href="#searchMenu" aria-expanded="false" aria-controls="collapseExample">
            Show search filter <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
            </a>
        </div>
		<div class="col-md-3 collapse" id="searchMenu">
        <?php
        $attr = array();
        echo form_open('directory', $attr);
        ?>
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control input-sm" placeholder="Name" value="<?php if(isset($name_filter)) echo $name_filter; ?>">
				</div>
				<div class="form-group">
					<label>Generation</label>
					<input type="number" name="generation" id="generation_input" class="form-control input-sm" value="<?php if(isset($generation_filter)) echo $generation_filter; ?>">
		</div>
		<div class="form-group ui-widget">
			<label>Interests</label>
			<input id = "automplete-1" name="interests" class="form-control input-sm" placeholder="Find by interests e.g. Big Data, Football, etc." value="<?php if(isset($interests_filter))  echo $interests_filter; ?>">
		</div>
		<div class="form-group ui-widget">
			<label>Career Type</label>
			<select class="form-control" name="career">
				<?php
				  echo "<option value=''>Select Career Type</option>";
					foreach($career as $row){
						echo "<option  value='".$row["careerID"];
						if(isset($career_filter) && $career_filter == $row["careerID"]){
							echo "' selected='selected'";
						}
						echo "'>".$row["careerType"]."</option>";
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<label>Education in CPE</label>
			<div class="checkbox">
				<label>
					<input type="checkbox" name="undergraduate" id="undergraduate" <?php if(isset($undergraduate_filter) && $undergraduate_filter=="on") echo "checked"; ?>>
					Undergraduate Degree
				</label>
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox" name="master" id="master" <?php if(isset($master_filter) && $master_filter=="on") echo "checked"; ?>>
					Master Degree
				</label>
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox" name="doctoral" id="Doctoral" <?php if(isset($doctoral_filter) && $doctoral_filter=="on") echo "checked"; ?>>
					Doctoral Degree
				</label>
			</div>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-block btn-trans" value="Search">
		</div>
	<?php echo form_close();?>
</div>
<!-- Display part-->
<div class="col-md-9 display">
	<?php if($profile_alert == 0 || $work_alert == 0): ?>
		<div class="alert alert-trans" id="alert_data" style="margin: 20px auto;">	
				<h3 style="margin-top: 0;">Tell us about yourself</h3>
				<h4 style="margin-bottom: 20px;">
					กรอกข้อมูลส่วนตัวเพิ่มเติม เพื่อให้ผู้อื่นสามารถค้นหาคุณด้วยข้อมูลต่างๆได้
				</h4>
				<?php if($profile_alert == 0): ?>
					<a href="profile" class="btn btn-trans btn-trans-primary">
					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> เพิ่มข้อมูลส่วนตัว</a>
				<?php endif; ?>
				<?php if($work_alert == 0): ?>
					<a href="work" class="btn btn-trans btn-trans-primary">
					<span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> เพิ่มข้อมูลการทำงาน</a>
				<?php endif; ?>
				<div class="btn btn-trans" id="notnow">ไม่ใช่ตอนนี้</div>
				
		</div>
	<?php endif; ?>
		<?php
			$i = 0;
			foreach ($students as $student){
				if($i == 0){
					echo '<div class="row">';
				}
				echo '<div class="col-xs-4">';
				echo '<div class="student text-center" style="display:none;" id="'.$student["username"].'" data-toggle="modal" data-target="#studentData">';
				echo "<img src='";
				if($student["picture"]!=NULL){
					echo base_url();
					echo "/uploads/".$student["picture"];
				} else {
					echo "assets/default_profile.png";
				}
				echo "'class='dir-avatar img-circle' style='object-fit: cover;'>";
				echo "<h6>".$student["fname"]." ".$student["lname"]."</h6>";
				echo '</div>';
				echo '</div>';
				if ($i == 2) {
					echo '</div>';
					$i = -1;
				}
				$i = $i+1;
				}
		?>
		<div class="row">
			<div class="col-xs-8 col-xs-offset-2">	
				<div class="btn btn-trans btn-block" id="loadmore" style="display:none; margin: 15px auto;">Load more..</div>
			</div>
		</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="studentData" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Information</h4>
      </div>
      <div class="modal-body text-center">
				<img src="http://placekitten.com/g/130/130" height="130" width="130" id="info_picture" class="img-circle">
				<h3 id="name">Firstname Lastname</h3>
				<h4><span id="nickname">nickname</span> <span id="generation"></span></h4>
      </div>
			<div class="modal-body" id="user-content">
				<span id="contact_info">
				<div class="row">
					<div class="col-md-12 text-left">
					<label>E-mail</label>
                    <span id="email">email<span></div>
				</div>
				<div class="row">
					<div class="col-md-12 text-left">
					<label>Mobile Phone</label>
                    <span id="mobile">mobile<span></div>
				</div>
				<div class="row">
					<div class="col-md-12 text-left">
						<label>Facebook URL</label>
                    <span id="facebook">facebook url<span></div>
				</div>
				<div class="row">
					<div class="col-md-12 text-left">
						<label>Linkedin URL</label>
                    <span id="linkedin">linkedin url<span></div>
				</div>
				<div class="row">
					<div class="col-md-12 text-left">
					<label>Address</label><span id="address">
                    </div>
				</div>
				</span>
				<div class="row">
					<div class="col-md-12 text-left">
					<label>Lives in</label>
					<span id="province">province</span>, <span id="country">country</span>
                    </div>
				</div>
				<div class="row">
					<div class="col-md-12 text-left">
						<label>Education</label>
						<ul  id="education">

						</ul>

					</div>
				</div>

				<span id="career_list">
				<div class="row">
					<div class="col-md-12 text-left">
						<label>Career</label>
						<ul id="career">

						</ul>
					</div>
				</div>
				</span>

				<span id="interest_list">
				<div class="row">
					<div class="col-md-12 text-left">
						<label>Interested in</label>
						<ul id="interests">

						</ul>
					</div>
				</div>
				</span>
      </div>
    </div>
  </div>
</div>

</body>




</html>
