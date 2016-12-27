<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Home";
        $this->load->model('Team_model'); 
        $this->load->model('Templates_model'); 

		
    }

	public function index()
	{
		$details = array (
			"get_all_team"						=>	$this->Team_model->get_all_team(),
			'get_all_available_templates_limit'	=>	$this->Templates_model->get_all_available_templates_limit(),
			'get_all_rented_templates_limit'	=>	$this->Templates_model->get_all_rented_templates_limit()
		);

		$data['content']	=	$this->load->view('user/homecontent', $details, TRUE);
		$data['curpage']	= 	$this->curpage;
		$this->load->view('template', $data);
	}
}
