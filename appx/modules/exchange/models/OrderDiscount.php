<?php
  class OrderDiscount extends CI_Model {
       
      public function __construct(){
          
        $this->load->database();
        
      }
    
    # add order discount
    public function adddiscount($discount_details){

        if($this->db->insert('orderDiscount', $discount_details)){
           $insert_id = $this->db->insert_id();
           return $insert_id;

        }else{

           return false;

        }

    }

}