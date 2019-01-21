<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExchangeRate extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    #to change this so it uses the bespoke API developed
    function update_rates($updated_rates)
    {
        $this->db->update_batch('exchangeRate', $updated_rates, 'er_id'); 
       
    }

    #get exchange rate by id - API call
    public function getratebyid($currency_id){  

        $this->db->select('er_rate');

        $this->db->where('fc_id',$currency_id);

        $query = $this->db->get('exchangeRate');
       
        if($query->num_rows() == 1)
        {

            return $query->result_array();

        }
        else
        {

        	return 0;

        }

    }
   
}