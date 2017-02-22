<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paypal_configuration extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "PayPal Configuration";
        $this->load->model('Paypal_configuration_model');
        $this->load->model('Users_model');

        $this->nouser = $this->session->userdata('user_session')->NO;
    	date_default_timezone_set("Asia/Manila");
    	$this->date = date("F d, Y");
    	$this->time = date("g:i A");
    }

	public function index()
	{
		$user_session = $this->session->userdata('user_session');

		if ( $this->session->userdata('user_session')->ACCOUNT_TYPE == "Administrator" ) {
			$details = array (
				'get_admin_specific'		=>	$this->Users_model->get_admin_specific($user_session->NO),
				'get_all_paypal'			=>	$this->Paypal_configuration_model->get_all_paypal(),
				'get_specific'				=>	$this->Paypal_configuration_model->get_latest()
			);

			$data['content']	=	$this->load->view('admin/paypalconfiguration', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template1', $data);
		} else {
			redirect('/');
		}	
	}

	public function information($no)
	{
		$user_session = $this->session->userdata('user_session');

		if ( $this->session->userdata('user_session')->ACCOUNT_TYPE == "Administrator" ) {
			$details = array (
				'get_admin_specific'		=>	$this->Users_model->get_admin_specific($user_session->NO),
				'get_all_paypal'			=>	$this->Paypal_configuration_model->get_all_paypal(),
				'get_specific'				=>	$this->Paypal_configuration_model->get_specific($no)
			);

			$data['content']	=	$this->load->view('admin/paypalconfiguration', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template1', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		$params = array (
			'NO'			=> 	'',
			'NOUSER'		=>	$this->nouser,
			'PAYPAL_EMAIL'	=>	$this->input->post('paypal_email'),
			'STATUS'		=>	'disabled',
			'DELETION'		=>	0
		);
		
		$this->session->set_flashdata('success_message', 'New PayPal Account Added!');
		$this->Paypal_configuration_model->create($params);
	}

	public function update()
	{
		$no = $this->input->post('txt_paypal_no');
		$email = $this->input->post('txt_paypal_email_upd');
		$status = $this->input->post('paypal_email_status');

		if ( $status == 'enabled' ) {
			$paramsDisableAll = array(
				'STATUS'		=>	'disabled'
			);

			$this->Paypal_configuration_model->disableAll($paramsDisableAll);

			$params = array(
				'PAYPAL_EMAIL'	=>	$email,
				'STATUS'		=>	'enabled'
			);

			$this->Paypal_configuration_model->update($params, $no);
		} else if ( $status == 'disabled' ) {
			$params = array(
				'PAYPAL_EMAIL'	=>	$email,
				'STATUS'		=>	'disabled'
			);

			$this->session->set_flashdata('success_message', 'PayPal Account updated!');
			$this->Paypal_configuration_model->update($params, $no);
		}

	}

	public function delete($no)
	{
		$params = array(
			'DELETION'	=> 1
		);

		$this->session->set_flashdata('success_message', 'PayPal account deleted!');
		$this->Paypal_configuration_model->update($params, $no);
		redirect('/admin/paypal_configuration');
	}
}
