<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Blog";
    }

	public function index()
	{
		$details = array (

		);

		$data['content']	=	$this->load->view('user/blogcontent', $details, TRUE);
		$data['curpage']	= 	$this->curpage;
		$this->load->view('template', $data);
	}
}
