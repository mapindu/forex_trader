<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    #global variables
    var $data;

    function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model('DomesticCurrency');
        $this->load->model('User');
        $this->data = array(
            'current_date' => date('Y-m-d H:i:s')
        );
    }

    public function index()
    {
  
        $base_currencies['base_currencies'] = $this->DomesticCurrency->base_currencies();
        $this->template->load('default_layout', 'contents' , 'index', $base_currencies);

    }

    
}