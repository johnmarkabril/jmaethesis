<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Post_admin_model extends CI_Model
{

	public $table			=	"post_admin";
	public $tableReply 		=	"post_admin_reply";
	public $dbno			=	"NO";
	public $deletion		= 	"DELETION";

	function __construct()
	{
		parent::__construct();
	}

	public function get_all_post()
	{
		$row = $this->db->where($this->deletion, "0")
						->order_by($this->dbno, "DESC")
						->get($this->table);

		return $row->result();
	}

	public function get_all_reply()
	{
		$row = $this->db->where($this->deletion, "0")
						->order_by($this->dbno, "DESC")
						->get($this->tableReply);

		return $row->result();
	}

	public function create($params)
	{
		$this->db->insert($this->table, $params);
	}

	public function insertReply($params)
	{
		$this->db->insert($this->tableReply, $params);
	}

	public function get_rows()
	{
		$row = $this->db->order_by($this->dbno, 'DESC')
						->get($this->table);

		return $row->num_rows();
	}
}