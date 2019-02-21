<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<![endif]-->	
	<title>Alpha</title>
	<link rel="stylesheet" href="<?php echo base_url()."assets/bootstrap-4.1.3/css/bootstrap.min.css"; ?>" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url()."assets/css/sb-admin.min.css"; ?>" />
	<link rel="stylesheet" href="<?php echo base_url()."assets/css/theme.css"; ?>" />

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

</head>
<body id="page-top">

		<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

		<a class="navbar-brand mr-1" href="<?php echo site_url(); ?>">
			<img class="logo" src="<?php echo base_url()."assets/images/alpha-white.png"; ?>" alt="" >
		</a>
		
		<!-- <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle"  href="#"  > -->
		<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle">
			<i class="fas fa-bars"></i>
		</button>

		<!-- Navbar Search -->
		<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
		  <div class="input-group">
			<!-- <input type="text" class="form-control" placeholder="Search for..." aria-label="Search"  aria-describedby="basic-addon2" > -->
			<input type="text" class="form-control" placeholder="Search for..." aria-label="Search" >
			<div class="input-group-append">
			  <button class="btn btn-primary" type="button">
				<i class="fas fa-search"></i>
			  </button>
			</div>
		  </div>
		</form>

    <!-- Navbar -->
		<ul class="navbar-nav ml-auto ml-md-0">
		  <li class="nav-item dropdown no-arrow mx-1">
			<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  <i class="fas fa-bell fa-fw"></i>
			  <span class="badge badge-danger">9+</span>
			</a>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
			  <a class="dropdown-item" href="#">Action</a>
			  <a class="dropdown-item" href="#">Another action</a>
			  <div class="dropdown-divider"></div>
			  <a class="dropdown-item" href="#">Something else here</a>
			</div>
		  </li>
		  <li class="nav-item dropdown no-arrow mx-1">
			<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  <i class="fas fa-envelope fa-fw"></i>
			  <span class="badge badge-danger">7</span>
			</a>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
			  <a class="dropdown-item" href="#">Action</a>
			  <a class="dropdown-item" href="#">Another action</a>
			  <div class="dropdown-divider"></div>
			  <a class="dropdown-item" href="#">Something else here</a>
			</div>
		  </li>
		  <li class="nav-item dropdown no-arrow">
			<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  <i class="fas fa-user-circle fa-fw"></i>
			</a>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
			  <a class="dropdown-item" href="#">Settings</a>
			  <a class="dropdown-item" href="#">Activity Log</a>
			  <div class="dropdown-divider"></div>
			  <!-- <a class="dropdown-item" href="<?php echo site_url('logout'); ?>" data-toggle="modal" data-target="#logoutModal">Logout</a> -->
			  <a class="dropdown-item" href="<?php echo site_url('logout'); ?>">Logout</a>
			</div>
		  </li>
		</ul>

		</nav>

	
<!-- body content -->
<div id="wrapper">
