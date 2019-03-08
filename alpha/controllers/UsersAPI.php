<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class UsersAPI extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
		$this->load->model('users_model');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 10000; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function users_get()
    {		
		$user = $this->get('username');
		$users = $this->users_model->get_users($user);

        if ($user === NULL){
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($users)
            {	
                // Set the response and exit
                $this->response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }else{
			if(!empty($users)){
				$this->set_response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
			}else{
				$this->set_response(['status' => FALSE, 'message' => 'User could not be found'], REST_Controller::HTTP_NOT_FOUND); 
				// NOT_FOUND (404) being the HTTP response code
				
			}
		}

    }

    public function users_post()
    {	
        $status = $this->users_model->set_users();
		$message = [
            'email' => $this->post('email'),
            'username' => $this->post('username'),			
            'message' => 'Added a resource'
        ];
		
		if($status){
			$this->set_response($message, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
		}else{
			$this->set_response(['status' => FALSE, 'message' => 'User could not be found'], REST_Controller::HTTP_NOT_FOUND); 
		}
    }
	
    public function users_delete()
    {
        $id = (int) $this->get('id');

        // Validate the id.
        if ($id <= 0)
        {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // $this->some_model->delete_something($id);
        $message = [
            'id' => $id,
            'message' => 'Deleted the resource'
        ];

        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
    }
	
	public function demo_get(){
		$message = ['name' => 'Andrey', 'city' => 'Test'];
		$this->set_response($message, REST_Controller::HTTP_OK);
	}

}
