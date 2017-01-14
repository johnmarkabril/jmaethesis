<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Home";
        $this->load->model('Templates_model');  
    }

	public function index()
	{
		if ( $this->session->userdata('account_type') == "User" || $this->session->userdata('account_type') == "" ) {
			$details = array (
				'get_all_available_templates'		=>	$this->Templates_model->get_all_available_templates(),
				'get_all_rented_templates'			=>	$this->Templates_model->get_all_rented_templates()
			);

			$data['content']	=	$this->load->view('user/homecontent', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template', $data);
		} else {
			redirect('/admin');
		}
	}
}
