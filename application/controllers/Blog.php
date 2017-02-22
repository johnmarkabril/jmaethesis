<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Blog";
        $this->load->model('Blog_model'); 
        $this->load->model('Blog_reply_model');

    	date_default_timezone_set("Asia/Manila");
    	$this->date = date("F d, Y");
    	$this->time = date("g:i A");
    }

	public function index()
	{
		if ( $this->session->userdata('account_type') == "User" || $this->session->userdata('account_type') == "" ) {
			$details = array (
				'get_all_blog'			=>	$this->Blog_model->get_all_blog(),
				'get_all_reply'			=>	$this->Blog_reply_model->get_all_reply(),
				'date'					=>	$this->date
			);

			$data['content']	=	$this->load->view('user/blogcontent', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template', $data);
		} else {
			redirect('/admin');
		}
	}

	public function insert_reply()
	{
		if ( !empty($this->session->userdata('user_session')) ) {
			$replyMessage	=	$this->input->post('replyMessage');
			$messageNo		=	$this->input->post('messageNo');

			$params = array(
				'NO'		=>	'',
				'BLOGNO'	=>	$messageNo,
				'NAME'		=>	$this->session->userdata('user_session')->FIRSTNAME.' '.$this->session->userdata('user_session')->LASTNAME,
				'IMAGEURL'	=>	$this->session->userdata('user_session')->IMAGEURL,
				'DATE'		=>	$this->date,
				'TIME'		=>	$this->time,
				'REPLY'		=>	$replyMessage,
				'DELETION'	=>	0
			);

			$this->Blog_reply_model->insertReply($params);
		}
	}
}
