<?php
class Articles_Users_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function all()
    {
    	echo 'does nothing';
    }
    
    function find_by_article($id)
    {
    	$this->db->select('*');
    	$this->db->from('articles_users'); 
    	$this->db->where('articleuser_Article', $id);
    	$query = $this->db->get();
        return $query->result();
    }
    
    function insert($data)
    {
		$this->db->insert('articles_users', $data);
    }
    
    function delete($id)
    {
    	$this->db->where('articleuser_Article', $id);
		$this->db->delete('articles_users'); 
    }
    
}