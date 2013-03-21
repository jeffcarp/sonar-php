<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class People extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('sonar/Article');
		$this->load->model('Person');
				
		$this->data['currentuser'] = $this->Session_model->full_validate();
		
		$this->data['prefix'] = 'People';
	}
	
	public function index()
	{	
		$this->data['staff'] = $this->Person->find('person_Access >=', '3');

		$this->data['others'] = $this->Person->find('person_Access <', '3', 1000, 'person_Name', 'ASC');
		
		$this->data['view'] = 'people/index';
		$this->load->view('templates/sonar', $this->data);
	}
	
	public function neue() 
	{		
		$this->data['view'] = 'people/neue';
		$this->load->view('templates/sonar', $this->data);
	}
	
	public function edit($id)
	{
		$this->data['p'] = $this->Person->find_row('person_ID', $id);

		$this->data['view'] = 'people/edit';
		$this->load->view('templates/sonar', $this->data);
	}
	
	public function create()
	{
		// If person_Slug is empty, create one
		if ($this->input->post('person_Slug') == '') {
			$_POST['person_Slug'] = slug($this->input->post('person_Name'));		
		}
	
		$data = array(
			'person_Name' => $this->input->post('person_Name'),
   			'person_Slug' => $this->input->post('person_Slug'),
   			'person_Position' => $this->input->post('person_Position'),
   			'person_Year' => $this->input->post('person_Year'),
   			'person_Photo' => $this->input->post('person_Photo'),
   			'person_Bio' => $this->input->post('person_Bio'),
			'person_Access' => $this->input->post('person_Access')
		);
		
		$this->Person->insert($data);
		
		header('Location: /sonar/people');
	}
	
	public function update()
	{
		if ($this->input->post('person_Slug') == ''):
			$_POST['person_Slug'] = slug($this->input->post('person_Name'));
		endif;
	
		$data = array(
			'person_Name' => $this->input->post('person_Name'),
   			'person_Slug' => $this->input->post('person_Slug'),
   			'person_Position' => $this->input->post('person_Position'),
   			'person_Year' => $this->input->post('person_Year'),
   			'person_Photo' => $this->input->post('person_Photo'),
   			'person_Bio' => $this->input->post('person_Bio'),
			'person_Access' => $this->input->post('person_Access')
		);
		$this->Person->update($data, $this->input->post('person_ID'));

		header('Location: /sonar/people');
	}
	
	public function destroy($id)
	{
		$this->Person->destroy($id);
	
		header('Location: /sonar/people');
	}
	
}

/* End of file people.php */
/* Location: ./application/controllers/sonar/people.php */