<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Event_reply_model extends CI_Model
{

	public $table			=	"event_reply";
	public $dbno			=	"NO";
	public $deletion		= 	"DELETION";

	function __construct()
	{
		parent::__construct();
	}

	public function get_all_reply()
	{
		$row = $this->db->where($this->deletion, "0")
						->order_by($this->dbno, "ASC")
						->get($this->table);

		return $row->result();
	}

	public function insertReply($params)
	{
		$this->db->insert($this->table, $params);
	}

}