<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Videos extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Department');
		$this->load->model('Article');
		$this->load->model('Photo'); 
		$this->load->model('super_model', 'Supermodel'); 
		
		$this->data['department'] = $this->Department->find_by_slug('videos'); 
		
		$this->data['forecast'] = weather();
	}
		
	public function show($id)
	{
		if ($id == 'latest') {
			$this->data['video'] = $this->Article->find('article_Department', 11, 1);
		} else {
		
			if (!is_numeric($id)):
				$this->data['video'] = $this->Article->find('article_Slug', $id, 1);
			else:
				$this->data['video'] = $this->Article->find('article_ID', $id, 1);
			endif;
		}
		
		$this->data['video'] = $this->Supermodel->party_wave(
			$this->data['video'], 		// waves
			array('people', 'photos')	// surfers
		);
			
		// Turn series of objects into one object
		foreach ($this->data['video'] as $object):
			$this->data['video'] = $object;
			break;
		endforeach;		
		
		// Find earlier
		$this->data['earlier'] = $this->Article->find_deuce('article_Department', '11', 'article_ID !=', $this->data['video']->article_ID, 30);
		
		$this->data['earlier'] = $this->Supermodel->party_wave(
			$this->data['earlier'], 		// waves
			array('people', 'photos')	// surfers
		);
	
		// Bubble (these two calls can be consolidated)
		$this->data['bubble'] = $this->Article->find_by_department(7, 4);
		$this->data['bubble'] = $this->Photo->add_photos_to_objects($this->data['bubble']);
		
		$this->data['view'] = 'videos/show';
		$this->load->view('templates/front_facing', $this->data);

		$this->output->cache(20);
	}

}

/* End of file videos.php */
/* Location: ./application/controllers/videos.php */