<?php
class Department extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

	function find($column1, $where1, $limit = 1000)
	{
		$this->db->select('*');
		$this->db->from('departments d');
		$this->db->where($column1, $where1);
		$this->db->limit($limit);
		$query = $this->db->get();
	    return $query->result();
	}
}