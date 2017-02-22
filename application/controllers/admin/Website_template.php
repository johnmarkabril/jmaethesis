<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_template extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Website Template";
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

		if ( $this->session->userdata('user_session')->ACCOUNT_TYPE == "Administrator" ) {
			$details = array (
				'get_admin_specific'		=>	$this->Users_model->get_admin_specific($user_session->NO),
				'get_all_templates'			=>	$this->Templates_model->get_all_templates(),
				'get_specific'				=> 	$this->Templates_model->get_latest_templates()
			);

			$data['content']	=	$this->load->view('admin/websitetemplate', $details, TRUE);
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
				'get_all_templates'			=>	$this->Templates_model->get_all_templates(),
				'get_specific'				=> 	$this->Templates_model->get_specific_templates($no)
			);

			$data['content']	=	$this->load->view('admin/websitetemplate', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template1', $data);
		} else {
			redirect('/');
		}	
	}

	public function update()
	{
		$txt_no_wt			=	$this->input->post('txt_no_wt');
		$txt_name_wt		=	$this->input->post('txt_name_wt');
		$txt_category_wt	=	$this->input->post('txt_category_wt');
		$txt_description_wt	=	$this->input->post('txt_description_wt');
		$txt_library_wt		=	$this->input->post('txt_library_wt');
		$txt_price_wt		=	$this->input->post('txt_price_wt');

		$params = array(
			'TEMPLATENAME'		=> $txt_name_wt,
			'TEMPLATECATEGORY'	=> $txt_category_wt,
			'DESCRIPTION'		=> $txt_description_wt,
			'LIBRARYUSE'		=> $txt_library_wt,
			'PRICE'				=> $txt_price_wt
		);

		$this->Templates_model->update($params, $txt_no_wt);
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
			redirect('/admin/website_template');
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		$txt_name_wt_create			=	$this->input->post('txt_name_wt_create');
		$txt_category_wt_create		=	$this->input->post('txt_category_wt_create');
		$txt_description_wt_create	=	$this->input->post('txt_description_wt_create');
		$txt_library_wt_create		=	$this->input->post('txt_library_wt_create');
		$txt_price_wt_create		=	$this->input->post('txt_price_wt_create');

		$params = array (
			'NO'				=> '',
			'TEMPLATENAME'		=> $txt_name_wt_create,
			'TEMPLATECATEGORY'	=> $txt_category_wt_create,
			'DESCRIPTION'		=> $txt_description_wt_create,
			'LIBRARYUSE'		=> $txt_library_wt_create,
			'PRICE'				=> $txt_price_wt_create,
			'CURRENTOWNER'		=> '',
			'DATEUPLOADED'		=> $this->date,
			'IMAGEURL'			=> 'noimage.png',
			'SITEURL'			=> '',
			'OWNERTITLEWEBSITE'	=> '',
			'DELETION'			=> 0,
			'AVAILABILITY'		=> 1,
			'AGENTSEE'			=> 0
		);

		$this->Templates_model->create($params);
		$this->session->set_flashdata('success_message', 'New template is added!');
	}

	public function delete($no)
	{
		$params = array (
			'DELETION' 	=> 1
		);
		$this->Templates_model->update($params, $no);
		$this->session->set_flashdata('success_message', 'Template deleted!');
		redirect('/admin/website_template');
	}

}