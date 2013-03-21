<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

	function __construct()
	{
		// dude, I'm tripping balls
		parent::__construct();
		$this->load->model('Article');
		$this->load->model('Department');
		$this->load->model('Person');
		$this->load->model('Photo');
		$this->load->model('Topic');
		$this->load->model('super_model', 'Supermodel');
		
		$this->data['forecast'] = weather();
	}
	
	public function page($page)
	{	
		$this->data['page'] = $page;
		
		$this->data['department'] = $this->Department->find_row('department_Slug', 'blog');
		
		$offset = (10*($page-1));		
		$this->data['articles'] = $this->Article->find('article_Department', $this->data['department']->department_ID, 10, $offset);
		$this->data['articles'] = $this->Photo->add_photos_to_objects($this->data['articles']);
		
		/* Determine next and previous buttons
		======================================== */
		$page2 = $page + 1;
		$offset2 = (10*($page2-1));		
		$this->data['morearticles'] = $this->Article->find('article_Department', $this->data['department']->department_ID, 10, $offset2);

		$this->data['next'] = ($this->data['morearticles']) ? true : false;
		$this->data['previous'] = ($page <= 1) ? false : true;

		/* Get authors
		==================*/
		$this->data['authors']['jeff'] = $this->Person->find_row('person_Slug', 'jeff-carpenter');
		$this->data['authors']['lindsay'] = $this->Person->find_row('person_Slug', 'lindsay-putnam');
		
		$this->data['authors']['jeff'] = $this->Supermodel->party_wave(
			$this->data['authors']['jeff'],	// waves
			array('photos')				// surfers
		);
		$this->data['authors']['lindsay'] = $this->Supermodel->party_wave(
			$this->data['authors']['lindsay'],	// waves
			array('photos')				// surfers
		);

		/* Move to view
		==================*/
		$this->data['view'] = 'blog/index';
		$this->load->view('layouts/blog', $this->data);	
		
		$this->output->cache(20);
	}
	
	public function topics($slug)
	{
		$this->data['department'] = $this->Department->find_row('department_Slug', 'blog');
	
		$topic = $this->Topic->find_row('topic_Slug', $slug);
		if (!$topic) { /* send to 404 and return */ }
	
		$this->data['articles'] = $this->Article->find_deuce('article_Department', $this->data['department']->department_ID, 'article_Topic', $topic->topic_ID);
		$this->data['articles'] = $this->Photo->add_photos_to_objects($this->data['articles']);
		
		/* Move to view
		==================*/
		$this->data['view'] = 'blog/topic';
		$this->load->view('layouts/blog', $this->data);	
		
		$this->output->cache(20);
	}
	
	public function oldblog($id = '')
	{
		header('Location: /blog/'.$id);
	}

}

/* End of file bubble.php */
/* Location: ./application/controllers/bubble.php */