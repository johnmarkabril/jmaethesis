<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Login";
        $this->load->model('Notification_admin_model');
        $this->load->model('Users_model'); 

    	date_default_timezone_set("Asia/Manila");
    	$this->date = date("F d, Y");
    	$this->time = date("g:i A");
    }

	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('login_email','Email','required');
		$this->form_validation->set_rules('login_password','Password','required');

		if($this->form_validation->run() == FALSE){
			redirect('/');
		}else{
			$c_email = set_value('login_email');
			$c_password = set_value('login_password');
			$valid = $this->Users_model->check_email_password_login($c_email, md5($c_password));
			// print_r($valid->ACCOUNT_TYPE);
			$this->session->set_userdata('account_type', $valid->ACCOUNT_TYPE);
			if($valid != false){
				if ($_SESSION['account_type'] == "User") {
					$data = $this->session->set_userdata('user_session',$valid);

					$params = array(
						'NO'		=> '',
						'NOUSER'	=> $this->session->userdata('user_session')->NO,
						'CONTENT'	=> $this->session->userdata('user_session')->FIRSTNAME.' '.$this->session->userdata('user_session')->LASTNAME.' has been logged in.',
						'DATE'		=> $this->date,
						'TIME'		=> $this->time,
						'DELETION'	=> 0
					);
					$this->Notification_admin_model->create($params);

					// $this->session->set_flashdata('success_message', 'This is my message');
					redirect('/');
				}else if ($_SESSION['account_type'] == "Administrator"){
					$data = $this->session->set_userdata('user_session',$valid);
					// $this->session->set_flashdata('success_message', 'This is my message');
					redirect('/admin');
				}else if ($_SESSION['account_type'] == "Agent"){
					$data = $this->session->set_userdata('user_session',$valid);
					// $this->session->set_flashdata('success_message', 'This is my message');
					redirect('/agent');
				}
			}else{
				// $this->session->set_flashdata('error_message', 'This is my message');
				redirect('/');
			}
		}
	}
}
