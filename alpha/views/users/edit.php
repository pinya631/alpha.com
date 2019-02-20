<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('edit/'.$user_item['cib_user_id']); ?>
<div class = "container">
	<div class = "row">
		<div class = "col-12">
			<label for="firstname">First Name</label>
			<input type="input" name="firstname" value="<?php echo $user_item['cib_user_fname']; ?>" />
		</div>
	</div>
</div>
<div class = "container">
	<div class = "row">
		<div class = "col-12">
			<label for="lastname">Last Name</label>
			<input type="input" name="lastname" value="<?php echo $user_item['cib_user_lname']; ?>"/>
		</div>
	</div>
</div>
<div class = "container">
	<div class = "row">
		<div class = "col-12">
			<label for="email">Email</label>
			<input type="email" name="email" value="<?php echo $user_item['cib_user_email']; ?>"/>
		</div>
	</div>
</div>
<div class = "container">
	<div class = "row">
		<div class = "col-12">
			<label for="premium">Purchase Premium?</label>
			<input type="checkbox" name="ispremium" value="accept" checked="checked" />
		</div>
	</div>
</div>

<input type="submit" name="submit" value="Create Users" />
</form>