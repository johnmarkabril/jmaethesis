<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Location_model extends CI_Model
{

	public $table			=	"location";
	public $nouser			=	"NOUSER";
	public $deletion		=	"DELETION";

	function __construct()
	{
		parent::__construct();
	}

	public function all_user_latlong()
	{
		$row = $this->db->join('user','location.NOUSER = user.NO')
						->order_by('location.NO', "DESC")
						->get($this->table);

		return $row->result();
	}

	public function update($params, $no)
	{
		$this->db->where($this->nouser, $no)
				 ->update($this->table, $params);
	}

	public function insert($params)
	{
		$this->db->insert($this->table, $params);
	}
}