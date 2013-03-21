<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articles extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Article');
		$this->load->model('Department');
		$this->load->model('Lede');
		$this->load->model('Photo');
		$this->load->model('super_model', 'Supermodel');
		$this->load->model('Topic');
		
		$this->data['forecast'] = weather();
	}

	public function show($id)
	{
		$this->load->helper('markdown');

		// Find article by ID or Slug
		if (!is_numeric($id)):
			$this->data['article'] = $this->Article->find_row('article_Slug', $id);
		else:
			$this->data['article'] = $this->Article->find_row('article_ID', $id);
		endif;
		
		// Disallow accessing drafts // This may no longer be necessary since models were split
		if($this->data['article']->article_Status == 'draft'):
			$this->data['department'] = $this->Department->find(1);
			$this->data['view'] = 'errors/404';
			$this->load->view('templates/front_facing', $this->data);
			return;
		endif;
		
		// Get topic and articles under that topic
		$this->data['topic'] = $this->Topic->find_row('topic_ID', $this->data['article']->article_Topic);
		$this->data['topic_articles'] = $this->Article->find('article_Topic', $this->data['article']->article_Topic, 3);
		// Hydrate or die
		$this->data['topic_articles'] = $this->Supermodel->party_wave(
			$this->data['topic_articles'], 		// waves
			array('people', 'photos')		// surfers
		);
		
		// Get article's dependencies
		$this->data['article'] = $this->Photo->add_dependencies_to_object($this->data['article']);

		$this->data['department'] = $this->Department->find($this->data['article']->article_Department);
		
		$this->data['prefix'] = $this->data['article']->article_Headline;

		// Bubble (these two calls can be consolidated)
		$this->data['bubble'] = $this->Article->find_by_department(7, 4);
		$this->data['bubble'] = $this->Photo->add_photos_to_objects($this->data['bubble']);

		// Get South featured article
		$south_id = $this->Lede->find_row('lede_Location', '4');
		$articles = $this->Article->find('article_ID', $south_id->lede_Article);
		$articles = $this->Supermodel->party_wave(
			$articles, 			// waves
			array('photos')		// surfers
		);
		// Articles to article
		foreach ($articles as $a):
			$this->data['south'] = $a; break;
		endforeach;

		// Convert to markdown
		$this->data['article']->article_Copy = markdown($this->data['article']->article_Copy);

		// Get articles of first Author
		foreach ($this->data['article']->people as $p):
			$this->data['author'] = $this->Person->find('person_ID', $p->person_ID);
			break;
		endforeach;
		
		// Add articles to person
		$this->data['author'] = $this->Supermodel->party_wave(
			$this->data['author'], 		// waves
			array('articles')			// surfers
		);
			
		// Turn series of objects into one object
		foreach ($this->data['author'] as $i):
			$this->data['author'] = $i;
			break;
		endforeach;

		switch ($this->data['department']->department_Type):
		
			// Publication
			case 'print':
				$this->data['view'] = 'articles/publication';
				$this->load->view('templates/front_facing', $this->data);
        		break;
			
			// Blog
			case 'blog':
					$this->data['view'] = 'blog/post';
					$this->load->view('layouts/blog', $this->data);
				break;
				
			// Information
			case 'info':
				$this->data['view'] = 'articles/info';
				$this->load->view('templates/front_facing', $this->data);
				break;
			
			// Catch 404
			default:
				$this->data['view'] = 'errors/404';
				$this->load->view('templates/front_facing', $this->data);
					
		endswitch;
		
		$this->output->cache(20);
	}

}

/* End of file articles.php */
/* Location: ./application/controllers/articles.php */