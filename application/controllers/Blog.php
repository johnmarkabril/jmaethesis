<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Blog";
        $this->load->model('Blog_model'); 
    }

	public function index()
	{
		redirect('/');
	}

	public function post($randomcode)
	{
		$details = array (
			'get_specific_blog'		=>	$this->Blog_model->get_specific_blog($randomcode)
		);

		$data['content']	=	$this->load->view('user/blogcontent', $details, TRUE);
		$data['curpage']	= 	$this->curpage;
		$this->load->view('template', $data);
	}
}
