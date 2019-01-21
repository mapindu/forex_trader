<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| ORDER CONTROLLER
|--------------------------------------------------------------------------
|Handles all functions in the order module
|
*/
class Orders extends CI_Controller {
    

    function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model('Order');

    }

    public function index()
    {
          $last_order_details['last_order_details'] = $this->Order->getlastOrder();
         // var_dump($last_order_details);exit;
          $this->template->load('default_layout', 'contents' , 'order_confirmation', $last_order_details);
    }
    
}