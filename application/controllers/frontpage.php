<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontpage extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Lede');
		$this->load->model('Department');
		$this->load->model('Article');
		$this->load->model('Photo');
		$this->load->model('Issue');
		$this->load->model('super_model', 'Supermodel');
		
		$this->data['forecast'] = weather();
	}

	public function index()
	{
		$this->data['articles'] = $this->Lede->find_by_location();

		$this->data['articles'] = $this->Supermodel->party_wave(
			$this->data['articles'], 	// wave
			array('photos', 'people')	// surfers
		);
		
		// Get latest issue
		$this->data['issue'] = $this->Issue->latest();
				
		$this->data['department'] = $this->Department->find_by_slug('frontpage');
				
		// Bubble (these two calls can be consolidated)
		$this->data['bubble'] = $this->Article->find_by_department(7, 4);
		$this->data['bubble'] = $this->Photo->add_photos_to_objects($this->data['bubble']);
				
		$departments = array(
			1 => 'news',
			2 => 'opinion',
			4 => 'features', 
			3 => 'ae', 
			5 => 'sports',
			6 => 'local'
		);
		
		foreach($departments as $key => $value):
		
			$this->data[$value] = $this->Article->find_deuce(
				'article_Department', 
				$key, 
				'article_Issue', 
				$this->data['issue']->issue_ID);
			
			$this->data[$value] = $this->Supermodel->party_wave(
				$this->data[$value], 		// wave
				array('photos', 'people')	// surfers
			);	
			
		endforeach;
		
		// Get articles for big topics
		$articles = $this->Article->find('article_Issue', $this->data['issue']->issue_ID);
		$prelim_topics = array();
		$topics = array();
		
		foreach ($articles as $a):
		
			if ($a->topic_ID):
			
				// Duplicates are thrown in
				if (isset($prelim_topics[$a->topic_Slug])):
				
					$topics[$a->topic_Slug] = $a->topic_Name;
				
				endif;
			
				$prelim_topics[$a->topic_Slug] = $a->topic_Name;
			
			endif;
		
		endforeach;
		
		$this->data['topics'] = $topics;
		
		$this->data['video'] = $this->Article->find_row('article_Department', 11, 1);
	
		
		$this->data['view'] = 'frontpage/index';
		$this->load->view('templates/front_facing', $this->data);

		$this->output->cache(20);
	}

}

/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */