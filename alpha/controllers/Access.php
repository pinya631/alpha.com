<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends CI_Controller {

        public function __construct()
        {
			parent::__construct();
			$this->load->helper('url_helper');

			// Load session library
			$this->load->library('session');
			
			// Load form validation library
			$this->load->helper('form');
			$this->load->library('form_validation');

			// Load database
			$this->load->model('users_model');
        }

		/* Home Page redirect if not logged in 				    */
		/* Redirect to home page if registration is successful  */
		public function index(){
				
				if(!isset($_SESSION['logged_in'])){
					return redirect('login');
				}
				$data['user_item'] = $this->users_model->get_users();
				if (empty($data['user_item'])){
					show_404();
				}
				$data['title'] = 'Home';
	
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar-left', $data);
				$this->load->view('users/index', $data);
				$this->load->view('templates/footer');		
		}

		public function view($user_id = NULL ){
				
				if(!isset($_SESSION['logged_in'])){
					return redirect('login');
				}
				$data['user'] = $this->users_model->get_user($user_id);
				
				if (empty($data['user'])){
					//show_404();
				}
				$data['title'] = 'Home';
	
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar-left', $data);
				$this->load->view('users/view', $data);
				$this->load->view('templates/footer');		
		}	
		
		/* Login function */
		/* This will request for the username and password of the user.
		 * Upon input, It will request for the following information.
		    -Username
			-Password
	
			
		 * Output: 
		 	It will allow the user to access the dashboard if found successful 
		 	and will display error messages if not.
		*/
		public function login(){
			
			if(isset($_SESSION['logged_in'])){
				return redirect(base_url());
			}			
			
			/* Sets form validation rules */
			$this->form_validation->set_rules('username', 'Username', 'required|strtolower');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

			/* Runs form validation and submit */
			if ($this->form_validation->run() === TRUE){
				
				$username = $this->input->post('username',TRUE);
				$password = $this->input->post('password',TRUE);

				//var_dump(password_verify($this->input->post('password',TRUE),$data['user_info']['user_password']));
				
				/* verify the password and creates SESSION variables */
				if($this->users_model->check_login($username,$password)){
					
					$newdata = array(
					'username'  => $this->input->post('username',TRUE),
					'logged_in' => TRUE
					);
					
					$this->session->set_userdata($newdata);	
					if($this->users_model->check_role($username)){
						//var_dump('TRUE');
						return redirect(site_url('dashboard/'.$this->users_model->id));
					}else{
						//var_dump('FALSE');
						return redirect(site_url());
					}
					
				}else{
					$data['err_msg'] = 'Invalid Login. Please check you username and password';
				}
			}
			
			/* Shows the login page */		
			$data['title'] = 'Login';	

				$this->load->view('templates/header-alt', $data);
				$this->load->view('login/index', $data);				
				$this->load->view('templates/footer-alt');			
		}

		/* Logout */
		public function logout()
		{
			// Removing session data
			$sess_array = array('email' => '');
			$this->session->unset_userdata('logged_in', $sess_array);
			$data['message_display'] = 'Successfully Logout';
			return redirect('login');
		}		
}