<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Topics extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Topic');
		$this->load->model('Article');
		$this->load->model('Photo');
		$this->load->model('Department');
		$this->load->model('super_model', 'Supermodel');
		
		$this->data['department'] = $this->Department->find_by_slug('topics');
		
		$this->data['forecast'] = weather();
	}

	// /topics
	public function index()
	{		
		// Get all topics
		$this->data['topics'] = $this->Topic->all();
		
		// Get article count for each topic
		$this->data['topics'] = $this->Topic->topic_article_count($this->data['topics']);
	
		// Bubble (these two calls can be consolidated)
		$this->data['bubble'] = $this->Article->find_by_department(7, 4);
		$this->data['bubble'] = $this->Photo->add_photos_to_objects($this->data['bubble']);
		
		$this->data['view'] = 'topics/index';
		$this->load->view('templates/front_facing', $this->data);
		
		$this->output->cache(20);
	}

	// /topics/show/34
	// /topics/hormones
	public function show($id)
	{
		// Find topic by ID or Slug
		if (!is_numeric($id)):
			$this->data['topics'] = $this->Topic->find('topic_Slug', $id);
		else:
			$this->data['topics'] = $this->Topic->find('topic_ID', $id);
		endif;
			
		// Turn series of objects into one object
		foreach ($this->data['topics'] as $topic):
			$this->data['t'] = $topic;
			break;
		endforeach;
		
		// Find articles by topic
		$this->data['articles'] = $this->Article->find('article_Topic', $this->data['t']->topic_ID);
		
		// Hydrate
		$this->data['articles'] = $this->Supermodel->party_wave(
			$this->data['articles'], 		// waves
			array('users', 'photos')		// surfers
		);
	
		// Bubble (these two calls can be consolidated)
		$this->data['bubble'] = $this->Article->find_by_department(7, 4);
		$this->data['bubble'] = $this->Photo->add_photos_to_objects($this->data['bubble']);
		
		$this->data['view'] = 'topics/show';
		$this->load->view('templates/front_facing', $this->data);
		
		$this->output->cache(20);
	}

}

/* End of file people.php */
/* Location: ./application/controllers/people.php */