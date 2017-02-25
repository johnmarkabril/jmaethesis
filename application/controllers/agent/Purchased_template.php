<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchased_template extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Purchased Template";
        $this->load->model('Users_model');
        $this->load->model('Templates_model');

        $this->nouser = $this->session->userdata('user_session')->NO;
    	date_default_timezone_set("Asia/Manila");
    	$this->date = date("F d, Y");
    	$this->time = date("g:i A");
    }

	public function index()
	{
		$user_session = $this->session->userdata('user_session');

		if ( $this->session->userdata('user_session')->ACCOUNT_TYPE == "Agent" ) {
			$details = array (
				'get_agent_specific'		=>	$this->Users_model->get_agent_specific($user_session->NO),
				'get_all_rented_templates'			=>	$this->Templates_model->get_all_rented_templates()
			);

			$data['content']	=	$this->load->view('agent/purchasedtemplate', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template2', $data);
		} else {
			redirect('/');
		}	
	}

}
