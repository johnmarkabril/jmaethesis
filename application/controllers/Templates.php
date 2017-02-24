<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Templates";
        $this->load->model('About_my_site_model');
        $this->load->model('Templates_model'); 
    }

	public function index()
	{
		if ( $this->session->userdata('account_type') == "User" || $this->session->userdata('account_type') == "" ) {
			$details = array (
				'get_all_available_templates'		=>	$this->Templates_model->get_all_available_templates(),
				'get_active'						=>	$this->About_my_site_model->get_active()
			);

			$data['content']	=	$this->load->view('user/templatescontent', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template', $data);
		} else if ( $this->session->userdata('account_type') == "Administrator" ) {
			redirect('/admin');
		} else if ( $this->session->userdata('account_type') == "Agent" ) {
			redirect('/agent');
		}
	}
}
