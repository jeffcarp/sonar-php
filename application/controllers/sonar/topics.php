<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Topics extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Topic');
		$this->load->model('sonar/Article');
		
		$this->data['currentuser'] = $this->Session_model->full_validate();
		
		$this->data['prefix'] = 'Topics';
	}
		
	public function index()
	{
		$this->data['topics'] = $this->Topic->all();

		$this->data['view'] = 'topics/index';
		$this->load->view('templates/sonar', $this->data);
	}
		
	public function neue()
	{		
		$this->data['view'] = 'topics/neue';
		$this->load->view('templates/sonar', $this->data);
	}
	
	public function edit($id)
	{
		$this->data['t'] = $this->Topic->find_row('topic_ID', $id);
		
		$this->data['articles'] = $this->Article->find('article_Topic', $id);

		$this->data['view'] = 'topics/edit';
		$this->load->view('templates/sonar', $this->data);
	}
	
	public function create()
	{
		// If topic_Slug is empty, create one
		if ($this->input->post('topic_Slug') == '') {
			$_POST['topic_Slug'] = slug($this->input->post('topic_Name'));		
		}
	
		$data = array(
			'topic_Name' => $this->input->post('topic_Name'),
   			'topic_Slug' => $this->input->post('topic_Slug')
		);
		
		$this->Topic->insert($data);
		
		header('Location: /sonar/topics');
	}
	
	public function update()
	{
		// If topic_Slug is empty, create one
		if ($this->input->post('topic_Slug') == '') {
			$_POST['topic_Slug'] = slug($this->input->post('topic_Name'));		
		}
	
		$data = array(
			'topic_Name' => $this->input->post('topic_Name'),
   			'topic_Slug' => $this->input->post('topic_Slug')
		);
		$this->Topic->update($data, $this->input->post('topic_ID'));

		header('Location: /sonar/topics');
	}
	
	public function destroy($id)
	{
		$this->Topic->destroy($id);
	
		header('Location: /sonar/topics');
	}
	
}

/* End of file topics.php */
/* Location: ./application/controllers/sonar/topics.php */