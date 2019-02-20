<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
	
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo base_url()."assets/bootstrap-4.1.3/css/bootstrap.min.css"; ?>" />
	<link rel="stylesheet" href="<?php echo base_url()."assets/css/theme.css"; ?>" />
	
	<script src="<?php echo base_url()."assets/js/jquery-3.3.1.min.js"; ?>"></script>

</head>
<body>
	<header>
		<div class = "container">
			<div class="row">
				<div class="col-8 offset-2">
					<div class="logo">
						<a href="<?php echo base_url(); ?>">
							<img src="<?php echo site_url()."assets/images/alpha.png"; ?>" alt="logo" ></img>
						</a>					
					</div>
						<ul class="main-navigation">
							<?php				
								
								if(isset($_SESSION['logged_in'])){
									echo '	<li class="menu-item"><a href="'.site_url('logout').'">Logout</a></li>';					
								}
							?>
						</ul>
				</div>
			</div>
		</div>
	</header>

