<?php
class Person extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function all($limit = 500)
    {
    	$this->db->select('*');
    	$this->db->from('people');
    	$this->db->limit($limit);   	
    	$query = $this->db->get();
        return $query->result();
    }
    
    function find($column, $where, $limit = 1000, $order_by = '', $direction = '')
    {
    	$this->db->select('*');
    	$this->db->from('people u');
    	$this->db->limit($limit); 
    	$this->db->where($column, $where);  
    	$this->db->join('photos p', 'p.photo_ID = u.person_Photo', 'left outer');	
    	if($order_by != '' && $direction != ''):
	    	$this->db->order_by($order_by, $direction);
	    endif;
    	$query = $this->db->get();
        return $query->result();
    }
    
    function find_row($column, $where, $limit = 1000)
    {
    	$this->db->select('*');
    	$this->db->from('people u');
    	$this->db->limit($limit); 
    	$this->db->where($column, $where);  
    	$query = $this->db->get();
        return $query->row();
    }
    
    function insert($data)
    {
        $this->db->insert('people', $data);
    }
    
    function update($data, $id)
	{
		$this->db->where('person_ID', $id);
		$this->db->update('people', $data);
	}
    
    function destroy($id)
	{
		$this->db->where('person_ID', $id);
		$this->db->delete('people'); 
	}
    
/*
	function find($id)
	{
		$this->db->select('*');
		$this->db->from($this->db->table);
		$this->db->where('department_ID', $id);
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
    
    }*/

}