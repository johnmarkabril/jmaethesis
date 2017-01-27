<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Issue_tracker_reply_model extends CI_Model
{
	public $table			=	"issue_tracker_reply";
	public $dbno			=	"NO";

	function __construct()
	{
		parent::__construct();
	}

	public function insert_reply($params)
	{
		$this->db->insert($this->table, $params);
	}


}