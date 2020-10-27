<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_izin extends CI_Model {

	public $table	= 'izin';

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

	public function insert_riwayat($data)
	{
		$this->db->insert('cuti_riwayat', $data);
	}

	public function get_by_id($id_izin)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('pegawai', 'pegawai.pegawai_id='.$this->table.'.pegawai_id');
		$this->db->where($this->table.'.izin_id', $id_izin);
        return $this->db->get();
	}

	public function get_riwayat_by_pegawai($id_pegawai)
	{
		$this->db->select('*');
		$this->db->from('cuti_riwayat');
		$this->db->join('pegawai', 'pegawai.pegawai_id=cuti_riwayat.pegawai_id');
		$this->db->where('cuti_riwayat.pegawai_id', $id_pegawai);
		$this->db->order_by('cuti_riwayat.riwayat_cuti_tahun', 'ASC');
        return $this->db->get();
	}

	public function get_riwayat_by_id($id_riwayat_cuti)
	{
		$this->db->select('*');
		$this->db->from('cuti_riwayat');
		$this->db->join('pegawai', 'pegawai.pegawai_id=cuti_riwayat.pegawai_id');
		$this->db->where('cuti_riwayat.riwayat_cuti_id', $id_riwayat_cuti);
        return $this->db->get();
	}

	public function get_by_id_cetak($id_izin)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('pegawai', 'pegawai.pegawai_id='.$this->table.'.pegawai_id');
		$this->db->join('jabatan', 'pegawai.jabatan_id=jabatan.jabatan_id');
		$this->db->join('bidang', 'pegawai.bidang_id=bidang.bidang_id');
		$this->db->join('golruang', 'pegawai.golruang_id=golruang.golruang_id');
		$this->db->where($this->table.'.izin_id', $id_izin);
        return $this->db->get();
	}

	public function get_by_staf($id_pegawai)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('pegawai', 'pegawai.pegawai_id='.$this->table.'.pegawai_id');
		$this->db->where($this->table.'.pegawai_id', $id_pegawai);
        return $this->db->get();
	}

	public function get_by_staf_terbaru($id_pegawai)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('pegawai', 'pegawai.pegawai_id='.$this->table.'.pegawai_id');
		$this->db->where($this->table.'.pegawai_id', $id_pegawai);
		$this->db->order_by('izin.izin_tanggal', 'DESC');
        return $this->db->get();
	}

	public function get_by_atasan_langsung($id_pegawai)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('pegawai', 'pegawai.pegawai_id='.$this->table.'.pegawai_id');
		$this->db->where($this->table.'.izin_atasanlangsung_id', $id_pegawai);
        return $this->db->get();
	}

	public function get_by_ketua($id_pegawai)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('pegawai', 'pegawai.pegawai_id='.$this->table.'.pegawai_id');
        return $this->db->get();
	}

	public function get_by_role($level)
	{
		return $this->db->get_where($this->table, ['user_level' => $level])->result_array();
	}

	public function update($data)
	{
		$this->db->where('izin_id', $data['izin_id']);
		$this->db->update($this->table, $data);
	}

	public function update_riwayat($data)
	{
		$this->db->where('riwayat_cuti_id', $data['riwayat_cuti_id']);
		$this->db->update('cuti_riwayat', $data);
	}

	public function delete($id_izin)
	{
		$this->db->delete($this->table, ['izin_id' => $id_izin]);
	}

	public function delete_riwayat($id_riwayat_cuti)
	{
		$this->db->delete('cuti_riwayat', ['riwayat_cuti_id' => $id_riwayat_cuti]);
	}
}
