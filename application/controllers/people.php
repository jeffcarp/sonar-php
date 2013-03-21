<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class People extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Article');
		$this->load->model('Photo');
		$this->load->model('Person');
		$this->load->model('super_model', 'Supermodel');
		
		$this->data['forecast'] = weather();
	}

	// /people
	public function index()
	{
		// Get all users whose graduation year is <2012
		$this->data['past'] = $this->Person->find('person_Year <', '2013');
			
		// Bubble (these two calls can be consolidated)
		$this->data['bubble'] = $this->Article->find_by_department(7, 4);
		$this->data['bubble'] = $this->Photo->add_photos_to_objects($this->data['bubble']);
		
		$this->data['view'] = 'people/index';
		$this->load->view('templates/front_facing', $this->data);
		
		$this->output->cache(20);
	}

	// /people/show/34
	// /people/lindsay-putnam
	public function show($id)
	{
		// Find person by ID or Slug
		if (!is_numeric($id)):
			$this->data['person'] = $this->Person->find('person_Slug', $id);
		else:
			$this->data['person'] = $this->Person->find('person_ID', $id);
		endif;
		
		$this->data['person'] = $this->Supermodel->party_wave(
			$this->data['person'], 		// waves
			array('articles')			// surfers
		);
			
		// Turn series of objects into one object
		foreach ($this->data['person'] as $user):
			$this->data['person'] = $user;
			break;
		endforeach;
			
		// Bubble (these two calls can be consolidated)
		$this->data['bubble'] = $this->Article->find_by_department(7, 4);
		$this->data['bubble'] = $this->Photo->add_photos_to_objects($this->data['bubble']);
		
		$this->data['view'] = 'people/show';
		$this->load->view('templates/front_facing', $this->data);
		
		$this->output->cache(20);
	}

}

/* End of file people.php */
/* Location: ./application/controllers/people.php */