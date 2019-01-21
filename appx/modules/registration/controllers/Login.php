<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| LOGIN CONTROLLER
|--------------------------------------------------------------------------
|User Login
|
*/

class Login extends CI_Controller {
    

    function __construct()
    {
        parent::__construct();

        $this->load->helper('url');

    }

    public function index()
    {
          
          $this->template->load('default_layout', 'contents' , 'login', null);
    }
    
}