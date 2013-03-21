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
    	$this->db->order_by('issue_ID', 'desc');
    	$query = $this->db->get();
        return $query->result();
    }
    
    function recent_with_articles($limit)
    {
    	$this->db->select('*');
    	$this->db->from('issues');
    	$this->db->limit($limit);   
    	$this->db->order_by('issue_Published', 'desc');
    	$query = $this->db->get();
        return $query->result();
    }
    
    function latest()
    {
    	$this->db->select('*');
		$this->db->from('issues');
		$this->db->order_by('issue_ID', 'desc');
		$this->db->limit(1);
		$query = $this->db->get();
	    return $query->row();
    }
    
    function find($column, $where, $limit = 1000)
    {
    	$this->db->select('*');
    	$this->db->from('issues i');
    	$this->db->limit($limit); 
    	$this->db->where($column, $where);  
    	$query = $this->db->get();
        return $query->result();
    }
    
    function find_row($column, $where, $limit = 1000)
    {
    	$this->db->select('*');
    	$this->db->from('issues i');
    	$this->db->limit($limit); 
    	$this->db->where($column, $where);  
    	$query = $this->db->get();
        return $query->row();
    }
    
    function update($data, $id)
	{
		$this->db->where('issue_ID', $id);
		$this->db->update('issues', $data);
	}
	
	function insert($data)
    {
        $this->db->insert('issues', $data);
    }
    
    function destroy($id)
	{
		$this->db->where('issue_ID', $id);
		$this->db->delete('issues'); 
	}
	
}