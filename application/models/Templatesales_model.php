<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Templatesales_model extends CI_Model
{

	public $table			=	"templatesales";
	public $dbno			=	"NO";
	public $deletion		= 	"DELETION";
	public $date 			=	"DATE";
	public $agentsee 		= 	"AGENTSEE";

	function __construct()
	{
		parent::__construct();
	}

	public function get_monthly_sales_thisyear($month, $year)
	{
		$row = $this->db->where($this->deletion, "0")
						->like($this->date, $month)
						->like($this->date, $year)
						->get($this->table);

		return $row->result();
	}

	public function get_all_sales()
	{
		$row = $this->db->where($this->deletion, "0")
						->get($this->table);

		return $row->result();
	}

	public function get_all_agentsee()
	{
		$row = $this->db->where($this->deletion, "0")
						->where($this->agentsee, "0")
						->order_by($this->dbno, 'DESC')
						->limit(15)
						->get($this->table);

		return $row->result();
	}

	public function get_all_sales_row()
	{
		$row = $this->db->where($this->deletion, "0")
						->get($this->table);

		return $row->num_rows();
	}

	public function get_last_year_sales($year)
	{
		$row = $this->db->where($this->deletion, "0")
						->like($this->date, $year)
						->get($this->table);

		return $row->result();
	}

	public function get_last_year_sales_row($year)
	{
		$row = $this->db->where($this->deletion, "0")
						->like($this->date, $year)
						->get($this->table);

		return $row->num_rows();
	}

	public function create($params)
	{
		$this->db->insert($this->table, $params);
	}
}