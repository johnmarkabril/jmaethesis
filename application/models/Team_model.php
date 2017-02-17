<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Team_model extends CI_Model
{

	public $table			=	"team";
	public $lastname		=	"LASTNAME";
	public $deletion		= 	"DELETION";
	public $dbno 			= 	"NO";

	function __construct()
	{
		parent::__construct();
	}

	public function get_all_team()
	{
		$row = $this->db->where($this->deletion, "0")
						->order_by($this->lastname, "ASC")
						->get($this->table);

		return $row->result();
	}

	public function update($params, $no)
	{
		$this->db->where($this->dbno, $no)
				 ->update($this->table, $params);
	}

	public function create($params)
	{
		$this->db->create($this->table, $params);
	}

}