<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Testimonial_model extends CI_Model
{

	public $table			=	"testimonial";
	public $dbno			=	"NO";
	public $deletion		= 	"DELETION";

	function __construct()
	{
		parent::__construct();
	}

	public function get_all_testimonial()
	{
		$row = $this->db->where($this->deletion, "0")
						->order_by($this->dbno, "DESC")
						->get($this->table);

		return $row->result();
	}

}