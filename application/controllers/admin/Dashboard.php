<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Dashboard";
        $this->load->model('Contact_admin_model');
        $this->load->model('Todo_list_model');
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
				'get_admin_specific'					=>	$this->Users_model->get_admin_specific($user_session->NO),
				'get_all_contact_for_specific_admin'	=>	$this->Contact_admin_model->get_all_contact_for_specific_admin($user_session->NO),
				'get_all_todo_for_specific_admin'		=>	$this->Todo_list_model->get_all_todo_for_specific_admin($user_session->NO)
			);

			$data['content']	=	$this->load->view('admin/dashboard', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template1', $data);
		} else {
			redirect('/');
		}	
	}

	public function insertContact()
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
			redirect('/');
		} else {
			redirect('/');
		}
	}

	public function checked()
	{
		$dashTodoNo = $this->input->post('dashTodoNo');

		$params = array(
			'LISTSTATUS'	=> 	'0',
			'DATE'			=> 	$this->date,
			'TIME'			=> 	$this->time
		);

		$this->Todo_list_model->update($params, $dashTodoNo);
	}

	public function notchecked()
	{
		$dashTodoNo = $this->input->post('dashTodoNo');

		$params = array(
			'LISTSTATUS'	=> 	'1',
			'DATE'			=> 	$this->date,
			'TIME'			=> 	$this->time
		);

		$this->Todo_list_model->update($params, $dashTodoNo);
	}

	public function insertToDo()
	{
		$dashTodo_title_create		= $_POST['dashTodo_title_create'];

		if ( isset($_POST['dashTodo_create']) ) {

			$params = array(
				'NO'			=> 	'',
				'NOUSER'		=> 	$this->nouser,
				'LISTNAME'		=> 	$dashTodo_title_create,
				'LISTSTATUS'	=> 	'0',
				'DATE'			=> 	$this->date,
				'TIME'			=> 	$this->time,
				'DELETION'		=> 	'0'
			);

			$this->Todo_list_model->insert($params);
			redirect('/');
		} else {
			redirect('/');
		}
	}

	public function deleteTodoTask($nouser)
	{
		$params = array(
			'DATE'			=> 	$this->date,
			'TIME'			=> 	$this->time,
			'DELETION'		=>	'1'
		);
		$this->Todo_list_model->deleteAllCheckedTask($params, $nouser);
		redirect('/');
	}

}
