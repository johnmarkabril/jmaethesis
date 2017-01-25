<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Co_administrator extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Co-Administrator";
        $this->load->model('Users_model');
    }

	public function index()
	{
		$user_session = $this->session->userdata('user_session');

		if ( $this->session->userdata('user_session')->ACCOUNT_TYPE == "Administrator" ) {
			$details = array (
				'get_admin_specific'		=>	$this->Users_model->get_admin_specific($user_session->NO)
			);

			$data['content']	=	$this->load->view('admin/coadministrator', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template1', $data);
		} else {
			redirect('/');
		}	
	}

}