<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model
{

	public $email 			=	"EMAIL";
	public $password 		=	"PASSWORD";
	public $deletion		=	"DELETION";
	public $lastname 		=	"LASTNAME";
	public $firstname		=	"FIRSTNAME";
	public $account_type 	=	"ACCOUNT_TYPE";
	public $verified		=	"VERIFIED";
	public $date			=	"DATE";
	public $dbno			=	"NO";
	public $table			=	"user";

	function __construct()
	{
		parent::__construct();
	}

	function check_email_password_login($email, $password)
	{
		$row = $this->db->where($this->email, $email)
						->where($this->password, $password)
						->where($this->deletion, "0")
						->where($this->verified, "YES")
						->limit(1)
						->get($this->table);
			return $row->row();
	}

	function get_admin_specific($no)
	{
		$row = $this->db->where($this->dbno,$no)
						->where($this->account_type, 'Administrator')
						->limit(1)
						->get($this->table);

			return $row->result();
	}

	function checkEmail($email)
	{
		$row = $this->db->where($this->email,$email)
						->limit(1)
						->get($this->table);

			return $row->result();
	}

	function get_all_user()
	{
		$row = $this->db->where($this->account_type, 'User')
						->where($this->deletion, "0")
						->where($this->verified, "YES")
						->order_by($this->lastname, 'ASC')
						->get($this->table);

			return $row->result();
	}

	function get_num_rows_all_user() {
		$row = $this->db->where($this->account_type, 'User')
						->get($this->table);

		return $row->num_rows();
	}

	function get_num_rows_curmonth($current_month, $current_Year){
		$row = $this->db->like($this->date, $current_month)
						->like($this->date, $current_Year)
						->where($this->account_type, 'User')
						->get($this->table);

		return $row->num_rows();
	}
}