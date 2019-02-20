<section class='alt'>
	<div class="container">
	  <div class="row">
			<div class="col-sm-10 col-md-6 col-lg-6 offset-sm-1 offset-md-3 offset-lg-3 box-type">
			<h3><?php echo $title; ?></h3>
			<?php echo form_open('register'); ?>
					<div class = "fields">
						<input type="text" name="firstname" placeholder="First Name" />
						<div class ="error-msg"><?php echo form_error('firstname'); ?></div>
					</div>
					<div class = "fields">
						<input type="text" name="lastname" placeholder="Last Name" />
						<div class ="error-msg"><?php echo form_error('lastname'); ?></div>
					</div>
					<div class = "fields">
						<input type="email" name="email" placeholder="Email" />
						<div class ="error-msg"><?php echo form_error('email'); ?></div>
					</div>
					<div class = "fields">
						<input type="text" name="username" placeholder="Username" />
						<div class ="error-msg"><?php echo form_error('username'); ?></div>
					</div>
					<div class = "fields">
						<input type="password" name="password" placeholder="Password" />
						<div class ="error-msg"><?php echo form_error('password'); ?></div>
					</div>


					<!--<div class = "fields">
						<select name="shirts">
								<option value="small" selected="selected">User</option>
								<option value="med">Administrator</option>
						</select>
						<div class ="error-msg"><?php /* echo form_error('password'); */ ?></div>
					</div>-->
					
					<div class ="row">
						<div class="col-6 ">

						</div>
						
						<div class="col-6 ">
							<input type="submit" name="submit" value="Create Users" />
							<button type="button" onclick="location.href='<?php echo site_url('login'); ?>'" name="logout" >Login</button>
						</div>
					</div>

			</form>
		</div>
	</div>
	</div>
</section>