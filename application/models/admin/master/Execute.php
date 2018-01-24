<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Execute extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();

	}

	public function checkBbtA($key, $field, $table)
	{
		$this->db->where($field, $key);
		return $this->db->get($table);
	}

	public function inBbtA($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function editBbtA($key, $field, $table, $data)
	{
		$this->db->where($field, $key);
		return $this->db->update($table, $data);
	}

}

/* End of file Execute.php */
/* Location: ./application/models/Execute.php */