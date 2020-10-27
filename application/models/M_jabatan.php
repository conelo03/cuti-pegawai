<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jabatan extends CI_Model {

	public $table	= 'jabatan';

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

	public function get_by_id($id_jabatan)
	{
		return $this->db->get_where($this->table, ['jabatan_id' => $id_jabatan])->row_array();
	}

	public function get_by_role($level)
	{
		return $this->db->get_where($this->table, ['user_level' => $level])->result_array();
	}

	public function update($data)
	{
		$this->db->where('jabatan_id', $data['jabatan_id']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_jabatan)
	{
		$this->db->delete($this->table, ['jabatan_id' => $id_jabatan]);
	}
}
