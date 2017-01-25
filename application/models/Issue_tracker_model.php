<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Issue_tracker_model extends CI_Model
{

	public $table			=	"issue_tracker";
	public $dbno			=	"user.NO";
	public $nouser 			=	"NOUSER";
	public $deletion		= 	"DELETION";

	function __construct()
	{
		parent::__construct();
	}

	public function get_all_issue_tracker()
	{
		$row = $this->db->where('user.DELETION', "0")
						->join('user','issue_tracker.NO = user.NO')
						->order_by($this->dbno, "DESC")
						->get($this->table);

		return $row->result();
	}

	public function get_reply($no)
	{
		$row = $this->db->join('issue_tracker_reply','issue_tracker.NO = issue_tracker_reply.ISSUETRACKERNO')
						->join('user','issue_tracker_reply.NOREPLYFROM = user.NO')
						->order_by('issue_tracker.NO', "ASC")
						->where('issue_tracker_reply.DELETION', '0')
						->where('issue_tracker_reply.ISSUETRACKERNO', $no)
						->get($this->table);

		return $row->result();
	}

}