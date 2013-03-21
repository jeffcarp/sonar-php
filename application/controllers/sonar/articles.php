<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articles extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('sonar/Article');
		$this->load->model('Articles_Users_model', 'ArticleUser');
		$this->load->model('Articles_Photos_model', 'ArticlePhoto');
		$this->load->model('Department');
		$this->load->model('Topic');
		$this->load->model('sonar/Issue');
		$this->load->model('Photo');
		
		$this->load->model('Person');
		
		$this->load->model('super_model', 'Supermodel');
		
		$this->data['currentuser'] = $this->Session_model->full_validate();
		
		$this->data['prefix'] = 'Articles';
	}
		
	public function index()
	{
		$this->data['articles'] = $this->Article->all();
		
		$this->data['view'] = 'articles/index';
		$this->load->view('templates/sonar', $this->data);
	}
	
	public function neue()
	{
		$this->data['prefix'] = 'New Article';
	
		$this->data['all_users'] = $this->Person->all();
		$this->data['all_departments'] = $this->Department->all();
		$this->data['all_topics'] = $this->Topic->all();
		$this->data['all_issues'] = $this->Issue->all();
	
		$this->data['view'] = 'articles/neue';
		$this->load->view('templates/sonar', $this->data);
	}
	
	public function department($id)
	{
		$this->data['articles'] = $this->Article->find_by_department($id);
		
		$this->data['view'] = 'articles/index';
		$this->load->view('templates/sonar', $this->data);
	}
	
	
	public function edit($id)
	{
		$this->data['article'] = $this->Article->find('article_ID', $id);

		$this->data['article'] = $this->Supermodel->party_wave(
			$this->data['article'], 		// waves
			array('people', 'photos')		// surfers
		);
		
		// Convert many to one
		foreach ($this->data['article'] as $a):
			$this->data['article'] = $a;
			break;
		endforeach;
		
		//die(var_dump($this->data['article']));
				
		$this->data['photolist'] = '';

		foreach ($this->data['article']->photos as $p):
			
			if (!$this->data['photolist'] == ''):
				$this->data['photolist'] .= ',';
			endif;

			$this->data['photolist'] .= $p->photo_ID;

		endforeach;

		$this->data['department'] = $this->Department->find($this->data['article']->article_Department);
		
		$this->data['all_users'] = $this->Person->all();
		$this->data['all_departments'] = $this->Department->all();
		$this->data['all_topics'] = $this->Topic->all();
		$this->data['all_issues'] = $this->Issue->all();
		
		$this->data['prefix'] = $this->data['article']->article_Headline;
		
		//$this->data['status_button'] = $this->data['article']->article_Status;
		
		$this->data['view'] = 'articles/edit';
		$this->load->view('templates/sonar', $this->data);		
	}
	
	public function create()
	{		
		// If article_Slug is empty, create one
		if ($this->input->post('article_Slug') == '') {
			$_POST['article_Slug'] = slug($this->input->post('article_Headline'));		
		}
	
		$data = array(
			'article_Headline' => $this->input->post('article_Headline'),
   			'article_Department' => $this->input->post('article_Department'),
   			'article_Topic' => $this->input->post('article_Topic'),
   			'article_Slug' => $this->input->post('article_Slug'),
   			'article_Status' => $this->input->post('article_Status'),
   			'article_Issue' => $this->input->post('article_Issue'),
   			'article_Deck' => $this->input->post('article_Deck'),
   			'article_Copy' => $this->input->post('article_Copy'),
   			'article_Bigphoto' => 1,
   			'article_Published' => date("Y-m-d H:i:s")
		);
		
		$this->Article->insert($data);
		
		$article = $this->Article->find_row('article_Slug', $this->input->post('article_Slug'));
		
		// Create user associations
		$inputusers = array(	$this->input->post('author1'),
								$this->input->post('author2'),
								$this->input->post('author3')
		);
		
		foreach($inputusers as $inputuser):
		
			// Insert all new associations for this article
			if ($inputuser != 0) {
			
				$data = array(
				   'articleuser_User' => $inputuser ,
				   'articleuser_Article' => $article->article_ID
				);
				$this->ArticleUser->insert($data);
				
			}
		
		endforeach;
		
		header('Location: /sonar/articles');
	}
	
	public function update()
	{
		// Delete all associations for this article
		$links = $this->ArticleUser->delete($this->input->post('article_ID'));
		
		$inputusers = array(	$this->input->post('author1'),
								$this->input->post('author2'),
								$this->input->post('author3')
		);
		
		foreach($inputusers as $inputuser):
		
			// Insert all new associations for this article
			if ($inputuser != 0) {
			
				$data = array(
				   'articleuser_User' => $inputuser ,
				   'articleuser_Article' => $this->input->post('article_ID')
				);
				$this->ArticleUser->insert($data);
				
			}
		
		endforeach;
		
		// Delete all associations for this article
		$links = $this->ArticlePhoto->delete($this->input->post('article_ID'));
		
		if($this->input->post('photolist') != '') {

			$photos = explode(',', $this->input->post('photolist'));
			
			foreach ($photos as $key => $value):
			
				// Insert all new associations for this article
			
				$data = array(
				   'articlephoto_Photo' => $value,
				   'articlephoto_Article' => $this->input->post('article_ID')
				);
				$this->ArticlePhoto->insert($data);
			
			endforeach;

		}
		
		
		// If slug is_numeric or blank, generate slug based on headline
		if (is_numeric($this->input->post('article_Slug')) == true
		 || $this->input->post('article_Slug') == '') {
			$str = $this->input->post('article_Headline');
			$str = strtolower(trim($str));
			$str = preg_replace('/[^a-z0-9-]/', '-', $str);
			$str = preg_replace('/-+/', "-", $str);
			$_POST['article_Slug'] = $str;
		}
		

		// If department is video and the video has no existing photos, snag thumb from vimeo
		if ($this->input->post('article_Department') == 11 && !isset($photos)):

			$imgid = $_POST['article_Copy'];

			$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/".$imgid.".php"));

			$url = $hash[0]['thumbnail_large'];
			
			$time = time();
			
			$data = array(
				'photo_Source' => $time,
	   			'photo_Extension' => 'jpg'
			);
			$this->Photo->insert($data);
			
			$photo = $this->Photo->find_row_by_source($time);
			
			$img = './public/images/application/'.$photo->photo_ID.'.jpg';
			file_put_contents($img, file_get_contents($url));
			
			// Create new photo association
			$data = array(
			   'articlephoto_Photo' => $photo->photo_ID,
			   'articlephoto_Article' => $this->input->post('article_ID')
			);
			$this->ArticlePhoto->insert($data);
			
			// Change Photo source to vimeo auteur
			$data = array(
				'photo_Photographer' => $hash[0]['user_name'],
				'photo_Source' => 'Vimeo',
				'photo_Caption' => 'A still from <em>'.$hash[0]['title'].'</em> on Vimeo.'
			);
			$this->Photo->update($data, $photo->photo_ID);
			
		endif;

				
		// Update article
		$this->Article->update();
		// Redirect to /articles
		header('Location: /sonar/articles/edit/'.$this->input->post('article_ID'));
	}
	
	public function destroy($id)
	{
		$this->Article->destroy($id);
	
		header('Location: /sonar/articles');
	}
	
	public function fragments($piece)
	{
		switch ($piece):

		    case 'add_author':
				$this->load->view('sonar/fragments/add_author');
				break;
			case 'add_photo':
				$this->load->view('sonar/fragments/add_photo');
				break;
		    default:
		        echo "i is not equal to 0, 1 or 2";
		endswitch;
	}
	
	public function ajax_upload()
	{
		$config['upload_path'] = './public/images/application/';
		$config['allowed_types'] = 'gif|jpg|png';

		$this->load->library('upload', $config);

		

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
		}
	
	
	}
}

/* End of file articles.php */
/* Location: ./application/controllers/sonar/articles.php */