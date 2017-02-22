<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Contact";
        $this->load->model('Contact_admin_model');
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
				'get_admin_specific'	=>	$this->Users_model->get_admin_specific($user_session->NO),
				'get_all_contact'		=>	$this->Contact_admin_model->get_all_contact_for_specific_admin($this->nouser)
			);

			$data['content']	=	$this->load->view('admin/contact', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template1', $data);
		} else {
			redirect('/');
		}	
	}

	public function insert()
	{
        $loc = $_SERVER['DOCUMENT_ROOT'].base_url()."public/img/";

		$contactDash_name_create		= $_POST['contactDash_name_create'];
		$contactDash_contact_create		= $_POST['contactDash_contact_create'];
		$contactDash_email_create		= $_POST['contactDash_email_create'];
		$contactDash_address_create		= $_POST['contactDash_address_create'];

		if ( isset($_POST['contactDash_create']) ) {

			$image_name = addslashes($_FILES['image']['name']);
			$ctr_imgname = 'noimage.png';
			if ( !empty($image_name) ) {
				$ctr_imgname = $image_name;
            	move_uploaded_file($_FILES['image']['tmp_name'], $loc . $_FILES['image']['name']);
			}

			$params = array(
				'NO'			=> 	'',
				'NOUSER'		=> 	$this->nouser,
				'NAME'			=> 	$contactDash_name_create,
				'CONTACTNO'		=> 	$contactDash_contact_create,
				'EMAILADDRESS'	=> 	$contactDash_email_create,
				'ADDRESS'		=> 	$contactDash_address_create,
				'IMAGEURL'		=> 	$ctr_imgname,
				'DATE'			=> 	$this->date,
				'TIME'			=> 	$this->time,
				'DELETION'		=> 	'0'
			);

			$this->Contact_admin_model->insert($params);
			$this->session->set_flashdata('success_message', 'New contact added!');
			redirect('/admin/contact');
		} else {
			redirect('/admin/contact');
		}
	}

	public function delete($no)
	{
		$params = array(
			'DELETION'	=>	1
		);

		$this->Contact_admin_model->update($params, $no);

		$this->session->set_flashdata('success_message', 'Account Deleted!');
		redirect('/admin/contact');
	}

}
