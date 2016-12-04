<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Team_model extends CI_Model
{

	public $table		=	"team";

	function __construct()
	{
		parent::__construct();
	}

	function get_team()
	{
		$row = $this->db->get($this->table);
		return $row->result();
	}
}	