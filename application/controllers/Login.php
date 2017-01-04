<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Login";
        $this->load->model('Users_model'); 
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
					// $this->session->set_flashdata('success_message', 'This is my message');
					redirect('/');
				}else if ($_SESSION['account_type'] == "Administrator"){
					$data = $this->session->set_userdata('user_session',$valid);
					// $this->session->set_flashdata('success_message', 'This is my message');
					redirect('/admin');
				}
			}else{
				// $this->session->set_flashdata('error_message', 'This is my message');
				redirect('/');
			}
		}
	}
}
