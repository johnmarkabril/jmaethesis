<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Reports";
        $this->load->model('Users_model');
        $this->load->model('Templatesales_model');

        $this->nouser = $this->session->userdata('user_session')->NO;
    	date_default_timezone_set("Asia/Manila");
    	$this->date = date("F d, Y");
    	$this->time = date("g:i A");
    	$this->year = date("Y");
    }

	public function index()
	{
		$month = array ("January", "February", "March", "April", "May", "June", "July","August","September","October","November","December");

		$usersPerMonth = array();
		$usersPerMonthPreviousYear = array();
		$salesReport = array();
		
		for ( $ctr = 0; $ctr < sizeof($month); $ctr++ ) {
			$fetchRow = 0;
			$fetchRow = $this->Users_model->get_all_users_per_month_row($month[$ctr],$this->year);
			array_push($usersPerMonth, $fetchRow);

			$fetchRow = 0;
			$fetchRow = $this->Users_model->get_all_users_per_month_row($month[$ctr],$this->year-1);
			array_push($usersPerMonthPreviousYear, $fetchRow);

			$ctrPrice = 0;
			$monthArr = $this->Templatesales_model->get_monthly_sales_thisyear($month[$ctr],$this->year);
			foreach ( $monthArr as $ma ) {
				$ctrPrice += $ma->PRICE;
			}
			array_push($salesReport, $ctrPrice);
		}
		// usersPerMonthPreviousYear
		$user_session = $this->session->userdata('user_session');

		if ( $this->session->userdata('user_session')->ACCOUNT_TYPE == "Administrator" ) {
			$details = array (
				'get_admin_specific'		=>	$this->Users_model->get_admin_specific($user_session->NO),
				'usersPerMonth'				=>	json_encode($usersPerMonth),
				'usersPerMonthPreviousYear'	=>	json_encode($usersPerMonthPreviousYear),
				'salesReport'				=>	json_encode($salesReport)
			);

			$data['content']	=	$this->load->view('admin/reports', $details, TRUE);
			$data['curpage']	= 	$this->curpage;
			$this->load->view('template1', $data);
		} else {
			redirect('/');
		}	
	}

}
