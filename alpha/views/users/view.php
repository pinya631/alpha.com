<div class="col-md-9">
<!--<section class="content"> -->
	<div class="row no-gutters">
		<div class="col-md-12">
			<h3><?php echo $title; ?></h3>
		</div>
	</div>				
	<div class="row no-gutters">
		<div class="col-4 ">
			<h3>Full Name</h3>
		</div>

		<div class="col-4">
			<h3>Email</h3>
		</div>
		<div class="col-4">
			<h3>Role</h3>
						</div>
	</div>
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
				

	
<!-- </section> -->
</div>