<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Archive extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Article');
		$this->load->model('Photo');
		$this->load->model('Person');
		$this->load->model('Lede');
		$this->load->model('super_model', 'Supermodel');
		
		$this->data['forecast'] = weather();
	}

	// /archive
	public function index()
	{
		
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
		
		$this->data['view'] = 'archive/index';
		$this->load->view('templates/front_facing', $this->data);
		
		$this->output->cache(5);
	}

}

/* End of file archive.php */
/* Location: ./application/controllers/archive.php */