<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Testimonial";
        $this->load->model('Testimonial_model'); 
    }

	public function index()
	{
		if ( $this->session->userdata('account_type') == "User" || $this->session->userdata('account_type') == "" ) {
			$details = array (
				'get_all_testimonial'		=>	$this->Testimonial_model->get_all_testimonial()
			);

			$data['content']	=	$this->load->view('user/testimonialcontent', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template', $data);
		} else {
			redirect('/admin');
		}
	}
}
