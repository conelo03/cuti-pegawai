<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bidang extends CI_Model {

	public $table	= 'bidang';

	public function get_data()
	{
		$this->db->select('*');
		$this->db->from($this->table);
        return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_bidang)
	{
		return $this->db->get_where($this->table, ['bidang_id' => $id_bidang])->row_array();
	}

	public function get_by_role($level)
	{
		return $this->db->get_where($this->table, ['user_level' => $level])->result_array();
	}

	public function update($data)
	{
		$this->db->where('bidang_id', $data['bidang_id']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_bidang)
	{
		$this->db->delete($this->table, ['bidang_id' => $id_bidang]);
	}
}
