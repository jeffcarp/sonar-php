<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departments extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model('Article');
		$this->load->model('Department');
		$this->load->model('Photo');
		$this->load->model('Issue');
		$this->load->model('super_model', 'Supermodel');
		
		$this->data['forecast'] = weather();		
	}

	public function show($id)
	{		

		// Find article by ID or Slug
		if (!is_numeric($id)):
			$this->data['department'] = $this->Department->find_row('department_Slug', $id);
		else:
			$this->data['department'] = $this->Department->find_row('department_ID', $id);
		endif;
		
		$this->data['prefix'] = $this->data['department']->department_Name;
		
		
		// Get latest issue
		$this->data['issue'] = $this->Issue->latest();
		
		// Get articles in that issue
		$this->data['articles'] = $this->Article->find_deuce(
			'article_Department', 
			$this->data['department']->department_ID, 
			'article_Issue', 
			$this->data['issue']->issue_ID,
			false);
		
		$this->data['articles'] = $this->Supermodel->party_wave(
			$this->data['articles'], 	// wave
			array('photos', 'people')	// surfers
		);
		
		// Get articles that aren't in that issue (for below)
		$this->data['olderarticles'] = $this->Article->find_deuce(
			'article_Department', 
			$this->data['department']->department_ID, 
			'article_Issue !=', 
			$this->data['issue']->issue_ID);
		
		$this->data['olderarticles'] = $this->Supermodel->party_wave(
			$this->data['olderarticles'], 	// wave
			array('photos', 'people')	// surfers
		);
		

		// Bubble (these two calls can be consolidated)
		$this->data['bubble'] = $this->Article->find_by_department(7, 4);
		$this->data['bubble'] = $this->Photo->add_photos_to_objects($this->data['bubble']);

		$this->data['view'] = 'departments/show';
		$this->load->view('templates/front_facing', $this->data);
		
		$this->output->cache(20);
	}

}

/* End of file departments.php */
/* Location: ./application/controllers/departments.php */