<?php
  class Discount extends CI_Model {
       
      public function __construct(){
          
        $this->load->database();
        
      }
    
    #get order by ID
    public function getdiscount($currency){  

        $this->db->select('*');

        $this->db->where('fc_abbreviation',$currency);

        $query = $this->db->get('discount');
       
        if($query->num_rows() > 0)
        {

            return $query->row()->di_percentage;

        }
        else
        {

          return 0;

        }

    }

}