<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inbox_model extends CI_Model
{

	public $table			=	"inbox";
	public $dbno			=	"NO";
	public $userto 			=	"USERTO";
	public $userfrom 		=	"USERFROM";
	public $deletion		=	"DELETION";

	function __construct()
	{
		parent::__construct();
	}

	public function get_all_inbox_spec_user($userto)
	{
		$row = $this->db->where($this->userto, $userto)
						->or_where($this->userfrom, $userto)
						->where($this->deletion, '0')
						->order_by($this->dbno, 'DESC')
						->get($this->table);

				return $row->result();
	}

	public function get_specific_content($noInbox)
	{
		$row = $this->db->where($this->dbno, $noInbox)
						->where($this->deletion, '0')
						->limit(1)
						->get($this->table);

				return $row->result();
	}

	public function new_message($params)
	{
		$this->db->insert($this->table, $params);
	}
}