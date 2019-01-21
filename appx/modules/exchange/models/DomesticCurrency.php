<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DomesticCurrency extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function base_currencies()
    {
        $query = $this->db->get('domesticCurrency');
        return $query->result();
    }
   
}