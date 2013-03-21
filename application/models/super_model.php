<?php
class Super_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	

	// Function party_wave takes an object ($wave, e.g. a bunch of articles), and
	// adds surfers (many-to-many associations) to the object under the
	// name specified.

	function party_wave($waves, $surfers)
	{

		foreach ($waves as $wave):
			foreach ($surfers as $dude):
			
				if (isset($wave->article_ID) && $dude == 'photos'): 
					
					$this->db->select('*');
					$this->db->from('articles_photos ap');
					$this->db->where('ap.articlephoto_Article', $wave->article_ID);
					$this->db->join('photos p', 'ap.articlephoto_Photo = p.photo_ID');
		    		$query = $this->db->get();
		    		$wave->photos = $query->result();
							    		
		    	elseif (isset($wave->article_ID) && $dude == 'people'): 
					
					$this->db->select('*');
					$this->db->from('articles_users au');
					$this->db->where('au.articleuser_Article', $wave->article_ID);
					$this->db->join('people u', 'au.articleuser_User = u.person_ID');
		    		$query = $this->db->get();
		    		$wave->people = $query->result();
					
				elseif (isset($wave->person_ID) && $dude == 'articles'): 
					
					$this->db->select('*');
					$this->db->from('articles_users au');
					$this->db->where('au.articleuser_User', $wave->person_ID);
					$this->db->order_by('article_Published', 'DESC');
					$this->db->join('articles a', 'au.articleuser_Article = a.article_ID');
					$this->db->join('departments d', 'a.article_Department = d.department_ID');
					$this->db->join('topics t', 'a.article_Topic = t.topic_ID', 'left outer');
		    		$query = $this->db->get();
		    		$wave->articles = $query->result();
		    		
		    		// Could we call this recursively? Could we call this recursively?
		    		foreach ($wave->articles as $a):
		    		
			    		$this->db->select('*');
						$this->db->from('articles_photos ap');
						$this->db->where('ap.articlephoto_Article', $a->article_ID);
						$this->db->join('photos p', 'ap.articlephoto_Photo = p.photo_ID');
			    		$query = $this->db->get();
			    		$a->photos = $query->result();
			    				    	
			    	endforeach;
					
				else: 
					continue;

				endif;	

			endforeach;
		endforeach;
			
			/*
			$this->db->select('*');
			
			// Make association table name alphabetically
			$sorted = sort($array($wave,$dude));
			echo $sorted[0].'_'$sorted[1];
			exit;
			
    		$this->db->from($wave.'_'.$dude);
       		$query = $this->db->get();
        	return $query->result();
			
		*/
		
		return $waves;
	}
	
}