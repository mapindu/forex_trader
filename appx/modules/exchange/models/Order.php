<?php
  class Order extends CI_Model {
       
      public function __construct(){
          
        $this->load->database();
        
      }
    
    #get order by ID
    public function getorderbyid($order_id){  

        $this->db->select('*');

        $this->db->where('or_id',$order_id);

        $query = $this->db->get('order');
       
        if($query->num_rows() > 0)
        {

            return $query->result_array();

        }
        else
        {

          return 0;

        }

    }

    # add order 
    public function addorder($order_details){

        if($this->db->insert('order', $order_details)){
           $insert_id = $this->db->insert_id();
           return $insert_id;

        }else{

           return false;

        }

    }

    #get the last order
    public function getlastOrder(){
      $last_row = $this->db->select('*')->order_by('or_id',"desc")->limit(1)->get('order')->row();
      return $last_row;
    }

}