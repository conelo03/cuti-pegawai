<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public $table	= 'pengguna';

	public function get_data()
	{
		$this->db->select('*, pengguna.user_id as user_id');
		$this->db->from($this->table);
		$this->db->join('pegawai', $this->table.'.pegawai_id=pegawai.pegawai_id');
		$this->db->join('jabatan', 'jabatan.jabatan_id=pegawai.jabatan_id');
        return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_user)
	{
		return $this->db->get_where($this->table, ['user_id' => $id_user])->row_array();
	}

	public function get_by_role($level)
	{
		return $this->db->get_where($this->table, ['user_level' => $level])->result_array();
	}

	public function update($data)
	{
		$this->db->where('user_id', $data['user_id']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_user)
	{
		$this->db->delete($this->table, ['user_id' => $id_user]);
	}
}
