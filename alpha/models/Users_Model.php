<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_Model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->library('session');
		$this->id = 0;
	}

	/* Return the user's database records */
	/* Used by controller methods:        */
	/* 1. index                           */
	/*                                    */
	public function get_users($username = FALSE){
		
		if ($username === FALSE){
			$query = $this->db->get('alpha_users');
			return $query->result_array();
		}else{
			return $query->row_array();
		}
	}
	
	/* get_user method returns a single row according to username */
	public function get_user($id){
		$query = $this->db->get_where('alpha_users', array('user_id' => $id));
		return $query->row_array();
	}
	


	/* Creates a record of the new user   */
	
	/* Insert the following information for
	 * individual users.
	 * Information include:
		-First Name
		-Last Name
		-Email
		-Username
		-Password
	*/
	public function set_users($id = 0){

		$data = array(
			'user_fname' => $this->input->post('firstname',TRUE),
			'user_lname' => $this->input->post('lastname',TRUE),
			'user_email' => $this->input->post('email',TRUE),
			'user_username' => $this->input->post('username',TRUE),
			'user_password' => password_hash($this->input->post('password',TRUE), PASSWORD_DEFAULT),
			'user_role' => 'User'
		);
		
		
		if ($id == 0) {
			/* Creating new user data */
			$this->db->insert('alpha_users', $data);
		} else {
			/* Updating new user data */
			$this->db->where('user_id', $id);
			$this->db->update('alpha_users', $data);
		}
	}
	
	/* Read login information */
	public function read_login_information($email = NULL) {
		
		$query = $this->db->get_where('users', array('user_email' => $email));
		return $query->row_array();	
	}
	
	/* Validates the login of the user */
	/* $username - username of the account */
	/* $password - password of the account */	
	public function check_login($username, $password){
		$this->db->where('user_username',$username);
		
		$query = $this->db->get('alpha_users');
		
		/* Returns a record */
		$record = $query->row();
		
		/* Checks for NULL values in record */
		if($record != NULL){
			$stored_password = $record->user_password;
			if(password_verify($this->input->post('password',TRUE),$stored_password)){
				return true;
			}else{
				return false;
			}			
		}else{
			return false;
		}
	}
	
	public function check_role($username){
		$this->db->where('user_username',$username);
		$query = $this->db->get('alpha_users');
		$record = $query->row();
		$role = $record->user_role;
		
		$this->id = $record->user_id; 
		if($role === 'User'){
			return true;
		}else{
			return false;
		}		
		
	}
}