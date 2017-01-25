<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Events";
        $this->load->model('Events_model');
        $this->load->model('Users_model');

        $this->nouser = $this->session->userdata('user_session')->NO;
    	date_default_timezone_set("Asia/Manila");
    	$this->date = date("F d, Y");
    	$this->time = date("g:i A");
    }

	public function index()
	{
		$user_session = $this->session->userdata('user_session');

		if ( $this->session->userdata('user_session')->ACCOUNT_TYPE == "Administrator" ) {
			$details = array (
				'get_admin_specific'		=>	$this->Users_model->get_admin_specific($user_session->NO),
				'get_all_events'			=>	$this->Events_model->get_all_events(),
				'get_specific'				=>	$this->Events_model->get_latest()
			);

			$data['content']	=	$this->load->view('admin/events', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template1', $data);
		} else {
			redirect('/');
		}	
	}

	public function information($no)
	{
		$user_session = $this->session->userdata('user_session');

		if ( $this->session->userdata('user_session')->ACCOUNT_TYPE == "Administrator" ) {
			$details = array (
				'get_admin_specific'		=>	$this->Users_model->get_admin_specific($user_session->NO),
				'get_all_events'			=>	$this->Events_model->get_all_events(),
				'get_specific'				=>	$this->Events_model->get_specific($no)
			);

			$data['content']	=	$this->load->view('admin/events', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template1', $data);
		} else {
			redirect('/');
		}
	}

	public function insert()
	{
		$event_title_create			=	$this->input->post('event_title_create');
		$event_description_create	=	$this->input->post('event_description_create');

		if ( $this->session->userdata('user_session')->ACCOUNT_TYPE == "Administrator" ) {

			$params = array(
				'NO'			=>	'',
				'NOUSER'		=>	$this->nouser,
				'TITLE'			=>	$event_title_create,
				'DESCRIPTION'	=>	$event_description_create,
				'DATE'			=>	$this->date,
				'IMAGEURL'		=>	'',
				'DELETION'		=>	'0'	
			);

			$this->Events_model->insert($params);
		} else {
			redirect('/');
		}
	}
	
	public function update()
	{
		$event_no_update			=	$this->input->post('event_no_update');
		$event_title_update			=	$this->input->post('event_title_update');
		$event_description_update	=	$this->input->post('event_description_update');

		if ( $this->session->userdata('user_session')->ACCOUNT_TYPE == "Administrator" ) {

			$params = array(
				'NOUSER'		=>	$this->nouser,
				'TITLE'			=>	$event_title_update,
				'DESCRIPTION'	=>	$event_description_update
			);

			$this->Events_model->update($params, $event_no_update);


		} else {
			redirect('/');
		}
	}

	public function delete($no)
	{
		$params = array(
			'DELETION'		=>	'1'
		);


		$this->Events_model->update($params, $no);
		redirect('/admin/events');
	}

}