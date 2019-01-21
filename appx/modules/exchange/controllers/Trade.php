<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trade extends CI_Controller {

    

    function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model('DomesticCurrency');
        $this->load->model('ForeignCurrency');
       
    }

    public function index()
    {
  
        #get all base trading currencies in case system functionality has to extend beyond ZAR
        $base_currencies['base_currencies'] = $this->DomesticCurrency->base_currencies();
        $foreign_currencies['foreign_currencies'] = $this->ForeignCurrency->all_currencies();
        $this->template->load('default_layout', 'contents' , 'exchange', array_merge($base_currencies, $foreign_currencies));

    }
  
}