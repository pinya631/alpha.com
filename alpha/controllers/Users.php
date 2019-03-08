<?php
class Users extends CI_Controller {
 
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
	}
 
	public function index(){
		
		/*Check session if user is logged_in*/
		if(!$this->session->has_userdata('logged_in')){
			return redirect('login');
		}
		
		//$data['users'] = $this->users_model->get_users();
		$data['title'] = 'Users';
		 
		$json_object = file_get_contents("https://alpha.com/api/users");
		$data = json_decode($json_object);
		//var_dump($data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar-left', $data);
		$this->load->view('users/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($user_id = NULL ){
			if(!$this->session->has_userdata('logged_in')){
				return redirect('login');
			}
			$data['user'] = $this->users_model->get_user($user_id);
			
			if (empty($data['user'])){
				//show_404();
			}
			$data['title'] = 'Users';

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar-left', $data);
			$this->load->view('users/view', $data);
			$this->load->view('templates/footer');		
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