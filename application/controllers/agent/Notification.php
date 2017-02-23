<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Notification";
        $this->load->model('Notification_admin_model');
        $this->load->model('Users_model');

        $this->nouser = $this->session->userdata('user_session')->NO;
    	date_default_timezone_set("Asia/Manila");
    	$this->date = date("F d, Y");
    	$this->time = date("g:i A");
    }

	public function index()
	{
		$user_session = $this->session->userdata('user_session');

		if ( $this->session->userdata('user_session')->ACCOUNT_TYPE == "Agent" ) {
			$details = array (
				'get_agent_specific'		=>	$this->Users_model->get_agent_specific($user_session->NO),
				'get_all_notification'		=>	$this->Notification_admin_model->get_all_notification()
			);

			$data['content']	=	$this->load->view('agent/notification', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template2', $data);
		} else {
			redirect('/');
		}	
	}

}
