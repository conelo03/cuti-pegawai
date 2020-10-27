<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Izin extends CI_Controller {

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

	private function validation()
	{
		$this->form_validation->set_rules('izin_tanggal', 'Tanggal Pengajuan Izin', 'required');
		$this->form_validation->set_rules('izin_mulai', 'Jam Mulai Izin', 'required');
		$this->form_validation->set_rules('izin_selesai', 'Jam Selesai Izin', 'required');
		$this->form_validation->set_rules('izin_alasan', 'Alasan Izin', 'required');
	}

	private function validation_status()
	{
		$this->form_validation->set_rules('izin_atasanlangsung_status', 'Status', 'required');
	}

	public function index()
	{
		$id_pegawai = $this->session->userdata('pegawai_id');
        $data['title']		= 'Data Izin Saya';
		$data['izin']	= $this->M_izin->get_by_staf($id_pegawai)->result_array();
		$this->load->view('izin/data', $data);
	}

	public function data_izin()
	{
		$id_pegawai = $this->session->userdata('pegawai_id');
		$id_jabatan = $this->session->userdata('jabatan_id');
        $data['title']	= 'Data Izin Keluar Kantor';
        if(is_admin()){
        	$data['izin']	= $this->db->select('*')->from('izin')->get()->result_array();
        }elseif(is_pegawai()) {
        	$data['izin']	= $this->M_izin->get_by_atasan_langsung($id_pegawai)->result_array();
        }
		$this->load->view('izin/data_izin', $data);
	}

	public function detail($id_izin)
	{
		$id_pegawai = $this->session->userdata('pegawai_id');
		$data['izin']	= $this->M_izin->get_by_id($id_izin)->row_array();
		if ($id_pegawai == $data['izin']['pegawai_id']) {
			$data['title']		= 'Data Izin Saya';
		} else {
			$data['title']	= 'Data Izin Keluar Kantor';
		}
        
		$data['atasan']		= $this->M_pegawai->get_data()->result_array();
		$this->load->view('izin/detail', $data);
	}

	public function tambah()
	{
		$id_pegawai = $this->session->userdata('pegawai_id');
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Izin Saya';
			$data['pegawai']	= $this->db->get_where('pegawai', ['pegawai_id' => $id_pegawai])->row_array();
			$this->load->view('izin/tambah', $data);
		} else {
			$id_jabatan = $this->session->userdata('jabatan_id');
			$a 			= $this->db->get_where('jabatan', ['jabatan_id' => $id_jabatan])->row_array();
			$get_atasan_langsung = $this->db->get_where('jabatan', ['jabatan_nama' => $a['jabatan_atasanlangsung']])->row_array();
			$id_atasan_langsung = $this->db->get_where('pegawai', ['jabatan_id' => $get_atasan_langsung['jabatan_id']])->row_array();
			$data		= $this->input->post(null, true);
			$data_user	= [
				'pegawai_id'					=> $data['pegawai_id'],
				'izin_tanggal'					=> $data['izin_tanggal'],			
				'izin_alasan'					=> $data['izin_alasan'],
				'izin_mulai'					=> $data['izin_mulai'],
				'izin_selesai'					=> $data['izin_selesai'],
				'izin_atasanlangsung_id'		=> $id_atasan_langsung['pegawai_id'],
				'izin_atasanlangsung_status'	=> 'Belum dikonfirmasi',
				'izin_created'					=> date('Y-m-d H:i:s'),
			];

			if ($this->M_izin->insert($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-izin');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('izin');
			}
		}
	}

	public function edit($id_izin)
	{
		$id_pegawai = $this->session->userdata('pegawai_id');
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Izin Saya';
			$data['pegawai']	= $this->db->get_where('pegawai', ['pegawai_id' => $id_pegawai])->row_array();
			$data['atasan']		= $this->M_pegawai->get_data()->result_array();
			$data['izin']		= $this->M_izin->get_by_id($id_izin)->row_array();
			$this->load->view('izin/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'izin_id'						=> $id_izin,
				'izin_tanggal'					=> $data['izin_tanggal'],			
				'izin_alasan'					=> $data['izin_alasan'],
				'izin_mulai'					=> $data['izin_mulai'],
				'izin_selesai'					=> $data['izin_selesai'],
			];
			
			if ($this->M_izin->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-izin/'.$id_izin);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('izin');
			}
		}
	}

	public function edit_status($id_izin)
	{
		$this->validation_status();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Izin Keluar Kantor';
			$data['izin']	= $this->M_izin->get_by_id($id_izin)->row_array();
			$data['atasan']		= $this->M_pegawai->get_data()->result_array();
			$this->load->view('izin/detail', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'izin_id'						=> $id_izin,
				'izin_atasanlangsung_status'	=> $data['izin_atasanlangsung_status'],
			];
			
			
			if ($this->M_izin->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('detail-izin/'.$id_izin);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('detail-izin/'.$id_izin);
			}
		}
	}

	public function hapus($id_izin)
	{
		$this->M_izin->delete($id_izin);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('izin');
	}

	public function cetak($id_izin)
	{
		$id_jabatan = $this->session->userdata('jabatan_id');
        $data['title']		= 'Izin Keluar Kantor';
		$data['izin']	= $this->M_izin->get_by_id_cetak($id_izin)->row_array();
	
		if($id_jabatan == '3'){
			$tanggal = date('l-d-F-Y', strtotime($data['izin']['izin_tanggal']));
			$pch_tgl = explode('-', $tanggal);
			$hari = $this->hari($pch_tgl[0]);
			$bulan = $this->bulan($pch_tgl[2]);
			$data['hari_izin'] = $hari;
			$data['tanggal_izin'] = $pch_tgl[1].' '.$bulan.' '.$pch_tgl[3];
			$this->load->view('izin/cetak_hakim', $data);
		} else {
			$tanggal = date('d-F-Y', strtotime($data['izin']['izin_tanggal']));
			$pch_tgl = explode('-', $tanggal);
			$bulan = $this->bulan($pch_tgl[1]);
			$data['tanggal_izin'] = $pch_tgl[0].' '.$bulan.' '.$pch_tgl[2];
			$this->load->view('izin/cetak', $data);
		}
	}

	private function bulan($bulan)
    {
        $bulan=$bulan;
        switch ($bulan) {
          case 'January':
            $bulan= "Januari";
            break;
          case 'February':
            $bulan= "Februari";
            break;
          case 'March':
            $bulan= "Maret";
            break;
          case 'April':
            $bulan= "April";
            break;
          case 'May':
            $bulan= "Mei";
            break;
          case 'June':
            $bulan= "Juni";
            break;
          case 'July':
            $bulan= "Juli";
            break;
          case 'August':
            $bulan= "Agustus";
            break;
          case 'September':
            $bulan= "September";
            break;
          case 'October':
            $bulan= "Oktober";
            break;
          case 'November':
            $bulan= "November";
            break;
          case 'December':
            $bulan= "Desember";
            break;
          default:
            $bulan= "Isi variabel tidak di temukan";
            break;
        }

        return $bulan;
    }

    private function hari($hari)
	{
	    switch ($hari) {
		    case 'Sunday':
		        $hari= "Minggu";
		        break;
		    case 'Monday':
		        $hari= "Senin";
		        break;
		    case 'Tuesday':
		        $hari= "Selasa";
		        break;
		    case 'Wednesday':
		        $hari= "Rabu";
		        break;
		    case 'Thursday':
		        $hari= "Kamis";
		        break;
		    case 'Friday':
		        $hari= "Jum'at";
		        break;
		    case 'Saturday':
		        $hari= "Sabtu";
		        break;
		    default:
		        $hari= "Isi variabel tidak di temukan";
		        break;
	    }

	    return $hari;
	}
}
