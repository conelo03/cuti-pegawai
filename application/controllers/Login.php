<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login', 'login');
	}

	public function index()
	{
		$data['title']	= 'Login';
		$this->load->view('login', $data);
	}

	public function proses()
	{
		$username = htmlspecialchars($this->input->post('username', true));
		$password = htmlspecialchars($this->input->post('password', true));
		
		$user = $this->login->get_user($username);
		if($user->num_rows() > 0)
		{
			$get_user = $user->row_array();
			if(password_verify($password, $get_user['user_password']))
			{
				$pegawai	= $this->db->get_where('pegawai', ['pegawai_id' => $get_user['pegawai_id']])->row_array();
				$this->session->set_userdata('login', TRUE);
				$this->session->set_userdata('user_id', $get_user['user_id']);
				$this->session->set_userdata('pegawai_id', $get_user['pegawai_id']);
				$this->session->set_userdata('jabatan_id', $pegawai['jabatan_id']);
				$this->session->set_userdata('username', $get_user['user_username']);
				$this->session->set_userdata('level', $get_user['user_level']);
				redirect('dashboard');
			}
			else 
			{
				set_pesan('Username atau password salah', false);
				redirect('');
			}
		} 
		else 
		{
			set_pesan('Username tidak terdaftar', false);
			redirect('');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('login');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('pegawai_id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		set_pesan('Anda telah keluar', true);
		redirect('');
	}
}
