<?php
class Users extends CI_Controller {
 
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->helper('url_helper');
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

 
	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
	 
		$data['title'] = 'Create a User';
	 
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		
		if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header', $data);
				$this->load->view('users/create');
				$this->load->view('templates/footer');
			 
			}
		else
			{
				$this->users_model->set_users();
				$this->load->view('templates/header', $data);
				$this->load->view('users/success');
				$this->load->view('templates/footer');
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