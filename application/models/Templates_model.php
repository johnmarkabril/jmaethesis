<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Templates_model extends CI_Model
{

	public $table			=	"templates";
	public $dbno			=	"NO";
	public $deletion		= 	"DELETION";
	public $availability	=	"AVAILABILITY";

	function __construct()
	{
		parent::__construct();
	}

	public function get_all_available_templates()
	{
		$row = $this->db->where($this->deletion, "0")
						->where($this->availability, "1")
						->order_by($this->dbno, "ASC")
						->get($this->table);

		return $row->result();
	}

	public function get_all_rented_templates()
	{
		$row = $this->db->where($this->deletion, "0")
						->where($this->availability, "0")
						->order_by($this->dbno, "ASC")
						->get($this->table);

		return $row->result();
	}

}