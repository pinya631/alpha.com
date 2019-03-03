<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends CI_Controller {

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

		/* Home Page redirect if not logged in 				    */
		/* Redirect to home page if registration is successful  */
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
				$language = $this->input->post('language',TRUE);

				//var_dump(password_verify($this->input->post('password',TRUE),$data['user_info']['user_password']));
				
				/* verify the password and creates SESSION variables */
				if($this->users_model->check_login($username,$password)){
					
					$newdata = array(
					'username'  => $this->input->post('username',TRUE),
					'logged_in' => TRUE,
					'site_lang'  => $language
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
				$this->load->view('admin/login', $data);				
				$this->load->view('templates/footer-alt');			
		}
		
 		/* Register function */
		/* performs form validation and 
		 * registration of clients information to the database. 
		 * It will check for the following information:
			-First and Last Names are required
			-Email is a valid email format and not yet existing on the database 
			-Username is not yet existing in the database
			-Password is required and has min of 8 characters.	
			
		 * Output: 
			User information will be created to the database if successful and redirect to the Dashboard.
			If unsucccessful, It will return errors in the registration page.
		*/
		public function register()
		{

			if(isset($_SESSION['logged_in'])){
				return redirect(base_url());
			}	
			
			$data['title'] = 'Registration';
			/* Sets form validation rules */
			$this->form_validation->set_rules('firstname', 'First Name', 'required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[alpha_users.user_email]|strtolower',
				array(
					'required'=>'Please provide the %s.',
					'valid_email'=>'Please provide the %s.',					
					'is_unique'=>'The %s is already registered to the system.'			
					)
			);
			
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[alpha_users.user_username]',
				array(
					'required'=>'Please provide the %s.',
					'is_unique'=>'The %s is already registered to the system.'			
					)
			);
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

			/* Performs form validation */	
			if ($this->form_validation->run() === TRUE){
					$this->users_model->set_users();
					
					$newdata = array(
						'username'  => $this->input->post('username',TRUE),
						'logged_in' => TRUE
						);
				
					$this->session->set_userdata($newdata);	
					return redirect(base_url());					
				 
			}
			else{
					$this->load->view('templates/header-alt', $data);
					$this->load->view('users/register');
					$this->load->view('templates/footer-alt');

			}
		}
		
		/* Logout */
		public function logout()
		{
			// Removing session data
			$sess_array = array('username' => '');
			$this->session->unset_userdata('logged_in', $sess_array);
			$this->session->unset_userdata('site_lang', $sess_array);
			$this->session->sess_destroy();
			$data['message_display'] = 'Successfully Logout';
			return redirect('login');
		}		
}