<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Photos extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Photo');
		$this->load->model('sonar/Article');
		
		$this->data['currentuser'] = $this->Session_model->full_validate();
		
		$this->data['prefix'] = 'Photos';
	}
		
	public function index()
	{	
		$this->data['photos'] = $this->Photo->all(72);
		
		$this->data['view'] = 'photos/index';
		$this->load->view('templates/sonar', $this->data);
	}
	
	public function neue()
	{		
		$this->data['view'] = 'photos/neue';
		$this->load->view('templates/sonar', $this->data);
	}
	
	public function edit($id)
	{
		$this->data['p'] = $this->Photo->find_row($id);

		$this->data['view'] = 'photos/edit';
		$this->load->view('templates/sonar', $this->data);
	}
	
	public function create()
	{		
		$pieces = explode("/", $_FILES['userfile']['type']);
		$extension = $pieces[1];
		
		$data = array(
			'photo_Source' => $_FILES['userfile']['name'],
   			'photo_Extension' => $extension
		);
		$this->Photo->insert($data);
		
		$photo = $this->Photo->find_row_by_source($_FILES['userfile']['name']);

		$config['file_name'] = $photo->photo_ID.'.'.$photo->photo_Extension;
		$config['upload_path'] = './public/images/application/';
		$config['allowed_types'] = 'jpg|jpeg|gif|png';
      
      	$this->load->library('upload', $config);
  
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			echo $this->upload->display_errors();
		}  
		else
		{
			header('Location: /sonar/photos/edit/'.$photo->photo_ID);
		}
	}
	
	public function update()
	{
		$data = array(
			'photo_Source' => $this->input->post('photo_Source'),
   			'photo_Caption' => $this->input->post('photo_Caption'),
   			'photo_Photographer' => $this->input->post('photo_Photographer')
		);
		$this->Photo->update($data, $this->input->post('photo_ID'));

		header('Location: /sonar/photos/edit/'.$this->input->post('photo_ID'));
	}
	
	public function destroy($id)
	{
		$p = @$this->Photo->find_row($id);
		
		if($p):
			$this->Photo->destroy($p->photo_ID);
		endif;
		
		if(file_exists('./public/images/application/'.$p->photo_ID.'.'.$p->photo_Extension)):
			unlink('./public/images/application/'.$p->photo_ID.'.'.$p->photo_Extension);
		endif;
	
		header('Location: /sonar/photos');
	}
	
}

/* End of file photos.php */
/* Location: ./application/controllers/sonar/photos.php */