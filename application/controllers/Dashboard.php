<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != TRUE)
		{
			set_pesan('Silahkan login terlebih dahulu', false);
			redirect('');
		}
	}

	public function index()
	{
		$id_pegawai 	= $this->session->userdata('pegawai_id');
		$id_jabatan 	= $this->session->userdata('jabatan_id');
		$data['title']	= 'Dashboard';
		$data['cuti']		= $this->M_cuti->get_by_staf_terbaru($id_pegawai)->row_array();
		$data['izin']		= $this->M_izin->get_by_staf_terbaru($id_pegawai)->row_array();
		$data['pegawai']	= $this->M_pegawai->get_by_id($id_pegawai)->row_array();
		if(!is_staf()){
			if($id_jabatan == '1'){
				$data['notifikasi_cuti']	= $this->M_cuti->get_by_pejabat($id_pegawai)->num_rows();
				$data['notifikasi_izin']	= $this->M_izin->get_by_atasan_langsung($id_pegawai)->num_rows();
			} elseif($id_jabatan == '2'){
				$data['notifikasi_cuti']	= $this->M_cuti->get_by_pejabat($id_pegawai)->num_rows();
				$data['notifikasi_izin']	= $this->M_izin->get_by_atasan_langsung($id_pegawai)->num_rows();
			} else {
				$data['notifikasi_cuti']	= $this->M_cuti->get_by_atasan_langsung($id_pegawai)->num_rows();
				$data['notifikasi_izin']	= $this->M_izin->get_by_atasan_langsung($id_pegawai)->num_rows();
			}
		} elseif(is_admin()){
			$data['notifikasi_cuti']	= $this->db->get_where('cuti', ['cuti_status', 0])->num_rows();
			$data['notifikasi_izin']	= $this->M_izin->get_by_atasan_langsung($id_pegawai)->num_rows();
		}
		$this->load->view('dashboard', $data);
	}
}
