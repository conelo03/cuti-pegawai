<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Golruang extends CI_Controller {

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
        $data['title']		= 'Kelola Golongan';
		$data['golruang']	= $this->M_golruang->get_data()->result_array();
		$this->load->view('golruang/data', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Tambah Golongan';
			$this->load->view('golruang/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'golruang_golongan'		=> $data['golruang_golongan'],
				'golruang_ruang'		=> $data['golruang_ruang'],
				'golruang_pangkat'		=> $data['golruang_pangkat'],
				'golruang_created'		=> date('Y-m-d H:i:s'),
			];
			if ($this->M_golruang->insert($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-golruang');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('golruang');
			}
		}
	}

	public function edit($id_golruang)
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Edit Golongan';
			$data['golruang']	= $this->M_golruang->get_by_id($id_golruang);
			$this->load->view('golruang/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'golruang_id'	=> $id_golruang,
				'golruang_golongan'		=> $data['golruang_golongan'],
				'golruang_ruang'		=> $data['golruang_ruang'],
				'golruang_pangkat'		=> $data['golruang_pangkat'],
			];
			
			if ($this->M_golruang->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-golruang/'.$id_golruang);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('golruang');
			}
		}
	}

	private function validation()
	{
		$this->form_validation->set_rules('golruang_golongan', 'Golongan', 'required');
		$this->form_validation->set_rules('golruang_ruang', 'Ruangan', 'required');
		$this->form_validation->set_rules('golruang_pangkat', 'Pangkat', 'required');
	}

	public function hapus($id_golruang)
	{
		$this->M_golruang->delete($id_golruang);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('golruang');
	}
}
