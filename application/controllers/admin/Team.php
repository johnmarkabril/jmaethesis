<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Team";
        $this->load->model('Team_model');
        $this->load->model('Users_model');
    }

	public function index()
	{
		$user_session = $this->session->userdata('user_session');

		if ( $this->session->userdata('user_session')->ACCOUNT_TYPE == "Administrator" ) {
			$details = array (
				'get_admin_specific'		=>	$this->Users_model->get_admin_specific($user_session->NO),
				'get_all_team'				=>	$this->Team_model->get_all_team()
			);

			$data['content']	=	$this->load->view('admin/team', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template1', $data);

		} else {
			redirect('/');
		}	
	}

	public function create()
	{
		if(isset($_POST['btn_team_create'])) {
			$txt_team_firstname	=	$_POST['txt_team_firstname'];
			$txt_team_lastname	=	$_POST['txt_team_lastname'];
			$txt_team_contact	=	$_POST['txt_team_contact'];
			$txt_team_email		=	$_POST['txt_team_email'];
			$txt_team_fb		=	$_POST['txt_team_fb'];
			$txt_team_twitter	=	$_POST['txt_team_twitter'];

			if ( !empty($_FILES['image']['name']) ) {
        		$loc = $_SERVER['DOCUMENT_ROOT'].base_url()."public/img/";
		        move_uploaded_file($_FILES['image']['tmp_name'], $loc . $_FILES['image']['name']);

		        $params = array(
		        	'NO'			=> 	'',
		        	'FIRSTNAME'		=> 	$txt_team_firstname,
		        	'LASTNAME'		=> 	$txt_team_lastname,
		        	'CONTACT'		=> 	$txt_team_contact,
		        	'EMAILADDRESS'	=> 	$txt_team_email,
		        	'FACEBOOK'		=> 	$txt_team_fb,
		        	'TWITTER'		=> 	$txt_team_twitter,
		        	'IMAGEURL'		=> 	$_FILES["image"]["name"],
		        	'DELETION'		=> 	0
		        );
			} else {
				$params = array(
		        	'NO'			=> 	'',
		        	'FIRSTNAME'		=> 	$txt_team_firstname,
		        	'LASTNAME'		=> 	$txt_team_lastname,
		        	'CONTACT'		=> 	$txt_team_contact,
		        	'EMAILADDRESS'	=> 	$txt_team_email,
		        	'FACEBOOK'		=> 	$txt_team_fb,
		        	'TWITTER'		=> 	$txt_team_twitter,
		        	'IMAGEURL'		=> 	'noimage.png',
		        	'DELETION'		=> 	0
		        );
			}

			$this->Team_model->create($params);
			$this->session->set_flashdata('success_message', 'New team member added!');
			redirect('/admin/team');
		} else {
			$this->session->set_flashdata('error_message', 'Access Denied!');
			redirect('/admin/team');
		}
	}

	public function delete($no)
	{
		$params = array (
			'DELETION' 	=> 1
		);
		$this->Team_model->update($params, $no);
		$this->session->set_flashdata('success_message', 'Member deleted!');
		redirect('/admin/team');
	}

	public function update()
	{
		if ( isset($_POST['btn_team_update']) ) {
			$txt_no						=	$_POST['txt_no'];
			$txt_team_firstname_update	=	$_POST['txt_team_firstname_update'];
			$txt_team_lastname_update	=	$_POST['txt_team_lastname_update'];
			$txt_team_contact_update	=	$_POST['txt_team_contact_update'];
			$txt_team_email_update		=	$_POST['txt_team_email_update'];
			$txt_team_fb_update			=	$_POST['txt_team_fb_update'];
			$txt_team_twitter_update	=	$_POST['txt_team_twitter_update'];
			$imageCTR = "";

			if ( !empty($_FILES['image']['name']) ) {
        		$loc = $_SERVER['DOCUMENT_ROOT'].base_url()."public/img/";
		        move_uploaded_file($_FILES['image']['tmp_name'], $loc . $_FILES['image']['name']);
		        $imageCTR = $_FILES['image']['name'];

				$params = array(
		        	'FIRSTNAME'		=> 	$txt_team_firstname_update,
		        	'LASTNAME'		=> 	$txt_team_lastname_update,
		        	'CONTACT'		=> 	$txt_team_contact_update,
		        	'EMAILADDRESS'	=> 	$txt_team_email_update,
		        	'FACEBOOK'		=> 	$txt_team_fb_update,
		        	'TWITTER'		=> 	$txt_team_twitter_update,
		        	'IMAGEURL'		=> 	$imageCTR
		        );
			} else {
				$params = array(
		        	'FIRSTNAME'		=> 	$txt_team_firstname_update,
		        	'LASTNAME'		=> 	$txt_team_lastname_update,
		        	'CONTACT'		=> 	$txt_team_contact_update,
		        	'EMAILADDRESS'	=> 	$txt_team_email_update,
		        	'FACEBOOK'		=> 	$txt_team_fb_update,
		        	'TWITTER'		=> 	$txt_team_twitter_update,
		        );
			}

			$this->Team_model->update($params, $txt_no);
			$this->session->set_flashdata('success_message', 'New team member added!');
			redirect('/admin/team');
		} else {
			$this->session->set_flashdata('error_message', 'Access Denied!');
			redirect('/admin/team');
		}
		
	}

}
