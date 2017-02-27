<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Agent";
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
				'get_all_agent'				=>	$this->Users_model->get_all_agent(),
				'get_specific'				=>	$this->Users_model->get_latest_agent()
			);

			$data['content']	=	$this->load->view('admin/agent', $details, TRUE);
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
				'get_all_agent'				=>	$this->Users_model->get_all_agent(),
				'get_specific'				=>	$this->Users_model->get_specific_agent($no)
			);

			$data['content']	=	$this->load->view('admin/agent', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template1', $data);
		} else {
			redirect('/');
		}	
	}

	public function delete($no)
	{
		$params = array (
			'DELETION'	=>	1
		);

		$this->Users_model->update($params, $no);

		$this->session->set_flashdata('success_message', 'Account Deleted!');
		redirect('/admin/team');
	}

	public function create()
	{
		$txt_fname_agent	= $this->input->post('txt_fname_agent');
		$txt_lname_agent	= $this->input->post('txt_lname_agent');
		$txt_uname_agent	= $this->input->post('txt_uname_agent');
		$txt_email_agent	= $this->input->post('txt_email_agent');
		$txt_password_agent	= $this->input->post('txt_password_agent');

		$params = array(
			'NO'				=>	'',
			'FIRSTNAME'			=>	$txt_fname_agent,
			'LASTNAME'			=>	$txt_lname_agent,
			'USERNAME'			=>	$txt_uname_agent,
			'PHONENUMBER'		=>	'',
			'EMAIL'				=>	$txt_email_agent,
			'PASSWORD'			=>	md5($txt_password_agent),
			'ACCOUNT_TYPE'		=>	'Agent',
			'ACTIVATED'			=>	1,
			'VERIFIED'			=>	'YES',
			'VERIFICATIONCODE'	=>	'',
			'PERMISSION'		=>	'Issue Tracker|Profile|Contact|Message|Events|Notification|Template|Purchased Template|Templates|User Management|Agent',
			'IMAGEURL'			=>	'noimage.png',
			'DATE'				=>	$this->date,
			'TIME'				=>	$this->time,
			'DELETION'			=>	0
		);

		$this->Users_model->create($params);

		$this->session->set_flashdata('success_message', 'New agent account added!');
	}

}
