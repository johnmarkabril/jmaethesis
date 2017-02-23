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

		if ( $this->session->userdata('user_session')->ACCOUNT_TYPE == "Agent" ) {
			$details = array (
				'get_agent_specific'		=>	$this->Users_model->get_agent_specific($user_session->NO),
				'get_all_events'			=>	$this->Events_model->get_all_events(),
				'get_specific'				=>	$this->Events_model->get_latest()
			);

			$data['content']	=	$this->load->view('agent/events', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template2', $data);
		} else {
			redirect('/');
		}	
	}

	public function information($no)
	{
		$user_session = $this->session->userdata('user_session');

		if ( $this->session->userdata('user_session')->ACCOUNT_TYPE == "Agent" ) {
			$details = array (
				'get_agent_specific'		=>	$this->Users_model->get_agent_specific($user_session->NO),
				'get_all_events'			=>	$this->Events_model->get_all_events(),
				'get_specific'				=>	$this->Events_model->get_specific($no)
			);

			$data['content']	=	$this->load->view('agent/events', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template2', $data);
		} else {
			redirect('/');
		}
	}

	public function insert()
	{
		$event_title_create			=	$this->input->post('event_title_create');
		$event_description_create	=	$this->input->post('event_description_create');

		if ( $this->session->userdata('user_session')->ACCOUNT_TYPE == "Agent" ) {

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
		if ( $_POST['event_update'] ) {
			$event_no_update			=	$_POST['event_no_update'];
			$event_title_update			=	$_POST['event_title_update'];
			$event_description_update	=	$_POST['event_description_update'];

			if ( $this->session->userdata('user_session')->ACCOUNT_TYPE == "Agent" ) {
				if ( !empty($_FILES['image']['name']) ) {
	        		$loc = $_SERVER['DOCUMENT_ROOT'].base_url()."public/img/";
			        move_uploaded_file($_FILES['image']['tmp_name'], $loc . $_FILES['image']['name']);

					$params = array(
						'NOUSER'		=>	$this->nouser,
						'TITLE'			=>	$event_title_update,
						'DESCRIPTION'	=>	$event_description_update,
						'IMAGEURL'		=> 	$_FILES["image"]["name"]
					);
				} else {
					$params = array(
						'NOUSER'		=>	$this->nouser,
						'TITLE'			=>	$event_title_update,
						'DESCRIPTION'	=>	$event_description_update,
						'IMAGEURL'		=> 	'noimage.png'
					);
				}

				$this->session->set_flashdata('success_message', 'Event updated!');
				$this->Events_model->update($params, $event_no_update);
				redirect('/agent/events');
			} else {
				redirect('/agent/events');
			}
		} else {
			redirect('/agent/events');
		}
		
	}

	public function delete($no)
	{
		$params = array(
			'DELETION'		=>	'1'
		);


		$this->session->set_flashdata('success_message', 'Item deleted!');
		$this->Events_model->update($params, $no);
		redirect('/agent/events');
	}

}
