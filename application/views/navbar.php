<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>

	<div class="container">
		<nav class="navbar navbar-trans">
			<div class="hidden-xs navbar-header">
				<a href="<?php echo base_url(); ?>"><span class="navbar-brand-bold">CPE</span> <span class="navbar-brand-light">Alumni</span></a>
			</div>
			<div class="visible-xs text-center navbar-header">
				<a href="<?php echo base_url(); ?>"><span class="navbar-brand-bold">CPE</span> <span class="navbar-brand-light">Alumni</span></a>
			</div>
			
			<div class="visible-xs text-center">	
				<?php if ($current_page == "" || $current_page == "register"):?>
					
				<?php elseif($current_page == "login"): ?>
				<?php elseif($current_page == "admin"): ?>
				<?php
					$username = $this->session->username;
					$name = $this->session->name;
					if($name!="admin"){
						redirect('/');
					}
				?>
				<?php else: ?>
				<?php
					$username = $this->session->username;
					$name = $this->session->name;
					if(!$username){
						redirect('/');
					}
					if($name=="admin"){
						redirect('admin');
					}

				?>
				<ul class="nav navbar-nav" id="mobile-menu">
					<div class="col-xs-2 col-xs-offset-1">
						<a href="<?php echo base_url();?>directory"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
					</div>
					<div class="col-xs-2">
						<a href="<?php echo base_url();?>profile"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
					</div>
					<div class="col-xs-2">
						<a href="<?php echo base_url();?>work"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span></a>
					</div>
					<div class="col-xs-2">
						<a href="<?php echo base_url();?>setting"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
					</div>
					<div class="col-xs-2">
						<a href="<?php echo base_url();?>logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a>
					</div>
				</ul>
				<?php endif; ?>

			</div>
			<div class="collapse navbar-collapse">

				<ul class="nav navbar-nav navbar-right">
					<?php if ($current_page == "" || $current_page == "register"):?>
						<!-- Index_page -->
						<?php
						$attr = array("class" => "", "method" =>"POST");
						echo form_open("login", $attr);
						?>
						<div class="form-group">
							<div class="form-inline form-login">
								<input type="text" name="username" class="form-control" placeholder="Username">
								<input type="password" name="password" class="form-control" placeholder="Password">
								<input type="submit" class="btn btn-trans" value="Login">
							</div>
						</div>
					<?php echo form_close();?>
				<?php elseif($current_page == "login"): ?>
				<?php else: ?>
				<?php
					$username = $this->session->username;
					if(!$username){
						redirect('/');
					}
				?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						<?php if($name!="admin"): echo $name; else:?> 
							<span class="label label-warning" style="font-size: 11.8px;">Logged in as admin</span>
						<?php endif;?> <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">

						<?php if($name!="admin"): ?>
							<li><a href="<?php echo base_url();?>profile"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Edit Profile</a></li>
							<li><a href="<?php echo base_url();?>work"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Edit Work Info</a></li>
							<li><a href="<?php echo base_url();?>setting"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Account Setting</a></li>
							<li role="separator" class="divider"></li>
						<?php endif; ?>
							<li><a href="<?php echo base_url();?>logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Log out</a></li>
						</ul>
					</li>
				<?php endif; ?>
				<!-- end Index_page -->
			</ul>
		</div>
	</nav>
</div>
