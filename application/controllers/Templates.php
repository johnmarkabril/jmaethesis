<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Templates";
        $this->load->model('Templates_model'); 
    }

	public function index()
	{
		$details = array (
			'get_all_available_templates'		=>	$this->Templates_model->get_all_available_templates()
		);

		$data['content']	=	$this->load->view('user/templatescontent', $details, TRUE);
		$data['curpage']	= 	$this->curpage;
		$this->load->view('template', $data);
	}
}
