<?php
class User extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function all($limit = 500)
    {
    	$this->db->select('*');
    	$this->db->from('users');
    	$this->db->limit($limit);   	
    	$query = $this->db->get();
        return $query->result();
    }
    
    function find($column, $where, $limit = 1000)
    {
    	$this->db->select('*');
    	$this->db->from('users u');
    	$this->db->limit($limit); 
    	$this->db->where($column, $where);  
    	$this->db->join('photos p', 'p.photo_ID = u.user_Photo', 'left outer');	
    	$query = $this->db->get();
        return $query->result();
    }

}