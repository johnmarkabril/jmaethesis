<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sites extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Sites";
    }

	public function index()
	{
		$details = array (

		);

		$data['content']	=	$this->load->view('user/sites', $details, TRUE);
		$data['curpage']	= 	$this->curpage;
		$this->load->view('template', $data);
	}
}
