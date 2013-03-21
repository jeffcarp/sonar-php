<?php
class Lede extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function all()
    {
    	$this->db->select('*');
    	$this->db->from('ledes');
    	$query = $this->db->get();
    	$this->db->order_by('lede_ID', 'desc');
		$this->db->join('articles a', 'ledes.lede_Article = a.article_ID');
		$this->db->join('departments d', 	'a.article_Department = d.department_ID');
		$this->db->join('topics t', 	 	'a.article_Topic = 		t.topic_ID');
        return $query->result();
    }

	function find_by_location()
	{	
		$this->db->select('*');
		$this->db->distinct();
		$this->db->from('ledes');
		$this->db->order_by('lede_ID', 'desc');
		$this->db->join('articles a', 'ledes.lede_Article = a.article_ID');
		$this->db->join('departments d', 	'a.article_Department = d.department_ID', 'left');
		$this->db->join('topics t', 	 	'a.article_Topic = 		t.topic_ID', 'left');
    	$query = $this->db->get();
        return $query->result();
	}
	
	function find_row($column, $where)
	{
		$this->db->from('ledes l');
		$this->db->where($column, $where);
		$query = $this->db->get();
	    return $query->row();
	}

	function insert($data)
	{
		$this->db->insert('ledes', $data); 
	}
	
	function update($column, $where, $data)
	{
		$this->db->where($column, $where);
		$this->db->update('ledes', $data);
	}

}