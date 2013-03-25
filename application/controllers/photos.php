<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Photos extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Photo');
		$this->load->model('Article');
		
		$this->data['forecast'] = weather();
	}
	
	public function index()
	{	
		$this->data['photos'] = $this->Photo->all();
		
		$this->data['view'] = 'photos/index';
		$this->load->view('templates/front_facing', $this->data);
		
		$this->output->cache(20);
	}

	
	public function show($id)
	{
		$this->data['p'] = $this->Photo->find_row($id);
		
		// Bubble (these two calls can be consolidated)
		$this->data['bubble'] = $this->Article->find_by_department(7, 4);
		$this->data['bubble'] = $this->Photo->add_photos_to_objects($this->data['bubble']);

		$this->data['view'] = 'photos/show';
		$this->load->view('templates/front_facing', $this->data);
		
		$this->output->cache(20);
	}
	
	public function get($id, $width)
  {
		$this->load->helper('thumb');
    
    $name = thumb($id, $width, false);

		header("Content-Type: image/".pathinfo($name, PATHINFO_EXTENSION));

		$fp = fopen($name, 'rb');
    fpassthru($fp);
		exit;
	}
}
