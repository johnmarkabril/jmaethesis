<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issue_tracker extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Issue Tracker";
        $this->load->model('Users_model');
        $this->load->model('Issue_tracker_model');
        $this->load->model('Issue_tracker_reply_model');

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
				'get_all_issue_tracker'					=>	$this->Issue_tracker_model->get_all_issue_tracker()
			);

			$data['content']	=	$this->load->view('agent/issue_tracker', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template2', $data);
		} else {
			redirect('/');
		}	
	}

	public function getReplyIssueTracker()
	{
		$no = $this->input->post('no');
		$get_reply = $this->Issue_tracker_model->get_reply($no);

		foreach ( $get_reply as $gr ) :
			echo '
				<div class="social-comment">
                    <a href="" class="pull-left">
                        <img style="height:32px;width:32px;" alt="image" src="'.base_url().'public/img/'.$gr->IMAGEURL.'">
                    </a>
                    <div class="media-body">
                        <div class="text-bold">'.$gr->FIRSTNAME.' '.$gr->LASTNAME.'</div>
                        '.$gr->REPLY.'
                        <br>
                        <small class="text-muted">'.$gr->DATE.' - '.$gr->TIME.'</small>
                    </div>
                </div>
			';
		endforeach;
	}

	public function solved_issue($no)
	{
		$params = array(
			'STATUS'	=> 	'1',
			'DATEINSERT'	=>	$this->date.' '.$this->time
		);
		$this->Issue_tracker_model->update($params,$no);
		redirect('/agent/issue_tracker');
	}

	public function insert_reply()
	{
		$issueTrackerNo 	= $this->input->post('issueTrackerNo');
		$issueTrackerReply 	= $this->input->post('issueTrackerReply');
		
		$params = array(
			'NO'				=> '',
			'ISSUETRACKERNO'	=> $issueTrackerNo,
			'NOREPLYFROM'		=> $this->nouser,
			'REPLY'				=> $issueTrackerReply,
			'DATE'				=> $this->date,
			'TIME'				=> $this->time,
			'DELETION'			=> 0
		);
		$this->Issue_tracker_reply_model->insert_reply($params);

		$params = array(
			'STATUS'		=> 	'2',
			'DATEINSERT'	=>	$this->date.' '.$this->time
		);

		$this->Issue_tracker_model->update($params, $issueTrackerNo);
	}

}
