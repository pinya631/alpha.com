<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
	
	<title>Alpha</title>
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="<?php echo base_url()."assets/bootstrap-4.1.3/css/bootstrap.min.css"; ?>" />
	<link rel="stylesheet" href="<?php echo base_url()."assets/css/theme.css"; ?>" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url(); ?>assets/images/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>assets/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>assets/images/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo base_url(); ?>assets/images/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo base_url(); ?>assets/images/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">	
<body class="alt">
	<header class="alt">
		<div class = "container">
			<div class="row">
				<div class="col-sm-10 col-md-6 col-lg-6 offset-sm-1 offset-md-3 offset-lg-3 ">
					<div class="logo">					
						<img src="<?php echo site_url()."assets/images/alpha.png"; ?>" alt="logo" >
					</div>
				</div>
			</div>
		</div>
	</header>
<section class='alt main-content'>
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
	<footer  class="alt">
		<div class = "container">
				<div class="row">
					<div class="col-sm-10 col-md-6 col-lg-6 offset-sm-1 offset-md-3 offset-lg-3 box-type">
						<p class="copyright text-center">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
					</div>
				</div>
		</div>
		<script src="<?php echo base_url().'assets/js/jquery-3.3.1.min.js'; ?>"></script>
		<script src="<?php echo base_url().'assets/bootstrap-4.1.3/js/bootstrap.min.js'; ?>"></script>
	</footer>
</body>
</html>	