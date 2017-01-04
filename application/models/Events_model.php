<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Events_model extends CI_Model
{

	public $table			=	"events";
	public $dbno			=	"NO";
	public $deletion		= 	"DELETION";
	public $randcode 		=	"RANDOMCODE";

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

	public function get_latest_events_limit()
	{
		$row = $this->db->where($this->deletion, "0")
						->order_by($this->dbno, "DESC")
						->limit(1)
						->get($this->table);

		return $row->result();
	}

	public function get_specific_events($randomcode)
	{
		$row = $this->db->where($this->deletion, "0")
						->where($this->randcode, $randomcode)
						->limit(1)
						->get($this->table);

		return $row->result();
	}

}