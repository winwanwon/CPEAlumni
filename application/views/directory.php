

<body>
	<div class="container">
		<div class="row">
		<div class="col-md-3">
			<h2>Search by..</h2>
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
<div class="col-md-8 display">
	<bR>
		<?php
			$i = 0;
			foreach ($students as $student){
				if($i == 0){
					echo '<div class="row">';
				}
				echo '<div class="col-xs-3">';
				echo '<div class="student text-center" id="'.$student["username"].'" data-toggle="modal" data-target="#studentData">';
				echo "<img src='";
				if($student["picture"]!=NULL){
					echo base_url();
					echo "/uploads/".$student["picture"];
				} else {
					echo "https://placekitten.com/130/130";
				}
				echo "'class='dir-avatar img-circle'>";
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
				echo '</div>';
				if ($i == 4) {
					echo '</div>';
					$i = -1;
				}
				$i = $i+1;
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
				<h4><span id="nickname">nickname</span> <span id="generation"></span></h4>
      </div>
			<div class="modal-body" id="user-content">
				<span id="contact_info">
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
					<div class="col-xs-9"><span id="linkedin">linkedin url<span></div>
				</div>
				<div class="row">
					<div class="col-xs-3 text-right">
						<label>Address</label>
					</div>
					<div class="col-xs-9"><span id="address"></div>
				</div>
				</span>
				<div class="row">
					<div class="col-xs-3 text-right">
						<label>Lives in</label>
					</div>
					<div class="col-xs-9"><span id="province">province</span>, <span id="country">country</span></div>
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

				<span id="career_list">
				<div class="row">
					<div class="col-xs-3 text-right">
						<label>Career</label>
					</div>
					<div class="col-xs-9">
						<ul id="career">

						</ul>
					</div>
				</div>
				</span>

				<span id="interest_list">
				<div class="row">
					<div class="col-xs-3 text-right">
						<label>Interested in</label>
					</div>
					<div class="col-xs-9">
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
