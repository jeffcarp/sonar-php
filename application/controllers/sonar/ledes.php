<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ledes extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('sonar/Article');
		$this->load->model('Lede');
		$this->load->model('super_model', 'Supermodel');

		$this->data['currentuser'] = $this->Session_model->full_validate();

		$this->data['prefix'] = 'Lede Articles';
	}
	
	public function index()
	{
		$this->data['articles'] = $this->Article->all(75);
		$this->data['articles'] = $this->Supermodel->party_wave(
			$this->data['articles'], 		// waves
			array('people', 'photos')		// surfers
		);

		$this->data['ledes'] = $this->Lede->all();
		$this->data['ledes'] = $this->Supermodel->party_wave(
			$this->data['ledes'], 		// waves
			array('photos')				// surfers
		);
						
		$this->data['options'] = array();
		
		foreach ($this->data['articles'] as $a):
			if ($a->photos):
				$this->data['options'][$a->article_ID] = '[photo] '.$a->article_Headline;
			else:
				$this->data['options'][$a->article_ID] = $a->article_Headline;
			endif;		
		endforeach;
		
		$this->data['view'] = 'ledes/index';
		$this->load->view('templates/sonar', $this->data);
	}
	
	public function update()
	{
		for ($i=1;$i<=30;$i++) {
	
			$data = array('lede_Article' => $this->input->post('lede'.$i));
	
			$this->Lede->update('lede_ID', $i, $data);
		
		}
			
		header('Location: /sonar/ledes');
	}

}

/* End of file ledes.php */
/* Location: ./application/controllers/sonar/ledes.php */