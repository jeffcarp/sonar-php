<?php
class Issue extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function all($limit = 1000)
    {
    	$this->db->select('*');
    	$this->db->from('issues');
    	$this->db->limit($limit);   
    	$this->db->where('issue_Status', 1);
    	$this->db->order_by('issue_ID', 'desc');
    	$query = $this->db->get();
        return $query->result();
    }
    
    function latest()
    {
    	$this->db->select('*');
		$this->db->from('issues');
		$this->db->order_by('issue_ID', 'desc');
		$this->db->where('issue_Status', 1);
		$this->db->limit(1); 
		$query = $this->db->get();
	    return $query->row();
    }
    
    function find($column, $where, $limit = 1000)
    {
    	$this->db->select('*');
    	$this->db->from('issues i');
    	$this->db->limit($limit); 
    	$this->db->where('issue_Status', 1);
    	$this->db->where($column, $where);  
    	$query = $this->db->get();
        return $query->result();
    }
    
    function find_row($column, $where, $limit = 1000)
    {
    	$this->db->select('*');
    	$this->db->from('issues i');
    	$this->db->limit($limit); 
    	$this->db->where('issue_Status', 1);
    	$this->db->where($column, $where);  
    	$query = $this->db->get();
        return $query->row();
    }
    
    function recent_issues_with_articles()
    {
    	
    	
    	$this->db->join('topics t', 		't.topic_ID = 		a.article_Topic', 'left outer');
		$this->db->join('issues i', 		'i.issue_ID = 		a.article_Issue', 'left outer');
    }

}