<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Home";
        $this->load->model('Team_model'); 
    }

	public function index()
	{
		$details = array (
			"get_all_team"		=>	$this->Team_model->get_all_team()
		);

		$data['content']	=	$this->load->view('user/homecontent', $details, TRUE);
		$data['curpage']	= 	$this->curpage;
		$this->load->view('template', $data);
	}
}
