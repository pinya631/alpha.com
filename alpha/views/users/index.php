<section id="content-wrapper" class="col-md-10 col-xs-11 ">
		<div class="row no-gutters">
			<div class="col-md-12">
				<ol class="breadcrumb">
				  <li class="breadcrumb-item">
					<a href="#">Dashboard</a>
				  </li>
				  <li class="breadcrumb-item active">Overview</li>
				</ol>
			</div>
		</div>

		<div class="row no-gutters">	
			<div class="col-md-12">
				<h2><?php echo $title; ?></h2>
				<div class="row no-gutters">
					<div class="col-4">
						<h3>Full Name</h3>
					</div>

					<div class="col-4">
						<h3>Email</h3>
					</div>
					<div class="col-4">
						<h3>Role</h3>
					</div>

				</div>
				
				<?php foreach($user_item as $user){ ?>
				<div class="row no-gutters">
					<div class="col-4">
						<strong><?php echo $user['user_fname'].' '.$user['user_lname']; ?></strong>
					</div>

					<div class="col-4">
						<strong><?php echo $user['user_email']; ?></strong>
					</div>
					<div class="col-4">
						<strong><?php echo $user['user_role']; ?></strong>
					</div>
				</div>
				<?php } ?>
			</div>
			</div>

