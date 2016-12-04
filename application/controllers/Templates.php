<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Templates";
    }

	public function index()
	{
		$details = array (

		);

		$data['content']	=	$this->load->view('user/templates', $details, TRUE);
		$data['curpage']	= 	$this->curpage;
		$this->load->view('template', $data);
	}
}
