<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->data['prefix'] = 'Dashboard';
		
		$this->data['currentuser'] = $this->Session_model->full_validate();
	}
	
	public function index()
	{
		$this->data['view'] = 'dashboard/index';
		$this->load->view('templates/sonar', $this->data);
	}
	
	public function health()
	{
		$this->data['suffix'] = 'Health';
	
		$this->data['view'] = 'dashboard/health';
		$this->load->view('templates/sonar2', $this->data);
	}
	
}

/* End of file dashboard.php */
/* Location: ./application/controllers/sonar/dashboard.php */