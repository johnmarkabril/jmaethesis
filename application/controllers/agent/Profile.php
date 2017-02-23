<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Profile";
        $this->load->model('Users_model');
        $this->load->model('Post_admin_model');

        $this->nouser = $this->session->userdata('user_session')->NO;
    	date_default_timezone_set("Asia/Manila");
    	$this->date = date("F d, Y");
    	$this->time = date("g:i A");
    }

	public function index()
	{
		$user_session = $this->session->userdata('user_session');

		if ( $this->session->userdata('user_session')->ACCOUNT_TYPE == "Agent" ) {
			$details = array (
				'get_agent_specific'		=>	$this->Users_model->get_agent_specific($user_session->NO),
				'get_all_post'				=>	$this->Post_admin_model->get_all_post(),
				'session_name'				=>	$this->session->userdata('user_session')->FIRSTNAME." ".$this->session->userdata('user_session')->LASTNAME,
				'session_image'				=>	$this->session->userdata('user_session')->IMAGEURL,
				'get_reply'					=> 	$this->Post_admin_model->get_all_reply(),
				'date'						=>	$this->date
			);

			$data['content']	=	$this->load->view('agent/profile', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template2', $data);
		} else {
			redirect('/');
		}	
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

}
