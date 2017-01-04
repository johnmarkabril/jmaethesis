<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Events";
        $this->load->model('Events_model'); 
    }

	public function index()
	{
		if ( $this->session->userdata('account_type') == "User" || $this->session->userdata('account_type') == "" ) {
			$details = array (
				'get_all_events'			=>	$this->Events_model->get_all_events(),
				'get_specific_event'		=>	$this->Events_model->get_latest_events_limit()
			);

			$data['content']	=	$this->load->view('user/eventscontent', $details, TRUE);
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
				'get_all_events'			=>	$this->Events_model->get_all_events(),
				'get_specific_event'		=>	$this->Events_model->get_specific_events($randomcode)
			);

			$data['content']	=	$this->load->view('user/eventscontent', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template', $data);
		} else {
			redirect('/admin');
		}
	}
}
