<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Todo_list_model extends CI_Model
{

	public $table			=	"todo_list";
	public $dbno			=	"NO";
	public $nouser 			=	"NOUSER";
	public $liststatus		=	"LISTSTATUS";
	public $deletion		= 	"DELETION";

	function __construct()
	{
		parent::__construct();
	}

	public function get_all_todo_for_specific_admin($nouser)
	{
		$row = $this->db->where($this->deletion, "0")
						->where($this->nouser, $nouser)
						->limit(7)
						->order_by($this->dbno, "DESC")
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
				 ->update($this->table,$params);
	}

	public function deleteAllCheckedTask($params, $nouser)
	{
		$this->db->where($this->nouser, $nouser)
				 ->where($this->liststatus, '1')
				 ->update($this->table,$params);
	}

	public function get_numrows_todo_for_specific_admin($nouser)
	{
		$row = $this->db->where($this->deletion, "0")
						->where($this->nouser, $nouser)
						->order_by($this->dbno, "DESC")
						->get($this->table);

		return $row->num_rows();
	}
}