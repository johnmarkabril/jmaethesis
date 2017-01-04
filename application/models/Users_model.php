<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model
{

	public $email 		=	"EMAIL";
	public $password 	=	"PASSWORD";
	public $deletion	=	"DELETION";
	public $verified	=	"VERIFIED";
	public $table		=	"user";

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

}