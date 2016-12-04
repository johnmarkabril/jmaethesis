<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Team_model');
        $this->curpage = "Team";
    }

	public function index()
	{
		$details = array (
			'get_team'			=>	$this->Team_model->get_team()
		);

		$data['content']	=	$this->load->view('user/team', $details, TRUE);
		$data['curpage']	= 	$this->curpage;
		$this->load->view('template', $data);
	}
}
