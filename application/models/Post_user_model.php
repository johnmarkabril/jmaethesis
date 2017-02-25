<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Post_user_model extends CI_Model
{

	public $table			=	"post_user";
	public $tableReply 		=	"post_user_reply";
	public $dbno			=	"NO";
	public $name 			= 	"NAME";
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

	public function update_using_name_post($params, $name)
	{
		$this->db->where($this->name, $name)
				 ->update($this->table, $params);
	}

	public function update_using_name_post_reply($params, $name)
	{
		$this->db->where($this->name, $name)
				 ->update($this->tableReply, $params);
	}

}