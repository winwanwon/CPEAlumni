<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>

	<div class="container">
		<nav class="navbar navbar-trans">
			<div class="navbar-header">
				<a href="<?php echo base_url(); ?>"><span class="navbar-brand-bold">CPE</span> <span class="navbar-brand-light">Alumni</span></a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<form class="navbar-form navbar-left">

				</form>
				<ul class="nav navbar-nav navbar-right">
					<?php if ($current_page == "" || $current_page == "register"):?>
						<!-- Index_page -->
						<?php
						$attr = array("class" => "");
						echo form_open('login', $attr);
						?>
						<div class="form-group">
							<div class="form-inline form-login">
								<input type="text" name="username" class="form-control" placeholder="Username">
								<input type="password" name="password" class="form-control" placeholder="Password">
								<input type="submit" class="btn btn-trans" value="Login">
							</div>
						</div>
					</form>
				<?php elseif($current_page == "login"): ?>
				<?php else: ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<?php echo $name; ?> <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url();?>profile"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Edit Profile</a></li>
							<li><a href="<?php echo base_url();?>work"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Edit Works Info</a></li>
							<li><a href="<?php echo base_url();?>setting"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Account Setting</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="<?php echo base_url();?>logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Log out</a></li>
						</ul>
					</li>
				<?php endif; ?>
				<!-- end Index_page -->
			</ul>
		</div>
	</nav>
</div>
