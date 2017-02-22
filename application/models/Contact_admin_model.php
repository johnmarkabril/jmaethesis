<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact_admin_model extends CI_Model
{

	public $table			=	"contact_admin";
	public $dbno			=	"NO";
	public $nouser 			=	"NOUSER";
	public $deletion		= 	"DELETION";

	function __construct()
	{
		parent::__construct();
	}

	public function get_all_contact_for_specific_admin($nouser)
	{
		$row = $this->db->where($this->deletion, "0")
						->where($this->nouser, $nouser)
						->order_by($this->dbno, "DESC")
						->get($this->table);

		return $row->result();
	}

	public function insert($params)
	{
		$this->db->insert($this->table, $params);
	}

	public function update($params, $no)
	{
		$this->db->where($this->dbno, $no)
				 ->update($this->table, $params);
	}
}