<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Co_administrator extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Co-Administrator";
        $this->load->model('Users_model');
        $this->load->model('Permission_admin_model');

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
				'get_all_administrator'		=>	$this->Users_model->get_all_administrator(),
				'get_specific'				=>	$this->Users_model->get_latest_administrator(),
				'get_content'				=>	$this->Permission_admin_model->get_all_permission()
			);

			$data['content']	=	$this->load->view('admin/coadministrator', $details, TRUE);
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
				'get_all_administrator'		=>	$this->Users_model->get_all_administrator(),
				'get_specific'				=>	$this->Users_model->get_specific_administrator($no),
				'get_content'				=>	$this->Permission_admin_model->get_all_permission()
			);

			$data['content']	=	$this->load->view('admin/coadministrator', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template1', $data);
		} else {
			redirect('/');
		}	
	}

	public function delete($no)
	{
		$params = array (
			'DELETION'	=>	1
		);

		$this->Users_model->update($params, $no);

		$this->session->set_flashdata('success_message', 'Account Deleted!');
		redirect('/admin/co_administrator');
	}

	public function update()
	{
		$permission = $this->input->post('txt_select_perm_coa');

		$new = "";

        foreach ($permission as $per) {
            $new .= $per;
        }

        $params = array (
            'PERMISSION'    =>  rtrim($new, "|")
        );

		$this->session->set_flashdata('success_message', 'Account Updated!');
		$this->Users_model->update($params, $this->input->post('txt_update_coa_no'));
	}

	public function create()
	{
		$txt_create_coa_fname	= $this->input->post('txt_create_coa_fname');
		$txt_create_coa_lname	= $this->input->post('txt_create_coa_lname');
		$txt_create_coa_uname	= $this->input->post('txt_create_coa_uname');
		$txt_create_coa_email	= $this->input->post('txt_create_coa_email');
		$txt_create_coa_pword	= $this->input->post('txt_create_coa_pword');

		$params = array(
			'NO'				=>	'',
			'FIRSTNAME'			=>	$txt_create_coa_fname,
			'LASTNAME'			=>	$txt_create_coa_lname,
			'USERNAME'			=>	$txt_create_coa_uname,
			'PHONENUMBER'		=>	'',
			'EMAIL'				=>	$txt_create_coa_email,
			'PASSWORD'			=>	md5($txt_create_coa_pword),
			'ACCOUNT_TYPE'		=>	'Administrator',
			'ACTIVATED'			=>	1,
			'VERIFIED'			=>	'YES',
			'VERIFICATIONCODE'	=>	'',
			'PERMISSION'		=>	'',
			'IMAGEURL'			=>	'noimage.png',
			'DATE'				=>	$this->date,
			'TIME'				=>	$this->time,
			'DELETION'			=>	0
		);

		$this->Users_model->create($params);

		$this->session->set_flashdata('success_message', 'New co-administrator account added!');
	}
}
