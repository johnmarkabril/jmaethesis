<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Dashboard";
    }

	public function index()
	{
		$details = array (

		);

		$data['content']	=	$this->load->view('admin/dashboard', $details, TRUE);
		$data['curpage']	= 	$this->curpage;
		$this->load->view('template1', $data);
	}

}
