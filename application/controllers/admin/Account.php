<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Account";
        $this->load->model('Users_model');

        $this->nouser = $this->session->userdata('user_session')->NO;
    	date_default_timezone_set("Asia/Manila");
    	$this->date = date("F d, Y");
    	$this->time = date("g:i A");
    	$this->curMonth = date("F");
    	$this->curYear = date("Y");
    }

	public function index()
	{
		$user_session = $this->session->userdata('user_session');

		if ( $this->session->userdata('user_session')->ACCOUNT_TYPE == "Administrator" ) {
			$details = array (
				'get_admin_specific'		=>	$this->Users_model->get_admin_specific($user_session->NO),
				'get_all_user'				=>	$this->Users_model->get_all_user(),
				'get_num_rows_all_user'		=>	$this->Users_model->get_num_rows_all_user(),
				'get_num_rows_curmonth'		=>	$this->Users_model->get_num_rows_curmonth($this->curMonth, $this->curYear)
			);

			$data['content']	=	$this->load->view('admin/account', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template1', $data);
		} else {
			redirect('/');
		}	
	}

}
