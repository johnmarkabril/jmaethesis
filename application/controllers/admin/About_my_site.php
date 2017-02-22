<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_my_site extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "About My Site";
        $this->load->model('About_my_site_model');
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
				'get_all_aboutmysite'		=>	$this->About_my_site_model->get_all_aboutmysite(),
				'get_specific'				=>	$this->About_my_site_model->get_latest()
			);

			$data['content']	=	$this->load->view('admin/aboutmysite', $details, TRUE);
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
				'get_all_aboutmysite'		=>	$this->About_my_site_model->get_all_aboutmysite(),
				'get_specific'				=>	$this->About_my_site_model->get_specific($no)
			);

			$data['content']	=	$this->load->view('admin/aboutmysite', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template1', $data);
		} else {
			redirect('/');
		}
	}

	public function insert()
	{
		$ams_title			=	$this->input->post('ams_title');
		$ams_description	=	$this->input->post('ams_description');

		if ( $this->session->userdata('user_session')->ACCOUNT_TYPE == "Administrator" ) {

			$params = array(
				'NO'			=>	'',
				'NOUSER'		=>	$this->nouser,
				'TITLE'			=>	$ams_title,
				'DESCRIPTION'	=>	$ams_description,
				'DATE'			=>	$this->date,
				'IMAGEURL'		=>	'',
				'ACTIVE'		=>	'0',
				'DELETION'		=>	'0'	
			);

			$this->session->set_flashdata('success_message', 'New about my site added!');
			$this->About_my_site_model->insert($params);
		} else {
			redirect('/');
		}
	}
	
	public function update()
	{
		$ams_no_update			=	$this->input->post('ams_no_update');
		$ams_title_update		=	$this->input->post('ams_title_update');
		$ams_description_update	=	$this->input->post('ams_description_update');
		$ams_active_update		=	$this->input->post('ams_active_update');

		if ( $this->session->userdata('user_session')->ACCOUNT_TYPE == "Administrator" ) {

			if ( $ams_active_update == 'enabled' ) {
				$paramsAll = array(
					'ACTIVE'		=> 0
				);
				$this->About_my_site_model->updateAll($paramsAll);

				$params = array(
					'NOUSER'		=>	$this->nouser,
					'TITLE'			=>	$ams_title_update,
					'DESCRIPTION'	=>	$ams_description_update,
					'ACTIVE'		=>	1
				);
			} else {
				$params = array(
					'NOUSER'		=>	$this->nouser,
					'TITLE'			=>	$ams_title_update,
					'DESCRIPTION'	=>	$ams_description_update,
					'ACTIVE'		=>  0
				);
			}

			$this->session->set_flashdata('success_message', 'Updated the about my site!');
			$this->About_my_site_model->update($params, $ams_no_update);
		} else {
			redirect('/');
		}
	}

	public function delete($no)
	{
		$params = array(
			'DELETION'		=>	'1'
		);


		$this->session->set_flashdata('success_message', 'Item deleted!');
		$this->About_my_site_model->update($params, $no);
		redirect('/admin/about_my_site');
	}
}
