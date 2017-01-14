<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Blog";
        $this->load->model('Blog_model'); 
        $this->load->model('Blog_comment_model'); 
    }

	public function index()
	{
		if ( $this->session->userdata('account_type') == "User" || $this->session->userdata('account_type') == "" ) {
			$details = array (
				'get_all_blog'			=>	$this->Blog_model->get_all_blog()
			);

			$data['content']	=	$this->load->view('user/blogcontent', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template', $data);
		} else {
			redirect('/admin');
		}
	}

	public function post($randomcode)
	{
		if ( $this->session->userdata('account_type') == "User" || $this->session->userdata('account_type') == "" ) {
			$details = array (
				'get_specific_blog'		=>	$this->Blog_model->get_specific_blog($randomcode),
				'get_comment_per_blog'	=>	$this->Blog_comment_model->get_comment_per_blog($randomcode)
			);

			$data['content']	=	$this->load->view('user/blogcontent', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template', $data);
		} else {
			redirect('/admin');
		}
	}
}
