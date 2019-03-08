<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

        public function __construct()
        {
			parent::__construct();
			
			/* Removed/Commented URL helper and Session Library as it was globally loaded in autoload.php */
			/* File Location: alpha/config/autoload.php */
			/* $this->load->helper('url_helper'); */
			/* $this->load->library('session');	*/	
						
			// Load form validation library
			$this->load->helper('form');
			$this->load->library('form_validation');

			// Load database
			$this->load->model('users_model');
			
			// Load language helper
			$this->lang->load('information','english');
        }

		/* Home Page						 		    	    */
		/* 												   	    */
		public function index(){
				
				/*Check session if user is logged_in*/
				if(!$this->session->has_userdata('logged_in')){
					return redirect('login');
				}
				
				/* Return user information on dashboard */
				$data['user_item'] = $this->users_model->get_users();
				if (empty($data['user_item'])){
					show_404();
				}
				$data['title'] = 'Home';
				/*Language Files Testing */
				$data['dashboard'] = $this->lang->line('dashboard');
				$data['user'] = $this->lang->line('users');
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar-left', $data);
				$this->load->view('users/index', $data);
				$this->load->view('templates/footer');		
		}


}