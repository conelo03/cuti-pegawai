<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != TRUE)
		{
			set_pesan('Silahkan login terlebih dahulu', false);
			redirect('');
		}
		date_default_timezone_set("Asia/Jakarta");
		$this->load->library('upload');
	}

	public function index()
	{
        $data['title']		= 'Profil Pegawai';
        $id_pegawai = $this->session->userdata('pegawai_id');
		$data['pegawai']	= $this->M_pegawai->get_by_id($id_pegawai)->row_array();
		$this->load->view('profile/data', $data);
	}

	public function update()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Profil Pegawai';
			$id_pegawai 		= $this->session->userdata('pegawai_id');
			$data['pegawai']	= $this->M_pegawai->get_by_id($id_pegawai)->row_array();
			$this->load->view('profile/edit', $data);
		} else {
			$id_pegawai 		= $this->session->userdata('pegawai_id');
			$id_user 		= $this->session->userdata('user_id');
			$data	= $this->input->post(null, true);
			$tag 	= $data['tag'];
			if($tag == 'login'){
				$user = $this->M_user->get_by_id($id_user);
				if(!password_verify($this->input->post('password_lama'), $user['user_password']))
				{
					$this->session->set_flashdata('msg', 'password-salah');
					redirect('update-profil');
				}

				if(!empty($_FILES['foto']['name'])){
					$foto = $this->upload_foto();
				}else{
					$foto = $data['foto_lama'];
				}
				$data_pegawai	= [
					'pegawai_id'				=> $id_pegawai,
					'pegawai_foto_profil'		=> $foto,
				];

				$data_user = [
					'user_id'		=> $id_user,
					'user_username'	=> $data['user_username'],
					'user_password'	=> password_hash($data['password_baru'], PASSWORD_DEFAULT),
				];

				$this->M_user->update($data_user);
				
				if ($this->M_pegawai->update($data_pegawai)) {
					$this->session->set_flashdata('msg', 'error');
					redirect('update-profil');
				} else {
					$this->session->set_flashdata('msg', 'edit');
					redirect('update-profil');
				}
			} else {
				$data_pegawai	= [
					'pegawai_id'				=> $id_pegawai,
					'pegawai_no_telepon'		=> $data['pegawai_no_telepon'],
					'pegawai_alamat'			=> $data['pegawai_alamat'],
				];
				
				
				if ($this->M_pegawai->update($data_pegawai)) {
					$this->session->set_flashdata('msg', 'error');
					redirect('update-profil');
				} else {
					$this->session->set_flashdata('msg', 'edit');
					redirect('update-profil');
				}
			}
		}
	}

	private function upload_foto()
	{
	    $config['upload_path'] = './assets/img/profile';
	    $config['allowed_types'] = 'jpg|png|jpeg';
	    $config['max_size'] = 5100;
	    $this->upload->initialize($config);
	    $this->load->library('upload', $config);

	    if(! $this->upload->do_upload('foto'))
	    {
	    	return 'user.png';
	    }

	    return $this->upload->data('file_name');
	}

	private function validation()
	{
		$tag = $this->input->post('tag');
		$password_lama = $this->input->post('password_lama');
		if($tag == 'login'){
			$username		= $this->session->userdata('username');
			$username_baru 	= $this->input->post('user_username');
			if($username == $username_baru){
				$this->form_validation->set_rules('user_username', 'Username', 'required');	
			} else {
				$this->form_validation->set_rules('user_username', 'Username', 'required|is_unique[pengguna.user_username]', ['is_unique'	=> 'Username Sudah Ada']);
			}
			
			$this->form_validation->set_rules('password_lama', 'Password Lama', 'required');	
			$this->form_validation->set_rules('password_baru', 'Password Baru', 'required');		
			$this->form_validation->set_rules('konfirmasi_password_baru', 'Konfirmasi Password Baru', 'required|matches[password_baru]');
		}else{
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
