<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller 
{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('Notification_admin_model');

    	date_default_timezone_set("Asia/Manila");
    	$this->date = date("F d, Y");
    	$this->time = date("g:i A");
    }

	public function index()
	{
		$params = array(
			'NO'		=> '',
			'NOUSER'	=> $this->session->userdata('user_session')->NO,
			'CONTENT'	=> $this->session->userdata('user_session')->FIRSTNAME.' '.$this->session->userdata('user_session')->LASTNAME.' has been logged out.',
			'DATE'		=> $this->date,
			'TIME'		=> $this->time,
			'DELETION'	=> 0
		);
		$this->Notification_admin_model->create($params);

		$this->session->sess_destroy();
		redirect('/');
	}
}