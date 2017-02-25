<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Home";
        $this->load->model('Templates_model');  
        $this->load->model('About_my_site_model');
        $this->load->model('Paypal_configuration_model');
        $this->load->model('Templatesales_model');

    	date_default_timezone_set("Asia/Manila");
    	$this->date = date("F d, Y");
    	$this->time = date("g:i A");
    }

	public function index()
	{
		if ( $this->session->userdata('account_type') == "User" || $this->session->userdata('account_type') == "" ) {

			$paypal_enable = $this->Paypal_configuration_model->get_enable();
			foreach ($paypal_enable as $pe) {
				$paypal_email = $pe->PAYPAL_EMAIL;
			}

			$details = array (
				'get_all_available_templates'		=>	$this->Templates_model->get_all_available_templates(),
				'get_all_rented_templates'			=>	$this->Templates_model->get_all_rented_templates(),
				'get_active'						=>	$this->About_my_site_model->get_active(),
				'paypal_id'							=>	$paypal_email
			);

			$data['content']	=	$this->load->view('user/homecontent', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template', $data);
		} else if ( $this->session->userdata('account_type') == "Administrator" ) {
			redirect('/admin');
		} else if ( $this->session->userdata('account_type') == "Agent" ) {
			redirect('/agent');
		}
	}

	public function success()
	{
		parse_str($_GET['cm'],$_MYVAR);
		$params = array(
			'NO'			=> '',
			'TEMPLATESNO'	=> $_GET['item_number'],
			'FIRSTNAME'		=> $this->session->userdata('user_session')->FIRSTNAME,
			'LASTNAME'		=> $this->session->userdata('user_session')->LASTNAME,
			'EMAILADDRESS'	=> $this->session->userdata('user_session')->EMAIL,
			'RENTTIME'		=> $_MYVAR['period'],
			'PRICE'			=> $_GET['amt'],
			'IMAGEURL'		=> $this->session->userdata('user_session')->IMAGEURL,
			'DATE'			=> $this->date,
			'TIME'			=> $this->time,
			'DELETION'		=> 0,
			'AGENTSEE'		=> 0
		);

		$this->Templatesales_model->create($params);

		$params = array(
			'CURRENTOWNER'			=>	$this->session->userdata('user_session')->FIRSTNAME .' '.$this->session->userdata('user_session')->LASTNAME,
			'SITEURL'				=>	$_MYVAR['subdomain'],
			'OWNERTITLEWEBSITE'		=>	$_GET['item_name'],
			'AVAILABILITY'			=>  0
		);

		$this->Templates_model->update($params, $_GET['item_number']);

		$details = array (
			'item_name'		=> $_GET['item_name'],
				'get_active'						=>	$this->About_my_site_model->get_active(),
		);		

		$data['content']	=	$this->load->view('success', $details, TRUE);
		$data['curpage']	= 	$this->curpage;
		$this->load->view('template', $data);
	}
}
