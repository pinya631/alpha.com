<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('create'); ?>
<div class = "container">
	<div class = "row">
		<div class = "col-12">
			<label for="firstname">First Name</label>
			<input type="input" name="firstname" />
		</div>
	</div>
</div>
<div class = "container">
	<div class = "row">
		<div class = "col-12">
			<label for="lastname">Last Name</label>
			<input type="input" name="lastname" />
		</div>
	</div>
</div>
<div class = "container">
	<div class = "row">
		<div class = "col-12">
			<label for="email">Email</label>
			<input type="email" name="email" />
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