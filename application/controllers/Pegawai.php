<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != TRUE)
		{
			set_pesan('Silahkan login terlebih dahulu', false);
			redirect('');
		}
		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
        $data['title']		= 'Kelola Pegawai';
		$data['pegawai']	= $this->M_pegawai->get_data()->result_array();
		$this->load->view('pegawai/data', $data);
	}

	public function detail($id_pegawai = null)
	{
		$data['title']		= 'Detail Pegawai';
		if(empty($id_pegawai)){
			$id_pegawai = $this->session->userdata('pegawai_id');
			$data['title']	= 'Profil Pegawai';
		} 
        
		$data['pegawai']	= $this->M_pegawai->get_by_id($id_pegawai)->row_array();
		$this->load->view('pegawai/detail', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Tambah Pegawai';
			$data['pegawai']	= $this->M_pegawai->get_data()->result_array();
			$data['golruang']	= $this->M_golruang->get_data()->result_array();
			$data['jabatan']	= $this->M_jabatan->get_data()->result_array();
			$data['bidang']		= $this->M_bidang->get_data()->result_array();
			$this->load->view('pegawai/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_pegawai	= [
				'pegawai_nip'				=> $data['pegawai_nip'],
				'pegawai_nama_lengkap'		=> $data['pegawai_nama_lengkap'],
				'pegawai_tempat_lahir'		=> $data['pegawai_tempat_lahir'],
				'pegawai_tanggal_lahir'		=> $data['pegawai_tanggal_lahir'],
				'golruang_id'				=> $data['golruang_id'],
				'pegawai_masa_kerja'		=> $data['pegawai_masa_kerja'],
				'bidang_id'					=> $data['bidang_id'],
				'jabatan_id'				=> $data['jabatan_id'],
				'pegawai_jabatan_detail'	=> $data['pegawai_jabatan_detail'],
				'pegawai_no_telepon'		=> $data['pegawai_no_telepon'],
				'pegawai_alamat'			=> $data['pegawai_alamat'],
				'pegawai_created'			=> date('Y-m-d H:i:s'),
			];
			if ($this->M_pegawai->insert($data_pegawai)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-pegawai');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('pegawai');
			}
		}
	}

	public function edit($id_pegawai)
	{
		$this->validation($id_pegawai);
		if (!$this->form_validation->run()) {
			$data['title']		= 'Edit Pegawai';
			$data['pegawai']	= $this->M_pegawai->get_by_id($id_pegawai)->row_array();
			$data['golruang']	= $this->M_golruang->get_data()->result_array();
			$data['jabatan']	= $this->M_jabatan->get_data()->result_array();
			$data['bidang']		= $this->M_bidang->get_data()->result_array();
			$this->load->view('pegawai/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_pegawai	= [
				'pegawai_id'				=> $id_pegawai,
				'pegawai_nip'				=> $data['pegawai_nip'],
				'pegawai_nama_lengkap'		=> $data['pegawai_nama_lengkap'],
				'pegawai_tempat_lahir'		=> $data['pegawai_tempat_lahir'],
				'pegawai_tanggal_lahir'		=> $data['pegawai_tanggal_lahir'],
				'golruang_id'				=> $data['golruang_id'],
				'pegawai_masa_kerja'		=> $data['pegawai_masa_kerja'],
				'bidang_id'					=> $data['bidang_id'],
				'jabatan_id'				=> $data['jabatan_id'],
				'pegawai_jabatan_detail'	=> $data['pegawai_jabatan_detail'],
				'pegawai_no_telepon'		=> $data['pegawai_no_telepon'],
				'pegawai_alamat'			=> $data['pegawai_alamat'],
			];
			
			
			if ($this->M_pegawai->update($data_pegawai)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-pegawai/'.$id_pegawai);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('pegawai');
			}
		}
	}

	private function validation($id_pegawai = null)
	{
		if(empty($id_pegawai)){
			$this->form_validation->set_rules('pegawai_nip', 'NIP', 'required|is_unique[pegawai.pegawai_nip]', ['is_unique'	=> 'NIP Sudah Ada']);		
			$this->form_validation->set_rules('pegawai_nama_lengkap', 'Nama Lengkap', 'required');		
			$this->form_validation->set_rules('pegawai_tempat_lahir', 'Tempat Lahir', 'required');			
			$this->form_validation->set_rules('pegawai_tanggal_lahir', 'Tanggal Lahir', 'required');
			$this->form_validation->set_rules('golruang_id', 'Golongan', 'required');
			$this->form_validation->set_rules('pegawai_masa_kerja', 'Masa Kerja', 'required');
			$this->form_validation->set_rules('bidang_id', 'Bidang', 'required');			
			$this->form_validation->set_rules('jabatan_id', 'Jabatan', 'required');
			$this->form_validation->set_rules('pegawai_jabatan_detail', 'Detail Jabatan', 'required');	
			$this->form_validation->set_rules('pegawai_no_telepon', 'No. Telepon', 'required');
			$this->form_validation->set_rules('pegawai_alamat', 'Alamat', 'required');
		}else{
			$pegawai = $this->M_pegawai->get_by_id($id_pegawai)->row_array();
			$nip_baru = $this->input->post('pegawai_nip');
			$nip = $pegawai['pegawai_nip'];

			if($nip == $nip_baru){
				$this->form_validation->set_rules('pegawai_nip', 'NIP', 'required');	
			} else {
				$this->form_validation->set_rules('pegawai_nip', 'NIP', 'required|is_unique[pegawai.pegawai_nip]', ['is_unique'	=> 'NIP Sudah Ada']);	
			}
				
			$this->form_validation->set_rules('pegawai_nama_lengkap', 'Nama Lengkap', 'required');		
			$this->form_validation->set_rules('pegawai_tempat_lahir', 'Tempat Lahir', 'required');			
			$this->form_validation->set_rules('pegawai_tanggal_lahir', 'Tanggal Lahir', 'required');
			$this->form_validation->set_rules('golruang_id', 'Golongan', 'required');
			$this->form_validation->set_rules('pegawai_masa_kerja', 'Masa Kerja', 'required');
			$this->form_validation->set_rules('bidang_id', 'Bidang', 'required');			
			$this->form_validation->set_rules('jabatan_id', 'Jabatan', 'required');
			$this->form_validation->set_rules('pegawai_jabatan_detail', 'Detail Jabatan', 'required');	
			$this->form_validation->set_rules('pegawai_no_telepon', 'No. Telepon', 'required');
			$this->form_validation->set_rules('pegawai_alamat', 'Alamat', 'required');
		}
		
		
	}

	public function hapus($id_pegawai)
	{
		$this->M_pegawai->delete($id_pegawai);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('pegawai');
	}
}
