<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paypal_configuration_model extends CI_Model
{

	public $table			=	"paypal_configuration";
	public $dbno			=	"NO";
	public $deletion		= 	"DELETION";
	public $status 			= 	"STATUS";

	function __construct()
	{
		parent::__construct();
	}

	public function get_all_paypal()
	{
		$row = $this->db->where('paypal_configuration.DELETION', "0")
						->order_by('paypal_configuration.NO', 'DESC')
						->get($this->table);

		return $row->result();
	}

	public function get_latest()
	{
		$row = $this->db->where('paypal_configuration.DELETION', "0")
						->order_by('paypal_configuration.NO', 'DESC')
						->limit(1)
						->get($this->table);

		return $row->result();
	}

	public function get_specific($no)
	{
		$row = $this->db->where('paypal_configuration.DELETION', "0")
						->where('paypal_configuration.NO', $no)
						->limit(1)
						->get($this->table);

		return $row->result();
	}

	public function insert()
	{
		$this->db->insert($this->table, $params);
	}

	public function update($params, $no)
	{
		$this->db->where($this->dbno, $no)
				 ->update($this->table, $params);
	}

	public function disableAll($params)
	{
		$this->db->where($this->status, 'enabled')
				 ->update($this->table, $params);
	}

	public function create($params)
	{
		$this->db->insert($this->table, $params);
	}

	public function get_enable()
	{
		$row = $this->db->where($this->status, 'enabled')
						->limit(1)
						->get($this->table);

				return $row->result();
	}
}