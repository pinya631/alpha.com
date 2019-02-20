<section>
<div class="container">
		<div class="row">
			<div class="col-8 offset-2">
				<h2><?php echo $title; ?></h2>
				<div class="row">
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
				<div class="row">
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
</div>
</section>
