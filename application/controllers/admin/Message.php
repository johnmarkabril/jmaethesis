<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Message";

        $this->load->model('Inbox_model');
        $this->load->model('Inbox_reply_model');
        $this->load->model('Users_model');

        $this->nouser = $this->session->userdata('user_session')->NO;
    	date_default_timezone_set("Asia/Manila");
    	$this->date = date("F d, Y");
    	$this->time = date("g:i A");
    }

	public function index()
	{
		if ( $this->session->userdata('user_session')->ACCOUNT_TYPE == "Administrator" ) {
			$details = array (
				'get_admin_specific'		=>	$this->Users_model->get_admin_specific($this->nouser),
				'get_all_inbox_spec_user'	=>	$this->Inbox_model->get_all_inbox_spec_user($this->nouser)
			);

			$data['content']	=	$this->load->view('admin/message', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template1', $data);
		} else {
			redirect('/');
		}	
	}

	public function content($noInbox)
	{
		if ( $this->session->userdata('user_session')->ACCOUNT_TYPE == "Administrator" ) {
			$details = array (
				'get_admin_specific'			=>	$this->Users_model->get_admin_specific($this->nouser),
				'get_all_inbox_spec_user'		=>	$this->Inbox_model->get_all_inbox_spec_user($this->nouser),
				'get_specific_content'			=>	$this->Inbox_model->get_specific_content($noInbox),
				'get_all_reply_spec_content'	=>	$this->Inbox_reply_model->get_all_reply_spec_content($noInbox)
			);

			$data['content']	=	$this->load->view('admin/message', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template1', $data);
		} else {
			redirect('/');
		}	
	}

}
