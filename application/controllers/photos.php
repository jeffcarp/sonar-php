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
    // Testing things out

    // Get photo with id: $id
    $p = $this->Photo->find_row($id);

    // Redirect to S3 (and cross fingers)
    // This will simply serve them full-size images, which may screw up the page. We'll find out.
    header('Location: https://s3.amazonaws.com/thecolbyecho/'.$p->photo_ID.'.'.$p->photo_Extension); 

    exit;

    // old code

		$this->load->helper('thumb');
				
		$name = thumb($id, $width, false);
		
		$fp = fopen($name, 'rb');

		header("Content-Type: image/".pathinfo($name, PATHINFO_EXTENSION));
		header("Content-Length: " . filesize($name));

		fpassthru($fp);
		exit;
	}
	
}

/* End of file photos.php */
/* Location: ./application/controllers/photos.php */
