<?php
class Login extends CI_Controller {

        public function __construct()
        {
			parent::__construct();
			$this->load->helper('url_helper');

			// Load session library
			$this->load->library('session');
			
			// Load form validation library
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

				$data['user_item'] = $this->users_model->get_users($_SESSION['email']);
 
				if (empty($data['user_item']))
				{
				show_404();
				}
				 
				$data['title'] = 'Home';
	
				$this->load->view('templates/header', $data);
				$this->load->view('users/index', $data);
				$this->load->view('templates/footer');
				
		}

		
		/* Controller for Login Page */
		public function login(){
			
			/* Sets form validation rules */
			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');

			/* Runs form validation and submit */
			if ($this->form_validation->run() === TRUE){
				$data['user_info'] = $this->users_model->read_login_information($this->input->post('email',TRUE));

				//var_dump(password_verify($this->input->post('password',TRUE),$data['user_info']['user_password']));
				
				/* verify the password and creates SESSION variables */
				if($this->input->post('password',TRUE) == $data['user_info']['user_password']){
					
					$newdata = array(
					'email'  => $this->input->post('email',TRUE),
					'logged_in' => TRUE
					);
					
					$this->session->set_userdata($newdata);	
					return redirect(base_url());
					
				}else{
					//$data['err_msg'] = 'you access is invalid.';
				}
			}
			
			/* Shows the login page */		
			$data['title'] = 'Login';		
			$this->load->view('login/index', $data);				
		}

		/* Creating a user */
		public function register()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');
		 
			$data['title'] = 'Registration';
			/* Sets form validation rules */
			$this->form_validation->set_rules('firstname', 'First Name', 'required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.user_email]',
				array(
					'required'=>'Please provide the %s.',
					'valid_email'=>'Please provide the %s.',				
					'is_unique'=>'The email is already registered to the system.'			
					)
				);
			
			if ($this->form_validation->run() === FALSE)
				{
					$this->load->view('templates/header', $data);
					$this->load->view('users/register');
					$this->load->view('templates/footer');
				 
				}
			else
				{

					if ($this->form_validation->run() === TRUE){
						$this->users_model->set_users();
						//$this->users_model->register_contact(FALSE);
						$newdata = array(
							'email'  => $this->input->post('email',TRUE),
							'logged_in' => TRUE
							);
					
						$this->session->set_userdata($newdata);	
						return redirect(base_url());
					}

					
				}
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