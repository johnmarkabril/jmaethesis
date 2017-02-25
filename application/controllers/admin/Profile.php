<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Profile";
        $this->load->model('Users_model');
        $this->load->model('Post_admin_model');
        $this->load->model('About_my_site_model');
        $this->load->model('Blog_model'); 
        $this->load->model('Blog_reply_model');
        $this->load->model('Notification_admin_model');
        $this->load->model('Users_model');
        $this->load->model('Issue_tracker_model');
        $this->load->model('Issue_tracker_reply_model');
        $this->load->model('Location_model');

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
				'get_all_post'				=>	$this->Post_admin_model->get_all_post(),
				'session_name'				=>	$this->session->userdata('user_session')->FIRSTNAME." ".$this->session->userdata('user_session')->LASTNAME,
				'session_image'				=>	$this->session->userdata('user_session')->IMAGEURL,
				'get_reply'					=> 	$this->Post_admin_model->get_all_reply(),
				'date'						=>	$this->date
			);	

			$data['content']	=	$this->load->view('admin/profile', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template1', $data);
		} else {
			redirect('/');
		}	
	}
	
	public function updateLocation()
	{
		$txt_lat_prof	= $this->input->post('txt_lat_prof');
		$txt_long_prof	= $this->input->post('txt_long_prof');

		$params = array(
			'LATITUDE'		=>	$txt_lat_prof,
			'LONGHITUDE'	=>	$txt_long_prof
		);

		$this->Users_model->update($params, $this->nouser);
		$this->session->set_flashdata('success_message', 'Your location is changed!');
	}


	public function create()
	{
		$txt_post = $this->input->post('txt_post');

		$params = array(
			'NO'				=> '',
			'NAME'				=> $this->session->userdata('user_session')->FIRSTNAME.' '.$this->session->userdata('user_session')->LASTNAME,
			'IMAGEURL'			=> $this->session->userdata('user_session')->IMAGEURL,
			'POSTDESCRIPTION'	=> $txt_post,
			'DATE'				=> $this->date,
			'TIME'				=> $this->time,
			'DELETION'			=> 0
		);

		$ctr = $this->Post_admin_model->get_rows();
		echo $ctr = $ctr + 1;
		$this->Post_admin_model->create($params);
	}

	public function insert_reply()
	{
		$replyMessage	= $this->input->post('replyMessage');
		$messageNo		= $this->input->post('messageNo');

		$params = array(
			'NO'		=> '',
			'NOREPLY'	=> $messageNo,
			'NAME'		=> $this->session->userdata('user_session')->FIRSTNAME.' '.$this->session->userdata('user_session')->LASTNAME,
			'IMAGEURL'	=> $this->session->userdata('user_session')->IMAGEURL,
			'REPLY'		=> $replyMessage,
			'DATE'		=> $this->date,
			'TIME'		=> $this->time,
			'DELETION'	=> 0
		);
		
		$this->Post_admin_model->insertReply($params);
	}

	public function change_profile()
	{
		if ( isset($_POST['btn_update_image_profile']) ) {
        	$loc = $_SERVER['DOCUMENT_ROOT'].base_url()."public/img/";
		    move_uploaded_file($_FILES['image']['tmp_name'], $loc . $_FILES['image']['name']);

		    $imageCTR = $_FILES['image']['name'];
		    $params = array(
		    	'IMAGEURL'	=>	$imageCTR
		    );

		    $this->Users_model->update($params, $this->nouser);
			$this->session->set_flashdata('success_message', 'Profile picture successfully changed!');

			$params = array(
				'NO'		=> '',
				'NOUSER'	=> $this->session->userdata('user_session')->NO,
				'CONTENT'	=> $this->session->userdata('user_session')->FIRSTNAME.' '.$this->session->userdata('user_session')->LASTNAME.' change his/her profile picture.',
				'DATE'		=> $this->date,
				'TIME'		=> $this->time,
				'DELETION'	=> 0
			);
			$this->Notification_admin_model->create($params);

			$this->session->userdata('user_session')->IMAGEURL = $imageCTR;

			$params = array(
				'IMAGEURL'	=>	$imageCTR
			);
			$this->Post_admin_model->update_using_name_post($params, $this->session->userdata('user_session')->FIRSTNAME.' '.$this->session->userdata('user_session')->LASTNAME);

			$this->Post_admin_model->update_using_name_post_reply($params, $this->session->userdata('user_session')->FIRSTNAME.' '.$this->session->userdata('user_session')->LASTNAME);
			
			redirect('/admin/profile');
		} else {
			redirect('/');
		}
	}

	public function changeInformation()
	{
		$txt_fname_profile_change	= $this->input->post('txt_fname_profile_change');
		$txt_lname_profile_change	= $this->input->post('txt_lname_profile_change');
		$txt_email_profile_change	= $this->input->post('txt_email_profile_change');
		$txt_uname_profile_change	= $this->input->post('txt_uname_profile_change');
		$txt_contact_profile_change	= $this->input->post('txt_contact_profile_change');

		$params = array(
			'FIRSTNAME'		=> $txt_fname_profile_change,
			'LASTNAME'		=> $txt_lname_profile_change,
			'EMAIL'			=> $txt_email_profile_change,
			'USERNAME'		=> $txt_uname_profile_change,
			'PHONENUMBER'	=> $txt_contact_profile_change
		);
		$this->Users_model->update($params, $this->nouser);

		$params = array(
			'NAME'	=>	$txt_fname_profile_change . " " . $txt_lname_profile_change
		);
		$this->Post_admin_model->update_using_name_post($params, $this->session->userdata('user_session')->FIRSTNAME.' '.$this->session->userdata('user_session')->LASTNAME);

		$this->Post_admin_model->update_using_name_post_reply($params, $this->session->userdata('user_session')->FIRSTNAME.' '.$this->session->userdata('user_session')->LASTNAME);

		$params = array(
			'NO'		=> '',
			'NOUSER'	=> $this->session->userdata('user_session')->NO,
			'CONTENT'	=> $this->session->userdata('user_session')->FIRSTNAME.' '.$this->session->userdata('user_session')->LASTNAME.' change his/her personal information.',
			'DATE'		=> $this->date,
			'TIME'		=> $this->time,
			'DELETION'	=> 0
		);
		$this->Notification_admin_model->create($params);

		$this->session->userdata('user_session')->FIRSTNAME 	= $txt_fname_profile_change;
		$this->session->userdata('user_session')->LASTNAME 		= $txt_lname_profile_change;
		$this->session->userdata('user_session')->EMAIL 		= $txt_email_profile_change;
		$this->session->userdata('user_session')->USERNAME 		= $txt_uname_profile_change;
		$this->session->userdata('user_session')->PHONENUMBER 	= $txt_contact_profile_change;

		$this->session->set_flashdata('success_message', 'Personal information successfully changed!');
	}

	public function check_pword()
	{
		$txt_current_pword = $this->input->post('txt_current_pword');
		$result = $this->Users_model->check_password_using_no(md5($txt_current_pword), $this->nouser);

		if ( !empty($result) ){
			echo '1';
		}else{
			echo '0';
		}
	}

	public function changePassword()
	{
		$txt_pword_changeprofile = $this->input->post('txt_pword_changeprofile');

		$params = array(
			'PASSWORD'	=> md5($txt_pword_changeprofile)
		);

		$this->Users_model->update($params, $this->nouser);
		$this->session->userdata('user_session')->PASSWORD 	= md5($txt_pword_changeprofile);

		$params = array(
			'NO'		=> '',
			'NOUSER'	=> $this->session->userdata('user_session')->NO,
			'CONTENT'	=> $this->session->userdata('user_session')->FIRSTNAME.' '.$this->session->userdata('user_session')->LASTNAME.' change his/her personal information.',
			'DATE'		=> $this->date,
			'TIME'		=> $this->time,
			'DELETION'	=> 0
		);
		$this->Notification_admin_model->create($params);

		$this->session->set_flashdata('success_message', 'Password successfully changed!');
	}
}
