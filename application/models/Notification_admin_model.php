<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notification_admin_model extends CI_Model
{

	public $table			=	"notification_admin";
	public $dbno			=	"NO";
	public $deletion		= 	"DELETION";

	function __construct()
	{
		parent::__construct();
	}

	public function get_all_notification()
	{
		$row = $this->db->join('user', 'notification_admin.NOUSER = user.NO')
						->where('notification_admin.DELETION', "0")
						->order_by('notification_admin.NO', "DESC")
						->get($this->table);

		return $row->result();
	}


	public function create($params)
	{
		$this->db->insert($this->table, $params);
	}
}