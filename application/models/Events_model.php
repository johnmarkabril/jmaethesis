<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Events_model extends CI_Model
{

	public $table			=	"events";
	public $dbno			=	"NO";
	public $deletion		= 	"DELETION";

	function __construct()
	{
		parent::__construct();
	}

	public function get_all_events()
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