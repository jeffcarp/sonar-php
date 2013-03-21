<?php
class Photo extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function all($limit = 1000)
    {
    	$this->db->select('*');
    	$this->db->from('photos');
    	$this->db->order_by('photo_ID', 'desc');
    	$this->db->limit($limit);
    	$query = $this->db->get();
        return $query->result();
    }
    
    function find_row($id)
    {
    	$this->db->select('*');
    	$this->db->from('photos');
    	$this->db->where('photo_ID', $id);
    	$query = $this->db->get();
        return $query->row();
    }
    
    function find_row_by_source($source)
    {
    	$this->db->select('*');
    	$this->db->from('photos');
    	$this->db->where('photo_Source', $source);
    	$query = $this->db->get();
        return $query->row();
    }

	function add_photos_to_objects($articles)
	{
		// Photos
		foreach($articles as $a):
			$this->db->select('*');
			$this->db->from('articles_photos ap');
			$this->db->where('ap.articlephoto_Article', $a->article_ID);
			$this->db->join('photos p', 'ap.articlephoto_Photo = p.photo_ID');
    		$query = $this->db->get();
    		$a->photos = $query->result();
		endforeach;
		
		// People
		foreach($articles as $a):
			$this->db->select('*');
			$this->db->from('articles_users au');
			$this->db->where('au.articleuser_Article', $a->article_ID);
			$this->db->join('people u', 'au.articleuser_User = u.person_ID');
    		$query = $this->db->get();
    		$a->people = $query->result();
		endforeach;
		
		return $articles;	
	}
	
	function add_dependencies_to_object($a)
	{
		// Photos
		$this->db->select('*');
		$this->db->from('articles_photos ap');
		$this->db->where('ap.articlephoto_Article', $a->article_ID);
		$this->db->join('photos p', 'ap.articlephoto_Photo = p.photo_ID');
		$query = $this->db->get();
		$a->photos = $query->result();
		
		// Users
		$this->db->select('*');
		$this->db->from('articles_users au');
		$this->db->where('au.articleuser_Article', $a->article_ID);
		$this->db->join('people u', 'au.articleuser_User = u.person_ID');
		$query = $this->db->get();
		$a->people = $query->result();
		
		return $a;	
	}
	
	function insert($data)
	{
		$this->db->insert('photos', $data); 
	}
	
	function update($data, $id)
	{
		$this->db->where('photo_ID', $id);
		$this->db->update('photos', $data);
	}
	
	function destroy($id)
	{
		$this->db->where('photo_ID', $id);
		$this->db->delete('photos'); 
	}
	
}