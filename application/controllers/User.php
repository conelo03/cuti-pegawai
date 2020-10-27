<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
        $data['title']		= 'Kelola Pengguna';
		$data['user']		= $this->M_user->get_data()->result_array();
		$this->load->view('user/data', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Tambah Pengguna';
			$data['pegawai']	= $this->M_pegawai->get_data()->result_array();
			$this->load->view('user/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'pegawai_id'	=> $data['pegawai_id'],
				'user_username'		=> $data['username'],
				'user_password'		=> password_hash($data['password'], PASSWORD_DEFAULT),
				'user_level'			=> $data['level'],
				'user_created'			=> date('Y-m-d H:i:s'),
			];
			if ($this->M_user->insert($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-user');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('user');
			}
		}
	}

	public function edit($id_user)
	{
		$this->validation($id_user);
		if (!$this->form_validation->run()) {
			$data['title']		= 'Edit User';
			$data['user']	= $this->M_user->get_by_id($id_user);
			$data['pegawai']	= $this->M_pegawai->get_data()->result_array();
			$this->load->view('user/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			if(!empty($data['password'])){
				$data_user	= [
					'user_id'		=> $id_user,
					'pegawai_id'	=> $data['pegawai_id'],
					'user_username'	=> $data['username'],
					'user_password'	=> password_hash($data['password'], PASSWORD_DEFAULT),
					'user_level'	=> $data['level'],
				];
			} else {
				$data_user	= [
					'user_id'		=> $id_user,
					'pegawai_id'	=> $data['pegawai_id'],
					'user_username'	=> $data['username'],
					'user_level'	=> $data['level'],
				];
			}
			
			if ($this->M_user->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-user/'.$id_user);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('user');
			}
		}
	}

	private function validation($id_user = null)
	{
		if(is_null($id_user)){
			$this->form_validation->set_rules('pegawai_id', 'ID Pegawai', 'required|trim|is_unique[pengguna.pegawai_id]', ['is_unique'	=> 'Pegawai Sudah Terdaftar']);
			$this->form_validation->set_rules('username', 'Username', 'required|trim|alpha_numeric|is_unique[pengguna.user_username]', ['is_unique'	=> 'Username Sudah Terdaftar']);
			$this->form_validation->set_rules('password', 'Password', 'required|trim');
			$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]|required');
			$this->form_validation->set_rules('level', 'Level', 'required');
		} else {
			$username_baru 	= $this->input->post('username');
			$pegawai_baru 	= $this->input->post('pegawai_id');
			$data			= $this->db->get_where('pengguna', ['user_id' => $id_user])->row_array();
			$username 		= $data['user_username'];
			$pegawai_id		= $data['pegawai_id'];
		
			if($pegawai_baru == $pegawai_id){
				$this->form_validation->set_rules('pegawai_id', 'ID Pegawai', 'required|trim');
			} else {
				$this->form_validation->set_rules('pegawai_id', 'ID Pegawai', 'required|trim|is_unique[pengguna.pegawai_id]', array('is_unique' => 'ID Pegawai sudah terdaftar' ));
			}

			if($username == $username_baru){
				$this->form_validation->set_rules('username', 'Username', 'required|trim');
			} else {
				$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[pengguna.user_username]', array('is_unique' => 'Username sudah terdaftar' ));
			}
			$this->form_validation->set_rules('password', 'Password', 'trim');
			$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');

			$this->form_validation->set_rules('level', 'Level', 'required');
		}
		
	}

	public function hapus($id_user)
	{
		$this->M_user->delete($id_user);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('user');
	}
}
