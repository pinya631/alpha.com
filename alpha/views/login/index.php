<section class='alt'>
	<div class="container">
		<div class="row">
					<div class="col-sm-10 col-md-6 col-lg-6 offset-sm-1 offset-md-3 offset-lg-3 box-type">
						<div class="row">
							<div class="col-12">
								<h3><?php echo $title; ?></h3>
							</div>
						</div>					
					
						<div class="row">
							<div class="col-12">					
								<div class="error"><p><?php (isset($err_msg) ? print $err_msg : "");  ?></p></div>
								<?php echo form_open('login'); ?>

									<input type="text" name="username" placeholder="Username" /><i class="fas fa-user custom-login-icon"></i>
									<div class ="error-msg"><?php echo form_error('username'); ?></div>

									<input type="password" name="password" placeholder="Password" /><i class="fas fa-lock custom-login-icon"></i>
									<div class ="error-msg"><?php echo form_error('password'); ?></div>
									
									<div class ="row">
										<div class="col-6 ">
											<div class="custom-checkbox">
												<!--<label class="check">Remember me?</label>
												<input type="checkbox" name="remember" id="remember">-->
											</div>
										</div>
										<div class="col-6 ">
											<input type="submit" name="submit" value="Login" />
											<button type="button" onclick="location.href='<?php echo site_url('register'); ?>'" name="signup" >Signup</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					
				</div>
		</div>
	</div>
</section>
	