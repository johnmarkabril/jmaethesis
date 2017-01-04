<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Events";
    }

	public function index()
	{
		if ( $this->session->userdata('account_type') == "User" || $this->session->userdata('account_type') == "" ) {
			$details = array (

			);

			$data['content']	=	$this->load->view('user/eventscontent', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template', $data);
		} else {
			redirect('/admin');
		}
	}
}
