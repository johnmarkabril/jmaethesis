<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class About_my_site_model extends CI_Model
{

	public $table			=	"about_my_site";
	public $dbno			=	"NO";
	public $deletion		=	"DELETION";
	public $active 			=	"ACTIVE";

	function __construct()
	{
		parent::__construct();
	}

	public function get_all_aboutmysite()
	{
		$row = $this->db->where($this->deletion, "0")
						->order_by($this->dbno, "DESC")
						->get($this->table);

		return $row->result();
	}

	public function get_latest()
	{
		$row = $this->db->where($this->deletion, "0")
						->order_by($this->dbno, "DESC")
						->limit(1)
						->get($this->table);

		return $row->result();
	}

	public function get_active()
	{
		$row = $this->db->where($this->deletion, "0")
						->where($this->active, 1)
						->get($this->table);

			return $row->result();
	}

	public function get_specific($no)
	{
		$row = $this->db->where($this->deletion, "0")
						->where($this->dbno, $no)
						->limit(1)
						->get($this->table);

		return $row->result();
	}

	public function insert($params)
	{
		$this->db->insert($this->table, $params);
	}

	public function updateAll($params)
	{
		$this->db->where($this->active, 1)
				 ->update($this->table, $params);
	}

	public function update($params, $no)
	{
		$this->db->where($this->dbno, $no)
				 ->update($this->table, $params);
	}

	public function delete($params, $no)
	{
		$this->db->where($this->dbno, $no)
				 ->update($this->table, $params);
	}
}