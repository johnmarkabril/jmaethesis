<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blog_model extends CI_Model
{

	public $table			=	"blog";
	public $dbno			=	"NO";
	public $deletion		= 	"DELETION";
	public $randcode 		=	"RANDOMCODE";

	function __construct()
	{
		parent::__construct();
	}

	public function get_all_blog_limit()
	{
		$row = $this->db->where($this->deletion, "0")
						->order_by($this->dbno, "ASC")
						->limit(3)
						->get($this->table);

		return $row->result();
	}

	public function get_specific_blog($randomcode)
	{
		$row = $this->db->where($this->deletion, "0")
						->where($this->randcode, $randomcode)
						->limit(1)
						->get($this->table);

		return $row->result();
	}
}