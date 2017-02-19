<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permission_admin_model extends CI_Model
{

	public $table			=	"permission_admin";
	public $dbno			=	"NO";
	public $name 			= 	"NAME";
	public $active 			= 	"ACTIVE";

	function __construct()
	{
		parent::__construct();
	}

	public function get_all_permission()
	{
		$row = $this->db->where($this->active, "1")
						->order_by($this->name, "ASC")
						->get($this->table);

		return $row->result();
	}

}