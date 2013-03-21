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
		$this->db->where($column1, $where1);
		$this->db->join('departments d', 	'd.department_ID = 	a.article_Department', 'left outer');
		$this->db->join('topics t', 		't.topic_ID = 		a.article_Topic', 'left outer');
		$this->db->join('issues i', 		'i.issue_ID = 		a.article_Issue', 'left outer');
		$this->db->order_by('article_Published', 'DESC');
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
	    return $query->result();
	}
	
	function find_deuce($column1, $where1, $column2, $where2, $limit = 100)
	{
		$this->db->select('*');
		$this->db->from('articles a');
		$this->db->where($column1, $where1);
		$this->db->where($column2, $where2);
		$this->db->join('departments d', 	'd.department_ID = 	a.article_Department', 'left outer');
		$this->db->join('topics t', 		't.topic_ID = 		a.article_Topic', 'left outer');
		$this->db->join('issues i', 		'i.issue_ID = 		a.article_Issue', 'left outer');
		$this->db->limit($limit);
		$this->db->order_by('article_Published', 'DESC');
		$query = $this->db->get();
	    return $query->result();
	}
	
	function find_by_slug($slug)
	{
		$this->db->from('articles a');
		$this->db->where('a.article_Slug', $slug);
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
		$this->db->join('departments d', 	'd.department_ID = 	a.article_Department', 'left outer');
		$this->db->join('topics t', 		't.topic_ID = 		a.article_Topic', 'left outer');
		$this->db->join('issues i', 		'i.issue_ID = 		a.article_Issue', 'left outer');
		$this->db->order_by('a.article_ID', 'DESC');
		$this->db->limit($limit);
		$query = $this->db->get();
	    return $query->result();
	}
	
	function insert($data)
    {
        $this->db->insert('articles', $data);
    }
	
	function destroy($id)
	{
		$this->db->where('article_ID', $id);
		$this->db->delete('articles'); 
	}
    
    function update()
    {	
    	$data = array(
               'article_Headline' => $this->input->post('article_Headline'),
               'article_Topic' => $this->input->post('article_Topic'),
               'article_Slug' => $this->input->post('article_Slug'),
               'article_Status' => $this->input->post('article_Status'),
               'article_Issue' => $this->input->post('article_Issue'),
               'article_Deck' => $this->input->post('article_Deck'),
               'article_Department' => $this->input->post('article_Department'),
               'article_Bigphoto' => $this->input->post('article_Bigphoto'),
               'article_Copy' => $this->input->post('article_Copy'),
               'article_Published' => $this->input->post('article_Published'),
            );

		$this->db->where('article_ID', $this->input->post('article_ID'));
		$this->db->update('articles', $data);
    }

	function add_articles_to_issues($issues)
	{
		foreach($issues as $i):
			$i->articles = $this->find('article_Issue', $i->issue_ID);
		endforeach;
		
		return $issues;
	}
}