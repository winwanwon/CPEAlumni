

<body>
	<div class="container">
		<div class="row">
		<div class="col-md-4">
			<h2>Search Student/Alumni</h2>
        <?php
        $attr = array();
        echo form_open('directory', $attr);
        ?>
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control input-sm" placeholder="Name" value="<?php echo $name_filter; ?>">
				</div>
				<div class="form-group">
					<label>Generation</label>
					<input type="number" name="generation" class="form-control input-sm" value="<?php echo $generation_filter; ?>">
		</div>
		<div class="form-group ui-widget">
			<label>Interests</label>
			<input id = "automplete-1" name="interests" class="form-control input-sm" placeholder="Find by interests" value="<?php echo $interests_filter; ?>">
		</div>


		<div class="form-group ui-widget">
			<label>Career</label>
			<select class="form-control" name="career">
				<?php
				  echo "<option value=''>Select Career</option>";
					foreach($career as $row){
						echo "<option  value='".$row["careerID"]."'>".$row["careerType"]."</option>";
					}
				?>
			</select>
			<!-- <input id = "automplete-2" name="career" class="form-control input-sm" placeholder="Find by career" value="<?php //echo $career_filter; ?>"> -->
		</div>


		<div class="form-group">
			<label>Education in CPE</label>
			<div class="checkbox">
				<label>
					<input type="checkbox" name="undergraduate" id="undergraduate_reg" <?php if($undergraduate_filter) echo "checked"; ?>>
					Undergraduate Degree
				</label>
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox" name="master" id="master" <?php if($master_filter) echo "checked"; ?>>
					Graduate Degree
				</label>
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox" name="doctoral" id="Doctoral" <?php if($doctoral_filter) echo "checked"; ?>>
					Doctoral Degree
				</label>
			</div>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-block btn-trans" value="Search">
		</div>
	</form>
</div>
<!-- Display part-->
<div class="col-md-8 display">
	<bR>
		<?php
			foreach ($students as $student){
				echo '<div class="col-xs-6 col-sm-4">';
				echo '<div class="student text-center" id="'.$student["username"].'" data-toggle="modal" data-target="#studentData">';
				//echo '<div class="panel-heading"><h3 class="panel-title text-center">';
				//echo $student["fname"]." ".$student["lname"];
				//echo '</h3></div>';
				echo "<img src='";
				echo base_url();
				echo "/uploads/".$student["picture"]."'class='dir-avatar img-circle'>";
				echo "<h4>".$student["fname"]." ".$student["lname"]."</h4>";
				echo "<h5>";
				if($student["generation"]!=0){
					echo "CPE#".$student["generation"];
				} else if($student["doctoral"]!=0){
					echo "Doctoral Degree";
				} else if($student["master"]!=0){
					echo "Master Degree";
				} else if($student["generation"]!=0){
					echo "Faculty Staff";
				}
				echo "</h5>";
				echo '</div>';
				}
		?>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="studentData" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Information</h4>
      </div>
      <div class="modal-body text-center">
				<img src="http://placekitten.com/g/130/130" height="130" width="130" id="info_picture" class="img-circle">
				<h3 id="name">Firstname Lastname</h3>
				<h4><span id="nickname">nickname</span> (CPE#<span id="generation">28</span>)</h4>
      </div>
			<div class="modal-body" id="user-content">
				<div class="row">
					<div class="col-xs-3 text-right">
						<label>E-mail</label>
					</div>
					<div class="col-xs-9"><span id="email">email<span></div>
				</div>
				<div class="row">
					<div class="col-xs-3 text-right">
						<label>Mobile Phone</label>
					</div>
					<div class="col-xs-9"><span id="mobile">mobile<span></div>
				</div>
				<div class="row">
					<div class="col-xs-3 text-right">
						<label>Facebook URL</label>
					</div>
					<div class="col-xs-9"><span id="facebook">facebook url<span></div>
				</div>
				<div class="row">
					<div class="col-xs-3 text-right">
						<label>Linkedin URL</label>
					</div>
					<div class="col-xs-9"><span id="facebook">linkedin url<span></div>
				</div>
				<div class="row">
					<div class="col-xs-3 text-right">
						<label>Education</label>
					</div>
					<div class="col-xs-9">
						<ul  id="education">

						</ul>

					</div>
				</div>
				<div class="row">
					<div class="col-xs-3 text-right">
						<label>Lives in</label>
					</div>
					<div class="col-xs-9"><span id="province">province</span>, <span id="country">country</span></div>
				</div>
				<div class="row">
					<div class="col-xs-3 text-right">
						<label>Street Address</label>
					</div>
					<div class="col-xs-9"><span id="address"></div>
				</div>

				<div class="row">
					<div class="col-xs-3 text-right">
						<label>Interested in</label>
					</div>
					<div class="col-xs-9">
						<ul>

						</ul>
					</div>
				</div>
      </div>
    </div>
  </div>
</div>

</body>




</html>
