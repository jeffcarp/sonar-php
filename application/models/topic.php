<?php
class Topic extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function all($limit = 100)
    {
    	$this->db->select('*');
    	$this->db->from('topics');
    	$this->db->limit($limit);   	
    	$query = $this->db->get();
        return $query->result();
    }
    
    function find($column, $where, $limit = 1000)
    {
    	$this->db->select('*');
    	$this->db->from('topics t');
    	$this->db->limit($limit); 
    	$this->db->where($column, $where);  
    	$query = $this->db->get();
        return $query->result();
    }
    
    function find_row($column, $where, $limit = 1000)
    {
    	$this->db->select('*');
    	$this->db->from('topics t');
    	$this->db->limit($limit); 
    	$this->db->where($column, $where);  
    	$query = $this->db->get();
        return $query->row();
    }
    
    function insert($data)
    {
        $this->db->insert('topics', $data);
    }
    
    function update($data, $id)
	{
		$this->db->where('topic_ID', $id);
		$this->db->update('topics', $data);
	}
	
	function destroy($id)
	{
		$this->db->where('topic_ID', $id);
		$this->db->delete('topics'); 
	}
	
	function topic_article_count($topics)
	{
		foreach ($topics as $t):
		
			$this->db->from('articles a');
	    	$this->db->where('article_Topic', $t->topic_ID);  
	    	$query = $this->db->get();
			
			$t->article_count = $query->num_rows();
			
		endforeach;
		
		return $topics;
	}

}