<?php
class Article extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function all($limit = 100)
    {
    	$this->db->select('*');
    	$this->db->from('articles a');
    	$this->db->limit($limit);
    	$this->db->where('article_Status', 'published');
    	$this->db->order_by('a.article_ID', 'desc');
    	$this->db->join('departments d', 	'd.department_ID = 	a.article_Department', 'left outer');
		$this->db->join('topics t', 		't.topic_ID = 		a.article_Topic', 'left outer');
		$this->db->join('issues i', 		'i.issue_ID = 		a.article_Issue', 'left outer');
    	$query = $this->db->get();
        return $query->result();
    }

	function find_row($column, $where)
	{
		$this->db->from('articles a');
		$this->db->where('article_Status', 'published');
		$this->db->where($column, $where);
		$this->db->join('departments d', 	'd.department_ID = 	a.article_Department', 'left outer');
		$this->db->join('topics t', 		't.topic_ID = 		a.article_Topic', 'left outer');
		$this->db->join('issues i', 		'i.issue_ID = 		a.article_Issue', 'left outer');
		$this->db->order_by('article_Published', 'DESC');
		$query = $this->db->get();
	    return $query->row();
	}
	
	function find($column1, $where1, $limit = 100, $offset = 0)
	{
		$this->db->select('*');
		$this->db->from('articles a');
		$this->db->where('article_Status', 'published');
		$this->db->where($column1, $where1);
		$this->db->where('a.article_Status =', 'published');
		$this->db->join('departments d', 	'd.department_ID = 	a.article_Department', 'left outer');
		$this->db->join('topics t', 		't.topic_ID = 		a.article_Topic', 'left outer');
		$this->db->join('issues i', 		'i.issue_ID = 		a.article_Issue', 'left outer');
		$this->db->order_by('article_Published', 'DESC');
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
	    return $query->result();
	}
	
	function find_deuce($column1, $where1, $column2, $where2, $limit = 100, $ledes = true)
	{
		$this->db->select('*');
		$this->db->distinct();
		$this->db->from('articles a');
		$this->db->where($column1, $where1);
		$this->db->where($column2, $where2);
		$this->db->where('article_Status', 'published');
		$this->db->join('departments d', 	'd.department_ID = 	a.article_Department', 'left outer');
		$this->db->join('topics t', 		't.topic_ID = 		a.article_Topic', 'left outer');
		$this->db->join('issues i', 		'i.issue_ID = 		a.article_Issue', 'left outer');
		if($ledes):
			$this->db->join('ledes l', 			'l.lede_Article = 	a.article_ID', 'left outer'); // Experimental
		endif;
		$this->db->limit($limit);
		$this->db->order_by('article_Published', 'DESC');
		$query = $this->db->get();
	    return $query->result();
	}
	
	function find_by_slug($slug)
	{
		$this->db->from('articles a');
		$this->db->where('a.article_Slug', $slug);
		$this->db->where('article_Status', 'published');
		$this->db->join('departments d', 	'd.department_ID = 	a.article_Department', 'left outer');
		$this->db->join('topics t', 		't.topic_ID = 		a.article_Topic', 'left outer');
		$this->db->join('issues i', 		'i.issue_ID = 		a.article_Issue', 'left outer');
		$query = $this->db->get();
	    return $query->row();
	}
	
	function find_by_department($id, $limit = 10000)
	{
		$this->db->from('articles a');
		$this->db->where('a.article_Department', $id);
		$this->db->where('article_Status', 'published');
		$this->db->join('departments d', 	'd.department_ID = 	a.article_Department', 'left outer');
		$this->db->join('topics t', 		't.topic_ID = 		a.article_Topic', 'left outer');
		$this->db->join('issues i', 		'i.issue_ID = 		a.article_Issue', 'left outer');
		$this->db->order_by('a.article_ID', 'DESC');
		$this->db->limit($limit);
		$query = $this->db->get();
	    return $query->result();
	}
	
}