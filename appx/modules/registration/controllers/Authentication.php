<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| AUTHENTICATION API
|--------------------------------------------------------------------------
|Handles all CRUD operations for user management
|
*/

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Authentication extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        # Load the user model
        $this->load->model('user');
    }
    
    #user login
    public function login_post() {
        # Get the post data
        $email = $this->post('emailAdd');
        $password = $this->post('password');
        
        # Validate the post data
        if(!empty($email) && !empty($password)){
            
            # Check if any user exists with the given credentials
            $con['returnType'] = 'single';
            $con['conditions'] = array(
                'us_email' => $email,
                'us_password' => md5($password),
                'us_status' => 1
            );
            $user = $this->user->getRows($con);
            
            if($user){
                # Set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'User successfully logged in',
                    'data' => $user
                ], REST_Controller::HTTP_OK);
            }else{
                # Set the response and exit
                #BAD_REQUEST (400) being the HTTP response code
                $this->response("Wrong email or password.", REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            # Set the response and exit
            $this->response("Please enter email and password.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    #user registration
    public function registration_post() {
        # Get the post data
        $full_name = strip_tags($this->post('fullName'));
        $email = strip_tags($this->post('emailAdd'));
        $password = $this->post('password');
        $phone = strip_tags($this->post('phoneNum'));
        
        # Validate the post data
        if(!empty($full_name) && !empty($phone) && !empty($email) && !empty($password)){
            
            # Check if the given email already exists
            $con['returnType'] = 'count';
            $con['conditions'] = array(
                'us_email' => $email,
            );
            $userCount = $this->user->getRows($con);
            
            if($userCount > 0){
                # Set the response and exit
                $this->response("The given email already exists.", REST_Controller::HTTP_BAD_REQUEST);
            }else{
                # Insert user data
                $userData = array(
                    'us_fullname' => $full_name,
                    'us_email' => $email,
                    'us_password' => md5($password),
                    'us_phone' => $phone
                );
                $insert = $this->user->insert($userData);
                
                # Check if the user data is inserted
                if($insert){
                    # Set the response and exit
                    $this->response([
                        'status' => TRUE,
                        'message' => 'The user has been added successfully.',
                        'data' => $insert
                    ], REST_Controller::HTTP_OK);
                }else{
                    # Set the response and exit
                    $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
                }
            }
        }else{
            # Set the response and exit
            $this->response("Provide complete user info to add.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    
}