<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Online extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Online";
        $this->load->model('Templates_model'); 
    }

	public function index()
	{
		$details = array (
			'get_all_rented_templates'		=>	$this->Templates_model->get_all_rented_templates()
		);

		$data['content']	=	$this->load->view('user/onlinecontent', $details, TRUE);
		$data['curpage']	= 	$this->curpage;
		$this->load->view('template', $data);
	}
}
