<?php
class Users extends CI_Controller {
 
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
 
	public function index(){
		
		$data['users'] = $this->users_model->get_users();
		$data['title'] = 'Users Archive';
		 
		$this->load->view('templates/header', $data);
		$this->load->view('users/index', $data);
		$this->load->view('templates/footer');
	}


	public function view($id = NULL)
	{
	$data['users_item'] = $this->users_model->get_users($id);
	 
	if (empty($data['users_item']))
	{
	show_404();
	}
	 
	$data['title'] = $data['users_item']['cib_user_fname'];
	 
	$this->load->view('templates/header', $data);
	$this->load->view('users/view', $data);
	$this->load->view('templates/footer');
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

	
	
	public function edit($id)
	{
	 
		if (empty($id))
		{
			show_404();
		}
	 
		$this->load->helper('form');
		$this->load->library('form_validation');
		 
		$data['title'] = "Edit a user's information";
		$data['user_item'] = $this->users_model->get_users_by_id($id);
		 
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		 
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('users/edit', $data);
			$this->load->view('templates/footer');		 
		}
		else
		{
		$this->users_model->set_users($id);
		redirect( base_url());
		}
	}

	public function delete($id)
	{
		//$id = $this->uri->segment(3);
	 
		if (empty($id))
		{
			show_404();
		}
	 
		$faqs_item = $this->users_model->get_users_by_id($id);
	 
		$this->users_model->delete_users($id);
		redirect( base_url());
	} 
}