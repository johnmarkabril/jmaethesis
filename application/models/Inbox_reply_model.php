<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inbox_reply_model extends CI_Model
{

	public $table			=	"inbox_reply";
	public $dbno			=	"NO";
	public $noinbox 		=	"NOINBOX";
	public $deletion		=	"DELETION";

	function __construct()
	{
		parent::__construct();
	}

	public function get_all_reply_spec_content($inboxNo)
	{
		$row = $this->db->where('inbox_reply.NOINBOX', $inboxNo)
						->where('inbox_reply.DELETION', '0')
						->join('user','inbox_reply.NOUSER = user.NO')
						->order_by('inbox_reply.NO', 'ASC')
						->get($this->table);

				return $row->result();
	}

	public function insert($params)
	{
		$this->db->insert($this->table, $params);
	}

}