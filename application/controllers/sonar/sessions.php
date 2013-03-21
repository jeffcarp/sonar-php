<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sessions extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('sonar/Article');
		$this->load->model('Person');
		$this->load->model('Session_model');
		$this->load->library('encrypt');
		$this->load->library('session');
	}
		
	public function neue($path = '')
	{	
		$this->data['shake'] = ($this->session->flashdata('login') == 'failed') ? true : false;
	
		$this->load->view('sonar/sessions/neue', $this->data);
	}
	
	public function create($path = '')
	{
		$person = $this->Person->find_row('person_Email', $this->input->post('email'));
		if(isset($person->person_ID)):
			
			if($this->Session_model->validate($person->person_ID, md5($this->input->post('password')))):
				
				// 2 weeks
				setcookie("bish", $person->person_Password, time() + (2 * 7 * 24 * 60 * 60),  "/");
				setcookie("bash", $person->person_ID, time() + (2 * 7 * 24 * 60 * 60),  "/");
				
				header('Location: /sonar');
				exit;
				
			endif;
			
		endif;
		
		$this->session->set_flashdata('login', 'failed');
		header('Location: /sonar/sessions');
	
		//$path = str_replace("~", "/", $path);
	}
		
	public function destroy()
	{
		$this->Session_model->destroy();
		
		header('Location: /');
	}
	
}

/* End of file sessions.php */
/* Location: ./application/controllers/sonar/sessions.php */