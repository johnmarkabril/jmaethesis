<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Events";
        $this->load->model('About_my_site_model');
        $this->load->model('Events_model'); 
        $this->load->model('Event_reply_model');
        $this->load->model('Notification_admin_model');

    	date_default_timezone_set("Asia/Manila");
    	$this->date = date("F d, Y");
    	$this->time = date("g:i A");
    }

	public function index()
	{
		if ( $this->session->userdata('account_type') == "User" || $this->session->userdata('account_type') == "" ) {
			$details = array (
				'get_all_events'			=>	$this->Events_model->get_all_events(),
				'get_all_reply'				=>	$this->Event_reply_model->get_all_reply(),
				'date'						=>	$this->date,
				'get_active'				=>	$this->About_my_site_model->get_active()
			);

			$data['content']	=	$this->load->view('user/eventscontent', $details, TRUE);
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
				'EVENTNO'	=>	$messageNo,
				'NAME'		=>	$this->session->userdata('user_session')->FIRSTNAME.' '.$this->session->userdata('user_session')->LASTNAME,
				'IMAGEURL'	=>	$this->session->userdata('user_session')->IMAGEURL,
				'DATE'		=>	$this->date,
				'TIME'		=>	$this->time,
				'REPLY'		=>	$replyMessage,
				'DELETION'	=>	0
			);
			$this->Event_reply_model->insertReply($params);

			$params = array(
				'NO'		=> '',
				'NOUSER'	=> $this->session->userdata('user_session')->NO,
				'CONTENT'	=> $this->session->userdata('user_session')->FIRSTNAME.' '.$this->session->userdata('user_session')->LASTNAME.' reply to a event.',
				'DATE'		=> $this->date,
				'TIME'		=> $this->time,
				'DELETION'	=> 0
			);
			$this->Notification_admin_model->create($params);
		}
	}
}
