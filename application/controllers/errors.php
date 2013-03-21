<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Errors extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Department');
		$this->load->model('Article');
		
		$this->data['forecast'] = weather();
	}

	public function index()
	{
	
	}

	public function not_found()
	{
		$this->data['view'] = 'errors/404';
		$this->load->view('templates/front_facing', $this->data);
		
		$this->output->cache(20);
	}
	
	public function redirect_to_blog()
	{
		header('Location: /blog');
	}
	
	public function redirect_to_blog_page($page_num)
	{
		header('Location: /blog/page/'.$page_num);
	}
	
	public function redirect_to_blog_post($post_slug)
	{
		$a = $this->Article->find_row('article_Slug', $post_slug);
		if (isset($a->article_ID)) {
			header('Location: /blog/'.$a->article_ID.'/'.$a->article_Slug);
		} else {
			header('Location: /blog');
		}
	}

}

/* End of file errors.php */
/* Location: ./application/controllers/errors.php */