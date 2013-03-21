<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Issues extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('sonar/Article');
		$this->load->model('sonar/Issue');
		$this->load->model('sonar/Department');
		
		$this->data['currentuser'] = $this->Session_model->full_validate();
		
		$this->data['prefix'] = 'Issues';
	}
	
	public function prototype()
	{
		$this->data['issues'] = $this->Issue->recent_with_articles(5);
		$this->data['issues'] = $this->Article->add_articles_to_issues($this->data['issues']);
		
		$this->data['departments'] = $this->Department->find('department_Type', 'print');
		
		
		// Sort by departments
/*
		foreach($this->data['issues'] as $i):
			foreach($i->articles as $a):
			$i->departments[$a->][] = article
			endforeach;
		endforeach;	
*/

		
		$this->data['view'] = 'issues/prototype';
		$this->load->view('templates/sonar2', $this->data);
	}
	
	public function index()
	{
		$this->data['issues'] = $this->Issue->all();

		$this->data['view'] = 'issues/index';
		$this->load->view('templates/sonar', $this->data);
	}
		
	public function neue()
	{
		// Get latest issue
		$this->data['i'] = $this->Issue->latest();
	
		$this->data['view'] = 'issues/neue';
		$this->load->view('templates/sonar', $this->data);
	}
	
	public function edit($id)
	{
		$this->data['i'] = $this->Issue->find_row('issue_ID', $id);

		$this->data['view'] = 'issues/edit';
		$this->load->view('templates/sonar', $this->data);
	}
	
	public function create()
	{	
		$data = array(
			'issue_Volume' => $this->input->post('issue_Volume'),
   			'issue_Edition' => $this->input->post('issue_Edition'),
   			'issue_Published' => $this->input->post('issue_Published'),
   			'issue_Status' => 0,
   			'issue_Name' => $this->input->post('issue_Name')
		);
		
		$this->Issue->insert($data);
		
		header('Location: /sonar/issues');
	}
	
	public function update()
	{
		$published = $this->input->post('year').'-'.$this->input->post('month').'-'.$this->input->post('day');
	
		$data = array(
			'issue_Name' => $this->input->post('issue_Name'),
   			'issue_Volume' => $this->input->post('issue_Volume'),
   			'issue_Edition' => $this->input->post('issue_Edition'),
   			'issue_Status' => $this->input->post('issue_Status'),
   			'issue_Published' => $published
		);
		$this->Issue->update($data, $this->input->post('issue_ID'));

		header('Location: /sonar/issues');
	}
	
	public function destroy($id)
	{
		$this->Issue->destroy($id);
	
		header('Location: /sonar/issues');
	}
	
}

/* End of file topics.php */
/* Location: ./application/controllers/sonar/topics.php */