

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
					<label>Cohort</label>
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


</body>




</html>
