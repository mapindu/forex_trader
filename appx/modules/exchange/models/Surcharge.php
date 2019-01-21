<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surcharge extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    
    #get surcharge for a currency - API call
    public function getsurcharge($currency_abbreviation){  

        $this->db->select('su_percentage');

        $this->db->where('fc_abbreviation',$currency_abbreviation);

        $query = $this->db->get('surcharge');
       
        if($query->num_rows() == 1)
        {

            return $query->row('su_percentage');

        }
        else
        {

        	return 0;

        }

    }
      
}