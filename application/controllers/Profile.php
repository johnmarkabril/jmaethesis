<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Profile";
        $this->load->model('About_my_site_model');
        $this->load->model('Blog_model'); 
        $this->load->model('Blog_reply_model');
        $this->load->model('Notification_admin_model');
        $this->load->model('Users_model');

        $this->nouser = $this->session->userdata('user_session')->NO;
    	date_default_timezone_set("Asia/Manila");
    	$this->date = date("F d, Y");
    	$this->time = date("g:i A");
    }

	public function index()
	{
		if ( $this->session->userdata('account_type') == "User" || $this->session->userdata('account_type') == "" ) {
			$details = array (
				'get_active'			=>	$this->About_my_site_model->get_active(),
				'get_user_specific'		=>	$this->Users_model->get_user_specific($this->nouser)
			);

			$data['content']	=	$this->load->view('user/profile', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template', $data);
		} else if ( $this->session->userdata('account_type') == "Administrator" ) {
			redirect('/admin');
		} else if ( $this->session->userdata('account_type') == "Agent" ) {
			redirect('/agent');
		}
	}

}
