<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang extends CI_Controller {

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
        $data['title']		= 'Kelola Bidang';
		$data['bidang']	= $this->M_bidang->get_data()->result_array();
		$this->load->view('bidang/data', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Tambah Bidang';
			$this->load->view('bidang/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'bidang_nama'		=> $data['bidang_nama'],
				'bidang_created'	=> date('Y-m-d H:i:s'),
			];
			if ($this->M_bidang->insert($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-bidang');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('bidang');
			}
		}
	}

	public function edit($id_bidang)
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Edit Bidang';
			$data['bidang']	= $this->M_bidang->get_by_id($id_bidang);
			$this->load->view('bidang/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'bidang_nama'	=> $data['bidang_nama'],
				'bidang_id'	=> $id_bidang,
			];
			
			if ($this->M_bidang->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-bidang/'.$id_bidang);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('bidang');
			}
		}
	}

	private function validation()
	{
		$this->form_validation->set_rules('bidang_nama', 'Bidang', 'required');
	}

	public function hapus($id_bidang)
	{
		$this->M_bidang->delete($id_bidang);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('bidang');
	}
}
