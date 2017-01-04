<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Home";
        $this->load->model('Blog_model'); 
        $this->load->model('Team_model'); 
        $this->load->model('Templates_model'); 
        $this->load->model('Testimonial_model'); 
    }

	public function index()
	{
		if ( $this->session->userdata('account_type') == "User" || $this->session->userdata('account_type') == "" ) {
			$details = array (
				"get_all_team"						=>	$this->Team_model->get_all_team(),
				'get_all_available_templates_limit'	=>	$this->Templates_model->get_all_available_templates_limit(),
				'available_limit_ctr'				=>	"4",
				'numrows_available_limit'			=>	$this->Templates_model->get_all_available_templates_limit_numrow(),
				'get_all_rented_templates_limit'	=>	$this->Templates_model->get_all_rented_templates_limit(),
				'rented_limit_ctr'					=>	"4",
				'numrows_rented_limit'				=>	$this->Templates_model->get_all_rented_templates_limit_numrow(),
				'get_all_testimonial'				=>	$this->Testimonial_model->get_all_testimonial(),
				'get_all_blog_limit'				=>	$this->Blog_model->get_all_blog_limit()
			);

			$data['content']	=	$this->load->view('user/homecontent', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template', $data);
		} else {
			redirect('/admin');
		}
	}
}
