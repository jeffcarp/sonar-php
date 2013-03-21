<?php
class Articles_Photos_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function all($limit = 500)
    {
    	$this->db->select('*');
    	$this->db->from('articles_photos');
    	$this->db->limit($limit);   
    	$this->db->order_by('issue_ID', 'desc');	
    	$query = $this->db->get();
        return $query->result();
    }
    
    function find_by_article($id)
    {
    	$this->db->select('*');
    	$this->db->from('articles_photos'); 
    	$this->db->where('articlephoto_Article', $id);
    	$query = $this->db->get();
        return $query->result();
    }
    
    function insert($data)
    {
		$this->db->insert('articles_photos', $data);
    }
    
    function delete($id)
    {
    	$this->db->where('articlephoto_Article', $id);
		$this->db->delete('articles_photos'); 
    }

}