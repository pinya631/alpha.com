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
	public function get_users($username = NULL){
		
		if($username === NULL){
			$query = $this->db->get('alpha_users');
			return $query->result_array();
		}else{
			$query = $this->db->get_where('alpha_users', array('user_username' => $username));
			return $query->row_array();
			
		}
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
	public function set_users(){

		/* Set status to active(0) by default 					*/
		/* Set role to User/Reviewer('User') by default			*/
		/* Set password to a hashed string inserted to the db	*/	
		$id = 0;
		
		if($this->input->post('id',TRUE) != NULL){
			$id = $this->input->post('id',TRUE);
		}
		
		$data = array(
			'user_id' => $id,
			'user_fname' => $this->input->post('firstname',TRUE),
			'user_lname' => $this->input->post('lastname',TRUE),
			'user_email' => $this->input->post('email',TRUE),
			'user_username' => $this->input->post('username',TRUE),
			'user_password' => password_hash($this->input->post('password',TRUE), PASSWORD_DEFAULT),
			'user_role' => 'User',
			'user_status' => 0, 
		);		
		
		if ($data['user_id'] != 0) {
			/* Updating new user data */
			$this->db->where('user_id', $data['user_id'])->update('alpha_users', $data);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
						
		}else{
			/* Creating new user data */
			return $this->db->insert('alpha_users', $data);
			
		}					
	}
	
	/* Read login information */
	public function read_login_information($email = NULL) {
		
		$query = $this->db->get_where('users', array('user_email' => $email));
		return $query->row_array();	
	}
	
	public function search_id(){
		
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