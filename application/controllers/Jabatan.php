<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

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
        $data['title']		= 'Kelola Jabatan';
		$data['jabatan']	= $this->M_jabatan->get_data()->result_array();
		$this->load->view('jabatan/data', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Tambah Jabatan';
			$this->load->view('jabatan/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'jabatan_nama'		=> $data['jabatan_nama'],
				'jabatan_atasanlangsung'		=> $data['jabatan_atasanlangsung'],
				'jabatan_created'	=> date('Y-m-d H:i:s'),
			];
			if ($this->M_jabatan->insert($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-jabatan');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('jabatan');
			}
		}
	}

	public function edit($id_jabatan)
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Edit Jabatan';
			$data['jabatan']	= $this->M_jabatan->get_by_id($id_jabatan);
			$this->load->view('jabatan/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'jabatan_nama'	=> $data['jabatan_nama'],
				'jabatan_atasanlangsung'		=> $data['jabatan_atasanlangsung'],
				'jabatan_id'	=> $id_jabatan,
			];
			
			if ($this->M_jabatan->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-jabatan/'.$id_jabatan);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('jabatan');
			}
		}
	}

	private function validation()
	{
		$this->form_validation->set_rules('jabatan_nama', 'Jabatan', 'required');
		$this->form_validation->set_rules('jabatan_atasanlangsung', 'Atasan Langsung', 'required');
	}

	public function hapus($id_jabatan)
	{
		$this->M_jabatan->delete($id_jabatan);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('jabatan');
	}
}
