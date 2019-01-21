<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    #get all users
    function all_users()
    {
        $query = $this->db->get('user');
        return $query->result();
    }
    #add user
    function add_user($user_details){
        $this->db->insert('user',$user_details);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
   
    function get_user($user_id){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('us_id', $user_id);
        $query = $this->db->get();
        return $query->result();
    }
}