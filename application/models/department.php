<?php
class Department extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->db->table = 'departments';
    }
    
    function all($limit = 50)
    {
    	$query = $this->db->get($this->db->table, $limit);
        return $query->result();
    }

	function find($id)
	{
		$this->db->select('*');
		$this->db->from($this->db->table);
		$this->db->where('department_ID', $id);
		$query = $this->db->get();
	    return $query->row();
	}
	
	function find_row($column, $where)
    {
    	$this->db->select('*');
    	$this->db->from('departments d');
    	$this->db->where($column, $where);  
    	$query = $this->db->get();
        return $query->row();
    }
	
	function find_by_slug($slug)
	{
		$this->db->select('*');
		$this->db->from($this->db->table);
		$this->db->where('department_Slug', $slug);
		$query = $this->db->get();
	    return $query->row();
	}
    
    function insert()
    {
        $this->title   = $_POST['title']; // please read the below note
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->insert('entries', $this);
    }
    
    function update()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }
    
    function delete()
    {
    
    }

}