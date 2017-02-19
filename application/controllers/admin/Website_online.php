<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_online extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Website Online";
        $this->load->model('Users_model');
        $this->load->model('Templates_model');
    }

	public function index()
	{
		$user_session = $this->session->userdata('user_session');

		if ( $this->session->userdata('user_session')->ACCOUNT_TYPE == "Administrator" ) {
			$details = array (
				'get_admin_specific'		=>	$this->Users_model->get_admin_specific($user_session->NO),
				'get_all_online'			=>	$this->Templates_model->get_all_rented_templates()
			);

			$data['content']	=	$this->load->view('admin/websiteonline', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template1', $data);
		} else {
			redirect('/');
		}	
	}

	public function update()
	{
		$txt_no_wo 		=	$this->input->post('txt_no_wo');
		$txt_title_wo	=	$this->input->post('txt_title_wo');
		$txt_owner_wo	=	$this->input->post('txt_owner_wo');

		$params = array(
			'CURRENTOWNER'		=>	$txt_owner_wo,
			'OWNERTITLEWEBSITE'	=>	$txt_title_wo
		);

		$this->Templates_model->update($params, $txt_no_wo);
		$this->session->set_flashdata('success_message', 'Successfully updated!');
	}

	public function update_image($no)
	{
		if ( isset($_POST['btn_update_image_wo']) ) {
        	$loc = $_SERVER['DOCUMENT_ROOT'].base_url()."public/img/template/";
		    move_uploaded_file($_FILES['image']['tmp_name'], $loc . $_FILES['image']['name']);
		    $imageCTR = $_FILES['image']['name'];
		    $params = array(
		    	'IMAGEURL'	=>	$imageCTR
		    );

		    $this->Templates_model->update($params, $no);
			$this->session->set_flashdata('success_message', 'Updated the website image!');
			redirect('/admin/Website_online');
		} else {
			redirect('/');
		}
	}
}
