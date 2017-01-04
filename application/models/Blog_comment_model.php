<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blog_comment_model extends CI_Model
{

	public $table			=	"blog_comment";
	public $dbno			=	"NO";
	public $deletion		= 	"DELETION";
	public $blog_hash 		=	"BLOGHASH";

	function __construct()
	{
		parent::__construct();
	}

	public function get_comment_per_blog($bloghash)
	{
		$row = $this->db->where($this->deletion, "0")
						->where($this->blog_hash, $bloghash)
						->get($this->table);

		return $row->result();
	}
}