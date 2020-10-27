<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_golruang extends CI_Model {

	public $table	= 'golruang';

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

	public function get_by_id($id_golruang)
	{
		return $this->db->get_where($this->table, ['golruang_id' => $id_golruang])->row_array();
	}

	public function get_by_role($level)
	{
		return $this->db->get_where($this->table, ['user_level' => $level])->result_array();
	}

	public function update($data)
	{
		$this->db->where('golruang_id', $data['golruang_id']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_golruang)
	{
		$this->db->delete($this->table, ['golruang_id' => $id_golruang]);
	}
}
