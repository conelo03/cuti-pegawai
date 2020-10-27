<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {

	public $table	= 'pegawai';

	public function get_data()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('jabatan', $this->table.'.jabatan_id=jabatan.jabatan_id');
		$this->db->join('bidang', $this->table.'.bidang_id=bidang.bidang_id');
		$this->db->join('golruang', $this->table.'.golruang_id=golruang.golruang_id');
        return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_pegawai)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('pengguna', $this->table.'.pegawai_id=pengguna.pegawai_id', 'left');
		$this->db->join('jabatan', $this->table.'.jabatan_id=jabatan.jabatan_id');
		$this->db->join('bidang', $this->table.'.bidang_id=bidang.bidang_id');
		$this->db->join('golruang', $this->table.'.golruang_id=golruang.golruang_id');
		$this->db->where($this->table.'.pegawai_id' , $id_pegawai);
        return $this->db->get();
	}

	public function get_by_role($level)
	{
		return $this->db->get_where($this->table, ['user_level' => $level])->result_array();
	}

	public function update($data)
	{
		$this->db->where('pegawai_id', $data['pegawai_id']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_pegawai)
	{
		$this->db->delete($this->table, ['pegawai_id' => $id_pegawai]);
	}
}
